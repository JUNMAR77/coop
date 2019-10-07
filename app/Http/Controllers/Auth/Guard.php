<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Redirect;

class Guard extends Controller
{	
	//CHECK IF THE USER NOT LOGGED THEN REDIRECT TO LOGIN PAGE
    public static function in()
    {
    	if (!Session::has('logged')) {
    		return Redirect::to('/login')->send();
    	}
    }
    //CHECK IF THE USER ALREADY LOGGED THEN GO TO PREVIOUS PAGE
    public static function out()
    {
    	if (Session::has('logged')) {
    		return Redirect::to('/dashboard')->send();
    	}
    }
}

