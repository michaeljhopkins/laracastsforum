<?php

namespace Forum\Http\Controllers;

use Forum\Activity;
use Forum\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
	    return view('profiles.show', [
            'profileUser' => $user,
            'activities' => Activity::feed($user),
        ]);
    }
}
