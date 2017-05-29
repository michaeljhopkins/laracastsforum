<?php

namespace Tests\Feature;

use Forum\Reply;
use Forum\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReadThreadsTest extends TestCase
{
	use DatabaseMigrations;

	/** @var Thread $thread */
	protected $thread;

	public function setUp()
	{
		parent::setUp();
		$this->thread = factory(Thread::class)->create();
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
		$reply = factory(Reply::class)->create(['thread_id' => $this->thread->id]);
		$this->get($this->thread->path())
			->assertSee( $reply->body);
	}
}