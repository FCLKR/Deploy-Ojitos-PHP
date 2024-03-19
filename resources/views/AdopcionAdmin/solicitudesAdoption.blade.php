<style>
/*MODAL TEMPORAL ESTILOS*/
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.59);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        color: #fefefe;
    }

    .loading-message {
        background-color: #1a282f;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }

    .spinner {
        border: 4px solid #f3f3f3;
        border-top: 4px solid #694393;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
        margin: 10px auto;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

/* FIN MODAL TEMPORAL*/

    .modal-buttonsc button {
        padding: 10px 20px;
        margin-right: 0px;
        cursor: pointer;
        padding: 0%;
        color: white;
        background-color:#3269c2;
        text-align: center; /* Centrar botón */
        margin-top: 20px;
    }

    #cancelBtnc {
        margin-top: 25px; /* Agregar espacio entre el texto y el botón */
        cursor: pointer;
        padding: 4%;
        color: white;
        background-color:#3269c2;
        text-align: center;
    }

    /* *****FIN MODAL***** */

    .SinfoButtonUsuario {
        background-color:    #3269c2  ;
        color: white;
        padding: 3%;
        width:100%;
    }


    .modal-container-botons{
        margin-top: 10%;
    }
    .modal-boton2{
        margin-top: 5%;
    }

    .modal-boton1{
        margin-top: 5%;

    }
    .modal-info-container {
        display: flex;
    }

    .modal-column {
        flex: 1;
        padding: 0 20px; /* Ajusta el espaciado entre las columnas según sea necesario */
    }

    .modal-column img {
        max-width: 100%;
        height: auto;
    }

    /* Estilo del modal */
    .modaldes {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.9);
    }

    /* Estilo del contenido del modal */
    .modal-contentdes {
        background-color: #1a282f;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 60%;
        height: auto;
    }

    /* Estilo del botón de cerrar */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    /* Estilo del botón de cerrar al pasar el mouse */
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    .modal-info-container {
        display: flex;
        justify-content: space-between;
    }

    .modal-column {
        flex: 1;
        padding: 0 10px;
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

    .probabilidad{
        font-size: 600%;
    }

    .Inf{
        font-size: 115%;
        font-weight: bold;
        margin-top: 4%;
        margin-bottom: 3.5%;
        font-family: 'Roboto Slab', serif;
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

    #confirmationModalConcluir, #confirmationModalRechazar,  #confirmationModalAprobar{
        display: none;
        position: fixed;
        z-index: 1000;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
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

    #succesButton, #succesRButton, #succesAButton {
        background-color: #198f1b;
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
        width: 8%;
    }
    .esp{
        width: 3%;
    }
    th {
        background-color:  #0056b3 ; /* Fondo gris oscuro para los títulos */
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
    .statusrequest{
        font-size: 90%;
        text-align: left;
    }
    .fecha{
        font-size: 70%;
        text-align: center;
    }



</style>
@extends('layouts.newlayout')

@section('title', 'Gestion Adopcion')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="mb-0">{{ __('Solicitudes de Adopcion') }}</h2>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <button class="btn btn-primary" id="toggleButton">Ocultar Tabla</button>
                            <label for="buscar"></label><input type="text" id="buscar" class="form-control" placeholder="Buscar...">
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="tableContainer">
                            <table id="dataTable" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Fecha solicitud</th>
                                    <th>Especie</th>
                                    <th>Raza</th>
                                    <th>Edad (Meses)</th>
                                    <th>Requerido por:</th>
                                    <th># Documento</th>
                                    <th>Probabilidad</th>
                                    <th>Estado Solicitud</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($adopciones as $adopcion)
                                    <tr>
                                        <td>
                                            @if($adopcion->animals->img)
                                                <img src="{{ asset($adopcion->animals->img) }}" style="max-width: 80px; max-height: 80px;" alt="imagen" onclick="openModal('{{ asset($adopcion->animals->img) }}')">
                                            @else
                                                No hay imagen
                                            @endif
                                        </td>
                                        <td>{{ $adopcion->animals->nombreAnimaladopocion }}</td>
                                        <td>{{ $adopcion->created_at }}</td>
                                        <td>{{ $adopcion->animals->especie_Animal }}</td>
                                        <td>{{ $adopcion->animals->raza }}</td>
                                        <td>{{ $adopcion->animals->age }}</td>
                                        <td>{{ $adopcion->users->name }}</td>
                                        <td>{{ $adopcion->users->document }}</td>
                                        <td>{{ $adopcion->probabilidad }}%</td>
                                        <td>
                                            {{ $adopcion->adoption_status }}
                                            @if($adopcion->created_at != $adopcion->updated_at)
                                                <small class="text-muted">&middot; {{ __('Actualizado') }}</small>
                                            @endif
                                            @if($adopcion->adoption_status != "Adoptado")
                                                <button class="btn btn-primary mt-2" onclick="openInfoModal('{{ $adopcion->id_animaladopcion }}')">
                                                    @if($adopcion->adoption_status == "En proceso")
                                                        Gestionar
                                                    @else
                                                        Ver
                                                    @endif
                                                </button>
                                            @endif

                                            <!-- Modal para información -->
                                            <div id="infoModal{{ $adopcion->id_animaladopcion }}" class="modal fade" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">N° Registro: {{ $adopcion->id_animaladopcion }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <img src="{{ $adopcion->animals->img }}" style="max-width: 100%; max-height: 200px;" alt="imagen">
                                                                    <h6 class="mt-3">Información adicional del animal</h6>
                                                                    <p>Nombre: {{ $adopcion->animals->nombreAnimaladopocion }}</p>
                                                                    <p>Especie: {{ $adopcion->animals->especie_Animal }}</p>
                                                                    <p>Raza: {{ $adopcion->animals->raza }}</p>
                                                                    <p>Edad (meses): {{ $adopcion->animals->age }}</p>
                                                                    <p>Observaciones: {{ $adopcion->animals->observacionesAnimal }}</p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h6>Probabilidad de adopción:</h6>
                                                                    <h3 class="text-center @if($adopcion->probabilidad < 40) text-danger @elseif($adopcion->probabilidad >= 40 && $adopcion->probabilidad < 60) text-warning @elseif($adopcion->probabilidad >= 60 && $adopcion->probabilidad < 80) text-success @elseif($adopcion->probabilidad >= 80) text-primary @endif">{{ $adopcion->probabilidad }}%</h3>
                                                                    <h6 class="mt-3">Información adicional del solicitante</h6>
                                                                    <p>Nombre: {{ $adopcion->users->name }} {{ $adopcion->users->lastname }}</p>
                                                                    <p>Identificación: {{ $adopcion->users->document }}</p>
                                                                    <p>Edad: {{ $adopcion->users->age }} años</p>
                                                                    <p>E-mail: {{ $adopcion->users->email }}</p>
                                                                    <p>Se unió a Ojitos: {{ $adopcion->users->created_at }}</p>
                                                                    <p>Motivo de adopción: {{ $adopcion->motivo }}</p>
                                                                    <a href="{{ route('admin.descargar-documento', ['userDocument' => $adopcion->id_animaladopcion]) }}" class="btn btn-primary">Ver documento</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form id="rechazarForm{{ $adopcion->id_animaladopcion }}" action="{{ route('AdopcionAdmin.rechazarAdopcion') }}" method="POST" style="display: none;">
                                                                @csrf
                                                                <input type="hidden" name="animal_id" value="{{ $adopcion->id_animaladopcion }}">
                                                            </form>
                                                            <button type="button" class="btn btn-danger" onclick="rechazarAdopcion('{{ $adopcion->id_animaladopcion }}')">
                                                                @if($adopcion->adoption_status == "En proceso")
                                                                    Rechazar
                                                                @else
                                                                    Cancelar Proceso
                                                                @endif
                                                            </button>

                                                            <form id="aprobarForm{{ $adopcion->id_animaladopcion }}" action="{{ route('AdopcionAdmin.aprobacion') }}" method="POST" style="display: none;">
                                                                @csrf
                                                                <input type="hidden" name="animal_id" value="{{ $adopcion->id_animaladopcion }}">
                                                            </form>

                                                                @if($adopcion->adoption_status == "P. Entrega")
                                                                <form id="concluirForm{{ $adopcion->id_animaladopcion }}" action="{{ route('AdopcionAdmin.conclusionAdopcion') }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                    <input type="hidden" name="animal_id" value="{{ $adopcion->id_animaladopcion }}">
                                                                </form>
                                                                <button type="button" class="btn btn-success" onclick="concluirAdopcion('{{ $adopcion->id_animaladopcion }}')">Terminar</button>
                                                            @elseif($adopcion->adoption_status != "P. Vacuna")
                                                                <button type="button" class="btn btn-primary" onclick="aprobacionAdopcion('{{ $adopcion->id_animaladopcion }}')">Aprobar</button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
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
    </div>

    <!-- Modal de carga -->
    <div id="loadingOverlay" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Procesando actualización...</p>
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación de correo -->
    <div id="myModalc" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Estamos enviando información a tu correo...</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación de conclusión -->
    <div id="confirmationModalConcluir" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Han recogido al Animal?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="succesButton">Confirmar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación de rechazo -->
    <div id="confirmationModalRechazar" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Seguro de rechazar el proceso?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="succesRButton">Confirmar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación de aprobación -->
    <div id="confirmationModalAprobar" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea dar continuidad?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="succesAButton">Confirmar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para imagen -->
    <div id="imageModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
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
@endsection

@section('scripts')
    <script>
        //**MODAL TEMPORAL ENTRE PROCESOS
        function showLoading() {
            document.getElementById("loadingOverlay").style.display = "flex";
            document.getElementById("confirmationModalConcluir").style.display = "none";


            // Simular un proceso que tarda 3 segundos
            setTimeout(function() {
                document.getElementById("loadingOverlay").style.display = "none";
            }, 10000);
        }

        //**FIN DE MODAL TEMPORAL

        //*****Aprobacion de adopcion******
        function aprobarAdopcion(adopcionId) {
            document.getElementById('aprobarForm' + adopcionId).submit();
        }
        //****FIN APROBACION**********


        //*****APROBACION de adopcion******
        function confirmActionApr(formId) {
            // Submit the form associated with the provided ID
            document.getElementById(formId).submit();
        }
        function aprobacionAdopcion(adopcionId) {
            // Almacenamos el ID del formulario en una variable
            var formId = 'aprobarForm' + adopcionId;
            // Mostramos el modal de confirmación

            document.getElementById('infoModal' + adopcionId).style.display = 'none';
            document.getElementById('confirmationModalAprobar').style.display = 'block';
            // Asignamos un event listener al botón de confirmar dentro del modal
            // Cuando se hace clic en el botón de confirmar, se activa la función confirmActionCon(formId) para enviar el formulario asociado con formId
            document.getElementById('succesAButton').onclick = function() {
                confirmActionRez(formId);
            };
        }
        function closeConfirmationApr() {
            document.getElementById('confirmationModalAprobar').style.display = 'none';
        }
        //****FIN APROBACION adopcion**********


        //*****RECHAZO de adopcion******
        function confirmActionRez(formId) {
            // Submit the form associated with the provided ID
            document.getElementById(formId).submit();
        }
        function rechazarAdopcion(adopcionId) {
            // Almacenamos el ID del formulario en una variable
            var formId = 'rechazarForm' + adopcionId;
            // Mostramos el modal de confirmación

            document.getElementById('infoModal' + adopcionId).style.display = 'none';
            document.getElementById('confirmationModalRechazar').style.display = 'block';
            // Asignamos un event listener al botón de confirmar dentro del modal
            // Cuando se hace clic en el botón de confirmar, se activa la función confirmActionCon(formId) para enviar el formulario asociado con formId
            document.getElementById('succesRButton').onclick = function() {
                confirmActionRez(formId)
                showLoading();
            };
        }
        function closeConfirmationRez() {
            document.getElementById('confirmationModalRechazar').style.display = 'none';
        }
        //****FIN RECHAZADOadopcion**********


        //*****concluision de adopcion******
        function confirmActionCon(formId) {
            // Submit the form associated with the provided ID
            document.getElementById(formId).submit();
        }
        function concluirAdopcion(adopcionId) {
            // Almacenamos el ID del formulario en una variable
            var formId = 'concluirForm' + adopcionId;
            // Mostramos el modal de confirmación

            document.getElementById('infoModal' + adopcionId).style.display = 'none';
            document.getElementById('confirmationModalConcluir').style.display = 'block';
            // Asignamos un event listener al botón de confirmar dentro del modal
            // Cuando se hace clic en el botón de confirmar, se activa la función confirmActionCon(formId) para enviar el formulario asociado con formId
            document.getElementById('succesButton').onclick = function() {
                confirmActionCon(formId);
            };
        }
        function closeConfirmationCon() {
            document.getElementById('confirmationModalConcluir').style.display = 'none';
        }
        //****FIN conclusion adopcion**********

        function enviarCorreo(animalId) {
            var form = document.getElementById('emailForm' + animalId);
            form.submit();
            openModalc()
            console.log()
        }

        //***************MODAL CONFIRMACION ENVIO DE CORREO******

        // Obtener elementos del DOM
        var modal = document.getElementById('myModalc');
        var openModalBtn = document.getElementById('openModalBtnc');
        var closeModalBtn = document.getElementsByClassName('closec')[0];
        var cancelBtn = document.getElementById('cancelBtnc');

        // Función para abrir el modal
        function openModalc() {
            modal.style.display = 'block';
        }

        /* Función para abrir el modal
        openModalBtn.onclick = function() {
            modal.style.display = 'block';
        }*/

        // Función para cerrar el modal al hacer click en la X
        closeModalBtn.onclick = function() {
            modal.style.display = 'none';
        }

        // Función para cerrar el modal al hacer click en el botón de cancelar
        cancelBtn.onclick = function() {
            modal.style.display = 'none';
        }

        // Función para cerrar el modal al hacer click fuera de él
        /*window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        }*/

        //*******FIN MODAL******************************
        function openInfoModal(animalId) {
            var modal = document.getElementById('infoModal' + animalId);
            modal.style.display = "block";
        }

        function closeInfoModal(animalId) {
            var modal = document.getElementById('infoModal' + animalId);
            modal.style.display = "none";
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

        document.addEventListener('DOMContentLoaded', function () {
            const toggleButton = document.getElementById('toggleButton');
            const searchInput = document.getElementById('buscar');
            const dataTable = document.getElementById('dataTable');

            toggleButton.addEventListener('click', function () {
                if (dataTable.style.display === 'none') {
                    dataTable.style.display = '';
                    this.textContent = "Ocultar Tabla";
                } else {
                    dataTable.style.display = 'none';
                    this.textContent = "Mostrar Tabla";
                }
            });

            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.toLowerCase();
                const rows = dataTable.getElementsByTagName('tr');

                for (let i = 1; i < rows.length; i++) {
                    const cells = rows[i].getElementsByTagName('td');
                    let found = false;

                    for (let j = 0; j < cells.length; j++) {
                        const cellValue = cells[j].textContent.toLowerCase();
                        if (cellValue.includes(searchTerm)) {
                            found = true;
                            break;
                        }
                    }

                    rows[i].style.display = found ? '' : 'none';
                }
            });
        });
    </script>

@endsection
