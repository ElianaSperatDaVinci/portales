<x-layout>
    <x-slot:title>Registrarse</x-slot:title>

    <section>
        <h2>Registrarse</h2>

        <form action="{{ route('auth.login.process') }}" method="post">
            @csrf
            <div class="class mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control"
                >
            </div>
            <div class="class mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control"
                >
            </div>
            <div class="class mb-3">
                <label for="confirm-password" class="form-label">Repetir Contraseña</label>
                <input
                    type="password"
                    id="confirm-password"
                    name="confirm-password"
                    class="form-control"
                >
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </section>

</x-layout>