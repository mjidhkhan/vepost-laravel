<?php

namespace Tests\Feature\Auth;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterTest extends TestCase
{

    use RefreshDatabase;
    

    protected function successfulRegistrationRoute()
    {
        return route('home');
    }
    protected function registerGetRoute()
    {
        return route('register');
    }
    protected function registerPostRoute()
    {
        return route('register');
    }
    protected function guestMiddlewareRoute()
    {
        return route('home');
    }

    /** @test */
    public function user_can_view_a_registration_form()
    {
       

     
        $response = $this->get($this->registerGetRoute());
        $response->assertSuccessful();
        $response->assertViewIs('auth.register');
        
    }

    /** @test */
    public function user_cannot_view_a_registration_form_when_authenticated()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get($this->registerGetRoute());
        $response->assertRedirect($this->guestMiddlewareRoute());
    }

    /** @test */
    public function user_can_register()
    {
       
        $this->withoutExceptionHandling();
        Event::fake();
         //dd($this->data());
        $response = $this->post($this->registerPostRoute(), $this->data());
        $response->assertRedirect($this->successfulRegistrationRoute());
        $this->assertCount(1, $users = User::all());
        $this->assertAuthenticatedAs($user = $users->first());
        $this->assertEquals('John Doe', $user->name);
        $this->assertEquals('john@example.com', $user->email);
        $this->assertTrue(Hash::check('i-love-laravel', $user->password));
        Event::assertDispatched(Registered::class, function ($e) use ($user) {
            return $e->user->id === $user->id;
        });
    }

    /** @test */
    public function user_cannot_register_without_name()
    {
        $response = $this->from($this->registerGetRoute())
            ->post($this->registerPostRoute(), array_merge($this->data(),['name' => '',]));
        $users = User::all();
        $this->assertCount(0, $users);
        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('name');
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /** @test */
    public function user_cannot_register_without_email()
    {
        $response = $this->from($this->registerGetRoute())
                ->post($this->registerPostRoute(), array_merge($this->data(),['email' => '',]));
        $users = User::all();
        $this->assertCount(0, $users);
        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /** @test */
    public function user_cannot_register_with_invalid_email()
    {
        $response = $this->from($this->registerGetRoute())
                ->post($this->registerPostRoute(), array_merge($this->data(),['email' => 'invalid-email',]));
        $users = User::all();
        $this->assertCount(0, $users);
        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('email');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /** @test */
    public function user_cannot_register_without_password()
    {
        $response = $this->from($this->registerGetRoute())
        ->post($this->registerPostRoute(), array_merge($this->data(),['password' => '','password_confirmation' => '',]));
        $users = User::all();
        $this->assertCount(0, $users);
        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /** @test */
    public function user_cannot_register_without_password_confirmation()
    {
        $response = $this->from($this->registerGetRoute())
                ->post($this->registerPostRoute(), array_merge($this->data(),['password_confirmation' => '',]));
        $users = User::all();
        $this->assertCount(0, $users);
        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /** @test */
    public function user_cannot_register_with_passwords_not_matching()
    {
        $response = $this->from($this->registerGetRoute())
                ->post($this->registerPostRoute(), array_merge($this->data(),[
                            'password' => 'i-love-laravel',
                            'password_confirmation' => 'i-love-symfony',
                            ]));
        $users = User::all();
        $this->assertCount(0, $users);
        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('password');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }

    /** @test */
    public function user_cannot_register_without_country_code()
    {
        $response = $this->from($this->registerGetRoute())
                ->post($this->registerPostRoute(), array_merge($this->data(),[
                            'country_code' => '',
                            ]));
        $users = User::all();
        $this->assertCount(0, $users);
        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('country_code');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }
    /** @test */
    public function user_cannot_register_without_vepost_code()
    {
        $response = $this->from($this->registerGetRoute())
                ->post($this->registerPostRoute(), array_merge($this->data(),[
                            'vep_code' => '',
                            ]));
        $users = User::all();
        $this->assertCount(0, $users);
        $response->assertRedirect($this->registerGetRoute());
        $response->assertSessionHasErrors('vep_code');
        $this->assertTrue(session()->hasOldInput('name'));
        $this->assertTrue(session()->hasOldInput('email'));
        $this->assertFalse(session()->hasOldInput('password'));
        $this->assertGuest();
    }


    private function data()
    {
        $cip = geoip()->getClientIP();
        $geoip= geoip()->getLocation('81.130.214.29');
        
       
        return [
            "name" => "John Doe",
            "email" => "john@example.com",
            "username" => "MH Khan",
            "vepost_code" => "233",
            "vepost_address" => "07454644765",
            "display_name" => "Khan",
            "country_code" => country(strtolower($geoip['iso_code']))->getCallingCode(),
            "phone" => "1234567876545",
            "vep_code" => "233",
            "password" => "i-love-laravel",
            "password_confirmation" => "i-love-laravel",
        ];
    }


}
