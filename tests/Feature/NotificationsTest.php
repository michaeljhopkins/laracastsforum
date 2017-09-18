<?php

namespace Tests\Feature;

use App\Thread;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class NotificationsTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    function a_notification_is_prepared_when_a_subscribed_thread_receives_a_new_reply()
    {
        $this->signIn();
        /** @var Thread $thread */
        $thread = create(Thread::class)->subscribe();
        $this->assertCount(0, auth()->user()->notifications);
        $thread->addReply([
            'user_id' => auth()->id(),
            'body' => 'Some reply here'
        ]);
        $this->assertCount(0, auth()->user()->fresh()->notifications);
        $thread->addReply([
            'user_id' => create(User::class)->id,
            'body' => 'Some reply here'
        ]);
        $this->assertCount(1, auth()->user()->fresh()->notifications);
    }

    /** @test */
    function a_user_can_mark_a_notification_as_read()
    {
        $this->signIn();
        /** @var Thread $thread */
        $thread = create(Thread::class)->subscribe();
        $thread->addReply([
            'user_id' => create(User::class)->id,
            'body' => 'Some reply here'
        ]);
        /** @var User $user */
        $user = auth()->user();
        $this->assertCount(1, $user->unreadNotifications);
        $notification = $user->unreadNotifications->first();
        $this->delete("/profiles/".$user->name."/notifications/$notification->id");
        $this->assertCount(0, $user->fresh()->unreadNotifications);
    }

    /** @test */
    function a_user_can_fetch_their_unread_notifications()
    {
        $this->signIn();
        /** @var Thread $thread */
        $thread = create(Thread::class)->subscribe();
        $thread->addReply([
            'user_id' => create(User::class)->id,
            'body' => 'Some reply here'
        ]);
        /** @var User $user */
        $user = auth()->user();
        $response = $this->getJson("/profiles/".$user->name."/notifications")->json();
        $this->assertCount(1, $response);
    }
}
