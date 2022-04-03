@extends('layouts.main', ['title' => $title])

@section('content')
    <x-form.search-mashups 
        :view="$view"
        :character="$character"
    />

    <x-list.mashups
        :mashups="$mashups"
        message="No mashups found."
    />

    <x-button.new-mashup />
@endsection
