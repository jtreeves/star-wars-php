@php
    $isLight = session('mode') == 'light';
    $active = 'bg-blue-700';
    $inactive = 'bg-blue-300';
    $lightClass = $isLight ? $active : $inactive;
    $darkClass = !$isLight ? $active : $inactive;
@endphp

<article class="flex justify-center gap-3">
    <form 
        action="{{ route('mode.light') }}"
        method="GET"
    >
        @csrf

        <button
            type="submit"
            class="{{ $lightClass }} rounded-full w-6 h-6"
        ></button>
    </form>
    
    <form 
        action="{{ route('mode.dark') }}"
        method="GET"
    >
        @csrf

        <button
            type="submit"
            class="{{ $darkClass }} rounded-full w-6 h-6"
        ></button>
    </form>
</article>
