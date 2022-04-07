<form 
    action="{{ route('mashups.store') }}"
    method="POST"
>
    @csrf

    <x-button>
        Get New Mashup
    </x-button>
</form>
