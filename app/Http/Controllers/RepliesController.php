<?php

namespace Forum\Http\Controllers;

use Forum\Reply;
use Forum\Thread;

class RepliesController extends Controller
{
    public function __construct()
    {
	    $this->middleware('auth', ['except' => 'index']);
    }

    public function store($channelId, Thread $thread)
    {
        $this->validate(request(), [
            'body' => 'required',
        ]);
        $thread->addReply([
            'body'    => request('body'),
            'user_id' => auth()->id(),
        ]);

        return back()->with('flash','Reply created');
    }
	/**
	 * Update an existing reply.
	 *
	 * @param Reply $reply
	 */
	public function update(Reply $reply)
	{
		$this->authorize('update', $reply);
		$this->validate(request(), ['body' => 'required']);
		$reply->update(request(['body']));
	}
	/**
	 * Delete the given reply.
	 *
	 * @param  Reply $reply
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function destroy(Reply $reply)
	{
		$this->authorize('update', $reply);
		$reply->delete();
		if (request()->expectsJson()) {
			return response(['status' => 'Reply deleted']);
		}
		return back();
	}
}
