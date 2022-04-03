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
        :value="$profile->username"
        :isEditing="$isEditing"
    />

    <x-radio-group 
        field="avatar"
        :selection="$profile->avatar"
        :isEditing="$isEditing"
    />

    <x-radio-group 
        field="color"
        :selection="$profile->color"
        :isEditing="$isEditing"
    />

    <x-labeled-input 
        field="bio"
        :value="$profile->bio"
        :isEditing="$isEditing"
    />

    <x-labeled-input 
        field="location"
        :value="$profile->location"
        :isEditing="$isEditing"
    />

    <x-labeled-input 
        field="movie"
        :value="$profile->movie"
        :isEditing="$isEditing"
    />

    <button
        type="submit"
    >
        {{ $isEditing ? 'Update' : 'Save' }} Your Profile
    </button>
</form>
