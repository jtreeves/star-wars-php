@extends('layouts.main', ['title' => $title])

@section('content')
    <article>
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

        @if (count($mashup->profiles) != 0)
            <ul>
                @foreach ($mashup->profiles as $profile)
                    <li>
                        <a href="{{ route(
                            'profiles.show',
                            $profile->id
                        ) }}">
                            <p>
                                {{ $profile->username }}
                            </p>
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>
                This mashup has not been favorited by any users.
            </p>
        @endif
    </article>

    <form 
        action="{{ route('mashups.store') }}"
        method="POST"
    >
        @csrf

        <button
            type="submit"
        >
            Get New Mashup
        </button>
    </form>
@endsection
