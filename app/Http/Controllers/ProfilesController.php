<?php

namespace Forum\Http\Controllers;

use Forum\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
    	$activities = $user->activity()->with('subject')->get();
        return view('profiles.show', [
            'profileUser' => $user,
            'activities' => $activities,
        ]);
    }
}
