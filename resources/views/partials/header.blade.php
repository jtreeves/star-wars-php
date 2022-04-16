@php
    if (!Auth::check()) {
        $colors = 'text-gray-800 dark:text-gray-200 hover:text-gray-700 dark:hover:text-gray-300';
        $border = 'border-gray-800 dark:border-gray-200';
    } else {
        switch (Auth::user()->profile->color) {
            case 'red':
                $colors = 'text-red-800 dark:text-red-200 hover:text-red-700 dark:hover:text-red-300';
                $border = 'border-red-800 dark:border-red-200';
                break;
            case 'orange':
                $colors = 'text-orange-800 dark:text-orange-200 hover:text-orange-700 dark:hover:text-orange-300';
                $border = 'border-orange-800 dark:border-orange-200';
                break;
            case 'yellow':
                $colors = 'text-yellow-800 dark:text-yellow-200 hover:text-yellow-700 dark:hover:text-yellow-300';
                $border = 'border-yellow-800 dark:border-yellow-200';
                break;
            case 'green':
                $colors = 'text-green-800 dark:text-green-200 hover:text-green-700 dark:hover:text-green-300';
                $border = 'border-green-800 dark:border-green-200';
                break;
            case 'blue':
                $colors = 'text-blue-800 dark:text-blue-200 hover:text-blue-700 dark:hover:text-blue-300';
                $border = 'border-blue-800 dark:border-blue-200';
                break;
            case 'purple':
                $colors = 'text-purple-800 dark:text-purple-200 hover:text-purple-700 dark:hover:text-purple-300';
                $border = 'border-purple-800 dark:border-purple-200';
                break;
            case 'pink':
                $colors = 'text-pink-800 dark:text-pink-200 hover:text-pink-700 dark:hover:text-pink-300';
                $border = 'border-pink-800 dark:border-pink-200';
                break;
            case 'amber':
                $colors = 'text-amber-800 dark:text-amber-200 hover:text-amber-700 dark:hover:text-amber-300';
                $border = 'border-amber-800 dark:border-amber-200';
                break;
            case 'teal':
                $colors = 'text-teal-800 dark:text-teal-200 hover:text-teal-700 dark:hover:text-teal-300';
                $border = 'border-teal-800 dark:border-teal-200';
                break;
            case 'zinc':
                $colors = 'text-zinc-800 dark:text-zinc-200 hover:text-zinc-700 dark:hover:text-zinc-300';
                $border = 'border-zinc-800 dark:border-zinc-200';
                break;
            default:
                $colors = 'text-gray-800 dark:text-gray-200 hover:text-gray-700 dark:hover:text-gray-300';
                $border = 'border-gray-800 dark:border-gray-200';
                break;
        }
    }
@endphp

<header class="flex flex-row sticky top-0 z-10 bg-slate-100 dark:bg-slate-900 justify-between items-center p-6 w-full border-b {{ $border }}">
    <a 
        href="{{ route('home') }}" 
        class="font-star text-3xl mb-2 {{ $colors }}"
    >
        Star Wars Mashups
    </a>

    <div class="flex flex-row gap-10 items-center">
        @include(
            'partials.navigation', 
            ['colors' => $colors]
        )

        @include('partials.toggle')
    </div>
</header>
