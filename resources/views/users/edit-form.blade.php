<?php

/**
 * @var Illuminate\Support\ViewErrorBag $errores
 * @var \App\Models\User $usuarios
 * @var \App\Models\Role[]|Illuminate\Database\Eloquent\Collection $roles

 */
?>

<x-layout>
    <x-slot:title>Editar Usuario</x-slot:title>
    <h2>Editar {{ $usuario->name }}</h2>

    <form action="{{ route('users.edit.process', ['id' =>  $usuario->id]) }}" method="post">

        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" id="name" name="name" class="form-control" @error('name') aria-describedby="error-name" @enderror value="{{ old('name', $usuario->name) }}">
            @error('nombre')
            <div class="text-danger" id="error-name">{{ $message }}</div>
            @enderror

            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" @error('error_email') aria-describedby="error-email" @enderror value="{{ old('email', $usuario->email) }}">
            @error('email')
            <div class="text-danger" id="error-email">{{ $message }}</div>
            @enderror

            <label for="role_fk" class="form-label">Rol</label>
            <select
                id="role_fk"
                name="role_fk"
                class="form-select"
                @error('role_fk') aria-label="error-role_fk" @enderror
            >
                @foreach($roles as $role)
                <option 
                    value="{{ $role->role_id }}"
                    @selected(old('role_fk', $usuario->role_fk) == $role->role_id)
                >
                    {{ $role->name }}
                </option>
                @endforeach
            </select>

            <button type="submit" class="mt-3 btn btn-primary">Guardar</button>
        </div>

    </form>
</x-layout>