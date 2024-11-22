<!DOCTYPE html>
<html class="h-full" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="stylesheet" href="./tailwind.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        function updateNav(projectName, projectDescription) {
            const navTitle = document.getElementById('project-nav-title');
            const navDescription = document.getElementById('project-nav-description');
            
            navTitle.textContent = 'Proyecto seleccionado: ' + projectName;
            navDescription.textContent = projectDescription;
        }

        function loadProjectPhases(projectId) {
        fetch(`/proyectos/${projectId}/fases`) // Ruta para obtener las fases
            .then(response => response.json())
            .then(data => {
                const phasesNav = document.getElementById('project-phases-nav');
                phasesNav.innerHTML = ''; // Limpia las fases anteriores
                
                if (data.length > 0) {
                    // Itera sobre las fases y las agrega al menú
                    data.forEach(phase => {
                        const phaseItem = document.createElement('li');
                        phaseItem.className = 'flex-none';
                        phaseItem.innerHTML = `
                            <a href="#" 
                               class="flex items-center px-4 py-2 text-sm font-medium text-green-100 bg-green-700 rounded hover:bg-green-600 hover:text-green-200">
                                
                                ${phase.nombre}
                            </a>
                        `;
                        phasesNav.appendChild(phaseItem);
                    });
                } else {
                    // Si no hay fases, muestra un mensaje
                    const noPhasesItem = document.createElement('li');
                    noPhasesItem.className = 'flex-none';
                    noPhasesItem.innerHTML = `
                        <a href="#" 
                           class="flex items-center px-4 py-2 text-sm font-medium text-green-300 bg-green-700 rounded hover:bg-green-600 hover:text-green-200">
                            
                            No hay fases registradas.
                        </a>
                    `;
                    phasesNav.appendChild(noPhasesItem);
                }
            })
            .catch(error => {
                console.error('Error al cargar las fases:', error);
                const phasesNav = document.getElementById('project-phases-nav');
                phasesNav.innerHTML = `
                    <li class="flex-none">
                        <a href="#" 
                           class="flex items-center px-4 py-2 text-sm font-medium text-red-100 bg-red-600 rounded hover:bg-red-500">
                            
                            Error al cargar las fases.
                        </a>
                    </li>
                `;
            });
    }
    </script>
  </head>

  <body class="antialiased h-full">


<div class="h-full w-full flex overflow-hidden antialiased text-gray-800 bg-white">
  

  <div class="flex-1 flex flex-col">

    <!-- main content -->
    <main class="flex-grow flex min-h-0 border-t">
<!-- aquí están los proyectos se agregan más cuando se registran -->
<section class="flex flex-col p-4 w-full max-w-sm flex-none bg-gray-100 min-h-0 overflow-auto">
  
  <div class="flex justify-between mb-3">
      <div class="flex items-center justify-center w-1/2">
        <!-- Icono Home -->
        <a title="Home" href="#home" class="h-10 px-4 flex items-center text-white bg-teal-700 w-full justify-center">
          <i class="mx-auto">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M12 6.453l9 8.375v9.172h-6v-6h-6v6h-6v-9.172l9-8.375zm12 5.695l-12-11.148-12 11.133 1.361 1.465 10.639-9.868 10.639 9.883 1.361-1.465z" />
            </svg>
          </i>
        </a>
      </div>
      <div class="flex items-center justify-center w-1/2">
        <!-- Icono Views -->
        <a title="Views" href="#views" class="h-10 px-4 flex items-center hover:text-white w-full justify-center">
          <i class="mx-auto">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M18.546 3h-13.069l-5.477 8.986v9.014h24v-9.014l-5.454-8.986zm-3.796 12h-5.5l-2.25-3h-4.666l4.266-7h10.82l4.249 7h-4.669l-2.25 3zm-9.75-4l.607-1h12.787l.606 1h-14zm12.18-3l.607 1h-11.573l.607-1h10.359zm-1.214-2l.606 1h-9.144l.607-1h7.931z" />
            </svg>
          </i>
        </a>
      </div>
    </div>

    <div class="flex justify-between items-center mb-3">
      <!-- Título "Tus proyectos" -->
      <h1 class="font-semibold text-lg">
        Tus proyectos
      </h1>

      <!-- Botón "Nuevo proyecto" -->
      <div x-data="{ showModal: false }">
        <button @click="showModal = true" aria-controls="add" aria-expanded="false" aria-haspopup="listbox" class="flex items-center h-full px-4 py-2 text-sm text-white bg-green-900 hover:bg-green-400 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300">
          <i>
            <svg class="fill-current w-3 h-3 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M24 10h-10v-10h-2v10h-10v2h10v10h2v-10h10z" />
            </svg>
          </i>
          <span class="ml-2">Nuevo proyecto</span>
        </button>
        <!-- Modal -->
        <x-create-project-modal x-show="showModal" @close-modal.window="showModal = false" />
      </div>
    </div>

  <!-- Lista de proyectos con scroll, ocupando todo el espacio disponible -->
    <div class="flex-grow overflow-auto"> <!-- flex-grow asegura que el contenedor ocupe el espacio disponible -->
        @php
        $proyectos = \App\Models\Proyecto::where('user_id', Auth::id())->with('creador')->get();
        @endphp

        <ul>
          @foreach($proyectos as $proyecto)
            <x-project-item :proyecto="$proyecto" />
          @endforeach
        </ul>
    </div>
  <!-- Formulario de cierre de sesión -->
    <div class="mt-4 flex items-center justify-center bg-teal-700 text-white rounded-md p-3">
      <form method="POST" action="{{ route('logout') }}" class="w-full">
        @csrf
        <button type="submit" class="flex items-center justify-center w-full">
          <i class="mr-2">
            <!-- SVG de cierre de sesión -->
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M16 13v-2H7V8l-5 4 5 4v-3h9zM20 3H9c-1.1 0-2 .9-2 2v3h2V5h11v14H9v-3H7v3c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
            </svg>
          </i>
          <span>Cerrar sesión</span>
        </button>
      </form>
    </div>
