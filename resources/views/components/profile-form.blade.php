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

    <x-radio-group 
        field="avatar"
        :isEditing="{{ $isEditing }}"
    />

    <x-radio-group 
        field="color"
        :isEditing="{{ $isEditing }}"
    />

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
