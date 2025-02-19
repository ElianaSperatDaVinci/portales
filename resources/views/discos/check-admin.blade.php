<?php

/** @var \App\Models\Disco $discos */
?>


<x-layout>
    <x-slot:title>Acceso</x-slot:title>

    <section>
        <h2>Necesitás permiso para acceder a esta página.</h2>

        <form action="{{ route('discos.check-admin.process') }}" method="post">
            @csrf
            <a href="{{ route('discos.index') }}" class="btn btn-danger">Volver</a>
            <button type="submit" class="btn btn-primary">Solicitar Acceso</button>
        </form>

    </section>

</x-layout>