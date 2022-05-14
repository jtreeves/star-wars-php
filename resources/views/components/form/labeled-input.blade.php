@props([
    'field',
    'value',
    'isEditing',
])

<article class="flex gap-3 items-center">
    <label 
        for="{{ $field }}"
        class="uppercase"
    >
        {{ $field }}
    </label>

    <input 
        type="text"
        name="{{ $field }}"
        id="{{ $field }}"
        value="{{ 
            $isEditing ? $value : '' 
        }}"
    />
</article>
