<?php

namespace Tests\Feature;

use Forum\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class SubscribeToThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function a_user_can_subscribe_to_threads()
    {
        $this->signIn();
        $thread = create(Thread::class);
        $this->post($thread->path().'/subscriptions');
        $thread->addReply([
            'user_id' => auth()->id(),
            'body' => 'some reply'
        ]);
        #$this->assertCount(1,$thread->subscriptions);

        #$this->assertCount(1,auth()->user()->notificatoins);
    }
}
