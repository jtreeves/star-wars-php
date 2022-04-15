@php
    if (!Auth::check()) {
        $colors = 'bg-gray-800 dark:bg-gray-200 hover:bg-gray-700 dark:hover:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-100 focus:border-gray-900 dark:focus:border-gray-100 ring-gray-300 dark:ring-gray-700';
    } else {
        switch (Auth::user()->profile->color) {
            case 'red':
                $colors = 'bg-red-800 dark:bg-red-200 hover:bg-red-700 dark:hover:bg-red-300 active:bg-red-900 dark:active:bg-red-100 focus:border-red-900 dark:focus:border-red-100 ring-red-300 dark:ring-red-700';
                break;
            case 'orange':
                $colors = 'bg-orange-800 dark:bg-orange-200 hover:bg-orange-700 dark:hover:bg-orange-300 active:bg-orange-900 dark:active:bg-orange-100 focus:border-orange-900 dark:focus:border-orange-100 ring-orange-300 dark:ring-orange-700';
                break;
            case 'yellow':
                $colors = 'bg-yellow-800 dark:bg-yellow-200 hover:bg-yellow-700 dark:hover:bg-yellow-300 active:bg-yellow-900 dark:active:bg-yellow-100 focus:border-yellow-900 dark:focus:border-yellow-100 ring-yellow-300 dark:ring-yellow-700';
                break;
            case 'green':
                $colors = 'bg-green-800 dark:bg-green-200 hover:bg-green-700 dark:hover:bg-green-300 active:bg-green-900 dark:active:bg-green-100 focus:border-green-900 dark:focus:border-green-100 ring-green-300 dark:ring-green-700';
                break;
            case 'blue':
                $colors = 'bg-blue-800 dark:bg-blue-200 hover:bg-blue-700 dark:hover:bg-blue-300 active:bg-blue-900 dark:active:bg-blue-100 focus:border-blue-900 dark:focus:border-blue-100 ring-blue-300 dark:ring-blue-700';
                break;
            case 'purple':
                $colors = 'bg-purple-800 dark:bg-purple-200 hover:bg-purple-700 dark:hover:bg-purple-300 active:bg-purple-900 dark:active:bg-purple-100 focus:border-purple-900 dark:focus:border-purple-100 ring-purple-300 dark:ring-purple-700';
                break;
            case 'pink':
                $colors = 'bg-pink-800 dark:bg-pink-200 hover:bg-pink-700 dark:hover:bg-pink-300 active:bg-pink-900 dark:active:bg-pink-100 focus:border-pink-900 dark:focus:border-pink-100 ring-pink-300 dark:ring-pink-700';
                break;
            case 'amber':
                $colors = 'bg-amber-800 dark:bg-amber-200 hover:bg-amber-700 dark:hover:bg-amber-300 active:bg-amber-900 dark:active:bg-amber-100 focus:border-amber-900 dark:focus:border-amber-100 ring-amber-300 dark:ring-amber-700';
                break;
            case 'teal':
                $colors = 'bg-teal-800 dark:bg-teal-200 hover:bg-teal-700 dark:hover:bg-teal-300 active:bg-teal-900 dark:active:bg-teal-100 focus:border-teal-900 dark:focus:border-teal-100 ring-teal-300 dark:ring-teal-700';
                break;
            case 'zinc':
                $colors = 'bg-zinc-800 dark:bg-zinc-200 hover:bg-zinc-700 dark:hover:bg-zinc-300 active:bg-zinc-900 dark:active:bg-zinc-100 focus:border-zinc-900 dark:focus:border-zinc-100 ring-zinc-300 dark:ring-zinc-700';
                break;
            default:
                $colors = 'bg-gray-800 dark:bg-gray-200 hover:bg-gray-700 dark:hover:bg-gray-300 active:bg-gray-900 dark:active:bg-gray-100 focus:border-gray-900 dark:focus:border-gray-100 ring-gray-300 dark:ring-gray-700';
                break;
        }
    }
@endphp

<button {{ $attributes->merge([
    'type' => "submit", 
    'class' => "inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none focus:ring disabled:opacity-25 transition ease-in-out ring-2 duration-150 text-slate-100 dark:text-slate-900 $colors"
]) }}>
    {{ $slot }}
</button>
