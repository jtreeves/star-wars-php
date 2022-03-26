@php
    $id = Auth::user()->id;
@endphp

<nav>
    <ul>
        <li>
            <a href="{{ route('home') }}">
                Home
            </a>
        </li>

        <li>
            <a href="{{ route('about') }}">
                About
            </a>
        </li>

        <li>
            <a href="{{ route(
                'profiles.show', 
                ['id' => $id]
            ) }}">
                Profile
            </a>
        </li>

        <li>
            <a href="{{ route('mashups.index') }}">
                Mashups
            </a>
        </li>
    </ul>
</nav>
