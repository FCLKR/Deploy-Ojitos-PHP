@extends('layouts.newlayout')

@section('content')
<style>

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
        background-color: rgba(0,0,0,0.9);
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
    .obs{
        width: 15%;
    }
    .esp{
        width: 3%;
    }
    th {
        background-color:  #644494 ; /* Fondo gris oscuro para los títulos */
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
    .updated_at{
        font-size: 70%;
        text-align: left;
    }
    .fecha{
        font-size: 70%;
        text-align: center;
    }
</style>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">{{ __('Registrar un nuevo Animal') }}</h2>
                <button class="btn btn-primary mb-3" id="toggleFormButton">Registrar Ahora</button>
            </div>
        </div>

        <div id="formContainer" style="display: none;">
            <form method="POST" action="{{route('AdopcionAdmin.index')}}" id="miFormulario" onsubmit="return validarFormulario()" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="fechaEncuentro" class="form-label">{{ __('¿Cuando se encontro') }}</label>
                    <input type="date" id="fechaEncuentro" class="form-control" name="fechaEncuentro" min="{{ date('Y-m-d') }}" autofocus autocomplete="fechaEncuentro">
                    @error('fechaEncuentro')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="especie_Animal" class="form-label">{{ __('Especifique la especie') }}</label>
                    <select id="especie_Animal" class="form-select" name="especie_Animal">
                        <option value="">Selecciona una opción</option>
                        <option value="Perro">Perro</option>
                        <option value="Gato">Gato</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nombreAnimaladopocion" class="form-label">{{ __('Nombre asignado') }}</label>
                    <input type="text" id="nombreAnimaladopocion" class="form-control" name="nombreAnimaladopocion" value="{{ old('name') }}" required autofocus autocomplete="nombreAnimaladopocion" pattern="[a-zA-Z\s]+" title="Por favor, ingrese solo letras para el Nombre">
                    @error('nombreAnimaladopocion')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="raza" class="form-label">{{ __('¿Cual es la raza?') }}</label>
                    <input type="text" id="raza" class="form-control" name="raza" value="{{ old('name') }}" required autofocus autocomplete="raza" pattern="[a-zA-Z\s]+" title="Por favor, ingrese solo letras para la raza">
                    @error('raza')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="age" class="form-label">{{ __('¿Cual es la edad (meses)?') }}</label>
                    <input type="number" id="age" class="form-control" name="age" value="{{ old('age') }}" required autofocus autocomplete="raza" min="1" max="300">
                    @error('edad')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="observacionesAnimal" class="form-label">{{ __('Que observaciones') }}</label>
                    <input type="text" id="observacionesAnimal" class="form-control" name="observacionesAnimal" value="{{ old('name') }}" required autofocus autocomplete="observacionesAnimal">
                    @error('observacionesAnimal')
                    <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3" id="opcionesGato" style="display: none;">
                    <label for="vacunacionG" class="form-label">{{ __('Esquema de Vacunacion G') }}</label>
                    @foreach ($todasLasVacunas as $vacuna)
                        @if ($vacuna->especie === 'Gato')
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="vacunas[]" value="{{ $vacuna->id }}">
                                <label class="form-check-label" for="vacuna{{ $vacuna->id }}">
                                    {{ $vacuna->nombre }}
                                </label>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="mb-3" id="opcionesPerro" style="display: none;">
                    <label for="vacunacionP" class="form-label">{{ __('Esquema de Vacunacion P') }}</label>
                    @foreach ($todasLasVacunas as $vacuna)
                        @if ($vacuna->especie === 'Perro')
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="vacunas[]" value="{{ $vacuna->id }}">
                                <label class="form-check-label" for="vacuna{{ $vacuna->id }}">
                                    {{ $vacuna->nombre }}
                                </label>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="mb-3">
                    <label for="img" class="form-label">{{ __('Subir Imgen del animal') }}</label>
                    <input id="img" class="form-control" type="file" name="img">
                </div>

                <button type="submit" class="btn btn-primary">Ingresar Animal</button>
            </form>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">{{ __('Lista de animales en refugio') }}</h2>
                <button class="btn btn-primary mb-3" id="toggleButton">Ocultar Registros</button>
                <input type="text" id="searchInput" class="form-control mb-3" placeholder="Buscar...">
            </div>
        </div>

        <div id="tableContainer" style="display: block;">
            <table class="table" id="dataTable">
                <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Especie</th>
                    <th>Raza</th>
                    <th>Edad (Meses)</th>
                    <th>Observaciones</th>
                    <th>Actualizado</th>
                    <th>Estado Solicitud</th>
                </tr>
                </thead>
                <tbody>
                @foreach($animals as $animal)
                    <tr>
                        <td>
                            @if($animal->img)
                                <img src="{{ asset($animal->img) }}" style="max-width: 80px; max-height: 80px;" alt="imagen" onclick="openModal('{{ asset($animal->img) }}')">
                            @else
                                No hay imagen
                            @endif
                        </td>
                        <td>{{ $animal->nombreAnimaladopocion }}</td>
                        <td>{{ $animal->created_at }}</td>
                        <td>{{ $animal->especie_Animal }}</td>
                        <td>{{ $animal->raza }}</td>
                        <td>{{ $animal->age }}</td>
                        <td>{{ $animal->observacionesAnimal }}</td>
                        <td>
                            {{ $animal->updated_at }}
                            @if($animal->created_at != $animal->updated_at)
                                <small>&middot; {{ __('editado') }}</small>
                            @endif
                        </td>
                        <td>
                            {{ $animal->estadoSolicitud }}
                            @if($animal->estadoSolicitud != 'Solicitado')
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="{{ route('animals.edit', $animal->id) }}">Editar</a></li>
                                        <li>
                                            <form method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="dropdown-item" onclick="event.preventDefault(); openConfirmationDel('{{ route('Animals.delete', $animal->id) }}')">Eliminar</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- MODAL PARA IMAGEN -->
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

    <!-- Cuadro de confirmación Registro -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de realizar el registro?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="confirmAction()">Confirmar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Cuadro de confirmación Eliminar -->
    <div class="modal fade" id="confirmationModalDelete" tabindex="-1" aria-labelledby="confirmationModalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalDeleteLabel">Confirmación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro deseas eliminar?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="confirmActionDel()">Confirmar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        // Generar checkbox dependiendo del SELECT
        document.getElementById('especie_Animal').addEventListener('change', function() {
            var especie_Animal = this.value;
            var opcionesPerro = document.getElementById('opcionesPerro');
            var opcionesGato = document.getElementById('opcionesGato');

            if (especie_Animal === 'Perro') {
                opcionesPerro.style.display = 'block';
                opcionesGato.style.display = 'none';
            } else if (especie_Animal === 'Gato') {
                opcionesPerro.style.display = 'none';
                opcionesGato.style.display = 'block';
            } else {
                opcionesPerro.style.display = 'none';
                opcionesGato.style.display = 'none';
            }
        });

        function openModal(imageSrc) {
            var modal = new bootstrap.Modal(document.getElementById('imageModal'));
            var modalImg = document.getElementById('modalImage');
            modalImg.src = imageSrc;
            modal.show();
        }

        // Obtener el campo de fecha
        var fechaEncuentroInput = document.getElementById('fechaEncuentro');

        // Obtener la fecha actual
        var fechaActual = new Date().toISOString().split('T')[0];

        // Asignar la fecha actual al campo de fecha
        fechaEncuentroInput.value = fechaActual;

        var urlToDelete; // Variable global para almacenar la URL de eliminación

        // Función para mostrar el cuadro de confirmación de eliminación
        function openConfirmationDel(url) {
            urlToDelete = url; // Almacenar la URL de eliminación
            var modal = new bootstrap.Modal(document.getElementById('confirmationModalDelete'));
            modal.show();
        }

        // Función para confirmar la eliminación
        function confirmActionDel() {
            // Enviar una solicitud de eliminación al servidor
            fetch(urlToDelete, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            })
                .then(response => {
                    if (response.ok) {
                        // Vuelve a cargar la página
                        window.location.href = '{{ route('AdopcionAdmin.index') }}';
                    } else {
                        // Ocurrió un error durante la eliminación
                        // Aquí puedes manejar el error como desees
                    }
                })
                .catch(error => {
                    console.error('Error al eliminar el animal:', error);
                })
                .finally(() => {
                    // Cerrar el cuadro de confirmación después de confirmar la acción
                    closeConfirmationDel();
                    window.location.href = '{{ route('AdopcionAdmin.index') }}';
                });
        }
        // Función para cerrar el cuadro de confirmación
        function closeConfirmationDel() {
            document.getElementById('confirmationModalDelete').style.display = 'none';
        }

        function validarFormulario() {
            // Validar los campos del formulario
            // Por ejemplo, puedes verificar si los campos están llenos
            // Si los campos no están llenos, muestra un mensaje de error y devuelve false
            if (!document.getElementById('fechaEncuentro').value || !document.getElementById('especie_Animal').value || !document.getElementById('nombreAnimaladopocion').value || !document.getElementById('raza').value || !document.getElementById('observacionesAnimal').value) {
                alert("Por favor, complete todos los campos.");
                return false;
            }
            openConfirmation(document.getElementById('miFormulario'));
            // Devuelve false para evitar que el formulario se envíe automáticamente
            return false;
        }
        var formToSubmit
        // Función para mostrar el cuadro de confirmación y almacenar el formulario
        function openConfirmation(form) {
            formToSubmit = form; // Almacenar el formulario
            document.getElementById('confirmationModal').style.display = 'block';
        }

        // Función para cerrar el cuadro de confirmación
        function closeConfirmation() {
            document.getElementById('confirmationModal').style.display = 'none';
        }

        // Función para confirmar la acción y enviar el formulario
        function confirmAction() {
            // Aquí puedes agregar la lógica para realizar el registro
            formToSubmit.submit(); // Enviar el formulario almacenado
            // Cerrar el cuadro de confirmación después de confirmar la acción
            closeConfirmation();
        }

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

                for (let i = 1; i < rows.length; i++) { // Empezamos desde 1 para ignorar el encabezado
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

@endsection
