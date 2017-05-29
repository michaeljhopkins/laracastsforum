<?php

namespace Tests\Unit;

use Forum\Reply;
use Forum\User;
use Tests\TestCase;

class ReplyTest extends TestCase
{
	/** @test */
	function it_has_an_owner()
    {
	    $reply = create( Reply::class );

    	$this->assertInstanceOf( User::class, $reply->owner);
    }
}
