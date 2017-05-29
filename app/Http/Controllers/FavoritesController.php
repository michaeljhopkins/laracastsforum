<?php

namespace Forum\Http\Controllers;

use Forum\Reply;

class FavoritesController extends Controller
{
	public function __construct() {
		$this->middleware( 'auth');
	}

	public function store(Reply $reply)
    {
    	$reply->favorite();

    	return back();
    }
}
