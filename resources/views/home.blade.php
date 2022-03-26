@extends('layouts.main', ['title' => 'Home'])

@section('content')
    <p>
        Create and save Star Wars mashups!
    </p>

    @if (!Auth::check())
        <form 
            action="{{ route(register) }}"
            method="GET"
        >
            <button
                type="submit"
            >
                Sign Up
            </button>
        </form>
    @elseif (!Auth::user()->profile()->id)
        <form 
            action="{{ route(profiles.create) }}"
            method="GET"
        >
            <button
                type="submit"
            >
                Create Your Profile
            </button>
        </form>
    @else
        @if ($mashup->quote)
            <article>
                <blockquote>
                    {{ $mashup->quote }}
                </blockquote>
        
                <span>
                    —{{ $mashup->character }}
                </span>
        
                <img 
                    src="{{ $mashup->image }}"
                    alt="Star Wars {{ 
                        $mashup->character 
                    }}"
                />
            </article>
        @endif

        <form 
            action="{{ route(mashups.store) }}"
            method="POST"
        >
            <button
                type="submit"
            >
                Get New Mashup
            </button>
        </form>
    @endif
@endsection
