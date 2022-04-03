@props([
    'field',
    'isEditing'
])

<article>
    <label 
        for="{{ $field }}"
    >
        {{ $field }}
    </label>

    @foreach (config('constants.{{ $field }}s') as $key => $value)
        @if (
            $isEditing && 
            $key == $profile->$field
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

                @if ($field == 'color')
                    style="background-color: {{ $value }};"
                @endif
            >
                @if ($field == 'avatar')
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

                @if ($field == 'color')
                    style="background-color: {{ $value }};"
                @endif
            >
                @if ($field == 'avatar')
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
