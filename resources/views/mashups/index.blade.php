@extends('layouts.main', ['title' => $title])

@section('content')
    <form
        @if ($view == 'index')
            action="{{ route('mashups.index') }}"
        @else
            action="{{ route('mashups.feed') }}"    
        @endif

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

    <x-mashups-list 
        :mashups="$mashups"
        message="No mashups found."
    />

    <x-new-mashup />
@endsection
