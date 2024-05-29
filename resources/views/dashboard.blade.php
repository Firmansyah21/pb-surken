@extends('layouts.admin')
@section('container')

<!-- Main content -->
<section class="content mt-3">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        {{-- Anggota --}}
        <div class="bg-blue-500 text-white rounded-lg shadow-xl ">
            <div class="flex justify-between items-center p-4">
                <div>
                    <h3 class="text-4xl font-bold">{{$jumlahAnggota}}</h3>
                    <p class="text-lg font-normal">Anggota</p>
                </div>
                <i class="fas fa-users text-5xl"></i>
            </div>
        </div>

        {{-- Pelatih --}}
        <div class="bg-green-500 text-white rounded-lg shadow-xl ">
            <div class="flex justify-between items-center p-4">
                <div>
                    <h3 class="text-4xl font-bold">{{$jumlahPelatih}}</h3>
                    <p class="text-lg font-normal">Pelatih</p>
                </div>
                <i class="fas fa-chalkboard-teacher text-5xl"></i>
            </div>
        </div>

        {{-- User --}}
        <div class="bg-red-500 text-white rounded-lg shadow-xl ">
            <div class="flex justify-between items-center p-4">
                <div>
                    <h3 class="text-4xl font-bold">{{$jumlahUser}}</h3>
                    <p class="text-lg font-normal">User</p>
                </div>
                <i class="fas fa-user text-5xl"></i>
            </div>
        </div>
    </div>

</section  >


<section class="mt-5">
    <canvas id="membersChart" class="bar" ></canvas>

</section>




    <section class="mt-5">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 ">

            <div class="bg-white p-4 shadow-md flex justify-center">
                <canvas id="genderChart" class="gender"></canvas>
            </div>

            <div class="bg-white p-4 shadow-md flex justify-center">
                <canvas id="kategoriChart" class="gender"></canvas>
            </div>

        </div>
    </section>




@endsection

@push('scripts')

<script>
 // Data dari controller
const membersData = {!! json_encode($members) !!};

// Urutan bulan dalam bahasa Inggris
const monthsEnglish = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

// Mengatur ulang urutan bulan sesuai dengan data yang diterima
const startMonthIndex = membersData[0].month - 1; // Indeks bulan pertama dalam data
const months = monthsEnglish.slice(startMonthIndex).concat(monthsEnglish.slice(0, startMonthIndex));

// Mengubah struktur data menjadi format yang dapat digunakan oleh Charts.js
const data = {
    labels: months,
    datasets: [{
        label: 'Number of Members',
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1,
        data: membersData.map(item => item.count)
    }]
};

// Pengaturan untuk grafik
const options = {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true

            }
        }]
    }
};


// Membuat objek grafik dengan tipe grafik batang
const ctx = document.getElementById('membersChart').getContext('2d');
const membersChart = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
});


    // jumlah gender
window.addEventListener('load', function() {
    var ctx = document.getElementById('genderChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                label: 'Jumlah Anggota',
                data: [{!! $jumlahAnggotaLakiLaki !!}, {!! $jumlahAnggotaPerempuan !!}],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('kategoriChart').getContext('2d');
            var kategoriChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'Kategori Anggota',
                        data: @json($counts),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            enabled: true
                        }
                    }
                }
            });
        });


</script>
@endpush
