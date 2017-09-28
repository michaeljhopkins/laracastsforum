<?php

namespace App\Http\Controllers;

use App\User;

class RegisterConfirmationController extends Controller
{
    public function index()
    {
        try {
            User::whereToken(request('token'))->firstOrFail()->update(['confirmed' => true]);
            return redirect('/threads');
        } catch(\Exception $e){
            return redirect(route('threads'))->with('flash','Unknown token');
        }
    }
}
