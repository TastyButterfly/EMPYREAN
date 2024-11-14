<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Models\Payment;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //Display a listing of the resource.
    public function index(Request $request)
    {
        $query = User::query();
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('email', 'like', "%{$search}%");
        }
        $users = $query->paginate(15);

        return view('userDashboard', compact('users'));
    } 
    public function create()
    {
        return view('createUser');
    }
    public function store(Request $request)
    {
        // Validate the request to ensure it contains the necessary data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:255|confirmed',
            'status' => 'required|in:Active,Deactivated,Suspended',
        ]);
        $password=$validatedData['password'];
        $validatedData['password'] = Hash::make($password);
        $user = User::create($validatedData);
        return redirect()->route('users.index')->with('message','User created successfully!');
    }
    public function show(User $user)
    {
        $currentPlan = $user->subscriptions()
        ->where('status', 'Active')
        ->orderBy('end_date', 'desc')
        ->first();
        $totalPaid = $user->payments()->sum('amount');
        return view('showUsers',compact('user','currentPlan','totalPaid')); 
    }
    public function edit(User $user)
    {
        return view('editUser',compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'status' => 'required|in:Active,Deactivated,Suspended',
        ]);

        // Update the user record in the database
        $user->fill([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'status' => $request->input('status'),
        ]);

        // Only update the password if a new one is provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();
        
        return redirect()->route('users.index')->with('message','User updated successfully.');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('message','User deleted successfully.');
    }
    public function validateUser(Request $request){
        // Validate the request to ensure it contains the necessary data
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
        ]);

        // Check if the user exists
        $user = User::where('email', $request->input('email'))->first();
        //gets first record by default, should only be one record with that email
        // Return a JSON response indicating whether the user exists
        if ($user && Hash::check($request->input('password'), $user->password) && $user->status === 'Active') {
            Auth::guard('user')->login($user);
            return redirect()->route('home')->with('success', 'Logged in. Hello there, ' . $user->name . '!');
        } 
        else if($user && $user->status === 'Deactivated') {
            return redirect()->back()->with('error', 'User account deactivated. Please contact support to recover.');
        }
        else if($user && $user->status === 'Suspended') {
            return redirect()->back()->with('error', 'User account suspended. Please contact support for remediation.');
        }
        else {
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }
    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:255|confirmed',
        ]);
        $password=$validatedData['password'];
        $validatedData['password'] = Hash::make($password);
        $user = User::create($validatedData);
        return redirect()->route('sign_in')->with('success','User created successfully! Please sign in.');
    }
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        if (url()->previous() === url('/admin_sign_in')) {
            return redirect()->route('admin_sign_in');
        }
        return redirect()->route('home')->with('message', 'Logged out successfully!');
    }
    public function profile()
    {
        $user = User::find(Auth::guard('user')->id());
        if (!$user) {
            return redirect()->route('sign_in')->with('error', 'User not found. Please sign in first.');
        }

        $subscription = Subscription::where('user_id', $user->id)
        ->where('status', 'Active')
        ->orderBy('end_date', 'desc')
        ->first();

        // Retrieve all subscription records for the user
        $subs = Subscription::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();
            
        $deactivationToken = bin2hex(random_bytes(32));
        session(['deactivation_token' => $deactivationToken]);

        return view('profile', compact('user','subscription','subs','deactivationToken'));
    }
    public function cancel(){
        return redirect()->route('users.index')->with('message','Operation cancelled by user. No changes made.');
    }
    public function redirectToEditPassword()
    {
        $user = Auth::guard('user')->user();
        $editPWToken = bin2hex(random_bytes(32));
        session(['editPWToken' => $editPWToken]);
        return view('editPassword', compact('user','editPWToken'));
    }
    public function redirectToEditUsername()
    {
        $user = Auth::guard('user')->user();
        if (!session()->has('editUNToken')) {
            $editUNToken = bin2hex(random_bytes(32));
            session(['editUNToken' => $editUNToken]);
        } else {
            $editPWToken = session('editUNToken');
        }
        return view('editUsername', compact('user','editUNToken'));
    }
    public function redirectToDeactivate(){
        $user = Auth::guard('user')->user();
        $deactivation_token = bin2hex(random_bytes(32));
        session(['deactivation_token' => $deactivation_token]);

        return view('deactivateAccount', compact('user','deactivation_token'));
    }
    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user->password = Hash::make($request->input('password'));
        $user->save();
        Session::forget('editPWToken');
        return redirect()->route('profile')->with('message','Password updated successfully.');
    }
    public function updateUsername(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255|confirmed',
        ]);
        $user->name = $request->input('name');
        $user->save();
        Session::forget('editUNToken');
        return redirect()->route('profile')->with('message','Username updated successfully.');
    }
    public function deactivate(User $user)
    {
        $user->status = 'Deactivated';
        $user->save();
        Session::forget('deactivation_token');
        Auth::guard('user')->logout();
        return redirect()->route('home')->with('message', 'Account has been deactivated. Farewell!');
    }
}
