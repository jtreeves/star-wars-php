<nav>
    <ul class="flex flex-row gap-10 font-black uppercase">
        <li>
            <a 
                href="{{ route('home') }}"
                class="{{ $colors }}"
            >
                Home
            </a>
        </li>

        <li>
            <a 
                href="{{ route('about') }}"
                class="{{ $colors }}"
            >
                About
            </a>
        </li>

        @if (
            Auth::check() && 
            Auth::user()->profile()->count() != 0
        )
            <li>
                <a 
                    href="{{ route(
                        'profiles.show', 
                        Auth::user()->profile->id
                    ) }}"
                    class="{{ $colors }}"
                >
                    Profile
                </a>
            </li>

            <li>
                <a 
                    href="{{ route('mashups.index') }}"
                    class="{{ $colors }}"
                >
                    Mashups
                </a>
            </li>
            
            <li>
                <a 
                    href="{{ route('mashups.feed') }}"
                    class="{{ $colors }}"
                >
                    Feed
                </a>
            </li>
        @endif
    </ul>
</nav>
