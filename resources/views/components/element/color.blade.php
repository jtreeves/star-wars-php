@props([
    'color' => '',
])

@php
    switch ($color) {
        case 'red':
            $background = 'bg-red-500';
            break;
        case 'orange':
            $background = 'bg-orange-500';
            break;
        case 'yellow':
            $background = 'bg-yellow-500';
            break;
        case 'green':
            $background = 'bg-green-500';
            break;
        case 'blue':
            $background = 'bg-blue-500';
            break;
        case 'purple':
            $background = 'bg-purple-500';
            break;
        case 'pink':
            $background = 'bg-pink-500';
            break;
        case 'amber':
            $background = 'bg-amber-500';
            break;
        case 'teal':
            $background = 'bg-teal-500';
            break;
        case 'zinc':
            $background = 'bg-zinc-500';
            break;
        default:
            $background = 'bg-black';
            break;
    }
@endphp

<div
    title="{{ $color }}"
    class="w-16 h-16 rounded-full {{ $background }}"
></div>
