<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;

    protected function getValidToken($user)
    {
        return Password::broker()->createToken($user);
    }

    protected function getInvalidToken()
    {
        return 'invalid-token';
    }

    protected function passwordResetGetRoute($token)
    {
        return route('password.reset', $token);
    }

    protected function passwordResetPostRoute()
    {
        return '/password/reset';
    }

    protected function successfulPasswordResetRoute()
    {
        return route('home');
    }

    protected function guestMiddlewareRoute()
    {
        return route('home');
    }

    /** @test */
    public function user_can_view_a_password_reset_form()
    {
        // Given 
        //User can view a password reset form.

        //When
        $user = factory(User::class)->create();

        $response = $this->get($this->passwordResetGetRoute($token = $this->getValidToken($user)));
        
        //Then
        $response->assertSuccessful();
        $response->assertViewIs('auth.passwords.reset');
        $response->assertViewHas('token', $token);
    }

    /** @test */
    public function user_can_not_view_a_password_reset_form_when_athenticated()
    {
        //Given
        // User cannot view a password reset form when athenticated.

       $user = factory(User::class)->create();

        //When
        $response = $this->actingAs($user)->get($this->passwordResetGetRoute($this->getValidToken($user)));

        //Then
        $response->assertRedirect($this->guestMiddlewareRoute());
    }

    /** @test */
    public function user_can_reset_password_with_valid_token()
    {
        $this->withoutExceptionHandling();
        //Given
            // User can reset password with valid token.
        Event::fake();
        $user = factory(User::class)->create();

        //When
        $response = $this->post($this->passwordResetPostRoute(),[
            'token' => $this->getValidToken($user),
            'email' => $user->email,
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

        //Then
        $response->assertRedirect($this->successfulPasswordResetRoute());
        $this->assertEquals($user->email, $user->fresh()->email);
        $this->assertTrue(Hash::check('new-password', $user->fresh()->password));
        $this->assertAuthenticatedAs($user);
        Event::assertDispatched(PasswordReset::class, function ($e) use ($user) {
            return $e->user->id === $user->id;
        });


    }
    

}
