<?php

namespace Tests\Feature;

use App\Activity;
use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_may_not_create_threads()
    {
        $this->withExceptionHandling();

        $this->get('/thread/create')
            ->assertRedirect(route('login'));

        $this->post(route('threads'))
            ->assertRedirect(route('login'));
    }

    /** @test */
    function a_new_user_must_first_confirm_their_email_address_before_creating_threads()
    {
        $user = factory(User::class)->states('unconfirmed')->create();
        $this->signIn($user);
        $thread = make(Thread::class);
        $this->json('post',route('threads'), $thread->toArray())
            ->assertRedirect(route('threads'))
            ->assertSessionHas('flash');
    }

    /** @test */
    function a_user_can_create_new_forum_threads()
    {
        $this->signIn();
        $thread = make(Thread::class);
        $response = $this->post(route('threads'), $thread->toArray());
        $this->get($response->headers->get('Location'))
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }

    /** @test */
    function a_thread_requires_a_title()
    {
        $this->publishThread(['title' => null])
            ->assertStatus(422);
    }

    /** @test */
    function a_thread_requires_a_body()
    {
        $this->publishThread(['body' => null])
            ->assertStatus(422);
    }

    /** @test */
    function a_thread_requires_a_valid_channel()
    {
        factory('App\Channel', 2)->create();
        $this->publishThread(['channel_id' => null])
            ->assertStatus(422);
        $this->publishThread(['channel_id' => 999])
            ->assertStatus(422);
    }

    /** @test */
    function unauthorized_users_may_not_delete_threads()
    {
        $this->withExceptionHandling();
        $thread = create(\App\Thread::class);
        $this->delete($thread->path())->assertRedirect(route('login'));
        $this->signIn();
        $this->delete($thread->path())->assertStatus(403);
    }

    /** @test */
    function authorized_users_can_delete_threads()
    {
        $this->signIn();
        $thread = create(\App\Thread::class, ['user_id' => auth()->id()]);
        $reply = create('App\Reply', ['thread_id' => $thread->id]);
        $response = $this->json('DELETE', $thread->path());
        $response->assertStatus(204);
        $this->assertDatabaseMissing('threads', ['id' => $thread->id]);
        $this->assertDatabaseMissing('replies', ['id' => $reply->id]);
        $this->assertEquals(0, Activity::count());
    }

    protected function publishThread($overrides = [])
    {
        $this->withExceptionHandling()->signIn();
        $thread = make(\App\Thread::class, $overrides);
        return $this->json('post',route('threads'), $thread->toArray());
    }

    /** @test */
    function a_thread_requires_a_unique_slug()
    {
        $this->signIn();
        create(Thread::class,[],2);
        /** @var Thread $thread */
        $thread = create(Thread::class,['title' => 'thistitle']);
        $this->assertEquals($thread->fresh()->slug,'thistitle');
        $thread = $this->postJson(route('threads'),$thread->toArray())->json();
        $this->assertEquals("thistitle-{$thread['id']}", $thread['slug']);
    }

    /** @test */
    function a_thread_with_a_title_that_ends_in_a_number_should_generate_the_proper_slug()
    {
        $this->signIn();
        /** @var Thread $thread */
        $thread = create(Thread::class,['title' => 'Some title 24']);
        $thread = $this->postJson(route('threads'),$thread->toArray())->json();
        $this->assertTrue(Thread::whereSlug('some-title-24-'.$thread['id'])->exists());
    }
}
