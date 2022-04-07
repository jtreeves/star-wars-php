@props([
    'id',
    'quote',
    'character',
    'image',
    'profiles',
    'view' => '',
])

<article class="max-w-sm rounded overflow-hidden shadow-lg">
    <div class="flex flex-col gap-1 px-6 py-4">
        <blockquote class="place-self-start italic">
            {{ $quote }}
        </blockquote>
    
        <span class="place-self-end">
            — {{ $character }}
        </span>
    </div>

    <img 
        src="{{ $image }}"
        alt="Star Wars {{ 
            $character 
        }}"
        class="w-full"
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
                <x-element.star 
                    isStarred="{{ false }}"
                />
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
                <x-element.star 
                    isStarred="{{ true }}"
                />
            </button>
        </form>
    @endif

    @if ($view == 'list')
        <a href="{{ route(
            'mashups.show',
            $id
        ) }}">
            View More Details
        </a>
    @endif
</article>
