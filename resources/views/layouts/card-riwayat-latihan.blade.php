<section class="mb-10">

    <div class="grid grid-cols-4 gap-4">
        <div class="bg-blue-500 text-white rounded-lg shadow-xl ">
            <div class="flex justify-between items-center p-4">
                <div>
                    <p class="text-lg font-normal">Total Latihan</p>
                    @if($totalDurasi)
                    <h1 class="text-xl mt-3 font-bold text-white">{{ $totalDurasi }}</h1>
                @else
                    <h1 class="text-xl text-white">No data</h1>
                @endif

                </div>
                <i class="fas fa-users text-5xl"></i>
            </div>
        </div>
        <div class="bg-blue-500 text-white rounded-lg shadow-xl ">
            <div class="flex justify-between items-center p-4">
                <div>
                    <p class="text-lg font-normal"> Kehadiran</p>
                    @if($jumlahHadir)
                    <h1 class="text-xl mt-3 font-bold text-white">{{ $jumlahHadir }} Kehadiran</h1>
                @else
                    <h1 class="text-xl text-white">No data</h1>
                @endif

                </div>
                <i class="fas fa-users text-5xl"></i>
            </div>
        </div>
        <div class="bg-blue-500 text-white rounded-lg shadow-xl ">
            <div class="flex justify-between items-center p-4">
                <div>
                    <p class="text-lg font-normal"> Izin</p>
                    @if($jumlahTidakHadir)
                    <h1 class="text-xl mt-3 font-bold text-white">{{ $jumlahTidakHadir }} Izin</h1>
                @else
                    <h1 class="text-xl text-white">No data</h1>
                @endif

                </div>
                <i class="fas fa-users text-5xl"></i>
            </div>
        </div>

    </div>

</section>
