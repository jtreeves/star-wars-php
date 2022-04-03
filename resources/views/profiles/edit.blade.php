@extends('layouts.main', ['title' => $title])

@section('content')
    <x-form.alter-profile
        isEditing="{{ true }}"
        :profile="$profile"
    />
@endsection
