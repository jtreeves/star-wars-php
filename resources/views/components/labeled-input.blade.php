@props([
    'field',
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
            $isEditing ? $profile->$field : '' 
        }}"
    />
</article>
