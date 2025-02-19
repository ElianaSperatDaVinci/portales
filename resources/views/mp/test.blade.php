<x-layout>
    <x-slot:title>Prueba de Integración con Mercado Pago</x-slot>

    <div class="container">
        <h2 class="display-4 text-center">Prueba de Integración con Mercado Pago</h2>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    </tr>
            </thead>
            <tbody>
                @foreach ($discos as $disco)
                    <tr>
                        <td>{{ $disco->nombre }}</td>
                        <td>${{ $disco->precio }}</td>
                        <td>1</td>
                        <td>${{ $disco->precio }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"><b>TOTAL</b></td>
                    <td>${{ $discos->sum('precio') }}</td>
                </tr>
            </tbody>
        </table>
        <div id="mercadopago-button"></div>
    </div>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>        
        const mp = new MercadoPago('<?= $mpPublicKey;?>');
        mp.bricks().create('wallet', 'mercadopago-button', {
            initialization: {
                preferenceId: '<?= $preference->id;?>'
            },
            customization: {
                texts: {
                    valueProp: 'smart_option',
                },
            },
        });
    </script>
</x-layout>
