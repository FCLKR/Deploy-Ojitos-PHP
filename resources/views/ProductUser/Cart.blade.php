<style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 2%;
    }

    th, td {
        border: 1px solid #000;
        padding: 8px;
        text-align: center;
        color: #ffffff;
        background-color: #062c33;
    }

    th {
        background-color: #644494;
        font-weight: bold;
        color: #ffffff;
    }

    .remove-button {
        background-color: #ff4d4d;
        color: #ffffff;
        padding: 5px 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .remove-button:hover {
        background-color: #ff2222;
    }

    .checkout-button {
        background-color: #4caf50;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        text-decoration: none;
    }

    .checkout-button:hover {
        background-color: #45a049;
    }
</style>

@extends('layouts.newlayout')

@section('content')
    <div class="container">
        <h2>Carrito de compras</h2>
        @if(session('cart'))
            <table class="table">
                <thead>
                <tr>
                    <th  scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Producto</th>
                    <th  scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Cantidad</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Precio</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Subtotal</th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach(session('cart') as $id => $details)
                    <tr>
                        <td>{{ $details['product_name'] }}</td>
                        <td>
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity" data-id="{{ $id }}" />
                        </td>
                        <td>${{ $details['product_price'] }}</td>
                        <td>${{ $details['product_price'] * $details['quantity'] }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $id }}">Quitar</button>
                        </td>
                    </tr>
                    <div id="confirmationModal" class="modal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirmación de Checkout</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>¿Estás seguro de que deseas proceder con el checkout?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="button" class="btn btn-success" id="confirmCheckoutButton">Confirmar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
            <br>
            <a href="{{ route('checkout.form') }}" id="checkoutButton" class="btn btn-success">Finalizar comprar</a>
        @else
            <p>Tu carrito está vacio.</p>
        @endif
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.quantity').on('change', function (e) {
                e.preventDefault();
                var ele = $(this);
                var quantity = ele.val();
                $.ajax({
                    url: '{{ route('cart.update') }}',
                    method: "PATCH",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id"),
                        quantity: quantity
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            });
            $(document).ready(function () {
                // ...

                $('#checkoutButton').on('click', function (e) {
                    e.preventDefault();
                    $('#confirmationModal').modal('show');
                });

                $('#confirmCheckoutButton').on('click', function () {
                    window.location.href = "{{ route('checkout.form') }}";
                });
            });
            $('.remove-from-cart').on('click', function (e) {
                e.preventDefault();
                var ele = $(this);
                if (confirm("¿Seguro que quieres quitar este item?")) {
                    $.ajax({
                        url: '{{ route('cart.remove') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: ele.attr("data-id")
                        },
                        success: function (response) {
                            window.location.reload();
                        }
                    });
                }
            });
        });
    </script>
@endsection
