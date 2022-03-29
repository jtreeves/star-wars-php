@extends('layouts.main', ['title' => $title])

@section('content')
    <form
        action="{{ route('profiles.store') }}"
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
            />
        </article>

        <button
            type="submit"
        >
            Save Your Profile
        </button>
    </form>
@endsection
