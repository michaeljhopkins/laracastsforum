<?php

namespace Forum\Http\Controllers;

use Forum\Channel;
use Forum\Filters\ThreadFilters;
use Forum\Thread;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index(Channel $channel, ThreadFilters $filter)
    {
        $threads = $this->getThreads($channel, $filter);
        if (request()->wantsJson()) {
            return $threads;
        }

        return view('threads.index', compact('threads'));
    }

    public function create()
    {
        return view('threads.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      => 'required',
            'body'       => 'required',
            'channel_id' => 'required|exists:channels,id',
        ]);
        $thread = Thread::create([
            'user_id'    => auth()->id(),
            'title'      => request('title'),
            'body'       => request('body'),
            'channel_id' => request('channel_id'),
        ]);

        return redirect($thread->path());
    }

    public function show($channel, Thread $thread)
    {
        return view('threads.show', [
            'thread' => $thread,
            'replies' => $thread->replies()->paginate(5),
        ]);
    }

    public function destroy($channel, Thread $thread)
    {
        $thread->delete();

        return response([], 204);
    }

    public function getThreads(Channel $channel, ThreadFilters $filter)
    {
        $threads = Thread::latest()->filter($filter);
        if ($channel->exists) {
            $threads->where('channel_id', $channel->id);
        }

        return $threads->get();
    }
}
