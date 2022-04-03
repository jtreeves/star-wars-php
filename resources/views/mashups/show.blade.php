@extends('layouts.main', ['title' => $title])

@section('content')
    <x-card  
        :id="$mashup->id"
        :quote="$mashup->quote"
        :character="$mashup->character"
        :image="$mashup->image"
        :profiles="$mashup->profiles"
    />

    <x-profiles-list 
        :profiles="$mashup->profiles"
        message="This mashup has not been favorited by any users."
    />

    <x-new-mashup />
@endsection
