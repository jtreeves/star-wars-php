@props([
    'followers',
    'id',
])

@if (!$followers->contains(
    'id', 
    Auth::user()->profile->id
))
    <form 
        action="{{ route(
            'fans.follow', 
            $id
        ) }}"
        method="GET"
    >
        @csrf

        <x-button>
            Follow
        </x-button>
    </form>
@else
    <form 
        action="{{ route(
            'fans.unfollow', 
            $id
        ) }}"
        method="GET"
    >
        @csrf

        <x-button>
            Unfollow
        </x-button>
    </form>
@endif
