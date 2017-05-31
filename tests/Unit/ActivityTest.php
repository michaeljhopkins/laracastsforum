<?php

namespace Tests\Unit;

use Forum\Activity;
use Forum\Reply;
use Forum\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActivityTest extends TestCase
{
    /** @test */
    function it_records_activity_when_a_thread_is_created()
    {
	    $this->signIn();
    	$thread = create(Thread::class);
    	$this->assertDatabaseHas('activities', [
    		'type' => 'created_thread',
		    'user_id' => auth()->id(),
		    'subject_id' => $thread->id,
		    'subject_type' => Thread::class
	    ]);
    	$activity = Activity::first();

    	$this->assertEquals( $activity->subject->id, $thread->id);
    }

    /** @test */
    function it_records_activity_when_a_reply_is_created()
    {
	    $this->signIn();
	    $reply = create(Reply::class);
	    $this->assertEquals( 2, Activity::count());
	    $this->assertDatabaseHas('activities', [
		    'type' => 'created_reply',
		    'user_id' => auth()->id(),
		    'subject_id' => $reply->id,
		    'subject_type' => Reply::class
	    ]);
	    $activity = Activity::first();
	    $this->assertEquals( $activity->subject->id, $reply->id);
    }
}
