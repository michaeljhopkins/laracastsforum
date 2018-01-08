<?php

namespace Tests\Feature;

use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class LockThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function once_locked_a_thread_may_not_receive_new_replies()
    {
        $this->signIn();

        $thread = create(Thread::class);

        $thread->lock();

        $this->post($thread->path().'/replies', [
            'body' => 'Foobar',
            'user_id' => auth()->id(),
        ])->assertStatus(422);
    }

    /** @test */
    function non_admins_cant_locke_threads()
    {
        $this->signIn();

        $thread = create(Thread::class,['user_id' => auth()->id()]);

        $this->post(route('locked-threads.store',$thread),[
            'locked' => true
        ])->assertStatus(403);

        $this->assertFalse(!! $thread->fresh()->locked);
    }

    /** @test */
    function admins_can_lock_threads()
    {
        $this->signIn(factory(User::class)->states('admin')->create());

        $thread = create(Thread::class,['user_id' => auth()->id()]);

        $this->post(route('locked-threads.store',$thread),[
            'locked' => true
        ]);
        $this->assertTrue(!! $thread->fresh()->locked);
    }
}