<form 
    action="{{ route('mashups.store') }}"
    method="POST"
>
    @csrf

    <button
        type="submit"
    >
        Get New Mashup
    </button>
</form>
