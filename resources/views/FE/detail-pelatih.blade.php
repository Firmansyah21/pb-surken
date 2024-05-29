@extends('layouts.main')

@section('content')

<section class="w-full min-h-screen container pt-10">
    <div class="w-full bg-white min-h-[500px] shadow-lg p-3 lg:p-10">


        <h1 class="lg:text-4xl text-xl font-bold pb-5 lg:pb-16">
            {{$pelatih->nama_lengkap}}
        </h1>

        <div id="profileContent" class="grid grid-cols-1 lg:grid-cols-2">
            <div class="pb-10 lg:pb-0">
                <table class="p-4 border-l-4 border-red-600 text-xs md:text-sm lg:text-base">
                    <tr>
                        <td class="md:p-2 p-1" style="padding-left: 1rem">Tempat, Tanggal Lahir</td>
                        <td class="md:p-2 p-1">:</td>
                        <td class="md:p-2 p-1">{{$pelatih->tempat_lahir}}, {{$pelatih->tanggal_lahir}}</td>
                    </tr>
                    <tr>
                        <td class="md:p-2 p-1" style="padding-left: 1rem">Jenis Kelamin</td>
                        <td class="md:p-2 p-1">:</td>
                        <td class="md:p-2 p-1">{{$pelatih->jenis_kelamin}}</td>
                    </tr>
                </table>
            </div>
            <div class="mx-auto">
                <img src="{{ asset('pelatih/' . $pelatih->foto) }}" alt="{{$pelatih->nama_lengkap}}" class="w-[300px] h-[300px] object-cover object-center rounded-lg">
            </div>
        </div>

    </div>
</section>



@endsection

@push('scripts')
<script>
    function showProfile() {
        document.getElementById('profileContent').style.display = 'grid';
        document.getElementById('achievementsContent').style.display = 'none';
    }

    function showAchievements() {
        document.getElementById('profileContent').style.display = 'none';
        document.getElementById('achievementsContent').style.display = 'block';
    }
</script>

@endpush
