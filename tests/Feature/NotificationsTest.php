<?php

namespace Tests\Feature;

use App\Thread;
use App\User;
use Illuminate\Notifications\DatabaseNotification;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class NotificationsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->signIn();
    }

    /** @test */
    function a_notification_is_prepared_when_a_subscribed_thread_receives_a_new_reply()
    {
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
        create(DatabaseNotification::class);
        tap(auth()->user(), function($user){
            $this->assertCount(1, $user->unreadNotifications);
            $this->delete("/profiles/".$user->name."/notifications/".$user->unreadNotifications->first()->id);
            $this->assertCount(0, $user->fresh()->unreadNotifications);
        });
    }

    /** @test */
    function a_user_can_fetch_their_unread_notifications()
    {
        create(DatabaseNotification::class);
        $this->assertCount(
            1,
            $this->getJson("/profiles/".auth()->user()->name."/notifications")->json()
        );
    }
}
