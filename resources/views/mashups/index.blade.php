@extends('layouts.main', ['title' => $title])

@section('content')
    <x-search-mashups 
        :view="$view"
        :character="$character"
    />

    <x-mashups-list 
        :mashups="$mashups"
        message="No mashups found."
    />

    <x-new-mashup />
@endsection
