@extends('layouts.admin')
@section('container')

{{-- <h1 class="text-center text-2xl font-bold my-4">Pengujian Model</h1>

<div class="my-4">
    <h2 class="text-xl font-bold">Accuracy Score:</h2>
    <div class="relative pt-1">
        <div class="flex mb-2 items-center justify-between">
            <div>
                <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">
                    {{ $accuracyScore * 100 }}%
                </span>
            </div>

        </div>
        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
            <div style="width:{{ $accuracyScore * 100 }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
        </div>
    </div>
</div>

<div class="grid grid-cols-2 gap-4 my-4">
    <div>
        <h2 class="text-xl font-bold">Precision:</h2>
        <canvas id="precisionChart"></canvas>
    </div>
    <div>
        <h2 class="text-xl font-bold">Recall:</h2>
        <canvas id="recallChart"></canvas>
    </div>
</div>

<h2 class="text-xl font-bold my-4">Confusion Matrix:</h2>
<table class="w-full border-collapse border border-gray-300">
    <thead class="bg-primary text-white">
        <tr>
            <th class="border border-gray-300 px-4 py-2">Klasifikasi</th>
            <th class="border border-gray-300 px-4 py-2">Positif</th>
            <th class="border border-gray-300 px-4 py-2">Negatif</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="border border-gray-300 px-4 py-2"><strong>Aktual Positif</strong></td>
            <td class="border border-gray-300 px-4 py-2">{{ $totalTruePositives }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $totalFalseNegatives }}</td>
        </tr>
        <tr>
            <td class="border border-gray-300 px-4 py-2"><strong>Aktual Negatif</strong></td>
            <td class="border border-gray-300 px-4 py-2">{{ $totalFalsePositives }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ $totalTrueNegatives }}</td>
        </tr>
    </tbody>
</table>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var precisionChartCanvas = document.getElementById('precisionChart').getContext('2d');
    var recallChartCanvas = document.getElementById('recallChart').getContext('2d');

    var precisionChart = new Chart(precisionChartCanvas, {
        type: 'bar',
        data: {
            labels: ['Precision'],
            datasets: [{
                label: 'Precision',
                data: [{{ $precisionAverage }}],
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    var recallChart = new Chart(recallChartCanvas, {
        type: 'bar',
        data: {
            labels: ['Recall'],
            datasets: [{
                label: 'Recall',
                data: [{{ $recallAverage }}],
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script> --}}



<div class=" mt-5">
    <h2 class="text-xl font-semibold text-center uppercase pb-3">Hasil Pengujian Klasifikasi Atlet PB.Suryakencana</h2>

    <div class="my-4">
        <h2 class="text-xl font-semibold  ">Hasil Akurasi Klasifikasi Keselruhan</h2>
        <div class="relative pt-1">
            <div class="flex mb-2 items-center justify-between">
                <div>
                    <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">
                        {{ number_format($accuracyScore * 100, 2) }}%
                    </span>
                </div>
            </div>
            <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                <div style="width: {{ $accuracyScore * 100 }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
            </div>
        </div>
    </div>


    <h2 class="text-xl font-bold pt-4">Hasil Presisi dan Recall :</h2>
    <canvas id="evaluationChart"></canvas>
    <div class="my-8"></div> <!-- Spasi antara chart -->


    <h2 class="text-xl font-bold pt-4">Hasil Confusion Matrix :</h2>
    <canvas id="confusionMatrixChart"></canvas>

    <div class="my-8"></div> <!-- Spasi antara chart -->

    {{-- <h3>Statistik</h3>
    <canvas class="tp" id="statisticsChart"></canvas> --}}

    <h2 class="text-xl font-semibold my-4">Hasil Klasifikasi Atlet PB.Suryakencana :</h2>

    <table class="min-w-full border-collapse border border-gray-300">
        <thead class="bg-primary text-white">
            <tr>
                <th class="border border-gray-300 px-4 py-2">No</th>
                <th class="border border-gray-300 px-4 py-2">Nama Lengkap</th>
                <th class="border border-gray-300 px-4 py-2">Usia</th>
                <th class="border border-gray-300 px-4 py-2">Jenis Kelamin</th>
                <th class="border border-gray-300 px-4 py-2">Klasifikasi Aktual</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $member)
            <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $member->nama_lengkap }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($member->tanggal_lahir)->age }} Tahun</td>
                <td class="border border-gray-300 px-4 py-2">{{ $member->jenis_kelamin }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $member->hasil_klasifikasi }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>


</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Confusion Matrix Chart
        var ctxMatrix = document.getElementById('confusionMatrixChart').getContext('2d');
        var confusionMatrixLabels = ['Positif', 'Negatif'];
        var confusionMatrixData = {
            labels: ['Aktual Positif', 'Aktual Negatif'],
            datasets: [
                {
                    label: 'Prediksi Positif',
                    data: [{{ $totalTruePositives }}, {{ $totalFalsePositives }}],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Prediksi Negatif',
                    data: [{{ $totalFalseNegatives }}, {{ $totalTrueNegatives }}],
                    backgroundColor: 'rgba(255, 99, 132, 0.5)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ]
        };
        var confusionMatrixChart = new Chart(ctxMatrix, {
            type: 'bar',
            data: confusionMatrixData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Evaluation Chart
        var ctxEvaluation = document.getElementById('evaluationChart').getContext('2d');
        var evaluationData = {
            labels: @json(array_keys($precisionScores)),
            datasets: [
                {
                    label: 'Presisi',
                    data: @json(array_values($precisionScores)),
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Recall',
                    data: @json(array_values($recallScores)),
                    backgroundColor: 'rgba(153, 102, 255, 0.5)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }
            ]
        };
        var evaluationChart = new Chart(ctxEvaluation, {
            type: 'bar',
            data: evaluationData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Statistics Chart
        var ctxStatistics = document.getElementById('statisticsChart').getContext('2d');
        var statisticsData = {
            labels: ['True Positives', 'True Negatives', 'False Positives', 'False Negatives'],
            datasets: [{
                label: 'Count',
                data: [
                    {{ $totalTruePositives }},
                    {{ $totalTrueNegatives }},
                    {{ $totalFalsePositives }},
                    {{ $totalFalseNegatives }}
                ],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(255, 99, 132, 0.5)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        };
        var statisticsChart = new Chart(ctxStatistics, {
            type: 'pie',
            data: statisticsData
        });
    });
</script>

@endsection
