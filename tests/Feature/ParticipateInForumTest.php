<?php

namespace Tests\Feature;

use Forum\Reply;
use Forum\Thread;
use Forum\User;
use Illuminate\Auth\AuthenticationException;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
	/** @test */
	function unauthenticated_users_may_not_participate_in_forum_threads()
	{
		$this->withExceptionHandling()
		     ->post('threads/some-channel/1/replies',[])
		     ->assertRedirect('/login');
	}

    /** @test */
    function an_authenticated_user_may_participate_in_forum_threads()
    {
	    $this->signIn();
	    $thread = create( Thread::class );
	    $reply  = make( Reply::class );
    	$this->post($thread->path().'/replies',$reply->toArray());
    	$this->get($thread->path())
		    ->assertSee( $reply->body);
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


}
