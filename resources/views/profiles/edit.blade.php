@extends('layouts.main', ['title' => $title])

@section('content')
    <form
        action="{{ route(
            'profiles.update', 
            $profile->id
        ) }}"
        method="POST"
    >
        <article>
            <label 
                for="username"
            >
                Username
            </label>
    
            <input 
                type="search"
                name="username"
                id="username"
                value="{{ $profile->username }}"
            />
        </article>
        
        <article>
            <label 
                for="avatar"
            >
                Avatar
            </label>
    
            <input 
                type="search"
                name="avatar"
                id="avatar"
                value="{{ $profile->avatar }}"
            />
        </article>
        
        <article>
            <label 
                for="bio"
            >
                Bio
            </label>
    
            <input 
                type="search"
                name="bio"
                id="bio"
                value="{{ $profile->bio }}"
            />
        </article>
        
        <article>
            <label 
                for="location"
            >
                Location
            </label>
    
            <input 
                type="search"
                name="location"
                id="location"
                value="{{ $profile->location }}"
            />
        </article>
        
        <article>
            <label 
                for="movie"
            >
                Movie
            </label>
    
            <input 
                type="search"
                name="movie"
                id="movie"
                value="{{ $profile->movie }}"
            />
        </article>

        <button
            type="submit"
        >
            Update Your Profile
        </button>
    </form>
@endsection
