@extends('layouts.main', ['title' => $title])

@section('content')
    <x-profile-form 
        isEditing="{{ true }}"
        :profile="$profile"
    />
@endsection
