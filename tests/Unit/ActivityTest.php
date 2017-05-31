<?php

namespace Tests\Unit;

use Carbon\Carbon;
use function create;
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

    /** @test */
    function it_fetches_a_feed_for_any_user()
    {
    	$this->signIn();
	    create( Thread::class,['user_id' => auth()->id()],2);
    	auth()->user()->activity()->first()->update(['created_at' => Carbon::now()->subWeek()]);
    	$feed = Activity::feed(auth()->user());
    	$this->assertTrue($feed->keys()->contains(
    		Carbon::now()->format('Y-m-d')
	    ));
	    $this->assertTrue($feed->keys()->contains(
		    Carbon::now()->subWeek()->format('Y-m-d')
	    ));    }
}
