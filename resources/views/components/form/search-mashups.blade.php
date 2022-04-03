@props([
    'view',
    'character',
])

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
