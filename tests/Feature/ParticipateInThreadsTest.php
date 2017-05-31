<?php

namespace Tests\Feature;
use Forum\Reply;
use Tests\TestCase;
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
}