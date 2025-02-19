<dl>
    <dt>Rol</dt>
    <dd>{{ $usuario->role->name }}</dd>
    <dt>Email</dt>
    <dd>{{ $usuario->email }}</dd>
    <dt>Reservas</dt>
    <dd>
        @if($usuario->reservas->isNotEmpty())
            <div class="row">
                @foreach($usuario->reservas as $reserva)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title h5">{{ $reserva->disco->nombre }}</h3>
                                <p class="card-text">Fecha de reserva: {{ $reserva->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>El usuario no tiene reservas.</p>
        @endif
    </dd>
</dl>
