<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start ">
          <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
              <span class="sr-only">Open sidebar</span>
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                 <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
              </svg>
           </button>
          {{-- <a href="https://flowbite.com" class="flex ms-2 md:me-24">
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">Dahsboard Pb.Surken</span>
          </a> --}}
          <div class="flex justify-start items-center">

              <span class="self-center text-sm md:text-lg hidden md:block lg:text-xl font-semibold whitespace-nowrap uppercase">Dashboard Pb.Surken</span>

            {{-- <form action="#" method="GET" class="hidden lg:block lg:pl-10">
              <label for="topbar-search" class="sr-only">Search</label>
              <div class="relative mt-1 lg:w-96">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"> <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/> </svg>
                </div>
                <input type="text" name="email" id="topbar-search" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5" placeholder="Search">
              </div>
            </form> --}}
          </div>
        </div>
            <nav class="bg-white border-gray-200 px-4 lg:px-6 ">
                <div class="flex flex-wrap justify-between items-center">

                  <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                    <button type="button" class="flex text-sm rounded-full md:me-0 " id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                     <div class="flex items-center gap-2">
                    <img class="w-10 h-10 rounded-full object-cover object-center" src="
                    @if (Auth::user()->anggota)
                        {{ asset('anggota/' . Auth::user()->anggota->foto) }}
                    @else
                        {{ asset('assets/img/admin.png') }}
                    @endif
                    " alt="user photo">


                      <h4 class="hidden md:block">
                       @if (Auth::user()->anggota)
                           {{ Auth::user()->anggota->nama_lengkap }}
                          @else
                            {{ Auth::user()->name }}
                       @endif
                      </h4>

                     </div>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
                      <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900 font-semibold pb-1">
                          @if (Auth::user()->anggota)
                              {{ Auth::user()->anggota->nama_lengkap }}
                            @else
                                {{ Auth::user()->name }}
                          @endif
                        </span>

                        <span class="block text-sm  text-gray-500 truncate">
                          {{ Auth::user()->email }}
                        </span>

                      </div>
                      <ul class="py-2" aria-labelledby="user-menu-button">

                      @role('user')
                      <li>
                        <a href="{{route('profile.index')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                      </li>
                      <hr>
                        @endrole


                        <li>
                            <a href="{{route('akun')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Akun</a>
                          </li>



                        <hr>
                        <li>
                          <a href="{{route('logout')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Keluar</a>
                        </li>
                      </ul>
                    </div>

                </div>
                </div>
            </nav>
          </header>

    </div>
  </nav>
