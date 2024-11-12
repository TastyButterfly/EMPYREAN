<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Discount;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;

class PaymentController extends Controller
{
    //Display a listing of the resource.
    public function index(Request $request)
    {
        $query = Payment::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('email', 'like', "%{$search}%");
            });
        }

        $payments = $query->paginate(15);

        return view('paymentDashboard', compact('payments'));
    }
    public function create()
    {
        return view('createPayment');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'amount' => 'required',
            'payment_method' => 'required|in:Credit/Debit Card,TnG eWallet',//remember to not add spaces
            'status' => 'required|in:Completed,Pending,Declined',
            'payment_date' => 'required|date_format:Y-m-d\TH:i',
        ]);
        $user = User::where('email', $request->input('email'))->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found. Try a different email instead.');
        }
        Payment::create([
            'user_id' => $user->id,
            'amount' => $request->input('amount'),
            'payment_method' => $request->input('payment_method'),
            'status' => $request->input('status'),
            'payment_date' => $request->input('payment_date'),
        ]);
        return redirect()->route('payments.index')->with('message', 'Payment created successfully!');
    }
    public function show(Payment $payment)
    {
        $subscription = Subscription::where('payment_id', $payment->id)->first();

        return view('showPayment', compact('payment','subscription'));
    }
    public function edit(Payment $payment)
    {
        return view('editPayment', compact('payment'));
    }
    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'amount' => 'required',
            'payment_method' => 'required|in:Credit/Debit Card,TnG eWallet',//remember to not add spaces
            'status' => 'required|in:Completed,Pending,Declined',
            'payment_date' => 'required|date_format:Y-m-d\TH:i:s',
        ]);
        $user = User::where('email', $request->input('email'))->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found. Try a different email instead.');
        }
        $payment->update([
            'user_id' => $user->id,
            'amount' => $request->input('amount'),
            'payment_method' => $request->input('payment_method'),
            'status' => $request->input('status'),
            'payment_date' => $request->input('payment_date'),
        ]);
        return redirect()->route('payments.index')->with('message', 'Payment updated successfully!');
    }
    public function pay(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $user = Auth::guard('user')->user();
        $plan=session('plan');
        $duration=session('duration');
        $amount = $this->setPrice(['plan' => session('plan'), 'duration' => session('duration')])*100;
        $existingSubscription = $user->subscriptions()
            ->where('status', 'Active')
            ->orderBy('end_date', 'desc')
            ->first();
        $existingSubscription = $existingSubscription ?? null;
        if($existingSubscription!=null && $existingSubscription->plan!=$plan){//if user is changing plans
            $daysLeft = floor(Carbon::now()->setTimezone('Asia/Singapore')->floatDiffInDays($existingSubscription->end_date, false));
            $amount-=round($this->setDiscount(['plan' => $existingSubscription->plan, 'daysLeft' => $daysLeft]),2)*100;
        }
        try {
            // Create a Stripe Checkout Session
            $checkoutSession = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'myr',
                        'product_data' => [
                            'name' => session('plan') .' '. session('duration') . ' Subscription',
                        ],
                        'unit_amount' => $amount,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => route('payments.success', ['session_id' => '{CHECKOUT_SESSION_ID}']),
                'cancel_url' => route('subscribe'),
            ]);

            // Store the checkout session ID in the session
            session(['checkout_session_id' => $checkoutSession->id]);

            // Redirect to the Stripe Checkout page
            return redirect($checkoutSession->url);
        } catch (\Exception $e) {
            return redirect()->route('subscribe')->with('error', 'Payment failed! ' . $e->getMessage());
        }
    }
    public function success(Request $request)
    {
        // Retrieve the checkout session ID from the request
        $checkoutSessionId = session('checkout_session_id');

        if (!$checkoutSessionId) {
            return redirect()->route('subscribe')->with('error', 'Invalid session.');
        }

        // Retrieve the checkout session from Stripe
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $checkoutSession = StripeSession::retrieve($checkoutSessionId);

        // Retrieve the payment intent to get the payment method
        $paymentIntent = PaymentIntent::retrieve($checkoutSession->payment_intent);
        $paymentMethodID = $paymentIntent->payment_method;
        $paymentMethodRec = PaymentMethod::retrieve($paymentMethodID);
        $paymentMethod = $this->mapPaymentMethodType($paymentMethodRec->type);
        $plan=session('plan');
        $duration=session('duration');
        $user= Auth::guard('user')->user();
        $status='Completed';//default status, no API so this is a placeholder
        $payment_date = Carbon::now()->setTimeZone('Asia/Singapore');
        $price=$this->setPrice(['plan' => $plan, 'duration' => $duration]);
        $total=$price;
        $existingSubscription = $user->subscriptions()
            ->where('status', 'Active')
            ->orderBy('end_date', 'desc')
            ->first();
        $existingSubscription = $existingSubscription ?? null;
        if($existingSubscription!=null && $existingSubscription->plan!=$plan){//if user is changing plans
            $daysLeft = floor(Carbon::now()->setTimezone('Asia/Singapore')->floatDiffInDays($existingSubscription->end_date, false));
            session([
                'oldPlan' => $existingSubscription->plan,
                'daysLeft' => $daysLeft,
                'discountPrice'=>round($this->setDiscount(['plan' => $existingSubscription->plan, 'daysLeft' => $daysLeft]),2),
            ]);
            $total=$price-round($this->setDiscount(['plan' => $existingSubscription->plan, 'daysLeft' => $daysLeft]),2);
            $startDate = Carbon::now()->setTimezone('Asia/Singapore');
        }
        elseif($existingSubscription!=null && $existingSubscription->plan==$plan){//if user is renewing subscription
            $startDate = $existingSubscription->end_date;
        }
        else{
            $startDate = Carbon::now()->setTimezone('Asia/Singapore');
        }
        if($duration === 'One Month'){
            $endDate = $startDate->copy()->addMonth()->addDay();
        }
        else if($duration === 'One Year'){
            $endDate = $startDate->copy()->addYear()->addDay();
        }
        else{
            return redirect()->route('subscribe')->with('error', 'Unknown error.');
        }
        $startDate = $startDate->toDateString();
        $endDate = $endDate->toDateString();
        $payment= Payment::create([
            'user_id' => $user->id,
            'amount' => $total,
            'payment_method' => $paymentMethod,
            'status' => $status,
            'payment_date' => $payment_date,
        ]);
        if($existingSubscription!=null && $existingSubscription->plan!=$plan){//if user is changing plans
            Subscription::cancel($existingSubscription);//cancel existing subscription
        }
        $subscription= Subscription::create([
            'user_id' => $user->id,
            'plan' => $plan,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => 'Active',
            'duration' => $duration,
            'payment_id' => $payment->id,
        ]);
        if($existingSubscription!=null && $existingSubscription->plan!=$plan){
            Discount::create([
                'plan' => $existingSubscription->plan,
                'discount_price' => round($this->setDiscount(['plan' => $existingSubscription->plan, 'daysLeft' => $daysLeft]),2),
                'daysLeft' => $daysLeft,
                'subscription_id' => $subscription->id,
            ]);
        }
        Session::forget('plan');
        Session::forget('duration');
        session([
            'subscription_id' => $subscription->id,
            'price' => $price,
            'payment_id' => $payment->id,
        ]);
        return redirect()->route('receipt');
    }
    public function showReceipt(){
        $subscription_id = session('subscription_id');
        $price = session('price');
        $payment_id = session('payment_id');
        $oldPlan=session('oldPlan');
        $discountPrice=session('discountPrice');
        $daysLeft=session('daysLeft');
        Session::forget('oldPlan');
        Session::forget('discountPrice');
        Session::forget('daysLeft');
        Session::forget('subscription_id');
        Session::forget('price');
        Session::forget('payment_id');
        if(!isset($subscription_id)){//check if subscription id exists
            return response()->view('forbidden',['type'=>'receipt'],403);
        }
        $subscription = Subscription::find($subscription_id);
        if(isset($payment_id)){//check if payment id exists
            $payment = Payment::find($payment_id);
            if(isset($oldPlan) && isset($discountPrice) && isset($daysLeft)){
                $discount=[
                    'oldPlan' => $oldPlan,
                    'discountPrice' => $discountPrice,
                    'daysLeft' => $daysLeft
                ];
                return view('receipt', compact('payment','subscription','price','discount'));
            }else{
                return view('receipt', compact('payment','subscription','price'));
            }
        }
        $total=session('total');
        $timeNow=session('timeNow');
        Session::forget('total');
        Session::forget('timeNow');
        $discount=[
            'oldPlan' => $oldPlan,
            'discountPrice' => $discountPrice,
            'daysLeft' => $daysLeft
        ];
        return view('receipt', compact('discount','total','price','subscription'));
    }
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect()->route('payments.index')->with('message', 'Payment deleted successfully.');
    }
    public function cancelPayment(Payment $payment){
        return redirect()->route('home')->with('message', 'Payment cancelled successfully. No transaction was made.');
    }
    public function returnToSub(){
        return redirect()->route('subscribe');
    }
    private function setDuration($plan)
    {
        if (strpos($plan, 'Month') !== false) {
            return 'One Month';
        } elseif (strpos($plan, 'Year') !== false) {
            return 'One Year';
        }

        return null; // Default or error handling
    }
    private function setPlan($plan){
        if (strpos($plan, 'Basic') !== false) {
            return 'Basic Pass';
        } elseif (strpos($plan, 'Ultimate') !== false) {
            return 'Ultimate Pass';
        } elseif (strpos($plan, 'Standard') !== false) {
            return 'PC Game Pass';
        }

        return null; // Default or error handling
    }
    private function setPrice($subscription){
        switch($subscription['plan']){
            case 'Basic Pass':
                if($subscription['duration'] === 'One Month'){
                    return 20;
                }
                else if($subscription['duration'] === 'One Year'){
                    return 200;
                }
                break;
            case 'Ultimate Pass':
                if($subscription['duration'] === 'One Month'){
                    return 60;
                }
                else if($subscription['duration'] === 'One Year'){
                    return 600;
                }
                break;
            case 'PC Game Pass':
                if($subscription['duration'] === 'One Month'){
                    return 35;
                }
                else if($subscription['duration'] === 'One Year'){
                    return 350;
                }
                break;
            default:
                return 0;
        }
    }
    private function setDiscount($discount){
        switch($discount['plan']){
            case 'Basic Pass':
                return $discount['daysLeft'] * 200/365;
                break;
            case 'Ultimate Pass':
                return $discount['daysLeft'] * 600/365;
                break;
            case 'PC Game Pass':
                return $discount['daysLeft'] * 350/365;
                break;
            default:
                return 0;
        }
    }
    private function mapPaymentMethodType($type)
    {
        $map = [
            'card' => 'Credit/Debit Card',
            'alipay' => 'AliPay',
            'gpay' => 'GPay',
            // Add other mappings as needed
        ];

        return $map[$type] ?? 'Unknown';
    }
    public function cancel(){
        return redirect()->route('payments.index')->with('message','Operation cancelled by user. No changes made.');
    }
}
