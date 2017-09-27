<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Storage;

class AddAvatarTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    function only_members_can_add_avatars()
    {
        $this->withExceptionHandling();
        $this->json('POST','api/users/1/avatar')
            ->assertStatus(401);
    }

    /** @test */
    function a_valid_avatar_must_be_provided()
    {
        $this->withExceptionHandling()->signIn();
        $this->json('POST','api/users/'.auth()->id().'/avatar', [
            'avatar' => 'not-an-image'
        ])->assertStatus(422);
    }

    /** @test */
    function a_user_may_add_an_avatar_to_their_profile()
    {
        $this->signIn();
        Storage::fake('public');
        $file = UploadedFile::fake()->image('avatar.jpg');
        $this->json('POST','api/users/'.auth()->id().'/avatar', [
            'avatar' => $file
        ]);
        $this->assertEquals(asset('avatars/'.$file->hashName()),auth()->user()->fresh()->avatar_path);
        Storage::disk('public')->assertExists('avatars/'.$file->hashName());
    }
}
