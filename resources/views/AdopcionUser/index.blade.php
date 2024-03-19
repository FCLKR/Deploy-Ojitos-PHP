@extends('layouts.newlayout')

@section('content')
    <style>
        /* Estilos CSS */
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .item {
            flex: 0 0 calc(33.33% - 20px);
            max-width: calc(33.33% - 20px);
            margin-bottom: 20px;
            padding: 20px;
            background-color: #1a282f;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .item .nombre {
            background-color: #644494;
            text-align: center;
            font-size: 150%;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }

        .item .imgen {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .item .imgen img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .item p {
            margin-bottom: 10px;
        }

        .item .fecha {
            font-size: 90%;
            color: #999;
        }

        .item button {
            background-color: #3269c2;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Estilos para el modal */
        .modaldes {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-contentdes {
            background-color: #1a282f;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 800px;
            border-radius: 5px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-info-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .modal-column {
            flex: 0 0 calc(50% - 20px);
            max-width: calc(50% - 20px);
            margin-bottom: 20px;
        }

        .modal-column img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .modal-container-botons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .SinfoButton,
        .SadoptarButton {
            background-color: #3269c2;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .SadoptarButton {
            background-color: #694393;
        }

        /* Estilos para el modal de confirmación de correo */
        .modalc {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-contentc {
            background-color: #1a282f;
            margin: 15% auto;
            padding: 20px;
            border-radius: 5px;
            border: 3px solid #644494;
            width: 30%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 1);
            text-align: center;
        }

        .confirdesc {
            color: #ffffff;
        }

        /* Estilos para el modal de imagen */
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
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-bold mb-4">Animales en adopción</h2>
                    <h3 class="text-lg mb-6">¡Te mostramos a continuación a nuestros peludos disponibles para que hagan parte de tu familia!</h3>
                    <x-text-input id="buscar" type="text" placeholder="Buscar..." class="w-full mb-6"></x-text-input>
                </div>

                <div class="container p-6 text-gray-900 dark:text-gray-100">
                    @foreach($animals as $animal)
                        <div class="item">
                            <div class="nombre">
                                <h1>{{ $animal->nombreAnimaladopocion}}</h1>
                            </div>
                            <div class="imgen">
                                @if($animal->img)
                                    <img src="{{ asset($animal->img) }}" alt="imagen" onclick="openModal('{{ asset($animal->img) }}')">
                                @else
                                    ¡Pronto subiremos su imagen!
                                @endif
                            </div>
                            <p>Raza: {{ $animal->raza}}</p>
                            <p>Edad (meses): {{ $animal->age}}</p>
                            <p class="fecha">Fecha: {{ $animal->created_at }}</p>
                            <button onclick="openInfoModal('{{ $animal->id }}')">Ver más</button>

                            <!-- Modal para información -->
                            <div id="infoModal{{ $animal->id }}" class="modaldes">
                                <div class="modal-contentdes">
                                    <span class="close" onclick="closeInfoModal('{{ $animal->id }}')">&times;</span>
                                    <div class="modal-info-container py-12 px-6">
                                        <div class="modal-column">
                                            <img src="{{ asset($animal->img) }}" alt="imagen">
                                            <p class="text-xl font-bold mb-4">Vacunas:</p>
                                            @if ($animal->vacunasModal)
                                                <ul>
                                                    @foreach ($animal->vacunasModal as $vacunaModal)
                                                        <li class="mb-2">
                                                            * {{ $vacunaModal->nombre }}
                                                            <p class="text-lg" style="color: {{ $vacunaModal->adquisicion == 'Aplicada' ? '#22b14c' : '#d39e00' }}">({{ $vacunaModal->adquisicion }})</p>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @else
                                                <p class="mb-4"><strong>{{ $animal->nombreAnimaladopocion}}</strong> ya cuenta con todas las vacunas</p>
                                                <p>¡Haz click en "Más información" y entérate de más!</p>
                                            @endif
                                        </div>

                                        <div class="modal-column">
                                            <h3 class="text-xl font-bold mb-4">Información adicional del animal</h3>
                                            <p><strong>Identificación:</strong> {{ $animal->id }}</p>
                                            <p><strong>Nombre:</strong> {{ $animal->nombreAnimaladopocion }}</p>
                                            <p><strong>Especie:</strong> {{ $animal->especie_Animal }}</p>
                                            <p><strong>Raza:</strong> {{ $animal->raza }}</p>
                                            <p><strong>Edad:</strong> {{ $animal->age }}</p>

                                            <div class="modal-container-botons">
                                                <div class="modal-boton1">
                                                    <button class="SinfoButton" onclick="enviarCorreo('{{ $animal->id }}')">Más información</button>
                                                </div>

                                                <form id="emailForm{{ $animal->id }}" action="{{ route('enviar-correo') }}" method="POST" style="display: none;">
                                                    @csrf
                                                    <input type="hidden" name="animal_id" value="{{ $animal->id }}">
                                                </form>

                                                <div class="modal-boton2">
                                                    <a href="http://localhost:8000/formadoption?animal_id={{ $animal->id }}">
                                                        <button class="SadoptarButton">Solicitar adopción</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Confirmación correo -->
    <div id="myModalc" class="modalc">
        <div class="modal-contentc py-12">
            <p class="confirdesc">Estamos enviando más información a tu correo...</p>
        </div>
    </div>

    <!-- Modal para imagen -->
    <div id="imageModal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img id="modalImage" class="modal-content" src="" alt="imagen">
    </div>

    <script>
        // Barra de búsqueda
        const searchInput = document.getElementById('searchInput');
        const items = document.querySelectorAll('.item');

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();

            items.forEach(item => {
                const nombre = item.querySelector('.nombre h1').textContent.toLowerCase();
                const raza = item.querySelector('p:nth-of-type(1)').textContent.toLowerCase();
                const edad = item.querySelector('p:nth-of-type(2)').textContent.toLowerCase();

                if (nombre.includes(searchTerm) || raza.includes(searchTerm) || edad.includes(searchTerm)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });

        // Enviar correo
        function enviarCorreo(animalId) {
            var form = document.getElementById('emailForm' + animalId);
            form.submit();
            openModalc();
        }

        // Modal Confirmación envío de correo
        var modal = document.getElementById('myModalc');

        function openModalc() {
            modal.style.display = 'block';
        }

        // Modal Información
        function openInfoModal(animalId) {
            var modal = document.getElementById('infoModal' + animalId);
            modal.style.display = "block";
        }

        function closeInfoModal(animalId) {
            var modal = document.getElementById('infoModal' + animalId);
            modal.style.display = "none";
        }

        // Modal Imagen
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
