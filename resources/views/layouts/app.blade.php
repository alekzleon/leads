<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Reels ganadores</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.getElementById('leds').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevenir el comportamiento por defecto del formulario
            // Obtener los valores del formulario
            // const nombre = document.getElementById('nombre').value;
            // const email = document.getElementById('email').value;
            const promt = document.getElementById('promt').value;
            const whatsapp = document.getElementById('whatsapp').value;
            const email = document.getElementById('email').value;
            const name = document.getElementById('name').value;

            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.innerHTML = `
                <svg class="animate-spin h-5 w-5 mr-3 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                </svg>
                Haciendo magia...
            `;
            
            // Enviar la solicitud a la API usando Axios
            axios.post('/api/leds-reel', {
                promt: promt,
                whatsapp : whatsapp,
                email : email,
                name : name
            })
            .then(function (response) {
                // Mostrar el resultado en el div
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Generar Reel';

                let formattedResponse = response.data;
                console.log(formattedResponse.data);

                let formatText = formattedResponse.data;
                let textformattedResponse = formatText.replace(/\n/g, '<br>').replace(/\\"/g, '"');

                 document.getElementById('resultado').innerHTML = textformattedResponse;
                 //document.getElementById('resultado').innerText = JSON.stringify(response.data);
            })
            .catch(function (error) {
                // Manejo de errores
                submitBtn.disabled = false;
                submitBtn.innerHTML = 'Generar Reel';
                document.getElementById('resultado').innerText = 'Error: ' + error;
            });
        });
    </script>
    </body>
</html>
