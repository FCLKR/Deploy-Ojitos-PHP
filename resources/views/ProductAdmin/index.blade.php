<style>
    .product-image {
        max-width: 80px;
        max-height: 80px;
        cursor: pointer;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
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
        max-width: 90%;
        max-height: 90%;
    }

    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 2%;
    }

    th, td {
        border: 1px solid #000;
        padding: 8px;
        width: 4%;
        text-align: center;
        color: #ffffff;
        background-color: #062c33;
    }

    .obs {
        width: 15%;
    }

    .esp {
        width: 3%;
    }

    th {
        background-color: #644494;
        font-weight: bold;
        color: #ffffff;
    }

    td:nth-child(4),
    td:nth-child(5) {
        width: 120px;
    }

    .updated_at {
        font-size: 70%;
        text-align: left;
    }

    .fecha {
        font-size: 70%;
        text-align: center;
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
    background-color: #1c2c34 ;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    }

    #confirmationBox h2{
    margin-top: 0;
    }

    #confirmationBox button {
    margin: 10px;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    }

    #confirmButton {
    background-color: green;
    color: white;
    }

    #cancelButton {
    background-color: red;
    color: white;
    }

    .con {
    color: #ffffff;
    }

    .parcon{
    color: #ffffff;

    }
    .animal-image {
         max-width: 80px;
         max-height: 80px;
         cursor: pointer;
     }

    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
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
        max-width: 90%;
        max-height: 90%;
    }

    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
</style>
@extends('layouts.newlayout')

@section('title', 'Gestión de Productos')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">{{ __('Registrar un nuevo Producto') }}</h2>
                        <button class="btn btn-primary mt-3" id="toggleFormButton">Registrar Ahora</button>
                    </div>
                    <div class="card-body" id="formContainer" style="display: none;">
                        <form method="POST" action="{{ route('ProductAdmin.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="product_name" class="form-label">{{ __('Nombre del producto') }}</label>
                                <input type="text" id="product_name" class="form-control" name="product_name" required autofocus>
                                @error('product_name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="product_price" class="form-label">{{ __('Precio del producto') }}</label>
                                <input type="number" id="product_price" class="form-control" name="product_price" required>
                                @error('product_price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">{{ __('Descripción del producto') }}</label>
                                <input type="text" id="descripcion" class="form-control" name="descripcion" required>
                                @error('descripcion')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="stock" class="form-label">{{ __('Stock del producto') }}</label>
                                <input type="number" id="stock" class="form-control" name="stock" required>
                                @error('stock')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">{{ __('Imagen del producto') }}</label>
                                <input type="file" id="img" class="form-control" name="img">
                            </div>
                            <button type="submit" class="btn btn-primary">Registrar Producto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">{{ __('Lista de Productos') }}</h2>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <button class="btn btn-primary" id="toggleButton">Ocultar Registros</button>
                            <input type="text" id="searchInput" class="form-control w-25" placeholder="Buscar...">
                        </div>
                    </div>
                    <div class="card-body" id="tableContainer">
                        <table class="table" id="dataTable">
                            <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Descripción</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>
                                        @if($product->img)
                                            <img src="{{ asset('storage/' . $product->img) }}" style="max-width: 80px; max-height: 80px;" alt="imagen" onclick="openModal('{{ asset('storage/' . $product->img) }}')">
                                        @else
                                            No hay imagen
                                        @endif
                                    </td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>${{ $product->product_price }}</td>
                                    <td>{{ $product->descripcion }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="actionDropdown{{ $product->id_product }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="actionDropdown{{ $product->id_product }}">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('products.edit', $product->id_product) }}">Editar</a>
                                                </li>
                                                <li>
                                                    <form method="POST" action="{{ route('products.destroy', $product->id_product) }}" id="deleteForm{{ $product->id_product }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="dropdown-item" onclick="openConfirmationDel({{ $product->id_product }})">Eliminar</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para imagen -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" class="img-fluid" src="" alt="imagen">
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación de eliminación -->
    <div class="modal fade" id="confirmationModalDelete" tabindex="-1" aria-labelledby="confirmationModalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalDeleteLabel">Confirmación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" onclick="confirmActionDel()">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        document.getElementById("toggleFormButton").addEventListener("click", function() {
            var formContainer = document.getElementById("formContainer");
            if (formContainer.style.display === "none") {
                formContainer.style.display = "block";
                this.textContent = "Cancelar registro";
            } else {
                formContainer.style.display = "none";
                this.textContent = "Registrar";
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('toggleButton');
            const searchInput = document.getElementById('searchInput');
            const dataTable = document.getElementById('dataTable');
            const rows = dataTable.getElementsByTagName('tr');

            toggleButton.addEventListener('click', function() {
                if (tableContainer.style.display === 'none') {
                    tableContainer.style.display = '';
                    this.textContent = "Ocultar Tabla";
                } else {
                    tableContainer.style.display = 'none';
                    this.textContent = "Mostrar Tabla";
                }
            });

            searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase();

                for (let i = 1; i < rows.length; i++) {
                    let found = false;

                    for (let j = 0; j < rows[i].cells.length; j++) {
                        const cellValue = rows[i].cells[j].textContent.toLowerCase();
                        if (cellValue.includes(searchTerm)) {
                            found = true;
                            break;
                        }
                    }

                    if (found) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            });
        });
    </script>
    <script>
        var productIdToDelete; // Variable global para almacenar el ID del producto a eliminar

        // Función para mostrar el cuadro de confirmación de eliminación
        function openConfirmationDel(productId) {
            productIdToDelete = productId; // Almacenar el ID del producto a eliminar
            document.getElementById('confirmationModalDelete').style.display = 'block';
        }

        // Función para confirmar la eliminación
        function confirmActionDel() {
            // Enviar el formulario de eliminación del producto
            document.getElementById('deleteForm' + productIdToDelete).submit();

            // Cerrar el cuadro de confirmación después de enviar el formulario
            closeConfirmationDel();
        }

        // Función para cerrar el cuadro de confirmación
        function closeConfirmationDel() {
            document.getElementById('confirmationModalDelete').style.display = 'none';
        }

        // Cerrar el cuadro de confirmación al hacer clic fuera de él
        window.onclick = function(event) {
            var modal = document.getElementById('confirmationModalDelete');
            if (event.target == modal) {
                closeConfirmationDel();
            }
        }
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

    </script>
@endsection

