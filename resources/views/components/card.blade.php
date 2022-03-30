@props([
    'id',
    'quote',
    'character',
    'image',
    'profiles',
])

<article>
    <blockquote>
        {{ $quote }}
    </blockquote>

    <span>
        — {{ $character }}
    </span>

    <img 
        src="{{ $image }}"
        alt="Star Wars {{ 
            $character 
        }}"
    />

    @if (!$profiles->contains(
        'id', 
        Auth::user()->profile->id
    ))
        <form 
            action="{{ route(
                'favorites.star', 
                $id
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
                $id
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
</article>
