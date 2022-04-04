<nav>
    <ul class="flex flex-row gap-10 font-black uppercase">
        <li>
            <a 
                href="{{ route('home') }}"
                class="text-yellow-700 hover:text-yellow-500"
            >
                Home
            </a>
        </li>

        <li>
            <a 
                href="{{ route('about') }}"
                class="text-yellow-700 hover:text-yellow-500"
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
                    class="text-yellow-700 hover:text-yellow-500"
                >
                    Profile
                </a>
            </li>

            <li>
                <a 
                    href="{{ route('mashups.index') }}"
                    class="text-yellow-700 hover:text-yellow-500"
                >
                    Mashups
                </a>
            </li>
            
            <li>
                <a 
                    href="{{ route('mashups.feed') }}"
                    class="text-yellow-700 hover:text-yellow-500"
                >
                    Feed
                </a>
            </li>
        @endif
    </ul>
</nav>
