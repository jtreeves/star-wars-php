@props([
    'field',
    'selection',
    'isEditing'
])

@php
    $isAvatar = $field == 'avatar';
    $avatars = config('constants.avatars');
    $colors = config('constants.colors');
    $constants = $isAvatar ? $avatars : $colors;
@endphp

<article>
    <label 
        for="{{ $field }}"
    >
        {{ $field }}
    </label>

    @foreach ($constants as $key => $value)
        @if (
            $isEditing && 
            $key == $selection
        )
            <input 
                type="radio"
                name="{{ $field }}"
                id="{{ $key }}"
                value="{{ $key }}"
                checked
            />
    
            <label 
                for="{{ $key }}"

                @if (!$isAvatar)
                    style="background-color: {{ $value }};"
                @endif
            >
                @if ($isAvatar)
                    <img 
                        src="{{ $value }}" 
                        alt="{{ $key }}"
                    />
                @else
                    {{ $key }}
                @endif
            </label>
        @else
            <input 
                type="radio"
                name="{{ $field }}"
                id="{{ $key }}"
                value="{{ $key }}"
            />
    
            <label 
                for="{{ $key }}"

                @if (!$isAvatar)
                    style="background-color: {{ $value }};"
                @endif
            >
                @if ($isAvatar)
                    <img 
                        src="{{ $value }}" 
                        alt="{{ $key }}"
                    />
                @else
                    {{ $key }}
                @endif
            </label>
        @endif
    @endforeach
</article>
