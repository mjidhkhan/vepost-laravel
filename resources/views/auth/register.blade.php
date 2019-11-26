@extends('layouts.app')

@section('content')



<!-- ----------------------- -->


<div class="mx-auto flex flex-col   items-center">
               

                
                    <form method="POST" action="{{ route('register') }}" class="w-4/12  bg-white shadow-md px-8 pt-6 pb-8 mb-4 items-center">
                        @csrf
                         <div class="card-header text-4xl">{{ __('Register') }}</div>
                             <label for="example-text-input" class="cblock text-gray-700 text-sm font-bold mb-2">{{ __('VePost Box No') }}</label> 
                         <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3  bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
                                <div class="flex flex-wrap -mx-3 mb-2">
                                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
                                        VePost Code
                                    </label>
                                    <input class="appearance-none block w-16  text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:none" 
                                            name="vep_code"id="grid-city" type="text" value="233" readonly>
                                    </div>
                                    <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                    Country
                                    </label>
                                    <div class="relative">
                                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('country_code') is-invalid @enderror" name="country_code" value="{{ old('country_code') }}">
                                        <option>+44</option>
                                        <option>+1</option>
                                        <option>+92</option>
                                        </select>
                                        
                                    </div>
                                    </div>
                                    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 " for="grid-zip">
                                        {{ __('Phone Numner') }}
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" id="grid-zip" type="text" placeholder="90210">
                                    </div>
                                </div>

                                @error('phone')
                                    <span class="text-red-500 text-xs italic" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror

                        </div>
                        
              

                        
                        
                        
                        
                        <div class="form-group row">
                            
                            <div class="col-md-6">
                                 <label for="username" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Full name') }}</label>
                                <input id="name" type="text" 
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline  @error('name') is-invalid @enderror" 
                                name="name" 
                                value="{{ old('name') }}"  
                                autocomplete="name" autofocus>

                                @error('name')
                                    <span class="text-red-500 text-xs italic" role="alert">
                                       {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            

                            <div class="col-md-6">
                                 <label for="username" class="block text-gray-700 text-sm font-bold mb-2">{{ __('User Name') }}</label>
                                <input id="username" 
                                        type="text" 
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline  @error('username') is-invalid @enderror" 
                                        name="username" 
                                        value="{{ old('username') }}">

                                @error('username')
                                    <span class="text-red-500 text-xs italic" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            
                             <label for="display_name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Display Name') }}</label>
                            <div class="col-md-6">
                                <input id="display_name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('displayname') is-invalid @enderror" name="display_name" value="{{ old('display_name') }}"  >
                                @error('display_name')
                                    <span class="text-red-500 text-xs italic" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                           
                             <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-Mail Address') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">

                                @error('email')
                                    <span class="text-red-500 text-xs italic" role="alert">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                             <label for="password" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Password') }}</label>
                           

                            <div class="col-md-6">
                                <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="text-red-500 text-xs italic" role="alert">
                                       {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                             <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Confirm Password') }}</label>
                            
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>

                        
                            <div class="col-md-6 offset-md-4 pt-5">
                                <button type="submit" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        
                    </form>
                </div>
           </div>
          







@endsection
