@props([
    'field',
    'value'
])

<article>
    <h2 class="uppercase text-center">
        {{ $field }}
    </h2>

    <p class="text-center">
        {{ $value }}
    </p>
</article>
