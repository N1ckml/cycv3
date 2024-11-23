<li>
    <article 
        tabindex="0" 
        class="cursor-pointer border rounded-md bg-white flex text-gray-700 mb-1 hover:border-green-500 focus:outline-none focus:border-green-500">
        <span class="flex-none pt-1 pr-0">
            {!! $proyecto->icono !!}
        </span>
        <div class="flex-1 flex flex-col justify-center">
            <header>
                <!--<span class="font-semibold">{{ $proyecto->creador->name }}</span> proyecto: -->
                <h1 class="inline font-bold">{{ $proyecto->nombre }}</h1>
            </header>
        </div>
    </article>
</li>
