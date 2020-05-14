<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /**
     * Show login view.
     *
     * @return View
     */
    public function view()
    {
        if(Auth::check()) {
            return redirect()->route('home');
        }

        return view('login.view');
    }
    
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('login');
        } else {
            return redirect()->back()->withErrors(['Username / Password wrong']);
        }
    }
    
}
