@props([
    'profiles',
    'message',
])

@if (count($profiles) != 0)
    <ul class="flex flex-col gap-2 items-center">
        @foreach ($profiles as $profile)
            <li class="flex flex-row gap-2 items-center">
                <a href="{{ route(
                    'profiles.show',
                    $profile->id
                ) }}">
                    <x-element.avatar 
                        :avatar="$profile->avatar"
                        :color="$profile->color"
                        size="small"
                    />
                </a>
                
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
