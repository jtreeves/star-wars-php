@extends('layouts.main', ['title' => $title])

@section('content')
    <img 
        src="{{ config('constants.avatars')[$profile->avatar] }}" 
        alt="{{ $profile->avatar }}"
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
    
    <article>
        <h2>
            Color
        </h2>
    
        <p>
            {{ $profile->color }}
        </p>
    </article>

    <x-mashups-list 
        :mashups="$profile->mashups"
        message="This user has not liked any mashups."
    />

    <x-fans 
        :followers="$profile->followers"
        :followings="$profile->followings"
    />

    @if (Auth::user()->profile->id == $profile->id)
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
            @csrf
            @method('DELETE')

            <button
                type="submit"
            >
                Delete
            </button>
        </form>
    @else
        <x-follow-buttons 
            :followers="$profile->followers"
            :id="$profile->id"
        />
    @endif
@endsection
