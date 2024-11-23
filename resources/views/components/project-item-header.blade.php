<nav class="bg-gray-100 p-4 flex items-center">
    <!-- Aquí se mostrará el título seleccionado -->
    <div class="mt-4 p-4 text-lg font-bold text-center text-teal-700">
        <span id="selected-project-id">
            @if(session('selected_project_id'))
                ID del proyecto seleccionado: {{ session('selected_project_id') }}
            @else
                Haz clic en un proyecto para ver su ID aquí.
            @endif
        </span>
    </div>
</nav>