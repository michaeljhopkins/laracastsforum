<?php

namespace Forum\Http\Controllers;

use Forum\Thread;

class ThreadsSubscriptionsController extends Controller
{
    public function store($channelId, Thread $thread)
    {
        $thread->subscribe();
    }
}
