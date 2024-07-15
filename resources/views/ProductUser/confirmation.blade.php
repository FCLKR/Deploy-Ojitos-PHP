@extends('layouts.newlayout')

@section('content')
    <div class="container">
        <h1>Confirmación de orden</h1>
        <p>Gracias por tu orden!</p>
        <h2 class="mt-4 text-2xl font-bold">Detalles de la orden</h2>
        <p>Número de la orden: {{ $order->idfactura }}</p>
        <p>Método de pago: {{ $order->metodoPago }}</p>
        <table class="table table-striped table-bordered mt-4">
            <thead class="thead-dark">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($order->facturaDetails as $item)
                <tr>
                    <td>{{ $item->descriptionF }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ $item->products_totals / $item->quantity }}</td>
                    <td>${{ $item->products_totals }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3" class="text-right"><strong>Total:</strong></td>
                <td>${{ $order->total_factura }}</td>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
