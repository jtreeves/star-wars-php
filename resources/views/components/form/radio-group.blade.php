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

    <div class="grid grid-cols-5 gap-4">
        @foreach ($constants as $key)
            @if (
                $isEditing && 
                $key == $selection
            )
                <div>
                    <input 
                        type="radio"
                        name="{{ $field }}"
                        id="{{ $key }}"
                        value="{{ $key }}"
                        checked
                    />
                        
                    <label 
                        for="{{ $key }}"
                        class="cursor-pointer"
                    >
                        @if ($isAvatar)
                            <x-element.avatar 
                                :avatar="$key"
                                size="medium"
                            />
                        @else
                            <x-element.color 
                                :color="$key"
                            />
                        @endif
                    </label>
                </div>
            @else
                <div>
                    <input 
                        type="radio"
                        name="{{ $field }}"
                        id="{{ $key }}"
                        value="{{ $key }}"
                    />
                        
                    <label 
                        for="{{ $key }}"
                        class="cursor-pointer"
                    >
                        @if ($isAvatar)
                            <x-element.avatar 
                                :avatar="$key"
                                size="medium"
                            />
                        @else
                            <x-element.color 
                                :color="$key"
                            />
                        @endif
                    </label>
                </div>
            @endif
        @endforeach
    </div>
</article>
