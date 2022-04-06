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
            $backgroundColor = 'bg-gray-100 dark:bg-gray-900';
        } else {
            switch (Auth::user()->profile->color) {
                case 'red':
                    $backgroundColor = 'bg-red-200 dark:bg-red-800';
                    break;
                case 'orange':
                    $backgroundColor = 'bg-orange-200 dark:bg-orange-800';
                    break;
                case 'yellow':
                    $backgroundColor = 'bg-yellow-200 dark:bg-yellow-800';
                    break;
                case 'green':
                    $backgroundColor = 'bg-green-200 dark:bg-green-800';
                    break;
                case 'blue':
                    $backgroundColor = 'bg-blue-200 dark:bg-blue-800';
                    break;
                case 'purple':
                    $backgroundColor = 'bg-purple-200 dark:bg-purple-800';
                    break;
                case 'pink':
                    $backgroundColor = 'bg-pink-200 dark:bg-pink-800';
                    break;
                case 'amber':
                    $backgroundColor = 'bg-amber-200 dark:bg-amber-800';
                    break;
                case 'teal':
                    $backgroundColor = 'bg-teal-200 dark:bg-teal-800';
                    break;
                case 'zinc':
                    $backgroundColor = 'bg-zinc-200 dark:bg-zinc-800';
                    break;
                default:
                    $backgroundColor = 'bg-gray-100 dark:bg-gray-900';
                    break;
            }
        }
    @endphp

    <body 
        class="font-cycle antialiased min-h-screen grid grid-cols-1 grid-rows-[100px_auto_100px] justify-items-center {{ $backgroundColor }}"
    >
        @include('partials.header')

        <main 
            class="flex flex-col gap-3 p-5 w-full items-center"
        >
            <h1 
                class="uppercase text-3xl font-black"
            >
                {{ $title }}
            </h1>
    
            @yield('content')
        </main>

        @include('partials.footer')
    </body>
</html>
