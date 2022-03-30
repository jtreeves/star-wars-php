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

    <x-list 
        :mashups="$mashups"
        message="No mashups found."
    />
@endsection
