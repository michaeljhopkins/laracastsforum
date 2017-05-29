<?php

namespace Tests\Feature;

use Forum\Thread;
use Illuminate\Auth\AuthenticationException;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{

	/** @test */
	function an_authenticated_user_can_create_forum_threads()
	{
		$this->signIn();
		$thread = create( Thread::class );
		$this->post( '/threads',$thread->toArray());
		$this->get( $thread->path())
		     ->assertSee( $thread->title )
		     ->assertSee( $thread->body );
	}

	/** @test */
	function guests_may_not_create_threads() {
		$this->withExceptionHandling();

		$this->post( 'threads')
		     ->assertRedirect('/login');
		$this->get( 'threads/create')
		     ->assertRedirect('/login');
	}
}
