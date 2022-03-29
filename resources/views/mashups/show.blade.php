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

        <form 
            action="{{ route('events.star', $mashup->id) }}"
            method="GET"
        >
            @csrf

            <button
                type="submit"
            >
                Favorite
            </button>
        </form>
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
