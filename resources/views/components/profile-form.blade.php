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
    
    <article>
        <label 
            for="username"
        >
            Username
        </label>

        <input 
            type="text"
            name="username"
            id="username"
            value="{{ 
                $isEditing ? $profile->username : '' 
            }}"
        />
    </article>
    
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
    
    <article>
        <label 
            for="bio"
        >
            Bio
        </label>

        <input 
            type="text"
            name="bio"
            id="bio"
            value="{{ 
                $isEditing ? $profile->bio : '' 
            }}"
        />
    </article>
    
    <article>
        <label 
            for="location"
        >
            Location
        </label>

        <input 
            type="text"
            name="location"
            id="location"
            value="{{ 
                $isEditing ? $profile->location : '' 
            }}"
        />
    </article>
    
    <article>
        <label 
            for="movie"
        >
            Movie
        </label>

        <input 
            type="text"
            name="movie"
            id="movie"
            value="{{ 
                $isEditing ? $profile->movie : '' 
            }}"
        />
    </article>

    <button
        type="submit"
    >
        {{ $isEditing ? 'Update' : 'Save' }} Your Profile
    </button>
</form>
