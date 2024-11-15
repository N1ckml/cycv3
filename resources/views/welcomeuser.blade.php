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
  <!-- section body side nav -->
  <nav aria-label="side bar" aria-orientation="vertical" class="flex-none flex flex-col items-center text-center bg-teal-900 text-gray-400 border-r">
    

    <ul>
      <li>
        <a title="Home" href="#home" class="h-16 px-6 flex items-center text-white bg-teal-700 w-full">
          <i class="mx-auto">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M12 6.453l9 8.375v9.172h-6v-6h-6v6h-6v-9.172l9-8.375zm12 5.695l-12-11.148-12 11.133 1.361 1.465 10.639-9.868 10.639 9.883 1.361-1.465z" />
            </svg>
          </i>
        </a>
      </li>
      <li>
        <a title="Views" href="#views" class="h-16 px-6 flex items-center hover:text-white w-full">
          <i class="mx-auto">
            <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M18.546 3h-13.069l-5.477 8.986v9.014h24v-9.014l-5.454-8.986zm-3.796 12h-5.5l-2.25-3h-4.666l4.266-7h10.82l4.249 7h-4.669l-2.25 3zm-9.75-4l.607-1h12.787l.606 1h-14zm12.18-3l.607 1h-11.573l.607-1h10.359zm-1.214-2l.606 1h-9.144l.607-1h7.931z" />
            </svg>
          </i>
        </a>
      </li>
      
      <li>
    <form method="POST" action="{{ route('logout') }}" class="h-16 px-6 flex items-center text-white bg-teal-700 w-full">
        @csrf
        <button type="submit" class="flex items-center w-full">
            <i class="mx-auto">
                <!-- SVG de cierre de sesión -->
                <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M16 13v-2H7V8l-5 4 5 4v-3h9zM20 3H9c-1.1 0-2 .9-2 2v3h2V5h11v14H9v-3H7v3c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z"/>
                </svg>
            </i>
        </button>
    </form>
</li>
      
    </ul>

    <div class="mt-auto h-16 flex items-center w-full">
      <img style="filter: invert(85%);" class="h-8 w-10 mx-auto" src="https://raw.githubusercontent.com/bluebrown/tailwind-zendesk-clone/master/public/assets/chi.png" />
    </div>
  </nav>

  <div class="flex-1 flex flex-col">
    <!-- section body top nav -->
    <nav aria-label="top bar" class="flex-none flex justify-between bg-white h-16">
      <!-- top bar left -->
      <ul aria-label="top bar left" aria-orientation="horizontal" class="flex">
        <!-- add button -->
        <li class="group relative">
        <div x-data="{ showModal: false }">
        <button @click="showModal = true" aria-controls="add" aria-expanded="false" aria-haspopup="listbox" class="flex items-center h-full px-4 py-2 mt-2 ml-4 text-sm text-white bg-green-900 hover:bg-green-400 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-300">
          <i>
            <svg class="fill-current w-3 h-3 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M24 10h-10v-10h-2v10h-10v2h10v10h2v-10h10z" />
            </svg>
          </i>
          <span class="ml-2">Nuevo proyecto</span>
        </button>
          <!-- Incluir el modal con `x-show="showModal"` -->
          <x-create-project-modal x-show="showModal" @close-modal.window="showModal = false" />
        </div>
        
        </li>
      </ul>

      <!-- to bar right  -->
      <ul aria-label="top bar right" aria-orientation="horizontal" class="px-8 flex items-center">
        <li class="relative">
          <input title="Search Bar" aria-label="search bar" role="search" class="pr-8 pl-4 py-2 rounded-md cursor-pointer transition-all duration-300 ease-in-out focus:border-black focus:cursor-text w-4 focus:w-64 placeholder-transparent focus:placeholder-gray-500" type="text" placeholder="Search Chi Desk Support" />
          <i class="pointer-events-none absolute top-0 right-0 h-full flex items-center pr-3">
            <svg class="fill-current w-4 h-4 mx-auto" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
              <path d="M21.172 24l-7.387-7.387c-1.388.874-3.024 1.387-4.785 1.387-4.971 0-9-4.029-9-9s4.029-9 9-9 9 4.029 9 9c0 1.761-.514 3.398-1.387 4.785l7.387 7.387-2.828 2.828zm-12.172-8c3.859 0 7-3.14 7-7s-3.141-7-7-7-7 3.14-7 7 3.141 7 7 7z" />
            </svg>
          </i>
        </li>

        

        <li class="h-10 w-10 ml-3">
          <button title="Page Menu" aria-label="page menu" class="h-full w-full rounded-full border focus:outline-none focus:shadow-outline">
            <img class="h-full w-full rounded-full mx-auto" src="https://raw.githubusercontent.com/bluebrown/tailwind-zendesk-clone/master/public/assets/me.jpg" />
          </button>
        </li>
      </ul>
    </nav>



    <!-- main content -->
    <main class="flex-grow flex min-h-0 border-t">
      <!-- section update to tickets -->
      <section class="flex flex-col p-4 w-full max-w-sm flex-none bg-gray-100 min-h-0 overflow-auto">
        <h1 class="font-semibold mb-3">
          Tus proyectos
        </h1>

        @php
        $proyectos = App\Models\Proyecto::with('creador')->get();
    @endphp

    <ul>
    @php
    $proyectos = \App\Models\Proyecto::where('user_id', Auth::id())->with('creador')->get();
