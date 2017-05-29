<?php

namespace Tests\Unit;

use Forum\Reply;
use Forum\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReplyTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	function it_has_an_owner()
    {
    	$reply =  factory(Reply::class)->create();

    	$this->assertInstanceOf( User::class, $reply->owner);
    }
}
