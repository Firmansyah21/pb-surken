<aside id="logo-sidebar" class="fixed  top-0 left-0 z-40 w-60 h-screen pt-20 transition-transform -translate-x-full bg-primary  lg:translate-x-0" aria-label="Sidebar">

<div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-gray-50 text-gray-800">
    <div class="fixed flex flex-col top-0 left-0 w-60 lg:w-64 bg-gray-800 h-full border-r  pt-4 lg:pt-8">
      <div class="overflow-y-auto overflow-x-hidden flex-grow">
        <ul class="flex flex-col py-4 space-y-1">

        <li class="px-2 py-1 mt-10 lg:mt-6">
            <a href="{{route('dashboard')}}" class="{{ Route::is('dashboard*') ? 'active' : '' }} relative flex flex-row items-center h-9  focus:outline-none text-white hover:text-black pr-6 hover:bg-white rounded">
                <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
            </a>
        </li>



        @role('admin')
        <li class="px-2 py-1">
            <a href="{{route('user.index')}}" class=" {{ Route::is('user*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
                <span class="inline-flex justify-center items-center ml-4">
                    <i class="fas fa-user"></i>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">User</span>
            </a>
        </li>
        @endrole

    @role('admin')
    <li class="px-2 py-1">
        <a href="{{route('anggota.index')}}" class=" {{ Route::is('anggota*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
            <span class="inline-flex justify-center items-center ml-4">
                <i class="fas fa-users"></i>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Anggota</span>
        </a>
    </li>
    @endrole
    @role('admin')
    <li class="px-2 py-1">
        <a href="{{route('pelatih.index')}}" class=" {{ Route::is('pelatih*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
            <span class="inline-flex justify-center items-center ml-4">
                <i class="fas fa-chalkboard-teacher"></i>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Pelatih</span>
        </a>
    </li>
    @endrole

 @role('admin')
 <li class="px-2 py-1">
    <a href="{{route('post.index')}}" class=" {{ Route::is('post*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
        <span class="inline-flex justify-center items-center ml-4">
            <i class="fas fa-newspaper"></i>
        </span>
        <span class="ml-2 text-sm tracking-wide truncate">Berita</span>
    </a>
</li>
@endrole
@role('admin')
<li class="px-2 py-1">
    <a href="{{route('kategori.index')}}" class=" {{ Route::is('kategori*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
        <span class="inline-flex justify-center items-center ml-4">
            <i class="fas fa-tags"></i>
        </span>
        <span class="ml-2 text-sm tracking-wide truncate">Kategori Berita</span>
    </a>
</li>
@endrole
    @role('admin')
    <li class="px-2 py-1">
        <a href="{{route('gallery.index')}}" class=" {{ Route::is('gallery*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
            <span class="inline-flex justify-center items-center ml-4">
                <i class="fas fa-images"></i>
            </span>
            <span class="ml-2 text-sm tracking-wide truncate">Galeri</span>
        </a>
    </li>
    @endrole

        <li class="px-2 py-1">
            <a href="{{route('jadwal-latihan.index')}}" class=" {{ Route::is('jadwal-latihan*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
                <span class="inline-flex justify-center items-center ml-4">
                    <i class="fas fa-calendar-alt"></i>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Jadwal Latihan</span>
            </a>
        </li>

  <li class="px-2 py-1">
    <a href="{{route('agenda.index')}}" class=" {{ Route::is('agenda*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
        <span class="inline-flex justify-center items-center ml-4">
            <i class="fas fa-list-alt"></i>
        </span>
        <span class="ml-2 text-sm tracking-wide truncate">Agenda Pertandingan</span>
    </a>
</li>

        <li class="px-2 py-1">
            <a href="{{route('program-latihan.index')}}" class=" {{ Route::is('program-latihan*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
                <span class="inline-flex justify-center items-center ml-4">
                    <i class="fas fa-dumbbell"></i>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Program Latihan</span>
            </a>
        </li>

<li class="px-2 py-1">
    <a href="{{route('prestasi.index')}}" class=" {{ Route::is('prestasi*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
        <span class="inline-flex justify-center items-center ml-4">
            <i class="fas fa-trophy"></i>
        </span>
        <span class="ml-2 text-sm tracking-wide truncate">Prestasi</span>
    </a>
</li>

@role('admin')
<li class="px-2 py-1">
    <a href="{{route('pendaftaran.index')}}" class=" {{ Route::is('pendaftaran*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
        <span class="inline-flex justify-center items-center ml-4">
            <i class="fas fa-user-plus"></i>
        </span>
        <span class="ml-2 text-sm tracking-wide truncate">Data Pendaftar</span>
    </a>
</li>
@endrole

@role('admin')
<li class="px-2 py-1">
    <a href="{{route('evaluasi')}}" class=" {{ Route::is('evaluasi*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
        <span class="inline-flex justify-center items-center ml-4">
            <i class="fas fa-chart-bar"></i>
        </span>
        <span class="ml-2 text-sm tracking-wide truncate">Hasil Klasifikasi</span>
    </a>
</li>
@endrole
{{--
@role('admin')
<li class="px-2 py-1">
    <a href="{{route('home-edit')}}" class=" {{ Route::is('home-edit*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
        <span class="inline-flex justify-center items-center ml-4">
            <i class="fas fa-home"></i>
        </span>
        <span class="ml-2 text-sm tracking-wide truncate">Edit Home</span>
    </a>
</li>
@endrole --}}



@role('user')

<li class="px-2 py-1">
    <a href="{{route('hasil-latihan.index')}}" class=" {{ Route::is('hasil-latihan*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
        <span class="inline-flex justify-center items-center ml-4">
            <i class="fas fa-plus-circle"></i> <!-- Changed icon -->
        </span>
        <span class="ml-2 text-sm tracking-wide truncate">Hasil Latihan</span>
    </a>
</li>


<li class="px-2 py-1">
    <a href="{{route('riwayat')}}" class=" {{ Route::is('riwayat*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
        <span class="inline-flex justify-center items-center ml-4">
            <i class="fas fa-history"></i> <!-- Changed icon -->
        </span>
        <span class="ml-2 text-sm tracking-wide truncate">Riwayat Latihan</span>
    </a>
</li>

<li class="px-2 py-1">
    <a href="{{route('chart-riwayat')}}" class=" {{ Route::is('chart-riwayat*') ? 'active' : '' }} relative flex flex-row items-center h-9 focus:outline-none pr-6 text-white hover:text-black pr-6 hover:bg-white rounded">
        <span class="inline-flex justify-center items-center ml-4">
            <i class="fas fa-chart-bar"></i> <!-- Changed icon -->
        </span>
        <span class="ml-2 text-sm tracking-wide truncate">Statistik Latihan</span>
    </a>
</li>

@endrole






        </ul>
      </div>
    </div>
  </div>
 </aside>


