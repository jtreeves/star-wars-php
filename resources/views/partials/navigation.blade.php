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

        @if (
            Auth::check() && 
            Auth::user()->profile()->count() != 0
        )
            <li>
                <a href="{{ route(
                    'profiles.show', 
                    Auth::user()->profile->id
                ) }}">
                    Profile
                </a>
            </li>

            <li>
                <a href="{{ route('mashups.index') }}">
                    Mashups
                </a>
            </li>
            
            <li>
                <a href="{{ route('mashups.feed') }}">
                    Feed
                </a>
            </li>
        @endif
    </ul>
</nav>
