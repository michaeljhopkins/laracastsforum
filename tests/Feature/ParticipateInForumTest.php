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
    function an_authenticated_user_may_participate_in_forum_threads()
    {
	    $this->signIn( $user = create( User::class ) );
	    $thread = create( Thread::class );
	    $reply  = make( Reply::class );
    	$this->post($thread->path().'/replies',$reply->toArray());
    	$this->get($thread->path())
		    ->assertSee( $reply->body);
    }

	/** @test */
	function unauthenticated_users_may_not_participate_in_forum_threads()
	{
		$this->expectException(AuthenticationException::class);
		$this->post('threads/1/replies',[]);
	}


}
