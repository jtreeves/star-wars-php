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

    @if (count($profile->mashups) != 0)
        <ul>
            @foreach ($profile->mashups as $mashup)
                <li>
                    <blockquote>
                        {{ $mashup->quote }}
                    </blockquote>
            
                    <span>
                        — {{ $mashup->character }}
                    </span>
            
                    <img 
                        src="{{ $mashup->image }}"
                        alt="Star Wars {{ 
                            $mashup->character 
                        }}"
                    />

                    <a href="{{ route(
                        'mashups.show',
                        $mashup->id
                    ) }}">
                        <p>
                            View More Details
                        </p>
                    </a>

                    @if (!$mashup->profiles->contains(
                        'id', 
                        Auth::user()->profile->id
                    ))
                        <form 
                            action="{{ route(
                                'favorites.star', 
                                $mashup->id
                            ) }}"
                            method="GET"
                        >
                            @csrf
                
                            <button
                                type="submit"
                            >
                                Favorite
                            </button>
                        </form>
                    @else
                        <form 
                            action="{{ route(
                                'favorites.unstar', 
                                $mashup->id
                            ) }}"
                            method="GET"
                        >
                            @csrf
                
                            <button
                                type="submit"
                            >
                                Unfavorite
                            </button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    @else
        <p>
            This user has not liked any mashups.
        </p>
    @endif

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
            <button
                type="submit"
            >
                Delete
            </button>
        </form>
    @endif
@endsection
