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

            <select 
                name="avatar" 
                id="avatar"
            >
                @foreach (config('constants.avatars') as $name => $image)
                    @if ($name == $profile->avatar)
                        <option 
                            value="{{ $name }}" 
                            selected
                        >
                            <img 
                                src="{{ $image }}" 
                                alt="{{ $name }}"
                            />
                        </option>
                    @else
                        <option value="{{ $name }}">
                            <img 
                                src="{{ $image }}" 
                                alt="{{ $name }}"
                            />
                        </option>
                    @endif
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
                    @if ($word == $profile->color)
                        <option 
                            value="{{ $word }}" 
                            selected
                        >
                            <span>{{ $word }}</span>

                            <div
                                style="
                                    background-color: {{ $hex }};
                                    height: 100px;
                                    width: 100px;
                                "
                            />
                        </option>
                    @else
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
                    @endif
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
