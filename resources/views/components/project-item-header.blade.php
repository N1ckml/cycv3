<nav class="bg-gray-100 p-4 flex items-center">
    <div class="flex-none">
        <img class="h-16 w-16 object-cover rounded-full" src="https://i.pinimg.com/236x/e5/19/50/e51950142fe27ba3bb91d5c0b9f2326d.jpg" alt="Project Icon">
    </div>
    <!-- Aquí se mostrará el nombre y la descripción del proyecto seleccionado -->
    <div class="mt-4 p-4 text-lg font-bold text-center text-teal-700">
        <span id="selected-project-name">
            @if(session('selected_project_name'))
                <strong>Proyecto seleccionado: </strong>{{ session('selected_project_name') }}
            @else
                Haz clic en un proyecto para ver su nombre aquí.
            @endif
        </span>
        <div id="selected-project-description" class="text-sm text-gray-600 mt-2">
            @if(session('selected_project_description'))
                <strong>Descripción seleccionada: </strong>{{ session('selected_project_description') }}
            @else
                Haz clic en un proyecto para ver la descripción aquí.
            @endif
        </div>
    </div>
</nav>