<nav class="sticky top-0 bg-white border-gray-200 z-50 shadow-md">
    <div class="container flex flex-wrap items-center justify-between  py-5 ">
      <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">

          <span class="self-center text-2xl font-semibold whitespace-nowrap">Pb.Surken</span>
      </a>
      <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-base text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-dropdown" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
      </button>
      <div class="hidden w-full lg:block lg:w-auto" id="navbar-dropdown">
        <ul class="flex flex-col font-medium p-4 lg:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 lg:space-x-8 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0 lg:bg-white lg:dark:bg-gray-900">
        <li>
            <a href="/" class="{{ Route::currentRouteNamed('home') ? 'active-fe' : '' }} block py-2 px-3 text-primary rounded lg:bg-transparent lg:p-0 lg:dark:text-blue-500 lg:dark:bg-transparent" aria-current="page">Home</a>
        </li>
        <li>
            <a href="{{route('about')}}" class="{{ Route::currentRouteNamed('about') ? 'active-fe' : '' }} block py-2 px-3 text-primary rounded lg:bg-transparent lg:p-0 lg:dark:text-blue-500 lg:dark:bg-transparent" aria-current="page">Tentang</a>
        </li>


        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="{{ (Route::currentRouteNamed('anggota') || Route::currentRouteNamed('data-pelatih')) ? 'active-fe' : '' }} flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0  lg:p-0 lg:w-auto lg:dark:hover:text-blue-500">
                Team
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                <ul class="py-2 text-base text-gray-700" aria-labelledby="dropdownLargeButton">
                    <li>
                        <a href="{{route('anggota')}}" class="{{ Request::is('anggota*') ? 'active-fe' : '' }} block px-4 py-2 hover:bg-gray-100">Pemain</a>
                    </li>
                    <li>
                        <a href="{{route('data-pelatih')}}" class="{{ Request::is('data-pelatih*') ? 'active-fe' : '' }} block px-4 py-2 hover:bg-gray-100">Pelatih</a>
                    </li>
                </ul>
            </div>
        </li>

        <li>
            <button id="dropdownNavbarLink1" data-dropdown-toggle="dropdownNavbar1" class="{{ (Route::currentRouteNamed('agenda') || Route::currentRouteNamed('latihan')) ? 'active-fe' : '' }} flex items-center justify-between w-full py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0  lg:p-0 lg:w-auto lg:dark:hover:text-blue-500 md:dark:hover:bg-transparent">
                Jadwal
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar1" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                <ul class="py-2 text-base text-gray-700" aria-labelledby="dropdownLargeButton">
                    <li>
                        <a href="{{route('agenda')}}" class="{{ Route::currentRouteNamed('agenda') ? 'active-fe' : '' }} block px-4 py-2 hover:bg-gray-100">Agenda</a>
                    </li>
                    <li>
                        <a href="{{route('latihan')}}" class="{{ Route::currentRouteNamed('latihan') ? 'active-fe' : '' }} block px-4 py-2 hover:bg-gray-100">Latihan</a>
                    </li>

                </ul>
            </div>
        </li>

        <li>
            <a href="{{route('blog')}}" class="{{ Route::currentRouteNamed('blog*') ? 'active-fe' : '' }} block py-2 px-3 text-primary rounded lg:bg-transparent lg:p-0 lg:dark:text-blue-500 lg:dark:bg-transparent" aria-current="page">Berita</a>
        </li>
        <li>
            <a href="{{route('galeri')}}" class="{{ Route::currentRouteNamed('galeri') ? 'active-fe' : '' }} block py-2 px-3 text-primary rounded lg:bg-transparent lg:p-0 lg:dark:text-blue-500 lg:dark:bg-transparent" aria-current="page">Galeri</a>
        </li>
        {{-- <li>
            <a href="{{route('prestasi')}}" class="{{ Route::currentRouteNamed('prestasi') ? 'active-fe' : '' }} block py-2 px-3 text-primary rounded lg:bg-transparent lg:p-0 lg:dark:text-blue-500 lg:dark:bg-transparent" aria-current="page">Prestasi</a>
        </li> --}}



          <li>
            <a href="{{route('form-pendaftaran')}}" class="{{ Route::currentRouteNamed('form-pendaftaran') ? 'active-fe' : '' }} block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 lg:hover:bg-transparent lg:border-0  lg:p-0 lg:dark:hover:text-blue-500 lg:dark:hover:bg-transparent">Pendaftaran</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
