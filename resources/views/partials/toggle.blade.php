@php
    $isLight = session('mode') == 'light';
    $active = 'bg-blue-700';
    $inactive = 'bg-blue-300';
    $lightClass = $isLight ? $active : $inactive;
    $darkClass = !$isLight ? $active : $inactive;
@endphp

<article>
    <form 
        action="{{ route('mode.light') }}"
        method="GET"
    >
        @csrf

        <button
            type="submit"
            class="{{ $lightClass }}"
        >
            Light
        </button>
    </form>
    
    <form 
        action="{{ route('mode.dark') }}"
        method="GET"
    >
        @csrf

        <button
            type="submit"
            class="{{ $darkClass }}"
        >
            Dark
        </button>
    </form>
</article>
