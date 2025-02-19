<?php
/** @var \App\Models\Blog $blog */
?>

<x-layout>
    <x-slot:title>{{ $blog->titulo }}</x-slot>
    
    <div class="container">
        <section>
            <h2>{{ $blog->titulo }}</h2>

            <!--<p><strong>Fecha de Publicación:</strong> {{ $blog->fecha_publicacion }}</p>
            <p><strong>Autor:</strong> {{ $blog->autor }}</p>
            <p><strong>{{ $blog->etiquetas }}</strong> </p>
            <p>{{ $blog->contenido }}</p>-->

            <x-blog-data :blog="$blog"/>

        </section>
    </div>

</x-layout>
