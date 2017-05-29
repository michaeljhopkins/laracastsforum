<?php

namespace Tests\Unit;

use function create;
use Forum\Channel;
use Forum\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChannelTest extends TestCase
{
	/** @test */
	function a_channel_consists_of_threads()
	{
		$channel = create( Channel::class);
		$thread = create(Thread::class,['channel_id' => $channel->id]);

		$this->assertTrue($channel->threads->contains($thread));
	}
}
