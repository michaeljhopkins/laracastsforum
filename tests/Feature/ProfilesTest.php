<?php

namespace Tests\Feature;

use Forum\Thread;
use Forum\User;
use Tests\TestCase;

class ProfilesTest extends TestCase
{
	/** @test */
	function a_user_has_a_profile()
	{
		$user = create(User::class);
		$this->get("/profiles/$user->name")
			->assertSee($user->name);
	}

	/** @test */
	function a_users_profile_displays_threads_they_posted()
	{
		$user = create(User::class);
		$thread = create(Thread::class,['user_id' => $user->id]);
		$this->get("/profiles/$user->name")
		     ->assertSee($thread->title)
		     ->assertSee( $thread->body);
	}
}
