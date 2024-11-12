<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin; // Import the Admin model
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //
    public function validateAdmin(Request $request)
    {
        // Validate the request to ensure it contains the necessary data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Retrieve the admin record based on the provided email
        $admin = Admin::where('email', $request->input('email'))->first();

        // Check if the admin exists and verify the password
        if ($admin && Hash::check($request->input('password'), $admin->password)) {
            Auth::guard('admin')->login($admin);
            return redirect()->route('home')->with('success', 'Welcome back, ' . $admin->name . '!');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        if (url()->previous() === url('/sign_in')) {
            return redirect()->route('sign_in');
        }
        return redirect()->route('home')->with('success', 'You have been successfully logged out.');
    }
    public function profile(){
        $admin = Admin::find(Auth::guard('admin')->user()->id);
        if(!$admin){
            return response()->view('forbidden', ['type' => 'admin'], 403);
        }
        return view('adminProfile', compact('admin'));
    }
}
