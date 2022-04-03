@extends('layouts.main', ['title' => 'Home'])

@section('content')
    <p>
        Create and save Star Wars mashups!
    </p>

    @if (!Auth::check())
        <form 
            action="{{ route('register') }}"
            method="GET"
        >
            <button
                type="submit"
            >
                Sign Up
            </button>
        </form>
        
        <form 
            action="{{ route('login') }}"
            method="GET"
        >
            <button
                type="submit"
            >
                Log In
            </button>
        </form>
    @elseif (Auth::user()->profile()->count() == 0)
        <form 
            action="{{ route('profiles.create') }}"
            method="GET"
        >
            <button
                type="submit"
            >
                Create Your Profile
            </button>
        </form>
    @else
        <x-new-mashup />
    @endif
@endsection
