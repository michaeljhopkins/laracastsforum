<?php

namespace App\Http\Controllers;

use App\User;

class RegisterConfirmationController extends Controller
{
    public function index()
    {
        $user = User::whereToken(request('token'))->first();
        if(!$user){
            return redirect(route('threads'))->with('flash','Unknown token.');
        }
        $user->confirm();
        return redirect('/threads')->with('flash','Your account is now confirmed!');
    }
}
