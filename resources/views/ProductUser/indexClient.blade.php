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
    <div class="py-12">
        <div class="container mx-auto px-4">
            <div class="bg-white dark:bg-gray-800">
                <div class="p-6">
                    <h2 class="font-semibold text-xl mb-4">Productos</h2>
                    <p class="mb-4"><strong>* Los productos que añadas a tu compra, apareceran en la pestaña "carrito" de la parte superior.</strong></p>
                    <div class="mb-4">
                        <input id="searchInput" type="text" placeholder="Buscar..." class="form-control">
                    </div>
                    <div class="mb-4">
                        <button id="toggleProductsButton" class="btn btn-primary">Ocultar Productos</button>
                    </div>

                    @if(count($products) > 0)
                        <div id="productsTableContainer">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table" id="productsTable">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Image</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Description</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Price</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                                        @foreach($products as $product)
                                            @if($product->product_name != 'Vacuna contra la Rabia' && $product->product_name != 'Vacunas Perros' && $product->product_name != 'Vacunas Gatos')
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        @if($product->img)
                                                            <img src="{{ asset('storage/product_images/' . $product->img) }}" style="max-width: 80px; max-height: 80px;" alt="imagen" class="cursor-pointer" onclick="openModal('{{ asset('storage/product_images/' . $product->img) }}')">
                                                        @else
                                                            No hay imagen
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">{{ $product->product_name }}</td>
                                                    <td class="px-6 py-4">{{ $product->descripcion }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">${{ $product->product_price }}</td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <form action="{{ route('cart.add', $product) }}" method="POST">
                                                            @csrf
                                                            <button class="btn btn-info" type="submit">Añadir al carrito</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500 dark:text-gray-400">No hay productos disponibles.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="container mx-auto px-4">
            <div class="bg-white dark:bg-gray-800">
                <div class="p-6">
                    <h2 class="font-semibold text-xl mb-4">Vacunas</h2>
                    <div class="mb-4">
                        <input id="searchInputVacunas" type="text" placeholder="Buscar..." class="form-control">
                    </div>
                    <div class="mb-4">
                        <button id="toggleVaccinationsButton" class="btn btn-primary">Mostrar Vacunas</button>
                    </div>

                    @if(count($vacunas) > 0)
                        <div id="vaccinationsTableContainer">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table" id="vaccinationsTable">
                                        <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Name</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Description</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Price</th>
                                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
                                        @foreach($vacunas as $vacuna)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $vacuna->nombre }}</td>
                                                <td class="px-6 py-4">{{ $vacuna->descripcion }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">${{ $vacuna->precio }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <form action="{{ route('cart.add', ['product' => $vacuna->producto_id]) }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-info" type="submit">Añadir al carrito</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500 dark:text-gray-400">No hay vacunas disponibles.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div id="imageModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img id="modalImage" class="modal-content" src="" alt="imagen">
    </div>
@endsection

@section('scripts')
    <script>
        function openModal(imageSrc) {
            var modal = document.getElementById('imageModal');
            var modalImg = document.getElementById('modalImage');
            modal.style.display = "block";
            modalImg.src = imageSrc;
        }

        function closeModal() {
            var modal = document.getElementById('imageModal');
            modal.style.display = "none";
        }

        const searchInput = document.getElementById('searchInput');
        const items = document.querySelectorAll('#productsTable tbody tr');

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();

            items.forEach(item => {
                const nombre = item.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const descripcion = item.querySelector('td:nth-child(3)').textContent.toLowerCase();

                if (nombre.includes(searchTerm) || descripcion.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        const searchInputVacunas = document.getElementById('searchInputVacunas');
        const itemsVacunas = document.querySelectorAll('#vaccinationsTable tbody tr');

        searchInputVacunas.addEventListener('input', function() {
            const searchTerm = searchInputVacunas.value.toLowerCase();

            itemsVacunas.forEach(item => {
                const nombre = item.querySelector('td:nth-child(1)').textContent.toLowerCase();
                const descripcion = item.querySelector('td:nth-child(2)').textContent.toLowerCase();

                if (nombre.includes(searchTerm) || descripcion.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        const toggleProductsButton = document.getElementById('toggleProductsButton');
        const toggleVaccinationsButton = document.getElementById('toggleVaccinationsButton');
        const productsTableContainer = document.getElementById('productsTableContainer');
        const vaccinationsTableContainer = document.getElementById('vaccinationsTableContainer');

        toggleProductsButton.addEventListener('click', function() {
            if (productsTableContainer.style.display === 'none') {
                productsTableContainer.style.display = 'block';
                toggleProductsButton.textContent = 'Ocultar Productos';
            } else {
                productsTableContainer.style.display = 'none';
                toggleProductsButton.textContent = 'Mostrar Productos';
            }
        });

        toggleVaccinationsButton.addEventListener('click', function() {
            if (vaccinationsTableContainer.style.display === 'none') {
                vaccinationsTableContainer.style.display = 'block';
                toggleVaccinationsButton.textContent = 'Ocultar Vacunas';
            } else {
                vaccinationsTableContainer.style.display = 'none';
                toggleVaccinationsButton.textContent = 'Mostrar Vacunas';
            }
        });
    </script>
@endsection
