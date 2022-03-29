@extends('layouts.main', ['title' => $title])

@section('content')
    <form
        action="{{ route('mashups.index') }}"
        method="GET"
    >
        @csrf

        <label 
            for="character"
        >
            Enter a character's name
        </label>

        <input 
            type="search"
            name="character"
            id="character"
            value="{{ $character }}"
        />

        <button
            type="submit"
        >
            Search
        </button>
    </form>

    @if (count($mashups) != 0)
        <ul>
            @foreach ($mashups as $mashup)
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

                    @if (!$mashup->profiles->contains(
                        'id', 
                        Auth::user()->profile->id
                    ))
                        <form 
                            action="{{ route(
                                'events.star', 
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
                                'events.unstar', 
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
            No mashups found.
        </p>
    @endif
@endsection
