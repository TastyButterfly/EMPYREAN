<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Payment;
use App\Models\User;
use App\Models\Discount;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class SubscriptionController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        $subscriptions=Subscription::paginate(15);
        return view('subDashboard',compact('subscriptions'));
    }
    public function create()
    {
        return view('createSubscription');
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'plan'=>'required|in:PC Game Pass,Ultimate Pass,Basic Pass',
            'duration'=>'required|in:One Month,One Year',
            'start_date'=>'required|date',
            'cancel'=>'required|in:Yes,No',
            'payment_id' => 'nullable|exists:payments,id',
        ]);
        $subscription=$request->post();
        $startDate = Carbon::parse($subscription['start_date']);
        if ($subscription['duration'] === 'One Month') {
            $endDate = $startDate->copy()->addMonth()->addDay();
        } 
        elseif ($subscription['duration'] === 'One Year') {
            $endDate = $startDate->copy()->addYear()->addDay();
        } 
        else {
            $endDate = null; // Handle other durations or set a default value
        }
        $subscription['end_date'] = $endDate;
        if($subscription['cancel'] === 'Yes'){
            $subscription['status'] = 'Cancelled';
            $subscription['end_date'] = Carbon::now()->setTimezone('Asia/Singapore');
        }
        else if($subscription['cancel'] === 'No'){
            if($subscription['end_date'] > Carbon::now()->setTimezone('Asia/Singapore')){
                $subscription['status'] = 'Active';
            }
            else{
                $subscription['status'] = 'Expired';
            }
        }
        unset($subscription['cancel']);
        $user = User::where('email', $subscription['email'])->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
        $subscription['user_id'] = $user->id;
        $subscription['payment_id'] = Payment::find($subscription['payment_id'])->first()->id;
        $subscription['end_date'] = $subscription['end_date']->toDateString();
        $subscription['start_date'] = $subscription['start_date']->toDateString();
        Subscription::create($subscription);
        return redirect()->route('subscriptions.index')->with('message','Subscription created successfully!');
    }
    public function show(Subscription $subscription)
    {
        return view('showSubscription',compact('subscription')); 
    }
    public function edit(Subscription $subscription)
    {
        return view('editSubscription',compact('subscription'));
    }
    public function update(Request $request, Subscription $subscription)
    {
        $request->validate([
            'email' => 'required|exists:users,email',
            'plan' => 'required|in:PC Game Pass,Ultimate Pass,Basic Pass',
            'duration' => 'required|in:One Month,One Year',
            'start_date' => 'required|date',
            'cancel' => 'required|in:Yes,No',
            'payment_id' => 'nullable|exists:payments,id',
        ]);

        $data = $request->post();
        $startDate = Carbon::parse($data['start_date']);

        if ($data['duration'] === 'One Month') {
            $endDate = $startDate->copy()->addMonth()->addDay();
        } elseif ($data['duration'] === 'One Year') {
            $endDate = $startDate->copy()->addYear()->addDay();
        } else {
            $endDate = null; // Handle other durations or set a default value
        }

        $data['end_date'] = $endDate;

        if ($data['cancel'] === 'Yes') {
            $data['status'] = 'Cancelled';
            $data['end_date'] = Carbon::now()->setTimezone('Asia/Singapore');
        } else if ($data['cancel'] === 'No') {
            if ($data['end_date'] > Carbon::now()->setTimezone('Asia/Singapore')) {
                $data['status'] = 'Active';
            } else {
                $data['status'] = 'Expired';
            }
        }
        unset($data['cancel']);
        $user = User::where('email', $data['email'])->first();
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
        $data['user_id'] = $user->id;
        $data['payment_id'] = Payment::find($data['payment_id'])->first()->id;
        $data['end_date'] = $data['end_date']->toDateString();
        $data['start_date'] = $data['start_date']->toDateString();
        $subscription->update($data);
        return redirect()->route('subscriptions.index')->with('message', 'Subscription updated successfully.');
    }
    public function submit(Request $request){
        $request->validate([
            'planDuration' => 'required',
        ]);
        $planD = $request->input('planDuration');
        $duration = $this->setDuration($planD);
        $plan = $this->setPlan($planD);
        session(['plan' => $plan, 'duration' => $duration]);
        $user = Auth::guard('user')->user();
        $extend= 0;
        if($user === null){
            return response()->view('forbidden', ['type' => 'user'], 403);
        }
        $existingSubscription = $user->subscriptions()
            ->where('status', 'Active')
            ->orderBy('end_date', 'desc')
            ->first();

        if ($existingSubscription) {
            if ($existingSubscription->plan !== $plan) {
                $daysLeft = floor(Carbon::now()->setTimezone('Asia/Singapore')->floatDiffInDays($existingSubscription->end_date, false));
                $discount = [
                    'plan' => $existingSubscription->plan,
                    'subscription_id' => $existingSubscription->id,
                    'daysLeft' => $daysLeft,
                    'discountPrice'=>round($this->setDiscount(['plan' => $existingSubscription->plan, 'daysLeft' => $daysLeft]),2),
                ];
                $price = $this->setPrice(['plan' => $plan, 'duration' => $duration]);
                $total=$price-$discount['discountPrice'];
                $startDate = Carbon::now()->setTimezone('Asia/Singapore');
            } else {
                $extend=1;
                $startDate = $existingSubscription->end_date;
                $price = $this->setPrice(['plan' => $plan, 'duration' => $duration]);
                $total=$price;
            }
        } else {
            $startDate = Carbon::now()->setTimezone('Asia/Singapore');
            $price = $this->setPrice(['plan' => $plan, 'duration' => $duration]);
            $total=$price;
        }
        if($duration === 'One Month'){
            $endDate = $startDate->copy()->addMonth()->addDay();
        }
        else if($duration === 'One Year'){
            $endDate = $startDate->copy()->addYear()->addDay();
        }
        else{
            $endDate = null;
        }
        $startDate = $startDate->toDateString();
        $endDate = $endDate->toDateString();
        $subscription_data=[
            'plan' => $plan,
            'duration' => $duration,
            'price' => $price,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total' => $total,
            'extend'=>$extend,
        ];
        $discount=$discount ?? null;//check if discount is set
        if($subscription_data['total']>0){
            return view('payment',compact('subscription_data','discount'));
        }
        elseif($subscription_data['total']<=0){
            return view('zeroPayment',compact('subscription_data','discount'));
        }
        else{
            return redirect()->route('subscribe')->with('error', 'Subscription failed to submit.');
        }
    }
    public function zeroPayment(Request $request){
        $plan = session('plan');
        $duration = session('duration');
        $price=$this->setPrice(['plan' => $plan, 'duration' => $duration]);
        $user = Auth::guard('user')->user();
        $extend= 0;
        if($user === null){
            return response()->view('forbidden', ['type' => 'user'], 403);
        }
        $existingSubscription = $user->subscriptions()
            ->where('status', 'Active')
            ->orderBy('end_date', 'desc')
            ->first();
        $daysLeft = floor(Carbon::now()->setTimezone('Asia/Singapore')->floatDiffInDays($existingSubscription->end_date, false));
        $discount = [
            'plan' => $existingSubscription->plan,
            'subscription_id' => $existingSubscription->id,
            'daysLeft' => $daysLeft,
            'discountPrice'=>round($this->setDiscount(['plan' => $existingSubscription->plan, 'daysLeft' => $daysLeft]),2),
        ];
        $total=$price-$discount['discountPrice'];
        $startDate = Carbon::now()->setTimezone('Asia/Singapore');
        if($duration === 'One Month'){
            $endDate = $startDate->copy()->addMonth()->addDay();
        }
        else if($duration === 'One Year'){
            $endDate = $startDate->copy()->addYear()->addDay();
        }
        else{
            $endDate = null;
        }
        $startDate = $startDate->toDateString();
        $endDate = $endDate->toDateString();
        Subscription::cancel($existingSubscription);
        $subscription=Subscription::create([
            'user_id' => $user->id,
            'plan' => $plan,
            'duration' => $duration,
            'status' => 'Active',
            'start_date' => $startDate,
            'end_date' => $endDate,
            'payment_id' => null,
        ]);
        Discount::create([
            'plan' => $discount['plan'],
            'discount_price' => $discount['discountPrice'],
            'daysLeft' => $discount['daysLeft'],
            'subscription_id' => $subscription->id,
        ]);
        session([
            'subscription_id' => $subscription->id,
            'price' => $price,
            'total' => $total,
            'oldPlan' => $discount['plan'],
            'daysLeft' => $discount['daysLeft'],
            'discountPrice'=>$discount['discountPrice'],
        ]);
        return redirect()->route('receipt');
    }
    public function viewReceipt(Subscription $subscription){
        $user=User::find(Auth::guard('user')->id());
        if ($user===null || $subscription->user->id != $user->id){
            return response()->view('forbidden', ['type' => 'admin'], 403);
        }
        $payment=$subscription->payment;
        $discountRec=Discount::where('subscription_id',$subscription->id)->first();
        $price=$this->setPrice(['plan' => $subscription->plan, 'duration' => $subscription->duration]);
        if(isset($payment)){
            if(isset($discountRec)){
                $discount=[
                    'oldPlan' => $discountRec->plan,
                    'discountPrice' => $discountRec->discount_price,
                    'daysLeft' => $discountRec->daysLeft
                ];
                return view('receipt', compact('payment','price','subscription','discount'));
            }
            return view('receipt', compact('payment','price','subscription'));
        }
        $total=$price-$discountRec->discount_price;
        $discount=[
            'oldPlan' => $discountRec->plan,
            'discountPrice' => $discountRec->discount_price,
            'daysLeft' => $discountRec->daysLeft
        ];
        return view('receipt', compact('subscription','discount','total','price'));
    }
    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->route('subscriptions.index')->with('message','Subscription deleted successfully.');
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
    public function cancel(){
        return redirect()->route('subscriptions.index')->with('message','Operation cancelled by user. No changes made.');
    }
}
