<?php

/**
 * @var Illuminate\Support\ViewErrorBag $errores
 * @var \App\Models\User $usuarios
 * @var \App\Models\Role[]|Illuminate\Database\Eloquent\Collection $roles

 */
?>

<x-layout>
    <x-slot:title>Crear Usuario</x-slot:title>
    <h2>Crear Usuario</h2>

    <form action="{{ route('users.create.process') }}" method="post">

        @csrf

        <div class="mb-3">

        <label for="name" class="form-label">Nombre Completo</label>
            <input
                type="text"
                id="name"
                name="name"
                class="form-control"
                @error('name') aria-describedby="error-name" @enderror value="{{ old('name') }}"
            >
            @error('name')
            <div class="text-danger" id="error-name">{{ $message }}</div>
            @enderror

            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                @error('email') aria-describedby="error-email" @enderror value="{{ old('email') }}"
            >
            @error('email')
            <div class="text-danger" id="error-email">{{ $message }}</div>
            @enderror

            <label for="password" class="form-label">Contraseña</label>
            <input
                type="password"
                id="password"
                name="password"
                class="form-control"
                @error('password') aria-describedby="error-password" @enderror value="{{ old('password') }}"
            >
            @error('password')
            <div class="text-danger" id="error-password">{{ $message }}</div>
            @enderror

            <label for="role_fk" class="form-label">Rol</label>
            <select
                id="role_fk"
                name="role_fk"
                class="form-select"
                @error('role_fk') aria-label="error-role_fk" @enderror
            >
                @foreach($roles as $role)
                <option value="{{ $role->role_id }}">
                    {{ $role->name }}
                </option>
                @endforeach
            </select>

            <button type="submit" class="mt-3 btn btn-primary">Guardar</button>
        </div>

    </form>
</x-layout>