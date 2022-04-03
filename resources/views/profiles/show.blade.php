@extends('layouts.main', ['title' => $title])

@section('content')
    <img 
        src="{{ config('constants.avatars')[$profile->avatar] }}" 
        alt="{{ $profile->avatar }}"
    />

    <x-element.profile-field 
        field="bio"
        :value="$profile->bio"
    />
    
    <x-element.profile-field 
        field="location"
        :value="$profile->location"
    />
    
    <x-element.profile-field 
        field="movie"
        :value="$profile->movie"
    />
    
    <x-element.profile-field 
        field="color"
        :value="$profile->color"
    />

    <x-list.mashups
        :mashups="$profile->mashups"
        message="This user has not liked any mashups."
    />

    <x-list.fans 
        :followers="$profile->followers"
        :followings="$profile->followings"
    />

    @if (Auth::user()->profile->id == $profile->id)
        <x-button.executives 
            :id="$profile->id"
        />
    @else
        <x-button.follow-profiles 
            :followers="$profile->followers"
            :id="$profile->id"
        />
    @endif
@endsection