@endphp

@foreach($proyectos as $proyecto)
    <x-project-item :proyecto="$proyecto" />
@endforeach
    </ul>
      </section>

      <!-- section content -->
      <section aria-label="main content" class="flex min-h-0 flex-col flex-auto border-l">
        <!-- content navigation -->
        <nav class="bg-gray-100 flex p-4">
          <!-- open tickets nav -->
          <section aria-labelledby="open-tickets-tabs-label" class="mr-4 focus:outline-none">
            <label id="open-tickets-tabs-label" class="font-semibold block mb-1 text-sm">Open Tickets
              <span class="font-normal text-gray-700">(current)</span>
            </label>
            <ul class="flex">
              <li>
                <button class="focus:outline-none focus:bg-yellow-200 p-2 rounded-l-md border border-r-0 bg-white flex flex-col items-center w-24">
                  <p class="font-semibold text-lg">6</p>
                  <p class="text-sm uppercase text-gray-600">
                    You
                  </p>
                </button>
              </li>
              <li>
                <button class="focus:outline-none focus:bg-yellow-200 p-2 border rounded-r-md bg-white flex flex-col items-center w-24 cursor-pointer">
                  <p class="font-semibold text-lg">23</p>
                  <p class="text-sm uppercase text-gray-600">
                    Groups
                  </p>
                </button>
              </li>
            </ul>
          </section>
          
        </nav>

        <!-- content caption -->
        <header class="bg-white border-t flex items-center py-1 px-4">
          <div class="flex">
            <h2 id="content-caption" class="font-semibold">
              Tickets requiring your attention (6)
            </h2>
            <span class="ml-3 group relative">
              <button role="details" aria-controls="info-popup" class="text-blue-700 border-b border-dotted border-blue-700 focus:outline-none text-sm">
                What is this?
              </button>
              <div role="tooltip" id="info-popup" class="absolute pt-1 rounded-md rounded-t-lg right-0 transform translate-x-40 mx-auto hidden group-hover:block z-50">
                <div class="border rounded-md rounded-t-lg shadow-lg bg-white w-full max-w-xs w-screen">
                  <header class="font-semibold rounded-t-lg bg-gray-300 px-4 py-2">
                    People are waiting for replies!
                  </header>
                  <div class="p-4 border-t">
                    <p class="mb-4">
                      These are new or open tickets that are assigned to
                      you, unassinged in your group(s) or not assigned to
                      any group.
                    </p>
                    <p class="mb-1">
                      They are ordered by priority and requester update date
                      (oldest first).
                    </p>
                  </div>
                </div>
              </div>
            </span>
          </div>
          <div class="ml-auto">
            <button title="See available tickets in this view" aria-label="play" class="border rounded-md px-3 py-2 leading-none">
              Play
            </button>
          </div>
        </header>

        <!-- content overflow section 
                remove table and thead but keep tbody and change tbody to section, in order
                to have scrollable overflow section -->
        <table aria-describedby="info-popup" aria-label="open tickets" class="border-t w-full min-h-0 h-full flex flex-col">
          <thead class="flex w-full flex-col px-4">
            <tr class="border-b flex">
              <th class="font-semibold text-left py-3 pl-3 pr-1 w-24">
                <input type="checkbox" name="" id="" />
              </th>
              <th class="font-semibold text-left py-3 px-1 w-24 truncate">
                ID
              </th>
              <th class="font-semibold text-left py-3 px-1 w-full max-w-xs xl:max-w-lg truncate">
                Subject
              </th>
              <th class="font-semibold text-left py-3 px-1 flex-1 truncate">
                Requester
              </th>
              <th class="font-semibold text-left py-3 px-1 flex-1 truncate">
                Requester updated
              </th>
              <th class="font-semibold text-left py-3 px-1 flex-1 truncate">
                Group
              </th>
              <th class="font-semibold text-left py-3 px-1 flex-1 truncate">
                Assignee
              </th>
            </tr>
          </thead>
          <tbody class="flex w-full flex-col flex-1 min-h-0 overflow-hidden px-4">
            <!-- low -->
            <tr class="border-b flex">
              <th class="bg-gray-100 text-left px-3 py-2 flex-1" colspan="7">
                <h2 class="text-sm">
                  <span class="font-normal mr-1">Priority</span><span>Low</span>
                </h2>
              </th>
            </tr>
            <tr role="row" class="hover:bg-blue-100 border-b flex cursor-pointer">
              <td role="cell" headers="select" class="py-3 pl-3 pr-1 w-24 flex items-start">
                <input class="mt-1" type="checkbox" />
                <div class="ml-auto relative group">
                  <span style="
                          padding: 2px 5px;
                          font-size: 0.7rem;
                          position: relative;
                          bottom: 2px;
                        " class="font-mono rounded-sm bg-red-600 text-white leading-none">O</span>
                  <!-- dropdown -->
                  <span class="hidden group-hover:block ml-4 mt-10 w-screen max-w-lg absolute top-0 border shadow-lg p-6 bg-white rounded-md z-50 text-gray-900">
                    <article>
                      <header>
                        <div>
                          <span class="px-3 py-1 uppercase text-xs leading-none rounded-sm bg-red-600 text-white">Open</span>
                          <span class="ml-2 text-gray-700">Incident #12534</span>
                          <span class="ml-1">(Low)</span>
                        </div>
                      </header>
                      <section class="mt-5">
                        <h1 class="text-sm font-semibold mt-3">
                          Quo laudantium error corporis accusamus unde,
                          labore quidem non officiis.
                        </h1>
                        <p class="mt-3">
                          Hi Team,
                          <br />
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Error accusantium molestias fugit commodi
                          doloremque. <br /><br />
                          Lorem ipsum dolor sit amet consectetur,
                          adipisicing elit? ...
                        </p>
                      </section>
                      <footer class="mt-4">
                        <p class="text-gray-600">Latest Comments</p>
                        <hr class="mt-1" />
                        <div class="flex mt-3">
                          <p class="font-semibold">Nico Braun</p>
                          <p class="ml-auto text-gray-700 text-sm">
                            Yesterday 10:33
                          </p>
                        </div>
                        <p class="mt-2">
                          Dolore odio error inventore sint et dolorum
                          asperiores exercitationem, quisquam esse.
                        </p>
                      </footer>
                    </article>
                  </span>
                  <!-- end dropdown -->
                </div>
              </td>
              <td class="py-3 px-1 w-24">
                #12534
              </td>
              <td class="py-3 px-1 w-full max-w-xs xl:max-w-lg">
                <div class="relative group w-full">
                  <p class="w-full truncate">
                    Quo laudantium error corporis accusamus unde, labore
                    quidem non officiis.
                  </p>
                  <!-- dropdown -->
                  <span class="hidden group-hover:block ml-4 mt-10 w-screen max-w-lg absolute top-0 border shadow-lg p-6 bg-white rounded-md z-50 text-gray-900">
                    <article>
                      <header>
                        <div>
                          <span class="px-3 py-1 uppercase text-xs leading-none rounded-sm bg-red-600 text-white">Open</span>
                          <span class="ml-2 text-gray-700">Incident #12534</span>
                          <span class="ml-1">(Low)</span>
                        </div>
                      </header>
                      <section class="mt-5">
                        <h1 class="text-sm font-semibold mt-3">
                          Quo laudantium error corporis accusamus unde,
                          labore quidem non officiis.
                        </h1>
                        <p class="mt-3">
                          Hi Team,
                          <br />
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Error accusantium molestias fugit commodi
                          doloremque. <br /><br />
                          Lorem ipsum dolor sit amet consectetur,
                          adipisicing elit? ...
                        </p>
                      </section>
                      <footer class="mt-4">
                        <p class="text-gray-600">Latest Comments</p>
                        <hr class="mt-1" />
                        <div class="flex mt-3">
                          <p class="font-semibold">Nico Braun</p>
                          <p class="ml-auto text-gray-700 text-sm">
                            Yesterday 10:33
                          </p>
                        </div>
                        <p class="mt-2">
                          Dolore odio error inventore sint et dolorum
                          asperiores exercitationem, quisquam esse.
                        </p>
                      </footer>
                    </article>
                  </span>
                  <!-- end dropdown -->
                </div>
              </td>
              <td class="py-3 px-1 flex-1 truncate">
                Marla Darsuz
              </td>
              <td class="py-3 px-1 flex-1 truncate">
                Tuesday 09:56
              </td>
              <td class="py-3 px-1 flex-1 truncate">
                UK Support
              </td>
              <td class="py-3 px-1 flex-1 truncate">
                Nico Braun
              </td>
            </tr>
            
            
            <tr role="row" class="hover:bg-blue-100 border-b flex cursor-pointer">
              <td role="cell" headers="select" class="py-3 pl-3 pr-1 w-24 flex items-start">
                <input class="mt-1" type="checkbox" />
                <div class="ml-auto relative group">
                  <span style="
                          padding: 2px 5px;
                          font-size: 0.7rem;
                          position: relative;
                          bottom: 2px;
                        " class="font-mono rounded-sm bg-red-600 text-white leading-none">O</span>
                  <!-- dropdown -->
                  <span class="hidden group-hover:block ml-4 mt-10 w-screen max-w-lg absolute top-0 border shadow-lg p-6 bg-white rounded-md z-50 text-gray-900">
                    <article>
                      <header>
                        <div>
                          <span class="px-3 py-1 uppercase text-xs leading-none rounded-sm bg-red-600 text-white">Open</span>
                          <span class="ml-2 text-gray-700">Incident #12534</span>
                          <span class="ml-1">(Low)</span>
                        </div>
                      </header>
                      <section class="mt-5">
                        <h1 class="text-sm font-semibold mt-3">
                          impedit possimus praesentium voluptatum omnis
                          assumenda rem autem magni consequatur nostrum
                          distinctio unde.
                        </h1>
                        <p class="mt-3">
                          Hi Team,
                          <br />
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Error accusantium molestias fugit commodi
                          doloremque. <br /><br />
                          Lorem ipsum dolor sit amet consectetur,
                          adipisicing elit? ...
                        </p>
                      </section>
                      <footer class="mt-4">
                        <p class="text-gray-600">Latest Comments</p>
                        <hr class="mt-1" />
                        <div class="flex mt-3">
                          <p class="font-semibold">Nico Braun</p>
                          <p class="ml-auto text-gray-700 text-sm">
                            Yesterday 10:33
                          </p>
                        </div>
                        <p class="mt-2">
                          Dolore odio error inventore sint et dolorum
                          asperiores exercitationem, quisquam esse.
                        </p>
                      </footer>
                    </article>
                  </span>
                  <!-- end dropdown -->
                </div>
              </td>
              <td class="py-3 px-1 w-24">
                #12534
              </td>
              <td class="py-3 px-1 w-full max-w-xs xl:max-w-lg">
                <div class="relative group w-full">
                  <p class="w-full truncate">
                    impedit possimus praesentium voluptatum omnis assumenda
                    rem autem magni consequatur nostrum distinctio unde.
                  </p>
                  <!-- dropdown -->
                  <span class="hidden group-hover:block ml-4 mt-10 w-screen max-w-lg absolute top-0 border shadow-lg p-6 bg-white rounded-md z-50 text-gray-900">
                    <article>
                      <header>
                        <div>
                          <span class="px-3 py-1 uppercase text-xs leading-none rounded-sm bg-red-600 text-white">Open</span>
                          <span class="ml-2 text-gray-700">Incident #12534</span>
                          <span class="ml-1">(Low)</span>
                        </div>
                      </header>
                      <section class="mt-5">
                        <h1 class="text-sm font-semibold mt-3">
                          impedit possimus praesentium voluptatum omnis
                          assumenda rem autem magni consequatur nostrum
                          distinctio unde.
                        </h1>
                        <p class="mt-3">
                          Hi Team,
                          <br />
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Error accusantium molestias fugit commodi
                          doloremque. <br /><br />
                          Lorem ipsum dolor sit amet consectetur,
                          adipisicing elit? ...
                        </p>
                      </section>
                      <footer class="mt-4">
                        <p class="text-gray-600">Latest Comments</p>
                        <hr class="mt-1" />
                        <div class="flex mt-3">
                          <p class="font-semibold">Nico Braun</p>
                          <p class="ml-auto text-gray-700 text-sm">
                            Yesterday 10:33
                          </p>
                        </div>
                        <p class="mt-2">
                          Dolore odio error inventore sint et dolorum
                          asperiores exercitationem, quisquam esse.
                        </p>
                      </footer>
                    </article>
                  </span>
                  <!-- end dropdown -->
                </div>
              </td>
              <td class="py-3 px-1 flex-1 truncate">
                Sara Dechicco
              </td>
              <td class="py-3 px-1 flex-1 truncate">
                Thursday 09:22
              </td>
              <td class="py-3 px-1 flex-1 truncate">
                UK Support
              </td>
              <td class="py-3 px-1 flex-1 truncate">
                Nico Braun
              </td>
            </tr>
            <!-- medium -->
            <tr class="border-b flex">
              <th class="bg-gray-100 text-left px-3 py-2 flex-1" colspan="7">
                <h2 class="text-sm">
                  <span class="font-normal mr-1">Priority</span>
                  <span>Medium</span>
                </h2>
              </th>
            </tr>
            <tr role="row" class="hover:bg-blue-100 border-b flex cursor-pointer">
              <td role="cell" headers="select" class="py-3 pl-3 pr-1 w-24 flex items-start">
                <input class="mt-1" type="checkbox" />
                <div class="ml-auto relative group">
                  <span style="
                          padding: 2px 5px;
                          font-size: 0.7rem;
                          position: relative;
                          bottom: 2px;
                        " class="font-mono rounded-sm bg-yellow-400 text-black leading-none">N</span>
                  <!-- dropdown -->
                  <span class="hidden group-hover:block ml-4 mt-10 w-screen max-w-lg absolute top-0 border shadow-lg p-6 bg-white rounded-md z-50 text-gray-900">
                    <article>
                      <header>
                        <div>
                          <span class="px-3 py-1 uppercase text-xs leading-none rounded-sm bg-yellow-400 text-black">New</span>
                          <span class="ml-2 text-gray-700">Incident #12534</span>
                          <span class="ml-1">(Medium)</span>
                        </div>
                      </header>
                      <section class="mt-5">
                        <h1 class="text-sm font-semibold mt-3">
                          Excepturi at labore vel accusamus exercitationem
                          assumenda ex incidunt eum quam, amet provident!
                        </h1>
                        <p class="mt-3">
                          Hi, <br />
                          <br />
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Error accusantium molestias fugit commodi
                          doloremque. <br /><br />
                          Lorem ipsum dolor sit amet consectetur,
                          adipisicing elit. Odit consequatur natus aut
                          reiciendis nisi sed! Temporibus, quibusdam
                          voluptates? ...
                        </p>
                      </section>
                      <footer class="mt-4 hidden">
                        <p class="text-gray-600">Latest Comments</p>
                        <hr class="mt-1" />
                        <div class="flex mt-3">
                          <p class="font-semibold"></p>
                          <p class="ml-auto text-gray-700 text-sm"></p>
                        </div>
                        <p class="mt-2"></p>
                      </footer>
                    </article>
                  </span>
                  <!-- end dropdown -->
                </div>
              </td>
              <td class="py-3 px-1 w-24">
                #12534
              </td>
              <td class="py-3 px-1 w-full max-w-xs xl:max-w-lg">
                <div class="relative group w-full">
                  <p class="w-full truncate">
                    Excepturi at labore vel accusamus exercitationem
                    assumenda ex incidunt eum quam, amet provident!
                  </p>
                  <!-- dropdown -->
                  <span class="hidden group-hover:block ml-4 mt-10 w-screen max-w-lg absolute top-0 border shadow-lg p-6 bg-white rounded-md z-50 text-gray-900">
                    <article>
                      <header>
                        <div>
                          <span class="px-3 py-1 uppercase text-xs leading-none rounded-sm bg-yellow-400 text-black">New</span>
                          <span class="ml-2 text-gray-700">Incident #12534</span>
                          <span class="ml-1">(Medium)</span>
                        </div>
                      </header>
                      <section class="mt-5">
                        <h1 class="text-sm font-semibold mt-3">
                          Excepturi at labore vel accusamus exercitationem
                          assumenda ex incidunt eum quam, amet provident!
                        </h1>
                        <p class="mt-3">
                          Hi, <br />
                          <br />
                          Lorem ipsum dolor sit amet consectetur adipisicing
                          elit. Error accusantium molestias fugit commodi
                          doloremque. <br /><br />
                          Lorem ipsum dolor sit amet consectetur,
                          adipisicing elit. Odit consequatur natus aut
                          reiciendis nisi sed! Temporibus, quibusdam
                          voluptates? ...
                        </p>
                      </section>
                      <footer class="mt-4 hidden">
                        <p class="text-gray-600"></p>
                        <hr class="mt-1" />
                        <div class="flex mt-3">
                          <p class="font-semibold"></p>
                          <p class="ml-auto text-gray-700 text-sm"></p>
                        </div>
                        <p class="mt-2">
                          Dolore odio error inventore sint et dolorum
                          asperiores exercitationem, quisquam esse tempora
                          aliquam voluptates quibusdam quae debitis
                          laboriosam iure ea quos.
                        </p>
                      </footer>
                    </article>
                  </span>
                  <!-- end dropdown -->
                </div>
              </td>
              <td class="py-3 px-1 flex-1 truncate">
                Freddy Murro
              </td>
              <td class="py-3 px-1 flex-1 truncate">
                Today 12:13
              </td>
              <td class="py-3 px-1 flex-1 truncate">
                -
              </td>
              <td class="py-3 px-1 flex-1 truncate">
                -
              </td>
            </tr>
            
            <!-- high -->
            <tr class="border-b flex hidden">
              <th class="bg-gray-100 text-left px-3 py-2 flex-1" colspan="7">
                <h2 class="text-sm">
                  <span class="font-normal mr-1">Priority</span>
                  <span>High</span>
                </h2>
              </th>
            </tr>
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