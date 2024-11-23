<li>
    <!-- Formulario oculto para hacer la solicitud AJAX -->
    <form id="select-project-form-{{ $proyecto->id }}" action="{{ route('proyectos.select') }}" method="POST" style="display: none;">
        @csrf
        <input type="hidden" name="proyecto_id" value="{{ $proyecto->id }}">
    </form>
    
    <article 
        tabindex="0" 
        onclick="selectProject({{ $proyecto->id }})" 
        class="cursor-pointer border rounded-md bg-white flex text-gray-700 mb-1 hover:border-green-500 focus:outline-none focus:border-green-500">
        <span class="flex-none pt-1 pr-0">
            {!! $proyecto->icono !!}
        </span>
        <div class="flex-1 flex flex-col justify-center">
            <header>
                <h1 class="inline font-bold">{{ $proyecto->nombre }}</h1>
            </header>
        </div>
    </article>
</li>

<script>
    // Función para enviar la solicitud AJAX al hacer clic en un proyecto
    function selectProject(projectId) {
        var form = document.getElementById('select-project-form-' + projectId);
        var formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Actualizar el contenido dinámicamente con el nombre y la descripción del proyecto
                document.getElementById('selected-project-name').textContent = 'Proyecto seleccionado: ' + data.projectName;
                document.getElementById('selected-project-description').textContent = 'Descripción: ' + data.projectDescription;
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
