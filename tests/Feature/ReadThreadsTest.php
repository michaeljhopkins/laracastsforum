<?php

namespace Tests\Feature;

use function create;
use Forum\Channel;
use Forum\Reply;
use Forum\Thread;
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
}