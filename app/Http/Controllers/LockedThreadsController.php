<?php

namespace App\Http\Controllers;

use App\Thread;

class LockedThreadsController extends Controller
{
    public function store(Thread $thread)
    {
        if(! auth()->user()->isAdmin()){
            return response('',403);
        }
        $thread->lock();
    }
}
