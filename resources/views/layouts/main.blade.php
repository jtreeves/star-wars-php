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
                    $backgroundColor = 'bg-red-100 dark:bg-red-900';
                    break;
                case 'orange':
                    $backgroundColor = 'bg-orange-100 dark:bg-orange-900';
                    break;
                case 'yellow':
                    $backgroundColor = 'bg-yellow-100 dark:bg-yellow-900';
                    break;
                case 'green':
                    $backgroundColor = 'bg-green-100 dark:bg-green-900';
                    break;
                case 'blue':
                    $backgroundColor = 'bg-blue-100 dark:bg-blue-900';
                    break;
                case 'purple':
                    $backgroundColor = 'bg-purple-100 dark:bg-purple-900';
                    break;
                case 'pink':
                    $backgroundColor = 'bg-pink-100 dark:bg-pink-900';
                    break;
                case 'amber':
                    $backgroundColor = 'bg-amber-100 dark:bg-amber-900';
                    break;
                case 'teal':
                    $backgroundColor = 'bg-teal-100 dark:bg-teal-900';
                    break;
                case 'zinc':
                    $backgroundColor = 'bg-zinc-100 dark:bg-zinc-900';
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
            class="flex flex-col gap-3 p-5 w-full items-center text-slate-800 dark:text-slate-400"
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
