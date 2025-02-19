<?php
/** @var \App\Models\Blog $blog */
?>

<x-layout>
    <x-slot:title>Formulario de Eliminación</x-slot>
    
    <div class="container">
        <section>
            <h2>¿Estás seguro que querés eliminar {{ $blog->titulo }}?</h2>
            
            <!--<h3>{{ $blog->titulo }}</h3>
            <p><strong>Fecha de Publicación:</strong> {{ $blog->fecha_publicacion }}</p>
            <p><strong>Autor:</strong> {{ $blog->autor }}</p>
            <p><strong>{{ $blog->etiquetas }}</strong> </p>
            <p>{{ $blog->contenido }}</p> -->

            <x-blog-data :blog="$blog"/>

            <form action="{{ route('blog.delete.process', ['id'=> $blog->blog_id]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Si, eliminar</button>
            </form>
        </section>
    </div>

</x-layout>
