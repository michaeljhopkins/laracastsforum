<?php

namespace Forum\Http\Controllers;

use function compact;
use Forum\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
    	return view('profiles.show',[
    		'profileUser' => $user,
		    'threads' => $user->threads()->paginate(2)
	    ]);
    }
}
