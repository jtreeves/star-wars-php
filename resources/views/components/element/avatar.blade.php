@props([
    'avatar',
    'color' => '',
    'size' => '',
])

@php
    switch ($color) {
        case 'red':
            $borderColor = 'border-red-500 ring-red-500 ring-offset-red-200 shadow-red-500';
            break;
        case 'orange':
            $borderColor = 'border-orange-500 ring-orange-500 ring-offset-orange-200 shadow-orange-500';
            break;
        case 'yellow':
            $borderColor = 'border-yellow-500 ring-yellow-500 ring-offset-yellow-200 shadow-yellow-500';
            break;
        case 'green':
            $borderColor = 'border-green-500 ring-green-500 ring-offset-green-200 shadow-green-500';
            break;
        case 'blue':
            $borderColor = 'border-blue-500 ring-blue-500 ring-offset-blue-200 shadow-blue-500';
            break;
        case 'purple':
            $borderColor = 'border-purple-500 ring-purple-500 ring-offset-purple-200 shadow-purple-500';
            break;
        case 'pink':
            $borderColor = 'border-pink-500 ring-pink-500 ring-offset-pink-200 shadow-pink-500';
            break;
        case 'amber':
            $borderColor = 'border-amber-500 ring-amber-500 ring-offset-amber-200 shadow-amber-500';
            break;
        case 'teal':
            $borderColor = 'border-teal-500 ring-teal-500 ring-offset-teal-200 shadow-teal-500';
            break;
        case 'zinc':
            $borderColor = 'border-zinc-500 ring-zinc-500 ring-offset-zinc-200 shadow-zinc-500';
            break;
        default:
            $borderColor = 'border-black ring-black ring-offset-gray-200 shadow-gray-900';
            break;
    }

    switch ($size) {
        case 'small':
            $dimensions = 'w-4 h-4 ring-1 ring-offset-1 border-[1px] shadow-sm';
            break;
        case 'medium':
            $dimensions = 'w-16 h-16 ring-2 ring-offset-2 border-2 shadow-md';
            break;
        case 'large':
            $dimensions = 'w-32 h-32 ring-2 ring-offset-2 border-2 shadow-lg';
            break;
        default:
            $dimensions = 'w-16 h-16 ring-2 ring-offset-2 border-2 shadow-md';
            break;
    }
@endphp

<img 
    src="{{ config('constants.avatars')[$avatar] }}" 
    alt="{{ $avatar }}"
    title="{{ $avatar }}"
    class="object-cover rounded-full border-solid {{ $borderColor }} {{ $dimensions }}"
/>
