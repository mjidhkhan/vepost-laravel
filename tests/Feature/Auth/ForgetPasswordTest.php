<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
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

        //When
        $response = $this->actingAs($user)->get($this->passwordRequestRoute());

        //Then
        $response->assertRedirect($this->guestMiddlewareRoute());

    }
    
    

}
