<?php

namespace Tests\Feature;
use Forum\Reply;
use Tests\TestCase;
use Forum\Thread;

class ParticipateInThreadsTest extends TestCase
{
	/** @test */
	function authorized_users_can_delete_replies()
	{
		$this->signIn();
		$reply = create(Reply::class, ['user_id' => auth()->id()]);
		$this->delete("/replies/{$reply->id}")->assertStatus(302);
		$this->assertDatabaseMissing('replies', ['id' => $reply->id]);
		$this->assertEquals(0,$reply->thread->fresh()->replies_count);
	}



	/** @test */
	function a_reply_requires_a_body()
	{
		$this->withExceptionHandling()->signIn();
		$thread = create( Thread::class );
		$reply  = make( Reply::class ,['body' => null]);
		$this->post( $thread->path().'/replies',$reply->toArray())
		     ->assertSessionHasErrors('body');
	}

	/** @test */
	function unauthed_users_cannot_delete_replies()
	{
		$this->withExceptionHandling();
		$reply = create(Reply::class);
		$this->delete("/replies/{$reply->id}")
			->assertRedirect('/login');
	}

	/** @test */
	function authed_users_can_delete_their_own_replies()
	{
		$this->signIn();
		$reply = create(Reply::class,['user_id' => auth()->id()]);
		$this->delete("/replies/{$reply->id}");
		$this->assertDatabaseMissing( 'replies', ['id' => $reply->id]);
	}

	/** @test */
	function authed_users_can_edit_their_replies()
	{
		$this->signIn();
		$reply = create(Reply::class,['user_id' => auth()->id()]);
		$this->patch( "/replies/{$reply->id}",['body' => 'updated']);
		$this->assertDatabaseHas( 'replies', ['id' => $reply->id,'body' => 'updated']);
	}
	/** @test */
	function unauthed_users_cannot_edit_replies()
	{
		$this->withExceptionHandling();
		$reply = create(Reply::class);
		$this->patch("/replies/{$reply->id}")
		     ->assertRedirect('/login');

		$this->signIn()
			->patch("/replies/{$reply->id}")
			->assertStatus(403);
	}
}