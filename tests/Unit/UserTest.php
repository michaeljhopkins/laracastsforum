<?php

namespace Tests\Unit;

use App\Reply;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    function a_user_can_fetch_their_most_recent_reply()
    {
        $user = create(User::class);
        $reply = create(Reply::class,['user_id' => $user->id]);
        $this->assertEquals($user->lastReply->id, $reply->id);
    }
}
