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

    <body 
        class="font-cycle antialiased min-h-screen grid grid-cols-1 grid-rows-[100px_auto_100px] justify-items-center bg-slate-100 dark:bg-slate-900"
    >
        @include('partials.header')

        <main 
            class="flex flex-col gap-3 p-5 w-full items-center text-slate-700 dark:text-slate-300"
        >
            <h1 
                class="uppercase text-3xl font-black text-slate-900 dark:text-slate-100"
            >
                {{ $title }}
            </h1>
    
            @yield('content')
        </main>

        @include('partials.footer')
    </body>
</html>
