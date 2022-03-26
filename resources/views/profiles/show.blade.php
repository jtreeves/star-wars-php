@extends('layouts.main', ['title' => $title])

@section('content')
    <img 
        src="{{ $profile->avatar }}" 
        alt="{{ $profile->username }}"
    />

    <article>
        <h2>
            Bio
        </h2>
    
        <p>
            {{ $profile->bio }}
        </p>
    </article>
    
    <article>
        <h2>
            Location
        </h2>
    
        <p>
            {{ $profile->location }}
        </p>
    </article>
    
    <article>
        <h2>
            Favorite Movie
        </h2>
    
        <p>
            {{ $profile->movie }}
        </p>
    </article>

    @if (Auth::user()->profile()->id == $profile->id)
        <form 
            action="{{ route(
                'profiles.edit', 
                $profile->id
            ) }}"
            method="GET"
        >
            <button
                type="submit"
            >
                Edit
            </button>
        </form>

        <form 
            action="{{ route(
                'profiles.destroy', 
                $profile->id
            ) }}"
            method="POST"
        >
            <button
                type="submit"
            >
                Delete
            </button>
        </form>
    @endif
@endsection
