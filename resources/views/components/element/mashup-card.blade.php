@props([
    'id',
    'quote',
    'character',
    'image',
    'profiles',
    'view' => '',
])

<article 
    class="max-w-lg rounded overflow-hidden shadow-lg shadow-slate-900 dark:shadow-slate-100 flex flex-col"
    id="mashup-{{ $id }}"
>
    <div class="flex flex-col gap-1 px-6 py-4 bg-slate-900 dark:bg-slate-100 text-slate-100 dark:text-slate-900">
        <blockquote class="place-self-start">
            {{ $quote }}
        </blockquote>
    
        <span class="uppercase place-self-end">
            — {{ $character }}
        </span>
    </div>

    <div class="relative">
        <img 
            src="{{ $image }}"
            alt="Star Wars {{ 
                $character 
            }}"
            class="w-full"
        />

        <div class="absolute bottom-0 h-6 flex flex-row justify-between w-full">
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
                    class="ml-1 h-6 flex flex-col justify-center"
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
                    class="ml-1 h-6 flex flex-col justify-center"
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
                    class="h-6 overflow-hidden flex flex-col justify-center"
                >
                    <x-element.ellipsis />
                </a>
            @endif
        </div>
    </div>
</article>
