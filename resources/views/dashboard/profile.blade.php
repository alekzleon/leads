
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div>
                <span class="text-gray-500 dark:text-gray-300">Bienvenido, {{ Auth::user()->name }}</span>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <!-- Sidebar -->
                <aside class="w-1/4 bg-white dark:bg-gray-800 shadow-md h-screen px-4 py-6">
                    <nav class="space-y-6">
                        <a href="#" class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md" onclick="showSection('profile')">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
                            </svg>
                            Perfil
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md" onclick="showSection('payments')">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 8c-3.31 0-6 2.69-6 6s2.69 6 6 6 6-2.69 6-6-2.69-6-6-6zM6.93 10.93c.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41zm7.74 7.74c.39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0zM12 6c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2zm-1 5.41c-.39-.39-1.02-.39-1.41 0-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41zm3.74-1.41c-.39.39-.39 1.02 0 1.41.39.39 1.02.39 1.41 0 .39-.39.39-1.02 0-1.41-.39-.39-1.02-.39-1.41 0z"></path>
                            </svg>
                            Pagos
                        </a>
                        {{-- <a href="#" class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md" onclick="showSection('settings')">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M12 6c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2s2-.9 2-2V8c0-1.1-.9-2-2-2zm0-4c-4.42 0-8 3.58-8 8 0 3.87 2.74 7.09 6.5 7.88V22h3v-4.12c3.76-.79 6.5-4.01 6.5-7.88 0-4.42-3.58-8-8-8z"></path>
                            </svg>
                            Configuración
                        </a>
                        <a href="#" class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md" onclick="showSection('statistics')">
                            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M4 22h16V4H4v18zM7 7h3v8H7V7zm7 4h3v4h-3v-4z"></path>
                            </svg>
                            Estadísticas
                        </a> --}}
                    </nav>
                </aside>

                <!-- Contenido Principal -->
                <div class="w-3/4 p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                    <!-- Sección de Perfil -->
                    <div id="profile" class="section">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Información de Perfil</h3>
                        <form action="#" method="POST" class="mt-4">
                            @csrf
                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 dark:text-gray-300">Nombre</label>
                                <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-900 border-gray-300 dark:border-gray-600" required>
                            </div>
                            <div class="mb-4">
                                <label for="company" class="block text-gray-700 dark:text-gray-300">Nombre de la Empresa</label>
                                <input type="text" id="company" name="company" class="w-full px-4 py-2 border rounded-lg text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-900 border-gray-300 dark:border-gray-600" required>
                            </div>
                            <div class="mb-4">
                                <label for="industry" class="block text-gray-700 dark:text-gray-300">Industria</label>
                                <input type="text" id="industry" name="industry" class="w-full px-4 py-2 border rounded-lg text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-900 border-gray-300 dark:border-gray-600" required>
                            </div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                Guardar Cambios
                            </button>
                        </form>
                    </div>

                    <!-- Sección de Pagos -->
                    <div id="payments" class="section hidden">
                        <div class="p-6 bg-white dark:bg-gray-800">
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Tokens disponibles {{ Auth::user()->credit }}</h3>
                           
                            <h4 class="text-lg font-semibold mt-6 text-gray-800 dark:text-gray-200">Comprar más Tokens</h4>
                            <form action="#" method="POST" class="mt-4">
                                @csrf
                                <div class="mb-4">
                                    <label for="plan" class="block text-gray-700 dark:text-gray-300">Plan</label>
                                    <select id="plan" name="plan" class="w-full px-4 py-2 border rounded-lg text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-900 border-gray-300 dark:border-gray-600" required>
                                        <option value="basic">100 Tokens- $29.99 USD</option>
                                        <option value="premium">200 Tokens - $49.99 USD</option>
                                        <option value="pro">Anual Ilimitado- $299.99 USD</option>
                                    </select>
                                </div>                           
                                <div class="mb-4">
                                    <label for="card_number" class="block text-gray-700 dark:text-gray-300">Número de Tarjeta</label>
                                    <input type="text" id="card_number" name="card_number" 
                                           class="w-full px-4 py-2 border rounded-lg text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-900 border-gray-300 dark:border-gray-600"
                                           inputmode="numeric" pattern="[0-9]*" maxlength="19" placeholder="XXXX XXXX XXXX XXXX" required>
                                </div>
                                <div class="flex gap-4 mb-4">
                                    <div class="w-1/2">
                                        <label for="expiry" class="block text-gray-700 dark:text-gray-300">Vencimiento</label>
                                        <div class="flex gap-4">
                                            <!-- Select para el mes -->
                                            <select id="expiry_month" name="expiry_month" class="w-1/2 px-4 py-2 border rounded-lg text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-900 border-gray-300 dark:border-gray-600" required>
                                                <option value="" disabled selected>Mes</option>
                                                @for ($i = 1; $i <= 12; $i++)
                                                    <option value="{{ sprintf('%02d', $i) }}">{{ sprintf('%02d', $i) }}</option>
                                                @endfor
                                            </select>
                                    
                                            <!-- Select para el año -->
                                            <select id="expiry_year" name="expiry_year" class="w-1/2 px-4 py-2 border rounded-lg text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-900 border-gray-300 dark:border-gray-600" required>
                                                <option value="" disabled selected>Año</option>
                                                @for ($i = date('Y'); $i <= date('Y') + 10; $i++)
                                                    <option value="{{ substr($i, -2) }}">{{ substr($i, -2) }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="w-1/2">
                                        <label for="ccv" class="block text-gray-700 dark:text-gray-300">CCV</label>
                                        <input type="text" id="ccv" name="ccv" 
                                               class="w-full px-4 py-2 border rounded-lg text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-900 border-gray-300 dark:border-gray-600"
                                               inputmode="numeric" pattern="\d{3}" maxlength="3" placeholder="123" required
                                               oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    </div>
                                </div>
                                
                                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                                    Comprar
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Sección de Configuración -->
                    <div id="settings" class="section hidden">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Configuraciones de Cuenta</h3>
                        <p>Opciones de configuración del sistema...</p>
                    </div>

                    <!-- Sección de Estadísticas -->
                    <div id="statistics" class="section hidden">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Estadísticas de Uso</h3>
                        <p>Gráficos y estadísticas...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para manejar el cambio de secciones -->
    <script>
        function showSection(sectionId) {
            // Ocultar todas las secciones
            document.querySelectorAll('.section').forEach(section => section.classList.add('hidden'));
            
            // Mostrar la sección seleccionada
            document.getElementById(sectionId).classList.remove('hidden');
        }
        
        // Mostrar la sección de perfil por defecto al cargar la página
        document.addEventListener('DOMContentLoaded', function() {
            showSection('profile');
        });
    </script>

    <script>
        const cardInput = document.getElementById('card_number');

        cardInput.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, ''); // Remover caracteres no numéricos
            value = value.replace(/(\d{4})(?=\d)/g, '$1 '); // Insertar un espacio cada 4 dígitos
            e.target.value = value;
        });
    </script>
</x-app-layout>