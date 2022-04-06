<!DOCTYPE html>
<html 
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    class="{{ session('mode') }}"
>
    <head>
        <base 
            href="{{ url('/') }}/" 
        />

        <meta 
            charset="utf-8"
        >

        <meta 
            name="viewport" 
            content="width=device-width, initial-scale=1"
        >

        <meta 
            name="csrf-token" 
            content="{{ csrf_token() }}"
        >

        <title>
            {{ @config('app.name') }} - {{ $title }}
        </title>

        <link 
            rel="stylesheet" 
            href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
        >

        <link 
            rel="stylesheet" 
            href="{{ asset('css/app.css') }}"
        >

        <script 
            src="{{ asset('js/app.js') }}" 
            defer
        ></script>
    </head>

    @php
        if (!Auth::check()) {
            $backgroundColor = 'bg-gray-100 dark:bg-gray-700';
        } else {
            switch (Auth::user()->profile->color) {
                case 'red':
                    $backgroundColor = 'bg-red-300 dark:bg-red-700';
                    break;
                case 'orange':
                    $backgroundColor = 'bg-orange-300 dark:bg-orange-700';
                    break;
                case 'yellow':
                    $backgroundColor = 'bg-yellow-300 dark:bg-yellow-700';
                    break;
                case 'green':
                    $backgroundColor = 'bg-green-300 dark:bg-green-700';
                    break;
                case 'blue':
                    $backgroundColor = 'bg-blue-300 dark:bg-blue-700';
                    break;
                case 'purple':
                    $backgroundColor = 'bg-purple-300 dark:bg-purple-700';
                    break;
                case 'pink':
                    $backgroundColor = 'bg-pink-300 dark:bg-pink-700';
                    break;
                case 'amber':
                    $backgroundColor = 'bg-amber-300 dark:bg-amber-700';
                    break;
                case 'teal':
                    $backgroundColor = 'bg-teal-300 dark:bg-teal-700';
                    break;
                case 'zinc':
                    $backgroundColor = 'bg-zinc-300 dark:bg-zinc-700';
                    break;
                default:
                    $backgroundColor = 'bg-gray-100 dark:bg-gray-700';
                    break;
            }
        }
    @endphp

    <body 
        class="font-cycle antialiased min-h-screen grid grid-cols-1 grid-rows-[100px_auto_100px] justify-items-center {{ $backgroundColor }}"
    >
        @include('partials.header')

        <main class="flex flex-col gap-3 p-5 w-full items-center">
            <h1 class="uppercase text-3xl font-black">
                {{ $title }}
            </h1>
    
            @yield('content')
        </main>

        @include('partials.footer')
    </body>
</html>
