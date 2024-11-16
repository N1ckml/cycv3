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
        // Actualiza el contenido del nav con el título y la descripción del proyecto
        const navTitle = document.getElementById('project-nav-title');
        const navDescription = document.getElementById('project-nav-description');
        
        navTitle.textContent = 'PROYECTO: ' + projectName;
        navDescription.textContent = 'DESCRIPCION: ' + projectDescription;
    }
</script>

    <style>
      html {
        font-size: 14px;
        line-height: 1.285;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
          Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Arial,
          sans-serif;
      }
      html, body {
        width: 100%;
        height: 100%;
      }

      /* can be configured in tailwind.config.js */
      .group:hover .group-hover\:block {
        display: block;
      }

      .focus\:cursor-text:focus {
        cursor: text;
      }

      .focus\:w-64:focus {
        width: 16rem;
      }

      /* zendesk styles */
      .h-16 {
        height: 50px;
      }
      .bg-teal-900 {
        background: #03363d;
      }
      .bg-gray-100 {
        background: #f8f9f9;
      }
      .hover\:border-green-500:hover {
        border-color: #78a300;
      }
    </style>
  </head>

  <body class="antialiased h-full">
  <!-- you can clone or fork the repo if you want -->
<!-- https://github.com/bluebrown/tailwind-zendesk-clone   -->

<div class="h-full w-full flex overflow-hidden antialiased text-gray-800 bg-white">
  

  <div class="flex-1 flex flex-col">

    <!-- main content -->
    <main class="flex-grow flex min-h-0 border-t">
<!-- aquí están los proyectos se agregan más cuando se registran -->
<section class="flex flex-col p-4 w-full max-w-sm flex-none bg-gray-100 min-h-0 overflow-auto">
  
<!-- Aquí van los iconos alineados horizontalmente -->
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
        </nav>


        <!-- content caption -->
        

        <table aria-describedby="info-popup" aria-label="open tickets" class="border-t w-full min-h-0 h-full flex flex-col">
          
          <tbody class="flex w-full flex-col flex-1 min-h-0 overflow-hidden px-4">
            
            
            

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