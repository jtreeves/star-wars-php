@props([
    'avatar',
    'color' => '',
    'size' => '',
])

@php
    switch ($color) {
        case 'red':
            $borderColor = 'border-red-700 dark:border-red-300';
            break;
        case 'orange':
            $borderColor = 'border-orange-700 dark:border-orange-300';
            break;
        case 'yellow':
            $borderColor = 'border-yellow-700 dark:border-yellow-300';
            break;
        case 'green':
            $borderColor = 'border-green-700 dark:border-green-300';
            break;
        case 'blue':
            $borderColor = 'border-blue-700 dark:border-blue-300';
            break;
        case 'purple':
            $borderColor = 'border-purple-700 dark:border-purple-300';
            break;
        case 'pink':
            $borderColor = 'border-pink-700 dark:border-pink-300';
            break;
        case 'amber':
            $borderColor = 'border-amber-700 dark:border-amber-300';
            break;
        case 'teal':
            $borderColor = 'border-teal-700 dark:border-teal-300';
            break;
        case 'zinc':
            $borderColor = 'border-zinc-700 dark:border-zinc-300';
            break;
        default:
            $borderColor = 'border-black';
            break;
    }

    switch ($size) {
        case 'small':
            $dimensions = 'w-4 h-4';
            $borderWidth = 'border-2';
            break;
        case 'medium':
            $dimensions = 'w-16 h-16';
            $borderWidth = 'border-4';
            break;
        case 'large':
            $dimensions = 'w-32 h-32';
            $borderWidth = 'border-8';
            break;
        default:
            $dimensions = 'w-16 h-16';
            $borderWidth = 'border-4';
            break;
    }
@endphp

<img 
    src="{{ config('constants.avatars')[$avatar] }}" 
    alt="{{ $avatar }}"
    class="object-cover rounded-full border-solid {{ $borderColor }} {{ $dimensions }} {{ $borderWidth }}"
/>
