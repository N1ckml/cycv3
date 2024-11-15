<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

<div class="fixed z-10 inset-0 overflow-y-auto" x-show="showModal" x-cloak>
  <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center">
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
      <!-- Botón de Cierre (X) en la esquina superior derecha -->
      <div class="flex justify-end p-2">
        <button @click="showModal = false" class="text-gray-400 hover:text-gray-600 focus:outline-none">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>

      <!-- Icono y Título -->
      <div class="flex items-center justify-center px-4 pt-2 sm:px-6">
        <div class="flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
          <!-- Icono de Nuevo Proyecto -->
          <svg class="h-8 w-8 text-green-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3H6a1 1 0 100 2h3v3a1 1 0 102 0v-3h3a1 1 0 100-2h-3V7z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <div class="ml-4 text-left">
          <h3 class="text-lg leading-6 font-medium text-gray-900">Nuevo Proyecto</h3>
          <p class="text-sm text-gray-500">Ingresa los detalles para crear un nuevo proyecto.</p>
        </div>
      </div>

      <!-- Formulario -->
      <form action="{{ route('proyectos.store') }}" method="POST" class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        @csrf
        <div class="mb-4 text-left">
          <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Proyecto</label>
          <input type="text" id="nombre" name="nombre" class="mt-1 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-green-500" required>
        </div>
        <div class="mb-4 text-left">
          <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
          <textarea id="descripcion" name="descripcion" class="mt-1 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-green-500" rows="3" required></textarea>
        </div>
        <div class="mb-4 text-left">
          <label for="prioridad" class="block text-sm font-medium text-gray-700">Prioridad</label>
          <select id="prioridad" name="prioridad" class="mt-1 p-2 border border-gray-300 rounded-md w-full focus:outline-none focus:ring focus:border-green-500" required>
            <option value="">Seleccione la prioridad</option>
            <option value="alta">Alta</option>
            <option value="media">Media</option>
            <option value="baja">Baja</option>
          </select>
        </div>

        <!-- Botones de Acción dentro del formulario -->
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-500 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">Guardar Proyecto</button>
          <button @click="showModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-200 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>
