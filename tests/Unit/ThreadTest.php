<?php

namespace Tests\Unit;

use function create;
use Forum\Thread;
use Forum\User;
use Forum\Channel;
use Illuminate\Database\Eloquent\Collection;
use Tests\TestCase;

class ThreadTest extends TestCase
{
	protected $thread;

	public function setUp()
	{
		parent::setUp();
		$this->thread = create( Thread::class );
	}

	/** @test */
	function a_thread_has_a_creator()
	{
		$this->assertInstanceOf( User::class, $this->thread->creator);
	}

	/** @test */
	function a_thread_has_replies()
    {
    	$this->assertInstanceOf( Collection::class, $this->thread->replies);
    }
    /** @test */
    function a_thread_belongs_to_a_channel()
    {
    	$thread = create( Thread::class);

    	$this->assertInstanceOf( Channel::class, $thread->channel);
    }
    /** @test */
    public function a_thread_can_add_a_reply()
    {
    	$this->thread->addReply([
    		'body' => 'Foobar',
		    'user_id' => 1
	    ]);

    	$this->assertCount( 1, $this->thread->replies);
    }

    /** @test */
    function a_thread_can_make_a_string_path()
    {
    	$thread = create(Thread::class);
    	$this->assertEquals( "/threads/{$thread->channel->slug}/{$thread->id}", $thread->path());
    }

    /** @test */
    function a_thread_can_be_subscribed_to()
    {
        $thread = create(Thread::class);
        $userId = 1;
        $thread->subscribe($userId);
        $this->assertEquals(1,$thread->subscriptions()->whereUserId($userId)->count());
    }

    /** @test */
    function a_thread_can_be_sunsubscribed_from()
    {
        $thread = create(Thread::class);
        $userId = 1;
        $thread->subscribe($userId);
        $thread->unsubscribe($userId);
        $this->assertCount(0,$thread->subscriptions);
    }
}
