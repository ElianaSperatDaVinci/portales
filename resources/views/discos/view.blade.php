<?php
/** @var \App\Models\Disco $disco */
?>

<x-layout>
    <x-slot:title>{{ $disco->nombre }}</x-slot:title>

    <section>
        <h2>{{ $disco->nombre }}</h2>

        <x-disco-data :disco="$disco"/>

    </section>

</x-layout>