<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
        use RefreshDatabase;

    protected $verificationVerifyRouteName = 'verification.verify';

    protected function successfulVerificationRoute()
    {
        return route('home');
    }

    protected function verificationNoticeRoute()
    {
        return route('verification.notice');
    }

    protected function validVerificationVerifyRoute($id)
    {
        return URL::signedRoute($this->verificationVerifyRouteName, ['id' => $id]);
    }

    protected function invalidVerificationRouteName($id)
    {
        return route($this->verificationVerifyRouteName, ['id' => $id]). '?signature=invalid-signature';
    }

    protected function verificationResendRoute()
    {
        return route('verification.resend');
    }

    protected function loginRoute()
    {
        return route('login');
    }

    /** @test */
    public function guest_cannot_see_the_verification_notice()
    {
        //Given

        //When
        $response = $this->get($this->verificationNoticeRoute());
        $response->assertRedirect($this->loginRoute());

        //Then
    }
}
