<article class="flex justify-center gap-3 border-solid border-4 border-slate-500 h-fit rounded-full bg-slate-300 dark:bg-slate-700">
    <form 
        action="{{ route('mode.light') }}"
        method="GET"
        class="w-6 h-6"
    >
        @csrf

        <button
            type="submit"
            class="bg-slate-100 ring-2 ring-slate-900 dark:bg-transparent dark:ring-0 rounded-full w-6 h-6"
        ></button>
    </form>
    
    <form 
        action="{{ route('mode.dark') }}"
        method="GET"
        class="w-6 h-6"
    >
        @csrf

        <button
            type="submit"
            class="bg-transparent ring-0 dark:bg-slate-900 dark:ring-2 dark:ring-slate-100 rounded-full w-6 h-6"
        ></button>
    </form>
</article>