</section>
      

      <!-- section content -->
      <section aria-label="main content" class="flex min-h-0 flex-col flex-auto border-l">
        <!-- contenido del proyecto, titulo del proyecto -->
        <nav class="bg-gray-100 p-4 flex items-center">
    <!-- Imagen del proyecto -->
    <div class="flex-none">
        <img class="h-16 w-16 object-cover rounded-full" src="https://i.pinimg.com/236x/e5/19/50/e51950142fe27ba3bb91d5c0b9f2326d.jpg" alt="Project Icon">
    </div>
    <div class="flex-1 ml-4">
        <!-- Título del proyecto -->
        <h1 id="project-nav-title" class="text-xl font-semibold text-gray-800">PROYECTO:</h1>
        
        <!-- Descripción del proyecto -->
        <p id="project-nav-description" class="text-sm text-gray-600 mt-2">DESCRIPCION:</p>
    </div>
    <button 
    id="open-modal-button" 
    class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
    + Nueva fase
</button>

<!-- Llamar al componente modal -->
<x-modal-fase />
</nav>

<!-- Llamar al componente Modal -->
<x-modal />


        <!-- content caption -->
        

        <table aria-describedby="info-popup" aria-label="open tickets" class="border-t w-full min-h-0 h-full flex flex-col">
          
          <tbody class="flex w-full flex-col flex-1 min-h-0 overflow-hidden px-4">
            
            <!-- Nuevo nav para las fases -->
            <section aria-label="Fases del Proyecto" class="p-4 bg-gray-100">
    <!-- Título y Descripción del Proyecto -->
    <hr class="my-4">

    <!-- Lista de Fases como Menú de Navegación en Fila -->
    <nav class="bg-white flex flex-col p-4 rounded shadow">
        <h2 class="font-semibold mb-4 text-gray-800">Fases del proyecto</h2>
        <ul id="project-phases-nav" 
            class="flex overflow-x-auto space-x-4 text-green-100 bg-withe-900 p-2 rounded-lg scrollbar-thin scrollbar-thumb-green-900 scrollbar-track-green-900">
            <li class="flex-none">
                <a href="#" 
                   class="flex items-center px-4 py-2 text-sm font-medium text-green-100 bg-green-900 rounded hover:bg-green-600 hover:text-green-200">
                    
                    Selecciona un proyecto para ver las fases.
                </a>
            </li>
        </ul>
    </nav>
</section>

            

          </tbody>
        </table>

        <!-- content footer, currently hidden -->
        <footer aria-label="content footer" class="flex p-3 bg-white border-t hidden">
          footer
        </footer>
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