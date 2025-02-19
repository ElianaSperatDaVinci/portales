<?php

/**
 * @var Illuminate\Support\ViewErrorBag $errores
 * @var \App\Models\Genero[]\Illuminate\Database\Eloquent\Collection $generos
 */

//print_r($errors);
?>

<x-layout>
    <x-slot:title>Nuevo Disco</x-slot:title>
    <h2>Crear un Nuevo Disco de Taylor Swift</h2>

    <form action="{{ route('discos.create.process') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="form-control" @error('nombre') aria-describedby="error-nombre" @enderror value="{{ old('nombre') }}">
            @error('nombre')
            <div class="text-danger" id="error-nombre">{{ $message }}</div>
            @enderror

            <label for="lanzamiento" class="form-label">Lanzamiento</label>
            <input type="date" id="lanzamiento" name="lanzamiento" class="form-control" @error('error_lanzamiento') aria-describedby="error-lanzamiento" @enderror value="{{ old('lanzamiento') }}">
            @error('lanzamiento')
            <div class="text-danger" id="error-lanzamiento">{{ $message }}</div>
            @enderror
            <label for="precio" class="form-label">Precio</label>
            <input type="text" id="precio" name="precio" class="form-control" @error('error_precio') aria-describedby="error-precio" @enderror value="{{ old('precio') }}">
            @error('precio')
            <div class="text-danger" id="error-precio">{{ $message }}</div>
            @enderror

            <label for="duracion" class="form-label">Duración</label>
            <input type="text" id="duracion" name="duracion" class="form-control" @error('error_duracion') aria-describedby="error-duracion" @enderror value="{{ old('duracion') }}">
            @error('duracion')
            <div class="text-danger" id="error-duracion">{{ $message }}</div>
            @enderror

            <label for="cantidad_canciones" class="form-label">Cantidad de Canciones</label>
            <input type="text" id="cantidad_canciones" name="cantidad_canciones" class="form-control" @error('error_cantidad_canciones') aria-describedby="error-cantidad-canciones" @enderror value="{{ old('cantidad_canciones') }}">
            @error('cantidad_canciones')
            <div class="text-danger" id="error-cantidad-canciones">{{ $message }}</div>
            @enderror

            <label for="imagen_portada" class="form-label">Imagen de Portada</label>
            <input type="file" id="imagen_portada" name="imagen_portada" class="form-control" @error('error-imagen_portada') aria-describedby="error-imagen_portada" @enderror value="{{ old('imagen_portada') }}">

            <fieldset class="mb-3">
                <label>Géneros</label> <br>

                @foreach ($generos as $genero)
                <label class="me-4">
                    <input
                        type="checkbox"
                        name="genero_fk[]"
                        value="{{ $genero->genero_id }}"
                        @checked(in_array($genero->genero_id, old('genero_fk', [])))
                    >
                    {{ $genero->nombre }}
                </label>
                @endforeach
            </fieldset>

            <button type="submit" class="mt-3 btn btn-primary">Guardar</button>

        </div>

    </form>

</x-layout>