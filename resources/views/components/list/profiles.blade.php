@props([
    'profiles',
    'message',
])

@if (count($profiles) != 0)
    <ul>
        @foreach ($profiles as $profile)
            <li>
                <a href="{{ route(
                    'profiles.show',
                    $profile->id
                ) }}">
                    {{ $profile->username }}
                </a>
            </li>
        @endforeach
    </ul>
@else
    <p>
        {{ $message }}
    </p>
@endif
