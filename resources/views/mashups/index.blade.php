@extends('layouts.main', ['title' => $title])

@section('content')
    <form
        action="{{ route('mashups.index') }}"
        method="GET"
    >
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

    @if ($mashups->isNotEmpty())
        <ul>
            @foreach ($mashups as $mashup)
                <li>
                    <blockquote>
                        {{ $mashup->quote }}
                    </blockquote>
            
                    <span>
                        —{{ $mashup->character }}
                    </span>
            
                    <img 
                        src="{{ $mashup->image }}"
                        alt="Star Wars {{ 
                            $mashup->character 
                        }}"
                    />

                    @if (!$mashup->isFavorited)
                        <form 
                            action="{{ route(
                                'favorites.store', 
                                Auth::user()->profile()->id,
                                $mashup->id
                            ) }}"
                            method="POST"
                        >
                            <button
                                type="submit"
                            >
                                Favorite
                            </button>
                        </form>
                    @else
                        <form 
                            action="{{ route(
                                'favorites.destroy', 
                                Auth::user()->profile()->id,
                                $mashup->id
                            ) }}"
                            method="POST"
                        >
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
