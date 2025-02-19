<?php

/** @var \App\Models\Disco $discos */
?>


<x-layout>
    <x-slot:title>Formulario de Eliminación</x-slot:title>

    <section>
        <h2>¿Estás seguro que querés eliminar {{ $disco->nombre }}?</h2>

        <x-disco-data :disco="$disco"/>

        <form action="{{ route('discos.delete.process', ['id'=> $disco->discos_id]) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Si, eliminar</button>
        </form>

    </section>

</x-layout>