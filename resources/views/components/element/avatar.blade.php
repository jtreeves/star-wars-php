@props([
    'avatar',
    'color' => ''
])

@php
    switch ($color) {
        case 'red':
            $borderColor = 'border-red-700';
            break;
        case 'orange':
            $borderColor = 'border-orange-700';
            break;
        case 'yellow':
            $borderColor = 'border-yellow-700';
            break;
        case 'green':
            $borderColor = 'border-green-700';
            break;
        case 'blue':
            $borderColor = 'border-blue-700';
            break;
        case 'purple':
            $borderColor = 'border-purple-700';
            break;
        case 'pink':
            $borderColor = 'border-pink-700';
            break;
        case 'amber':
            $borderColor = 'border-amber-700';
            break;
        case 'teal':
            $borderColor = 'border-teal-700';
            break;
        case 'zinc':
            $borderColor = 'border-zinc-700';
            break;
        default:
            $borderColor = 'border-black';
            break;
    }
@endphp

<img 
    src="{{ config('constants.avatars')[$avatar] }}" 
    alt="{{ $avatar }}"
    class="w-32 h-32 object-cover rounded-full border-8 border-solid {{ $borderColor }}"
/>
