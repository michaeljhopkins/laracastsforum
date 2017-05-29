<?php

namespace Tests\Feature;

use function factory;
use Forum\Thread;
use Forum\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateThreadsTest extends TestCase
{
	use DatabaseMigrations;
	/** @test */
	function an_authenticated_user_can_create_forum_threads()
	{
		// Given we have a signed in user
		$this->actingAs( factory(User::class)->create());
		// When we hit the endpoint to create a new thread
		$thread = factory(Thread::class)->make();
		$this->post( '/threads',$thread->toArray());
		// Then, when we visit the thread page

		$this->get( $thread->path())
		     ->assertSee($thread->title);
	}
}
