@props([
    'field',
])

<article>
    <h2>
        {{ $field }}
    </h2>

    <p>
        {{ $profile->$field }}
    </p>
</article>
