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

            <select 
                name="avatar" 
                id="avatar"
            >
                @foreach (config('constants.avatars') as $name => $image)
                    <option value="{{ $name }}">
                        <img 
                            src="{{ $image }}" 
                            alt="{{ $name }}"
                        />
                    </option>
                @endforeach
            </select>
        </article>
        
        <article>
            <label 
                for="color"
            >
                Color
            </label>

            <select 
                name="color" 
                id="color"
            >
                @foreach (config('constants.colors') as $word => $hex)
                    <option value="{{ $word }}">
                        <span>{{ $word }}</span>

                        <div
                            style="
                                background-color: {{ $hex }};
                                height: 100px;
                                width: 100px;
                            "
                        />
                    </option>
                @endforeach
            </select>
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
