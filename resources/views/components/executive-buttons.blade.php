@props([
    'id',
])

<section>
    <form 
        action="{{ route(
            'profiles.edit', 
            $id
        ) }}"
        method="GET"
    >
        <button
            type="submit"
        >
            Edit
        </button>
    </form>

    <form 
        action="{{ route(
            'profiles.destroy', 
            $id
        ) }}"
        method="POST"
    >
        @csrf
        @method('DELETE')

        <button
            type="submit"
        >
            Delete
        </button>
    </form>
</section>
