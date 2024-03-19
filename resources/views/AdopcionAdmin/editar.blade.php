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
</style>
@extends('layouts.newlayout')

@section('title', 'Editar registro')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ __('Editar registro') }}</h2>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('Animals.update', $animal) }}" id="miFormulario" onsubmit="return validarFormulario()" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="fechaEncuentro" class="form-label">{{ __('¿Cuando se encontro') }}</label>
                                <input type="date" id="fechaEncuentro" class="form-control" name="fechaEncuentro" value="{{ old('fechaEncuentro', $animal->fechaEncuentro) }}" min="{{ date('Y-m-d') }}" required autofocus autocomplete="fechaEncuentro">
                                @error('fechaEncuentro')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="especie_Animal" class="form-label">{{ __('Especifique la especie') }}</label>
                                <select id="especie_Animal" class="form-select" name="especie_Animal">
                                    <option value="{{ $animal->especie_Animal }}">{{ $animal->especie_Animal }}</option>
                                    @if($animal->especie_Animal == 'Gato')
                                        <option value="Perro">Perro</option>
                                    @else
                                        <option value="Gato">Gato</option>
                                    @endif
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nombreAnimaladopocion" class="form-label">{{ __('Nombre asignado') }}</label>
                                <input type="text" id="nombreAnimaladopocion" class="form-control" name="nombreAnimaladopocion" value="{{ old('nombreAnimaladopocion', $animal->nombreAnimaladopocion) }}" required autofocus autocomplete="nombreAnimaladopocion" pattern="[a-zA-Z\s]+" title="Por favor, ingrese solo letras para el Nombre">
                                @error('nombreAnimaladopocion')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="raza" class="form-label">{{ __('¿Cuál es la raza?') }}</label>
                                <input type="text" id="raza" class="form-control" name="raza" value="{{ old('raza', $animal->raza) }}" required autofocus autocomplete="raza" pattern="[a-zA-Z\s]+" title="Por favor, ingrese solo letras para la raza">
                                @error('raza')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="age" class="form-label">{{ __('¿Cuál es la edad? (meses)') }}</label>
                                <input type="number" id="age" class="form-control" name="age" value="{{ old('age', $animal->age) }}" required autofocus autocomplete="age">
                                @error('age')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="observacionesAnimal" class="form-label">{{ __('¿Qué observaciones?') }}</label>
                                <input type="text" id="observacionesAnimal" class="form-control" name="observacionesAnimal" value="{{ old('observacionesAnimal', $animal->observacionesAnimal) }}" required autofocus autocomplete="observacionesAnimal">
                                @error('observacionesAnimal')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="img" class="form-label">{{ __('Subir imagen del animal') }}</label>
                                <input type="file" id="img" class="form-control" name="img">
                            </div>
                            <button type="submit" class="btn btn-primary">Actualizar Registro</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación -->
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
@endsection
@section('scripts')
    <script>
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

    </script>
@endsection
