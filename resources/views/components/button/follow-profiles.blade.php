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

        <button
            type="submit"
        >
            Follow
        </button>
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

        <button
            type="submit"
        >
            Unfollow
        </button>
    </form>
@endif
