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
        <x-button>
            Edit
        </x-button>
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

        <x-button>
            Delete
        </x-button>
    </form>
</section>
