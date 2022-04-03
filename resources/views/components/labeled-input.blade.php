@props([
    'field',
    'value',
    'isEditing',
])

<article>
    <label 
        for="{{ $field }}"
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
