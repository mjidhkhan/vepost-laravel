<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;


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

    protected function validVerificationVerifyRoute($user)
    {
        return URL::signedRoute($this->verificationVerifyRouteName, [
            'id' => $user->id,
            'hash' => sha1($user->getEmailForVerification()),
        ]);
    }

    protected function invalidVerificationVerifyRoute($user)
    {
        return route($this->verificationVerifyRouteName, [
            'id' => $user->id,
            'hash' => 'invalid-hash',
        ]);
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
        //$this->withoutExceptionHandling();
        //Given

        //When
        $response = $this->get($this->verificationNoticeRoute());
        $response->assertRedirect($this->loginRoute());

        //Then
    }

    /** @test */
    public function user_sees_the_verification_notice_when_not_verified()
    {
        //Given
        $user= factory(User::class)->create(array_merge($this->data()));

        //When
        $response = $this->actingAs($user)->get($this->verificationNoticeRoute());

        //Then
        $response->assertStatus(200);
        $response->assertViewIs('auth.verify');
    }

    /** @test */
    public function verified_user_is_redirected_home_when_visitin_verification_notice_route()
    {
        //Given
        $user = factory(User::class)->create(array_merge($this->data(), ['email_verified_at'=> now()]));

        //When
        $response= $this->actingAs($user)->get($this->verificationNoticeRoute());

        //Then
        $response->assertRedirect($this->successfulVerificationRoute());
    }

    /** @test */
    public function guest_cannot_see_the_verification_verify_route()
    {
        // $this->withoutExceptionHandling();
        //Given
        $user = factory(User::class)->create(array_merge($this->data()));

        //When
        $response = $this->get($this->validVerificationVerifyRoute($user));

        //Then
        $response->assertRedirect($this->loginRoute());
        $response->assertStatus(302);
    }
    
    /** @test */
    public function user_canot_verify_others()
    {
        // $this->withoutExceptionHandling();
        //Given
        $user = factory(User::class)->create(array_merge($this->data(), ['id'=> 1]));
        $user2 = factory(User::class)->create(array_merge($this->data(), ['id'=>2]));

        //When
        $response = $this->actingAs($user)->get($this->validVerificationVerifyRoute($user2));

        //Then
        $response->assertForbidden();
        $this->assertFalse($user2->fresh()->hasVerifiedEmail());
    }
    
    /** @test */
    public function user_is_redirected_to_correct_route_when_already_verified()
    {
        //Given
        $user = factory(User::class)->create(array_merge($this->data(), ['email_verified_at'=> now()]));

        //When
        $response = $this->actingAs($user)->get($this->validVerificationVerifyRoute($user));

        //Then
        $response->assertRedirect($this->successfulVerificationRoute());

    }

    /** @test */
    public function forbidden_is_return_when_signature_isInvalid_in_verification_verify_route()
    {
        //Given
        $user = factory(User::class)->create(array_merge($this->data(), ['email_verified_at'=> now()]));

        //When
        $response = $this->actingAs($user)->get($this->invalidVerificationVerifyRoute($user));

        //Then
        $response->assertForbidden(403);
    }

    /** @test */
    public function user_can_verify_himself()
    {
        //Given
        $user = factory(User::class)->create($this->data());

        //When
        $response = $this->actingAs($user)->get($this->validVerificationVerifyRoute($user));

        //Then
        $response->assertRedirect($this->successfulVerificationRoute());
        $this->assertNotNull($user->fresh()->email_verified_at);
    }

    /** @test */
    public function guest_cannot_resed_a_verification_email()
    {
        //Given

        //When
        $response = $this->post($this->verificationResendRoute());

        //Then
        $response->assertRedirect($this->loginRoute());
    }

    /** @test */
    public function user_is_redirected_to_correct_route_if_already_verified()
    {
        //Given
        $user = factory(User::class)->create(array_merge($this->data(), ['email_verified_at'=>now()]));

        //When
        $response = $this->actingAs($user)->post($this->verificationResendRoute());

        //Then
        $response->assertRedirect($this->successfulVerificationRoute());
    }

    /** @test */
    public function user_can_resend_a_verification_email()
    {
         $this->withoutExceptionHandling();
        //Given
        Notification::fake();
        $user = factory(User::class)->create([
            'email_verified_at' => null,
        ]);

        //When
        $response = $this->actingAs($user)
                    ->from($this->verificationNoticeRoute())
                    ->post($this->verificationResendRoute());

        //Then
        Notification::assertSentTo($user, VerifyEmail::class);
        $response->assertRedirect($this->verificationNoticeRoute());
    }
    
    
    
    


    
    
    
    private function data()
    {
        return [
            'id' => 1,
            'email_verified_at' => null,
        ];
    }
    
}
