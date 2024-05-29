@extends('layouts.admin')

@section('container')
    <div class="text-center mt-4 md:mt-0 pb-5">
        <h1 class="text-3xl text-gray-700">Statistik Latihan</h1>
    </div>
    <div class="container flex justify-center">
        <canvas class="statistik" id="chartRiwayatLatihan"></canvas>
    </div>
@endsection

@push('scripts')
    <script>
        var ctx = document.getElementById('chartRiwayatLatihan').getContext('2d');
        var riwayatChart = new Chart(ctx, {
            type: 'pie', // Tetap menggunakan tipe 'pie'
            data: {
                labels: ['Menang', 'Kalah'],
                datasets: [{
                    label: 'Statistik Pertandingan',
                    data: [{{ $menang }}, {{ $kalah }}],
                    backgroundColor: [
                        'rgba(75, 192, 192, 1)', // Warna solid untuk 'Menang'
                        'rgba(255, 99, 132, 1)'  // Warna solid untuk 'Kalah'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', // Warna solid untuk border 'Menang'
                        'rgba(255, 99, 132, 1)'  // Warna solid untuk border 'Kalah'
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

                }
            }
        });
    </script>
@endpush
