<li>
    <article 
        tabindex="0" 
        class="cursor-pointer border rounded-md p-3 bg-white flex text-gray-700 mb-2 hover:border-green-500 focus:outline-none focus:border-green-500"
        onclick="updateNav('{{ $proyecto->nombre }}', '{{ addslashes($proyecto->descripcion) }}'); loadProjectPhases({{ $proyecto->id }})"
    >
        <span class="flex-none pt-1 pr-2">
            {!! $proyecto->icono !!}
        </span>
        <div class="flex-1">
            <header class="mb-1">
                <span class="font-semibold">{{ $proyecto->creador->name }}</span> creó el proyecto
                <h1 class="inline font-bold">"{{ $proyecto->nombre }}"</h1>
            </header>
            <p class="text-gray-600">
                {{ Str::limit($proyecto->descripcion, 80) }}
            </p>
            <footer class="text-gray-500 mt-2 text-sm">
                Creado el: {{ $proyecto->created_at->format('d-m-Y H:i') }}
            </footer>
        </div>
    </article>
</li>