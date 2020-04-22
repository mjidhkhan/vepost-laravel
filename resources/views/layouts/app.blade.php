<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'VePost') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet"> 
</head>
<body>
    <div id="app" class=" bg-gray-200 h-screen">
        <nav class="flex items-center justify-between flex-wrap bg-gradient p-6">
            <div class="flex items-center flex-shrink-0 text-white mr-6">
                <span class="font-semibold text-xl tracking-tight">
                    <a class="navbar-brand00 " href="{{ url('/') }}">
                    <i class="icon-vectorpaintvewvepost ve-size text-teal-300"></i>
		            <i class="icon-vectorpaintpstvepost post-size text-white  font-hairline"></i>
                    </a>
                </span>
            </div>
            <div class="block lg:hidden">
                <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
                <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
                </button>
            </div>
            <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
                @guest
                    <div class="text-sm lg:flex-grow">
                        
                        @if (Route::has('register'))    
                            <a  href="{{ route('register') }}" class="bg-gray-300 hover:bg-gray-900 text-gray-900 font-bold py-2 px-4  rounded block mt-4 lg:inline-block lg:mt-0  hover:text-teal-300 mr-4 float-right">{{ __('Register') }}</a>         
                        @endif
                         @if (Route::has('register'))  
                            <a href="{{ route('login') }}" class="bg-gray-300 hover:bg-gray-900 text-gray-900 font-bold py-2 px-4  rounded block mt-4 lg:inline-block lg:mt-0  hover:text-teal-300 mr-4 float-right">{{ __('Login') }}</a>
                         @endif
                        @if (Route::has('about'))
                            <a  href="{{ route('about') }}" class=" py-2 px-4 block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">{{ __('About') }}</a> 
                        @endif
                            @if (Route::has('support'))
                                <a  href="{{ route('support') }}" class="py-2 px-4 block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">{{ __('Support') }}</a>
                            @endif
                            @if (Route::has('features'))
                                <a  href="{{ route('features') }}" class="py-2 px-4 block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">{{ __('Features') }}</a>
                            @endif
                            
                            @if (Route::has('downloads'))
                                <a  href="{{ route('downloads') }}" class="py-2 px-4 block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">{{ __('Download') }}</a>
                            @endif
                            @if (Route::has('pod'))
                                <a  href="{{ route('pod') }}" class="py-2 px-4 block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4">{{ __('POD') }}</a>
                            @endif
                            @else
                            <a href="/about" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white mr-4"> </a>
                            <a href="POD" class="block mt-4 lg:inline-block lg:mt-0 text-teal-200 hover:text-white">Blog</a>
                    </div>
                    <div>
                        <a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0">Download</a>
                    </div>
                @endguest
            </div>
        </nav>
         @yield('content')
    </div>
</body>
</html>
