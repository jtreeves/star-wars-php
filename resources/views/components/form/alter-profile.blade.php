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
    class="flex flex-col gap-3 items-center"
>
    @csrf

    @if ($isEditing)
        @method('PUT')
    @endif

    <x-form.labeled-input 
        field="username"
        :value="$isEditing ? $profile->username : ''"
        :isEditing="$isEditing"
    />

    <x-form.radio-group 
        field="avatar"
        :selection="$isEditing ? $profile->avatar : ''"
        :isEditing="$isEditing"
    />

    <x-form.radio-group 
        field="color"
        :selection="$isEditing ? $profile->color : ''"
        :isEditing="$isEditing"
    />

    <x-form.labeled-input 
        field="bio"
        :value="$isEditing ? $profile->bio : ''"
        :isEditing="$isEditing"
    />

    <x-form.labeled-input 
        field="location"
        :value="$isEditing ? $profile->location : ''"
        :isEditing="$isEditing"
    />

    <x-form.labeled-input 
        field="movie"
        :value="$isEditing ? $profile->movie : ''"
        :isEditing="$isEditing"
    />

    <x-button>
        {{ $isEditing ? 'Update' : 'Save' }} Your Profile
    </x-button>
</form>
