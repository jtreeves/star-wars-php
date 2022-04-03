@extends('layouts.main', ['title' => $title])

@section('content')
    <img 
        src="{{ config('constants.avatars')[$profile->avatar] }}" 
        alt="{{ $profile->avatar }}"
    />

    <x-profile-element 
        field="bio"
        :value="$profile->bio"
    />
    
    <x-profile-element 
        field="location"
        :value="$profile->location"
    />
    
    <x-profile-element 
        field="movie"
        :value="$profile->movie"
    />
    
    <x-profile-element 
        field="color"
        :value="$profile->color"
    />

    <x-mashups-list 
        :mashups="$profile->mashups"
        message="This user has not liked any mashups."
    />

    <x-fans 
        :followers="$profile->followers"
        :followings="$profile->followings"
    />

    @if (Auth::user()->profile->id == $profile->id)
        <x-executive-buttons 
            :id="$profile->id"
        />
    @else
        <x-follow-buttons 
            :followers="$profile->followers"
            :id="$profile->id"
        />
    @endif
@endsection
