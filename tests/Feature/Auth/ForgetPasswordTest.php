<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ForgetPasswordTest extends TestCase
{
    use RefreshDatabase;

    //Helper functions
    protected function passwordRequestRoute()
    {
        return route('password.request');
    }

    protected function passwordEmailGetRoute()
    {
        return route('password.email');
    }

    protected function passwordEmailPostRoute()
    {
        return route('password.email');
    }

    protected function guestMiddlewareRoute()
    {
        return route('home');
    }

    // Tests

    /** @test */
    public function user_can_view_email_password_form()
    {
        //Given

        //When
        $response = $this->get($this->passwordRequestRoute());

        //Then
        $response->assertSuccessful();
        $response->assertViewIs('auth.passwords.email');
    }

    /** @test */
    public function user_can_not_view_an_email_password_form_when_authenticated()
    {
        $this->withoutExceptionHandling();

        //Given
        $user = factory(User::class)->make();
        //dd($user);
        //When
        $response = $this->actingAs($user)->get($this->passwordRequestRoute());
       // dd($response->error());
        //Then
        $response->assertRedirect($this->guestMiddlewareRoute());


    }

    /** @test */
    public function user_receives_an_email_with_a_password_reset_link()
    {
        //Given
        Notification::fake();
        $user = factory(User::class)->create([
            'email' => 'john@example.com',
        ]);
        //When
        $this->post($this->passwordEmailPostRoute(),[
            'email' => 'john@example.com',
        ]);

        //Then
        $this->assertNotNull($token = DB::table('password_resets')->first());
        Notification::assertSentTo($user, ResetPassword::class, function($notification, $channel)use ($token){
            return Hash::check($notification->token, $token->token) === true;
        });
    }

    /** @test */
    public function user_does_not_receive_email_when_not_registered()
    {
        Notification::fake();
        //Given : User trying to reset password as he is not registered

        //When
        $response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(),[
            'email' => 'nobody@example.com',
        ]);

        //Then
        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
        Notification::assertNotSentTo(factory(User::class)->make([
            'email' => 'nobody@example.com'
        ]), ResetPassword::class);
    }

    /** @test */
    public function email_is_required()
    {
        //Given

        //When
        $response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(), []);

        //Then
        $response->assertRedirect($this->passwordEmailGetRoute());
        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function email_is_a_valid_email()
    {
        //Given

        //Then
        $response = $this->from($this->passwordEmailGetRoute())->post($this->passwordEmailPostRoute(),[
            'email' => 'invalid-email',
        ]);

        $response->assertRedirect(($this->passwordEmailGetRoute()));
        $response->assertSessionHasErrors('email');
    }

}
