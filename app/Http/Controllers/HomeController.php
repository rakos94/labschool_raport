<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Homepage
     *
     * @return View
     */
    public function page()
    {
        return view('login.home');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    
}
