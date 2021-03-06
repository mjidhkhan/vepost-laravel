<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
       $data =  array_merge($data, ['vepost_address'=>$data['vep_code'].$data['country_code'].$data['phone']]);

        return Validator::make($data, [
            'name'=>['required', 'string', 'max:255'],
            'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            'username'=>['required', 'string', 'max:255'],
            'vep_code'=>['required', 'string', 'max:255'],
            'display_name'=>['required', 'string', 'max:255'],
            'country_code'=>['required'],
            'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'=>['required'],
            'password'=>['required', 'string', 'min:2', 'confirmed'],
            'vepost_address'=>['required', 'string', 'max:255'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data =  array_merge($data, ['vepost_address'=>$data['vep_code'].$data['country_code'].$data['phone']]);  
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username'=>$data['username'],
            'vep_code'=>$data['vep_code'],
            'country_code'=>$data['country_code'],
            'vepost_address'=>$data['vepost_address'],
            'display_name'=>$data['display_name'],
            'phone'=>$data['phone'],
        ]);
    }
}
