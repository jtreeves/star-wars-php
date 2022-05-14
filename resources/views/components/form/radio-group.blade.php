@props([
    'field',
    'selection',
    'isEditing'
])

@php
    $isAvatar = $field == 'avatar';
    $avatars = config('constants.avatars');
    $colors = config('constants.colors');
    $constants = $isAvatar ? array_keys($avatars) : $colors;
@endphp

<article class="flex flex-col gap-2 items-center">
    <label 
        for="{{ $field }}"
        class="uppercase"
    >
        {{ $field }}
    </label>

    <div>
        @foreach ($constants as $key)
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
                >
                    @if ($isAvatar)
                        <x-element.avatar 
                            :avatar="$key"
                            size="medium"
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
                >
                    @if ($isAvatar)
                        <x-element.avatar 
                            :avatar="$key"
                            size="medium"
                        />
                    @else
                        {{ $key }}
                    @endif
                </label>
            @endif
        @endforeach
    </div>
</article>
