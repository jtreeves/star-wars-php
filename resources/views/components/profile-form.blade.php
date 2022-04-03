@props([
    'isEditing' => false,
    'profile' => [],
])

<form
    @if ($isEditing)
        action="{{ route(
            'profiles.update', 
            $profile->id
        ) }}"
    @else
        action="{{ route('profiles.store') }}"    
    @endif

    method="POST"
>
    @csrf

    @if ($isEditing)
        @method('PUT')
    @endif

    <x-labeled-input 
        field="username"
        :isEditing="{{ $isEditing }}"
    />
    
    <article>
        <label 
            for="avatar"
        >
            Avatar
        </label>

        @foreach (config('constants.avatars') as $name => $image)
            @if (
                $isEditing && 
                $name == $profile->avatar
            )
                <input 
                    type="radio"
                    name="avatar"
                    id="{{ $name }}"
                    value="{{ $name }}"
                    checked
                />
        
                <label 
                    for="{{ $name }}"
                >
                    <img 
                        src="{{ $image }}" 
                        alt="{{ $name }}"
                    />
                </label>
            @else
                <input 
                    type="radio"
                    name="avatar"
                    id="{{ $name }}"
                    value="{{ $name }}"
                />
        
                <label 
                    for="{{ $name }}"
                >
                    <img 
                        src="{{ $image }}" 
                        alt="{{ $name }}"
                    />
                </label>
            @endif
        @endforeach
    </article>
    
    <article>
        <label 
            for="color"
        >
            Color
        </label>

        @foreach (config('constants.colors') as $word => $hex)
            @if (
                $isEditing &&
                $word == $profile->color
            )
                <input 
                    type="radio"
                    name="color"
                    id="{{ $word }}"
                    value="{{ $word }}"
                    checked
                />
        
                <label 
                    for="{{ $word }}"
                    style="background-color: {{ $hex }};"
                >
                    {{ $word }}
                </label>
            @else
                <input 
                    type="radio"
                    name="color"
                    id="{{ $word }}"
                    value="{{ $word }}"
                />
        
                <label 
                    for="{{ $word }}"
                    style="background-color: {{ $hex }};"
                >
                    {{ $word }}
                </label>
            @endif
        @endforeach
    </article>

    <x-labeled-input 
        field="bio"
        :isEditing="{{ $isEditing }}"
    />

    <x-labeled-input 
        field="location"
        :isEditing="{{ $isEditing }}"
    />

    <x-labeled-input 
        field="movie"
        :isEditing="{{ $isEditing }}"
    />

    <button
        type="submit"
    >
        {{ $isEditing ? 'Update' : 'Save' }} Your Profile
    </button>
</form>
