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
    public function adminView()
    {
        if(Auth::check()) {
            return 'a';
            return redirect()->route('admin/home');
        }

        return view('login.admin');
    }
    
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function adminAuthenticate(Request $request)
    {

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors(['Username / Password wrong']);
        }
    }
    
    /**
     * Show login view.
     *
     * @return View
     */
    public function siswaView()
    {
        if(Auth::guard('web-siswa')->check()) {
            return redirect()->route('siswa.home');
        }

        return view('login.siswa');
    }
    
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function siswaAuthenticate(Request $request)
    {

        $credentials = $request->only('nis', 'password');

        if (Auth::guard('web-siswa')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors(['NIS / Password wrong']);
        }
    }
    
}
