<?php
/** @var \App\Models\Disco[]|Illuminate\Database\Eloquent\Collection $discos */
?>

<x-layout>
    <x-slot:title>Discos</x-slot:title>
    <h2>Todos los discos de Taylor Swift</h2>
    
    @if($discos->isNotEmpty())
    
    <div class="container">
        @auth
        <div class="mb-3">
            <a href="{{ route('discos.create.form') }}">Cargar Disco</a>
        </div>
        
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Lanzamiento</th>
                    <th>Precio</th>
                    <th>Género</th>
                    <th>Duración</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($discos as $disco)
                    <tr>
                        <td>{{ $disco->discos_id }}</td>
                        <td>{{ $disco->nombre }}</td>
                        <td>{{ $disco->lanzamiento }}</td>
                        <td>${{ $disco->precio }}</td>
                        <td>
                            @forelse($disco->generos as $genero)
                                <div class="badge bg-secondary">{{ $genero->nombre }}</div>
                            @empty
                                <i>Sin género</i>
                            @endforelse
                        </td>
                        <td>{{ $disco->duracion }} minutos</td>
                        <td>
                            <a href="{{ route('discos.view', ['id'=> $disco->discos_id]) }}" class="btn btn-primary">Ver</a>
                            <a href="{{ route('discos.edit.form', ['id'=> $disco->discos_id]) }}" class="btn btn-secondary">Editar</a>
                            <a href="{{ route('discos.delete.form', ['id'=> $disco->discos_id]) }}" class="btn btn-danger">Eliminar</a>
                            
                            <form class="ms-2 d-inline" action="{{ route('discos.reserve', ['id'=> $disco->discos_id]) }}" method="post">
                                @csrf
                                <button class="btn btn-warning">Reservar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endauth

        @guest
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($discos as $disco)
                <div class="col">
                    <div class="card h-100">
                        @if ($disco->imagen_portada !== null && \Storage::exists($disco->imagen_portada))
                            <img src="{{ \Storage::url($disco->imagen_portada) }}" alt="Portada de {{ $disco->nombre }}" class="card-img-top img-fluid w-100">
                        @else
                            <img src="{{ url('img/sin-imagen.jpeg') }}" alt="Disco sin portada" class="card-img-top img-fluid w-100">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $disco->nombre }}</h5>
                            <p class="card-text">
                                <strong>ID:</strong> {{ $disco->discos_id }}<br>
                                <strong>Lanzamiento:</strong> {{ $disco->lanzamiento }}<br>
                                <strong>Precio:</strong> ${{ $disco->precio }}<br>
                                <strong>Género:</strong>
                                @forelse($disco->generos as $genero)
                                    <div class="badge bg-secondary">{{ $genero->nombre }}</div>
                                @empty
                                    <i>Sin género</i>
                                @endforelse
                                <br>
                                <strong>Duración:</strong> {{ $disco->duracion }} minutos
                            </p>
                            <a href="{{ route('discos.view', ['id'=> $disco->discos_id]) }}" class="btn btn-primary">Ver</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @endguest

    </div>
    
    @else
    <p>No hay discos cargados. @auth Empezá por <a href="{{ route('discos.create.form') }}">agregar uno nuevo</a>@endauth.</p>

    @endif

</x-layout>
