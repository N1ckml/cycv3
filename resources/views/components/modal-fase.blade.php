<div 
    id="modal" 
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md">
        <!-- Modal Header -->
        <div class="flex justify-between items-center bg-gray-200 px-4 py-2 rounded-t-lg">
            <h2 class="text-lg font-semibold text-gray-800">Nueva Fase</h2>
            <button 
                id="close-modal-button" 
                class="text-gray-600 hover:text-gray-900 focus:outline-none">
                ✕
            </button>
        </div>

        <!-- Modal Body -->
        <div class="p-4">
            <form id="fase-form">
                <div class="mb-4">
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input 
                        type="text" 
                        id="nombre" 
                        name="nombre" 
                        class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500"
                        placeholder="Ingresa el nombre de la fase">
                </div>
                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea 
                        id="descripcion" 
                        name="descripcion" 
                        rows="4" 
                        class="mt-1 block w-full px-3 py-2 bg-gray-50 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500"
                        placeholder="Ingresa la descripción de la fase"></textarea>
                </div>
                <div class="flex justify-end">
                    <button 
                        type="button" 
                        id="close-modal-footer-button" 
                        class="mr-2 bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 focus:outline-none">
                        Cancelar
                    </button>
                    <button 
                        type="submit" 
                        class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
