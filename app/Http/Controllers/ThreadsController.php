<?php

namespace Forum\Http\Controllers;

use Forum\Channel;
use Forum\Filters\ThreadFilters;
use Forum\Thread;
use Illuminate\Http\Request;

class ThreadsController extends Controller {

	public function __construct() {
		$this->middleware( 'auth' )->except( [ 'index', 'show' ] );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param Channel       $channel
	 *
	 * @param ThreadFilters $filter
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index( Channel $channel, ThreadFilters $filter ) {
		$threads = $this->getThreads( $channel, $filter );

		if(request()->wantsJson()){
			return $threads;
		}

		return view( 'threads.index', compact( 'threads' ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view( 'threads.create' );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store( Request $request ) {
		$this->validate( $request, [
			'title'      => 'required',
			'body'       => 'required',
			'channel_id' => 'required|exists:channels,id'
		] );
		$thread = Thread::create( [
			'user_id'    => auth()->id(),
			'title'      => request( 'title' ),
			'body'       => request( 'body' ),
			'channel_id' => request( 'channel_id' )
		] );

		return redirect( $thread->path() );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \Forum\Thread $thread
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function show( $channelId, Thread $thread ) {
		return view( 'threads.show', [
			'thread' => $thread,
			'replies' => $thread->replies()->paginate(5)
		] );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \Forum\Thread $thread
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit( Thread $thread ) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Forum\Thread            $thread
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update( Request $request, Thread $thread ) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \Forum\Thread $thread
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function destroy( Thread $thread ) {
		//
	}

	/**
	 * @param Channel       $channel
	 * @param ThreadFilters $filter
	 *
	 * @return Thread|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection|static[]
	 */
	public function getThreads( Channel $channel, ThreadFilters $filter ) {
		$threads = Thread::latest()->filter( $filter );

		if ( $channel->exists ) {
			$threads->where( 'channel_id', $channel->id );
		}
		return $threads->get();
	}
}
