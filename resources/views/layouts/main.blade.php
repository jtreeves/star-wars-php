<!DOCTYPE html>
<html 
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
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
        class="font-sans antialiased min-h-screen bg-gray-100"
    >
        @include('partials.header')

        <main>
            <h1>
                {{ $title }}
            </h1>
    
            @yield('content')
        </main>

        @include('partials.footer')
    </body>
</html>
