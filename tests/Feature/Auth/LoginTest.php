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
        //Given

        //When
        $response = $this->get($this->loginGetRoute());

        //Then
        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /** @test */
    public function user_cannot_view_a_login_form_when_authenticated()
    {
        $this->withoutExceptionHandling();

        //Given
        $user = factory(User::class)->make();

        //When
        $response = $this->actingAs($user)->get($this->loginGetRoute());

        //Then
        $response->assertRedirect($this->guestMiddlewareRoute());
    }

    /** @test */
    public function it_can_not_login_if_user_doesnt_exist()
    {
        //Given

        //When
        $response = $this->from($this->loginGetRoute())
                            ->post($this->loginPostRoute(),[
                                'username'=>'doesnot-exist',
                                'password'=>'wrong=password'
                            ]);
        //Then
        $response->assertRedirect($this->loginGetRoute());
        $response->assertSessionHasErrors('username');
        $this->assertGuest();
    }
    

    /** @test */
    public function user_can_login_with_correct_credentials()
    {
        $this->withoutExceptionHandling();

        //$this->withSession;

        //Given
        $user = factory(User::class)->create([
            'password'=>bcrypt($password = 'i-love-laravel'),
        ]);

        //dd($user->vepost_address);
        //When
        $response = $this->post($this->loginPostRoute(), [
            'vepost_address' => $user->vepost_address,
            'username' => $user->username,
            'password'=>$password,
        ]);

        //Then
        
        $response->assertRedirect($this->successfulLoginRoute());
        $this->assertAuthenticatedAs($user);
        dd(Session::get('vepost_address'));
    }

    /** @test */
    public function user_cannot_login_with_incorrect_password()
    {
        //Given
        // create user in database with password X.
        // where X = 'i-love-laravel'
        $x = 'i-love-laravel';
        $user = factory(User::class)->create([
            'password' => bcrypt($x),
        ]);

        //When
        // Try login with different password Y
        // where Y= 'different-password'
        $y = 'different-password';
        $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
            'username' => $user->username,
            'password' => $y,
        ]);

        //Then
        // What we checking here
        // 1-   Should redirect back to login page
        // 2-   An error in the session
        // 3-   Email field has old input
        // 4-   Password field does not have old input.
        // 5-   User is still guest

        $response->assertRedirect($this->loginGetRoute());
        $response->assertSessionHasErrors('username');
        $this->assertTrue(session()->hasOldInput('username'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /** @test */
    public function remember_me_functionality()
    {
        //Given
        // Created User
        $user = factory(User::class)->create([
            'id'=>random_int(1, 100),
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);

        //When
        // Make Request to login with remember me on.
        $response = $this->post($this->loginPostRoute(), [
            'username' => $user->username,
            'password'=> $password,
            'remember'=> 'on',
        ]);

        $user = $user->fresh();

        //Then
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
    public function user_can_not_login_with_username_that_does_not_exist()
    {
        //Given

        //When
        $response = $this->from($this->loginGetRoute())
            ->post(
                $this->loginPostRoute(),
                [
                    'username'=>'anonymous_user',
                    'password' => 'invalid-password',
                ]);

        //Then
        $response->assertRedirect($this->loginGetRoute());
        $response->assertSessionHasErrors('username');
        $this->assertTrue(session()->hasOldInput('username'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }



    /** @test */
    public function user_can_logout_properly()
    {
        $this->withoutExceptionHandling();

        //Given
        $this->be(factory(User::class)->create());

        //When
        $response = $this->post($this->logoutRoute());

        //Then
        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }

    /** @test */
    public function user_can_not_logout_when_not_authenticated()
    {
        //Given

        //When
        $response = $this->post($this->logoutRoute());

        //Then
        $response->assertRedirect($this->successfulLogoutRoute());
        $this->assertGuest();
    }
    /** @test */
    public function user_can_not_make_more_then_five_attempts_in_one_minute()
    {
        //$this->withoutExceptionHandling();

        //Given
        $user = factory(User::class)->create([
            'password' => Hash::make($password = 'i-love-laravel'),
        ]);

        //When
        foreach (range(0, 5) as $_) {
             //dump($user->username);
            $response = $this->from($this->loginGetRoute())->post($this->loginPostRoute(), [
                'username' => $user->username,
               // 'vepost_address'=>$user->vepost_address,
                'password' => 'invalid-password',
            ]);
            
        }
       

        //Then
        $response->assertRedirect($this->loginGetRoute());
        $response->assertSessionHasErrors('username');
        //$response->assertSessionHasErrors('vepost_address');
        $this->assertRegExp(
            $this->getTooManyLoginAttemptsMessage(),
            collect(
                $response
                ->baseResponse
                ->getSession()
                ->get('errors')
                ->getBag('default')
                ->get('username')
            )->first()
        );
        $this->assertTrue(session()->hasOldInput('username'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
}
