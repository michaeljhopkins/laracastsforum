<?php

namespace Tests\Feature;

use App\Mail\PleaseConfirmYourEmail;
use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RegistrationTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    function a_confirmation_email_is_sent_upon_registration()
    {
        Mail::fake();
        $this->post('/register',[
            'name' => 'new name',
            'email' => 'email@email.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);
        Mail::assertSent(PleaseConfirmYourEmail::class);
    }

    /** @test */
    function users_can_fully_confirm_their_email_address()
    {
        Mail::fake();
        $this->post(route('register'),[
            'name' => 'new name',
            'email' => 'email@email.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);
        $user = User::whereName('new name')->first();
        $this->assertFalse($user->confirmed);
        $this->assertNotNull($user->token);
        $this->get(route('register.confirm',['token' =>$user->token]))
            ->assertRedirect(route('threads'));
        $this->assertNull($user->fresh()->token);
    }

    /** @test */
    function confirming_an_invalid_token()
    {
        $this->get(route('register.confirm',['token' => 'invalid']))
            ->assertRedirect(route('threads'));
    }
}
