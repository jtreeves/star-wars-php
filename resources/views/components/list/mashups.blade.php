@props([
    'mashups',
    'message'
])

@if (count($mashups) != 0)
    <ul>
        @foreach ($mashups as $mashup)
            <li>
                <x-element.mashup-card  
                    :id="$mashup->id"
                    :quote="$mashup->quote"
                    :character="$mashup->character"
                    :image="$mashup->image"
                    :profiles="$mashup->profiles"
                />

                <a href="{{ route(
                    'mashups.show',
                    $mashup->id
                ) }}">
                    View More Details
                </a>
            </li>
        @endforeach
    </ul>
@else
    <p>
        {{ $message }}
    </p>
@endif
