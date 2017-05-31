<?php

namespace Tests\Feature;

use function create;
use Forum\Channel;
use Forum\Reply;
use Forum\Thread;
use Forum\User;
use Tests\TestCase;

class ReadThreadsTest extends TestCase
{
	/** @var Thread $thread */
	protected $thread;

	public function setUp()
	{
		parent::setUp();
		$this->thread = create( Thread::class );
	}

	/** @test */
	function a_user_can_browse_threads()
	{
		$this->get('/threads')
		     ->assertSee($this->thread->title);
	}

	/** @test */
	function a_user_can_view_a_specific_thread()
	{
		$this->get($this->thread->path())
		     ->assertSee( $this->thread->title);
	}

	/** @test */
	function a_user_can_read_replies_associated_with_a_thread()
	{
		$reply = create( Reply::class, [ 'thread_id' => $this->thread->id ] );
		$this->get($this->thread->path())
			->assertSee( $reply->body);
	}

	/** @test */
	function a_user_can_filter_threads_according_to_a_tag()
	{
		$channel = create(Channel::class);
		$threadInChannel = create( Thread::class,['channel_id' => $channel->id]);
		$threadNotInChannel = create( Thread::class);
		$this->get( '/threads/'.$channel->slug)
			->assertSee( $threadInChannel->title)
			->assertDontSee( $threadNotInChannel->title);
	}

	/** @test */
	function a_user_can_filter_threads_by_any_username()
	{
		$this->signIn(create(User::class,['name' => 'JohnDoe']));
		$threadByJohn = create(Thread::class,['user_id' => auth()->id()]);
		$threadByNotJohn = create(Thread::class);
		$this->get( 'threads?by=JohnDoe')
			->assertSee( $threadByJohn->title)
			->assertDontSee( $threadByNotJohn->title);
	}

	/** @test */
	function a_user_can_filter_threads_by_popularity()
	{
		$threadWith2Replies = create(Thread::class);
		create(Reply::class,['thread_id' => $threadWith2Replies->id],2);
		$threadWith3Replies = create(Thread::class);
		create(Reply::class,['thread_id' => $threadWith3Replies->id],3);
		$response = $this->getJson('threads?popularity=1')->json();
		$this->assertEquals([3,2,0],array_column($response,'replies_count'));
	}

	/** @test */
	function a_user_can_filter_threads_by_those_that_are_unanswered()
	{
		$thread = create(Thread::class);
		create(Reply::class,['thread_id' => $thread->id]);
		$response = $this->getJson('threads?unanswered=1')->json();
		$this->assertCount(1,$response);
	}
}