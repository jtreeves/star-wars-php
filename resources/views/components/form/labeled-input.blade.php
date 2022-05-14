@props([
    'field',
    'value',
    'isEditing',
])

<article>
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
