@extends('layouts.main')

@section('content')

<section class="w-full min-h-screen container pt-10">
    <div class="w-full bg-white min-h-[500px] shadow-lg p-3 lg:p-10">
        <div class="pb-5">
            <div class="flex items-center justify-center gap-5">
                <button id="profileButton" onclick="showProfile()" class="text-lg  font-semibold text-blue-600 hover:text-blue-600">Profile</button>
                <button id="achievementsButton" onclick="showAchievements()" class="text-lg  font-semibold hover:text-blue-600">Prestasi</button>
            </div>
        </div>

        <h1 class="lg:text-4xl text-xl font-bold pb-5 lg:pb-16">
            {{$anggota->nama_lengkap ?? ''}}
        </h1>

        <div id="profileContent" class="grid grid-cols-1 lg:grid-cols-2">
            <div class="pb-10 lg:pb-0">
                <table class="p-4 border-l-4 border-red-600 text-xs md:text-sm lg:text-base">
                    <tr>
                        <td class="md:p-2 p-1" style="padding-left: 1rem">Tempat Lahir</td>
                        <td class="md:p-2 p-1">:</td>
                        <td class="md:p-2 p-1">{{$anggota->tempat_lahir}}</td>
                    </tr>
                    <tr>
                        <td class="md:p-2 p-1" style="padding-left: 1rem">Tanggal Lahir</td>
                        <td class="md:p-2 p-1">:</td>
                        <td class="md:p-2 p-1">{{ \Carbon\Carbon::parse($anggota->tanggal_lahir)->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <td class="md:p-2 p-1" style="padding-left: 1rem">Jenis Kelamin</td>
                        <td class="md:p-2 p-1">:</td>
                        <td class="md:p-2 p-1">{{$anggota->jenis_kelamin}}</td>
                    </tr>
                    <tr>
                        <td class="md:p-2 p-1" style="padding-left: 1rem">Kategori</td>
                        <td class="md:p-2 p-1">:</td>
                        <td class="md:p-2 p-1">{{$anggota->hasil_klasifikasi}}</td>
                    </tr>
                </table>
            </div>
            <div class="mx-auto">
                <img src="{{ asset('anggota/' . $anggota->foto) }}" alt="{{$anggota->nama_lengkap}}" class="w-[300px] h-[300px] object-cover object-center rounded-lg">
            </div>
        </div>

        <div id="achievementsContent" class="hidden">
            <div class="pb-10 lg:pb-0">
                <table class="p-4 border-l-4 border-red-600 text-xs md:text-sm lg:text-base">
                    @foreach($prestasi as $item)
                        <tr class="">
                            <td class="md:p-2 p-1" style="padding-left: 1rem"> <span>-</span> {{ $item->titl ?? '' }}</td>
                        </tr>
                    @endforeach

                </table>
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
        document.getElementById('profileButton').classList.add('text-blue-600');
        document.getElementById('achievementsButton').classList.remove('text-blue-600');
    }

    function showAchievements() {
        document.getElementById('profileContent').style.display = 'none';
        document.getElementById('achievementsContent').style.display = 'block';
        document.getElementById('profileButton').classList.remove('text-blue-600');
        document.getElementById('achievementsButton').classList.add('text-blue-600');
    }

    // Call showProfile as soon as the page loads
    window.onload = showProfile;
</script>

@endpush
