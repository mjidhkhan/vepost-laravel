<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function user_can_view_a_login_form()
    {
        $response = $this->get('/login');

        $response->assertSuccessful();
        $response->assertViewIs('auth.login');
    }

    /** @test */
    public function user_cannot_view_a_login_form_when_authenticated()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/login');
        $response->assertRedirect('/home');
    }
    

    /** @test */
    public function user_can_login_with_correct_credentials()
    {
        
        $user = factory(User::class)->create([
            'password'=>bcrypt($password = 'i-love-laravel'),
        ]);

        $response = $this->post('/login',[
            'email' => $user->email,
            'password'=>$password,
        ]);
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

    /** @test */
    public function user_caanot_login_with_incorrect_password()
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
        $response = $this->from('/login')->post('/login',[
            'email' => $user->email,
            'password' => $y,
        ]);

        // What we checking here
        // 1-   Should redirect back to login page
        // 2-   An error in the session
        // 3-   Email field has old input
        // 4-   Password field does not have old input.
        // 5-   User is still guest

        $response->assertRedirect('/login');
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

        $this->post('/login', [
            'email' => $user->email,
            'password'=> $password,
            'remember'=> 'on',
        ]);


    }
    
    
    
    
}
