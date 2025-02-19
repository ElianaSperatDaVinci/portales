<div class="row">
    <div class="col-md-4">
        <div class="mb-3">
            <dt class="mb-2">Portada</dt>
            @if ($disco->imagen_portada !== null && \Storage::exists($disco->imagen_portada))
                <img src="{{ \Storage::url($disco->imagen_portada) }}" alt="Portada de {{ $disco->nombre }}" class="img-fluid">
            @else
            <img src="{{ url('img/sin-imagen.jpeg') }}" alt="Disco sin portada">
                <p>Este disco no tiene una portada.</p>
            @endif
        </div>
    </div>
    <div class="col-md-8">
        <dl>
            <dt>Lanzamiento</dt>
            <dd>{{ $disco->lanzamiento }}</dd>
            <dt>Precio</dt>
            <dd>$ {{ $disco->precio }}</dd>
            <dt>Género</dt>
            <dd>
                @forelse($disco->generos as $genero)
                    <div class="badge bg-secondary">{{ $genero->nombre }}</div>
                @empty
                    <i>Sin género</i>
                @endforelse
            </dd>
            <dt>Duración</dt>
            <dd>{{ $disco->duracion }}</dd>
            <dt>Cantidad de Canciones</dt>
            <dd>{{ $disco->cantidad_canciones }}</dd>
        </dl>
    </div>
</div>
