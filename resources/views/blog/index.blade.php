<?php
/** @var \App\Models\Blog $blog */
?>

<x-layout>
    <x-slot:title>Blog</x-slot:title>
    
    <div class="container">
        <h2>Taylor Nation</h2>

        @if($blog->isNotEmpty())

            <div class="row">

                @auth
                    <div class="mb-3">
                        <a href="{{ route('blog.create.form') }}">Nueva Noticia</a>
                    </div>
                @endauth

                @foreach($blog as $noticia)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h3 class="card-title">{{ $noticia->titulo }}</h3>
                            <p class="card-text">Fecha de Publicación: {{ $noticia->fecha_publicacion }}</p>
                            <p class="card-text"><small>{{ $noticia->etiquetas }}</small></p>
                            <p class="card-text"><em>Autor: {{ $noticia->autor }}</em></p>
                            <a href="{{ route('blog.view', ['id'=> $noticia->blog_id]) }}" class="btn btn-primary">Leer más</a>

                            @auth
                            <a href="{{ route('blog.edit.form', ['id'=> $noticia->blog_id]) }}" class="btn btn-secondary">Editar</a>
                            <a href="{{ route('blog.delete.form', ['id'=> $noticia->blog_id]) }}" class="btn btn-danger">Eliminar</a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        @else
            <p>No hay nuevas noticias. @auth Empezá por <a href="{{ route('blog.create.form') }}">agregar una nueva</a>. @endauth </p>
        @endif
    </div>

</x-layout>



