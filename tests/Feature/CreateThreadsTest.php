<?php

namespace Tests\Feature;

use function create;
use Forum\Channel;
use Forum\Reply;
use Forum\Thread;
use function make;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
	/** @test */
	function guests_may_not_create_threads() {
		$this->withExceptionHandling();
		$this->post( '/threads')
		     ->assertRedirect('/login');
		$this->get( 'threads/create')
		     ->assertRedirect('/login');
	}

	/** @test */
	function an_authenticated_user_can_create_forum_threads()
	{
		$this->signIn();
		$thread = make( Thread::class );
		$response = $this->post( '/threads',$thread->toArray());
		$this->get($response->headers->get('Location'))
		     ->assertSee( $thread->title )
		     ->assertSee( $thread->body );
	}

	/** @test */
	function a_thread_requires_a_title()
	{
		$this->publishThread(['title' => null])
			->assertSessionHasErrors('title');
	}
	/** @test */
	function a_thread_requires_a_body()
	{
		$this->publishThread(['body' => null])
		     ->assertSessionHasErrors('body');
	}
	/** @test */
	function a_thread_requires_a_valid_channel()
	{
		factory(Channel::class,2)->create();
		$this->publishThread(['channel_id' => null])
		     ->assertSessionHasErrors('channel_id');
		$this->publishThread(['channel_id' => 999])
		     ->assertSessionHasErrors('channel_id');
	}

	private function publishThread( $array ) {
		$this->withExceptionHandling()->signIn();
		$thread = make( Thread::class,$array);
		return $this->post( '/threads',$thread->toArray());
	}

	/** @test */
	function unauthorized_users_cannot_delete_threads()
	{
		$this->withExceptionHandling();
		$thread = create(Thread::class);
		$this->delete($thread->path())->assertRedirect('/login');
		$this->signIn();
		$this->delete( $thread->path())->assertStatus(403);
	}

	/** @test */
	function authorized_users_can_delete_their_own_threads()
	{
		$this->signIn();
		$thread = create(Thread::class,['user_id' => auth()->id()]);
		$reply = create(Reply::class,['thread_id'=>$thread->id]);
		$response = $this->json( 'DELETE', $thread->path());
		$response->assertStatus(204);
		$this->assertDatabaseMissing('threads',['id'=>$thread->id]);
		$this->assertDatabaseMissing('replies',['id'=>$reply->id]);
	}
}
