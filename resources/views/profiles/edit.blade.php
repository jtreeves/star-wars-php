@extends('layouts.main', ['title' => $title])

@section('content')
    <form
        action="{{ route(
            'profiles.update', 
            $profile->id
        ) }}"
        method="POST"
    >
        @csrf
        
        <article>
            <label 
                for="username"
            >
                Username
            </label>
    
            <input 
                type="text"
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
                type="text"
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
                type="text"
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
                type="text"
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
                type="text"
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
