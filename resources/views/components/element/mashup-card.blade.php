@props([
    'id',
    'quote',
    'character',
    'image',
    'profiles',
    'view' => '',
])

<article class="w-[600px] pt-[100px] pb-[100px] rounded overflow-hidden shadow-lg relative flex justify-center items-center bg-slate-800">
    <div class="bg-slate-100 w-[400px]">
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
    </div>

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
            class="absolute top-0 left-0"
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
            class="absolute top-0 left-0"
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
        <a 
            href="{{ route(
                'mashups.show',
                $id
            ) }}"
            class="absolute bottom-0 right-0 text-white"
        >
            <x-element.ellipsis />
        </a>
    @endif
</article>
