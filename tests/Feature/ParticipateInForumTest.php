<?php

namespace Tests\Feature;

use Forum\Reply;
use Forum\User;
use Illuminate\Auth\AuthenticationException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Forum\Thread;

class ParticipateInForumTest extends TestCase
{
	use DatabaseMigrations;
    /** @test */
    function an_authenticated_user_may_participate_in_forum_threads()
    {
    	$this->signIn($user = factory(User::class)->create());
    	$thread = factory(Thread::class)->create();
    	$reply = factory(Reply::class)->make();
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
