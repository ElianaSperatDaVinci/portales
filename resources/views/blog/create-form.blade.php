<?php
/** @var \App\Models\Blog $blog */
?>

<x-layout>
    <x-slot:title>Nueva Noticia</x-slot>
    
    <div class="container">
        <h2>Nueva Noticia</h2>

        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input
                type="text"
                id="titulo"
                name="titulo"
                class="form-control"
                @error('titulo') aria-describedby="error-titulo" @enderror
                value="{{ old('titulo') }}"
            >
                @error('titulo')
                    <div class="text-danger" id="error-titulo">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="autor" class="form-label">Autor</label>
                <input
                    type="text"
                    id="autor"
                    name="autor"
                    class="form-control"
                    @error('error_autor') aria-describedby="error-autor" @enderror
                    value="{{ old('autor') }}">
                @error('autor')
                    <div class="text-danger" id="error-autor">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="etiquetas" class="form-label">Etiquetas</label>
                <input
                    type="text"
                    id="etiquetas"
                    name="etiquetas"
                    @error('error_etiquetas') aria-describedby="error-etiquetas" @enderror
                    class="form-control"
                    value="{{ old('etiquetas') }}"
                >
                @error('etiquetas')
                    <div class="text-danger" id="error-etiquetas">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea id="contenido" name="contenido" class="form-control">{{ old('contenido') }}</textarea>
                @error('contenido')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Crear Noticia</button>
        </form>
    </div>

</x-layout>

