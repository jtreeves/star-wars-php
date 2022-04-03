@extends('layouts.main', ['title' => $title])

@section('content')
    <x-card  
        :id="$mashup->id"
        :quote="$mashup->quote"
        :character="$mashup->character"
        :image="$mashup->image"
        :profiles="$mashup->profiles"
    />

    @if (count($mashup->profiles) != 0)
        <ul>
            @foreach ($mashup->profiles as $profile)
                <li>
                    <a href="{{ route(
                        'profiles.show',
                        $profile->id
                    ) }}">
                        <p>
                            {{ $profile->username }}
                        </p>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>
            This mashup has not been favorited by any users.
        </p>
    @endif

    <x-new-mashup />
@endsection
