<?php

namespace Tests\Feature;

use App\Mail\PleaseConfirmYourEmail;
use App\User;
use Illuminate\Auth\Events\Registered;
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
        event(new Registered(create(User::class)));
        Mail::assertSent(PleaseConfirmYourEmail::class);
    }

    /** @test */
    function users_can_fully_confirm_their_email_address()
    {
        $this->post('/register',[
            'name' => 'new name',
            'email' => 'email@email.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $user = User::whereName('new name')->first();
        $this->assertFalse($user->confirmed);
        $this->assertNotNull($user->token);
        $response = $this->get('/register/confirm?token='.$user->token);
        $this->assertTrue($user->fresh()->confirmed);
        $response->assertRedirect('/threads');
    }
}
