@extends('layouts.app')

@section('content')

    <div class="mx-auto flex flex-col  items-center">
                    

                   
                        <form method="POST" action="{{ route('login') }}" class="w-4/12 bg-white shadow-md px-8 pt-6 pb-8 mb-4 items-center">
                            @csrf
<div class="card-header text-4xl">{{ __('Login') }}</div>
                            <div class="mb-4">
                                <label for="vepost_address" class="cblock text-gray-700 text-sm font-bold mb-2">{{ __('VePost Address') }}</label>

                                <div class="col-md-6">
                                    <input id="vepost_address" 
                                        type="text" 
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('vepost_address') is-invalid @enderror" 
                                        name="vepost_address" value="{{ old('vepost_address') }}"  
                                        autocomplete="vepost_address" 
                                        autofocus>

                                    @error('email')
                                        <span class="text-red-500 text-xs italic" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">{{ __('User Name') }}</label>

                                <div class="col-md-6">
                                    <input id="username" 
                                    type="text" 
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('username') is-invalid @enderror" 
                                    name="username" 
                                    value="{{ old('username') }}"  
                                    autocomplete="username" 
                                    autofocus>

                                    @error('email')
                                        <span class="text-red-500 text-xs italic" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" 
                                    type="password" 
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror" 
                                    name="password"  
                                    autocomplete="current-password">

                                    @error('password')
                                        <span class="text-red-500 text-xs italic" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="inline-block align-baseline font-normal text-sm text-blue-500 hover:text-blue-800 pt-3 pb-3" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="flex items-center justify-between">
                                    <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="inline-block align-baseline font-normal text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <p class="text-center text-gray-500 text-xs">
                                &copy;2019 Group 3 Technology Ltd. All rights reserved.
                        </p>
                    
    </div>  
   





@endsection
