<?php

namespace App\Http\Controllers;

use App\User;

class RegisterConfirmationController extends Controller
{
    public function index()
    {
        User::whereToken(request('token'))->firstOrFail()->update(['confirmed' => true]);
        return redirect('/threads');
    }
}
