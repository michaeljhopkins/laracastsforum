<?php

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MentionUsersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function metioned_users_in_reply_are_notified()
    {
        $john = create(User::class,['name' => 'johndoe']);
        $this->signIn($john);
        $jane = create(User::class,['name' => 'janedoe']);
        $thread = create(Thread::class);
        $reply = make(Reply::class,['body' => '@janedoe look at this']);
        $this->json('post',$thread->path().'/replies',$reply->toArray());
        $this->assertCount(1,$jane->notifications);
    }

    /** @test */
    function it_can_fetch_all_mentioned_users_starting_with_given_characters()
    {
        create(User::class,['name' => 'johndoe']);
        create(User::class,['name' => 'janedoe']);
        create(User::class,['name' => 'johndoe2']);
        $results = $this->json('GET','/api/users',['name' => 'john']);
        $this->assertCount(2, $results->json());
    }
}
