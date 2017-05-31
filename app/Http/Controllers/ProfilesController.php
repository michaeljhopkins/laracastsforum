<?php

namespace Forum\Http\Controllers;

use Forum\Activity;
use Forum\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
    	$activities = $user->activity()->latest()->with('subject')->get()->groupBy(function($a){
    		return $a->created_at->format('Y-m-d');
	    });
        return view('profiles.show', [
            'profileUser' => $user,
            'activities' => $activities,
        ]);
    }
}
