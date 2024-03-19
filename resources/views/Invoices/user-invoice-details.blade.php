<style>

    .custom-button {
        background-color: #F1883A;
        color: #FFFFFF; /* Letra clara para mayor legibilidad */
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        font-size: 17px;
        cursor: pointer;
        margin-top: 12%;
        font-style: normal;
        font-weight: bold;
    }

    .custom-button:hover {
        background-color: #D36C08; /* Cambio de color al pasar el ratón */
    }


    /* Estilos para el contenedor */
    .select-container {
        background: linear-gradient(to bottom, #202838, #202838); /* Fondo entre azul y gris oscuro */
        border: 2px solid #4e56ee; /* Borde morado */
        border-radius: 5px; /* Borde redondeado */
        padding: 6px; /* Espacio interno */
        width: 40%; /* Ancho completo */
    }

    /* Estilos para el select */
    .select-container select {
        width: 100%; /* Ancho completo */
        padding: 6px; /* Espacio interno */
        border: none; /* Sin borde */
        outline: none; /* Sin contorno */
        background: none; /* Fondo transparente */
        color: white; /* Color del texto */
        appearance: none; /* Eliminar apariencia nativa del select */
        cursor: pointer; /* Cursor de selección */
    }

    /* Estilos para las opciones del select */
    .select-container select option {
        background: #34495e; /* Fondo */
        color: white; /* Color del texto */
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        padding-top: 50px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-content {
        margin: auto;
        display: block;
        max-width: 80%;
        max-height: 80%;
    }

    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #fff;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    #confirmationModalDelete {
        display: none;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.93);
    }

    #confirmationModal {
        display: none;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.93);
    }

    #confirmationBox {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #1c2c34;
        padding: 20px;
        border-radius: 10px;
        text-align: center;
    }

    #confirmationBox h2 {
        margin-top: 0;
    }

    #confirmationBox button {
        margin: 10px;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    #cancelButton {
        background-color: red;
        color: white;
    }

    .con {
        color: #ffffff;
    }

    .parcon {
        color: #ffffff;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 2%;

    }

    th, td {
        border: 1px solid #000; /* Borde de columnas */
        padding: 8px;
        width: 4%;
        text-align: center;
        color: #ffffff; /* Letra blanca */
        background-color: #062c33;
    }

    .obs {
        width: 15%;
    }

    .esp {
        width: 3%;
    }

    th {
        background-color: #644494; /* Fondo gris oscuro para los títulos */
        font-weight: bold; /* Títulos en negrilla */
        color: #ffffff;
    }

    td:nth-child(4), /* Columna de "Creado en" */
    td:nth-child(5) { /* Columna de "Actualizado en" */
        width: 120px; /* Columnas más estrechas */

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }


    }

    .updated_at {
        font-size: 70%;
        text-align: left;
    }

    .fecha {
        font-size: 70%;
        text-align: center;
    }
</style>
@extends('layouts.newlayout')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">Información de la Factura</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>Fecha:</th>
                                <td>{{ $factura->fecha_factura }}</td>
                            </tr>
                            <tr>
                                <th>Especificación:</th>
                                <td>{{ $factura->especificacion }}</td>
                            </tr>
                            <tr>
                                <th>Método de Pago:</th>
                                <td>{{ $factura->metodoPago }}</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>${{ $factura->total_factura }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h2 class="mb-0">Detalles de los Productos</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Producto</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Cantidad</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Precio Unitario</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">IVA</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($factura->facturaDetails as $detalle)
                                @if($detalle->product->id_product === 15029 || $detalle->product->id_product === 15030)
                                    @php
                                        $productoVacuna = $detalle->product->productoVacunas->first();
                                    @endphp
                                    @if($productoVacuna)
                                        <tr>
                                            <td>{{ $productoVacuna->vacuna->nombre }}</td>
                                            <td>{{ $detalle->quantity }}</td>
                                            <td>${{ $productoVacuna->price }}</td>
                                            <td>${{ $detalle->iva }}</td>
                                        </tr>
                                    @endif
                                @else
                                    <tr>
                                        <td>{{ $detalle->product->product_name }}</td>
                                        <td>{{ $detalle->quantity }}</td>
                                        <td>${{ $detalle->product->product_price }}</td>
                                        <td>${{ $detalle->iva }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
