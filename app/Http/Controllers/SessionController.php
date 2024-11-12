<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //Display a listing of the resource.
    public function index()
    {
        return view('homepage');
    }
    public function create()
    {
        return view('sign_in');
    }
    public function store(Request $request)
    {
        // Validate the request to ensure it contains the user_id
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Create a new session record
        Session::create([
            'user_id' => $request->input('user_id'),
        ]);

        return redirect()->route('homepage')->with('message', 'User logged in successfully');
    }
    public function show(Session $session)
    {
        return view('showSession', compact('session'));
    }
    public function edit(Session $session)
    {
        return view('editSession', compact('session'));
    }
    public function logout(Session $session)
    {
        // Update the session record with the end_time and status
        $session->update([
            'end_time' => Carbon::now(), // Current timestamp
            'status' => 'inactive',
        ]);

        return redirect()->route('homepage')->with('message', 'User logged out successfully');
    }
    public function destroy(Session $session)
    {
        $session->delete();
        return redirect()->route('homepage')->with('message', 'Session deleted successfully');
    }
}
