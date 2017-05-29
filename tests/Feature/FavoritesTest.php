<?php

namespace Tests\Feature;

use Forum\Favorite;
use Forum\Reply;
use Tests\TestCase;

class FavoritesTest extends TestCase
{
	/** @test */
	function guests_can_not_favorite_anything()
	{
		$this->withExceptionHandling()->post("/replies/1/favorites")
			->assertRedirect('/login');
	}

	/** @test */
	function an_authenticated_user_can_favorite_any_reply()
	{
		$this->signIn();
		$reply = create(Reply::class);
		$this->post("/replies/$reply->id/favorites");
		$this->assertCount( 1, $reply->favorites);
	}

	/** @test */
	function an_authenticated_user_may_only_favorite_a_reply_once()
	{
		$this->signIn();
		$reply = create(Reply::class);
		$this->post("/replies/$reply->id/favorites");
		$this->post("/replies/$reply->id/favorites");
		$this->assertCount( 1, $reply->favorites);
	}
}
