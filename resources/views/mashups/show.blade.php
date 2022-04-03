@extends('layouts.main', ['title' => $title])

@section('content')
    <x-element.mashup-card  
        :id="$mashup->id"
        :quote="$mashup->quote"
        :character="$mashup->character"
        :image="$mashup->image"
        :profiles="$mashup->profiles"
    />

    <x-list.profiles 
        :profiles="$mashup->profiles"
        message="This mashup has not been favorited by any users."
    />

    <x-button.new-mashup />
@endsection
