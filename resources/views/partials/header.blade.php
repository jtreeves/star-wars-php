<header class="flex flex-row justify-between items-center p-6 w-full ">
    <a 
        href="{{ route('home') }}" 
        class="font-star text-3xl text-yellow-500 mb-2"
    >
        Star Wars Mashups
    </a>

    <div class="flex flex-row gap-10 items-center">
        @include('partials.navigation')

        @include('partials.toggle')
    </div>
</header>
