<x-layout>
    <x-slot:title>Inicio</x-slot>

    <div class="container">
        <h2 class="display-4 text-center">Taylor Swift Fanpage</h2>
        <p class="lead text-center">Enterate de las últimas noticias y novedades sobre Taylor Swift, así como información sobre sus discos y mucho más.</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 class="mt-4">Últimas Noticias</h3>
                <p>¡No te pierdas las últimas noticias y novedades sobre Taylor Swift!</p>
                <a href="{{ route('blog.index') }}">Ver Noticias</a>
            </div>
            <div class="col-md-6">
                <h3 class="mt-4">Discos de Taylor Swift</h3>
                <p>Descubrí la discografía completa de Taylor Swift y encontrá información sobre sus álbumes.</p>
                <a href="{{ route('discos.index') }}">Ver Discos</a>
            </div>
        </div>
    </div>
</x-layout>
