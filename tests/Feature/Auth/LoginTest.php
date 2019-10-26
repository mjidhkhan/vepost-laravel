<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    // Login Routes for utility purposes

    // home route after successfull login
    protected function successfulLoginRoute()
    {
        return route('home');
    }

    // login route using get
    protected function loginGetRoute()
    {
        return route('login');
    }

    // login route using post
    protected function loginPostRoute()
    {
        return route('login');
    }

    // logout route

    protected function logoutRoute()
    {
        return route('logout');
    }

    // successfull logout  route
    protected function successfulLogoutRoute()
    {
        return ('/');
    }

    // guest middleware Route
    protected function guestMiddlewareRoute()
    {
        return route('home');
    }

    // check too many login attempts route
    protected function getTooManyLoginAttemptsMessage()
    {
        return sprintf('/^%s$/', str_replace('\:seconds', '\d+', preg_quote(__('auth.throttle'), '/')));
    }



    /** @test */
    public function user_can_view_a_login_form()
    {
        $response = $this->get($this->loginGetRoute());

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /** @test */
    public function user_cannot_view_a_login_form_when_authenticated()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get($this->loginGetRoute());
        $response->assertRedirect($this->guestMiddlewareRoute());
    }

    /** @test */
    public function user_can_login_with_correct_credentials()
    {
        $user = factory(User::class)->create([
            'password'=>bcrypt($password = 'i-love-laravel'),
        ]);

        $response = $this->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password'=>$password,
        ]);
        $response->assertRedirect($this->successfulLoginRoute());
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function user_cannot_login_with_incorrect_password()
    {
        // create user in database with password X.
        // where X = 'i-love-laravel'
        $x = 'i-love-laravel';
        $user = factory(User::class)->create([
            'password' => bcrypt($x),
        ]);

        // Try login with different password Y
        // where Y= 'different-password'
        $y = 'different-password';
        $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password' => $y,
        ]);

        // What we checking here
        // 1-   Should redirect back to login page
        // 2-   An error in the session
        // 3-   Email field has old input
        // 4-   Password field does not have old input.
        // 5-   User is still guest

        $response->assertRedirect($this->loginGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /** @test */
    public function remember_me_functionality()
    {
        // Created User
        $user = factory(User::class)->create([
            'id'=>random_int(1, 100),
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);

        // Make Request to login with remember me on.

        $response = $this->post($this->loginPostRoute(), [
            'email' => $user->email,
            'password'=> $password,
            'remember'=> 'on',
        ]);

        $user = $user->fresh();

        $response->assertRedirect($this->successfulLoginRoute());

        // To assert against a cookie, we need to know what is its name and what values
        // does it hold. Name of the cookie is available through the Auth facade.
        // Just call Auth::guard()->getrecallerName().
        $value = vsprintf(
            '%s|%s|%s',
            [
            $user->id,
            $user->getRememberToken(),
            $user->password,
        ]
        );
        $response->assertCookie(Auth::guard()->getRecallerName(), $value);
        $this->assertAuthenticatedAs($user);
    }


    /** @test */
    public function user_can_not_login_with_email_that_does_not_exist()
    {
        $response = $this->from($this->loginGetRoute())
            ->post(
                $this->loginPostRoute(),
                [
                'email'=>'nobody@example.com',
                'password' => 'invalid-password',
            ]
            );

        $response->assertRedirect($this->loginGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }



    /** @test */
    public function user_can_logout_properly()
    {
        $this->withoutExceptionHandling();
        $this->be(factory(User::class)->create());

        $response = $this->post($this->logoutRoute());
        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }

    /** @test */
    public function user_can_not_logout_when_not_authenticated()
    {
        $response = $this->post($this->logoutRoute());
        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }
    /** @test */
    public function user_can_not_make_more_then_five_attempts_in_one_minute()
    {
       //$this->withoutExceptionHandling();
        $user = factory(User::class)->create([
            'password' => Hash::make($password = 'i-love-laravel'),
        ]);
        foreach (range(0, 5) as $_) {
            $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
                'email' => $user->email,
                'password' => 'invalid-password',
            ]);
        }
        $response->assertRedirect($this->loginGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertRegExp(
            $this->getTooManyLoginAttemptsMessage(),
            collect(
                $response
                ->baseResponse
                ->getSession()
                ->get('errors')
                ->getBag('default')
                ->get('email')
            )->first()
        );
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();


            //https://github.com/DCzajkowski/auth-tests/blob/master/src/Console/stubs/tests/Feature/Auth/LoginTest.php
    }
}
