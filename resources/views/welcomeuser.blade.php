<!DOCTYPE html>
<html class="h-full" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="./tailwind.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <!-- AGREGE ESTO PARA QUE SE VEA LOS DATOS DEL PROYECTO SELECCIONADO-->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="antialiased h-full">
    <div class="h-full w-full flex overflow-hidden antialiased text-gray-800 bg-white">
        <div class="flex-1 flex flex-col">
            <main class="flex-grow flex min-h-0 border-t">
                <section class="flex flex-col p-1 w-64 flex-none bg-gray-100 min-h-10 overflow-auto">
                    <div class="flex justify-between mb-3">
                        <div class="flex items-center justify-center w-1/2">
                            <a title="Tus proyectos" href="#home" class="h-10 px-4 flex items-center text-white bg-teal-700 w-full justify-center">
                                <i class="mx-auto">
                                    <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M12 6.453l9 8.375v9.172h-6v-6h-6v6h-6v-9.172l9-8.375zm12 5.695l-12-11.148-12 11.133 1.361 1.465 10.639-9.868 10.639 9.883 1.361-1.465z" />
                                    </svg>
                                </i>
                            </a>
                        </div>
                        <div class="flex items-center justify-center w-1/2">
                            <a title="Proyectos compartidos" href="#views" class="h-10 px-4 flex items-center hover:text-white w-full justify-center">
                                <i class="mx-auto">
                                    <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M18.546 3h-13.069l-5.477 8.986v9.014h24v-9.014l-5.454-8.986zm-3.796 12h-5.5l-2.25-3h-4.666l4.266-7h10.82l4.249 7h-4.669l-2.25 3zm-9.75-4l.607-1h12.787l.606 1h-14zm12.18-3l.607 1h-11.573l.607-1h10.359zm-1.214-2l.606 1h-9.144l.607-1h7.931z" />
                                    </svg>
                                </i>
                            </a>
                        </div>
                    </div>

                    <div class="flex justify-between items-center mb-3">
                        <h1 class="font-semibold text-lg">
                            Proyectos:
                        </h1>
                        <div x-data="{ showModal: false }" class="ml-4"> <!-- Añadí ml-4 aquí -->
                            <button @click="showModal = true" aria-controls="add" aria-expanded="false" aria-haspopup="listbox" class="flex items-center h-full px-4 py-1 text-sm text-white bg-green-900 hover:bg-green-400 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300">
                                <i>
                                    <svg class="fill-current w-3 h-3 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M24 10h-10v-10h-2v10h-10v2h10v10h2v-10h10z" />
                                    </svg>
                                </i>
                                <span class="ml-1">Nuevo proyecto</span>
                            </button>
                            <x-create-project-modal x-show="showModal" @close-modal.window="showModal = false" />
                        </div>
                    </div>
                    
                    <div class="mt-6 flex-grow overflow-auto">
                        @php $proyectos = \App\Models\Proyecto::where('user_id', Auth::id())->with('creador')->get(); @endphp
                        <ul>
                            @foreach($proyectos as $proyecto)
                            <x-project-item :proyecto="$proyecto" /> @endforeach
                        </ul>
                    </div>
                    <div class="mt-4 flex items-center justify-center bg-teal-700 text-white rounded-md p-3">
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="flex items-center justify-center w-full">
                                <i class="mr-2">
                                    <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M16 13v-2H7V8l-5 4 5 4v-3h9zM20 3H9c-1.1 0-2 .9-2 2v3h2V5h11v14H9v-3H7v3c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                                    </svg>
                                </i>
                                <span>Cerrar sesión</span>
                            </button>
                        </form>
                    </div>
                </section>

                <section aria-label="main content" class="flex min-h-0 flex-col flex-auto border-l">
<!-- Aquí se agregará el componente que llama el id del proyecto-->
<x-project-item-header :tituloProyecto="session('selected_project_id')" />


                    <table>

                    </table>
                </section>
            </main>
        </div>
    </div>
</body>
</html>

<script>
    // Obtener elementos
    const modal = document.getElementById('modal');
    const openModalButton = document.getElementById('open-modal-button');
    const closeModalButton = document.getElementById('close-modal-button');
    const closeModalFooterButton = document.getElementById('close-modal-footer-button');
    
    // Función para abrir el modal
    function openModal() {
      modal.classList.remove('hidden');
    }
    
    // Función para cerrar el modal
    function closeModal() {
        modal.classList.add('hidden');
    }
    
    // Eventos de apertura y cierre del modal
    openModalButton.addEventListener('click', openModal);
    closeModalButton.addEventListener('click', closeModal);
    closeModalFooterButton.addEventListener('click', closeModal);
    
    // Cerrar modal al hacer clic fuera de él
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });
</script>