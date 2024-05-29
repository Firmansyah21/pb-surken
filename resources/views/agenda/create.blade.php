@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
<form action="{{route('agenda.store')}}" method="POST" enctype="multipart/form-data">
@csrf

<x-input id="title" name="title" label="Title" />
<x-input type="date" id="tanggal_mulai" name="tanggal_mulai" label="Tanggal Mulai" />
<x-input type="date" id="tanggal_berakhir" name="tanggal_berakhir" label="Tanggal Berakhir" />
<x-input id="jam" name="jam" label="Jam" />
<x-input id="lokasi" name="lokasi" label="Lokasi" />
<x-textarea id="keterangan" name="keterangan" rows="3" label="Keterangan" />
<x-input type="file" id="foto" name="foto" label="Foto" />

<div class="hidden lg:block">
    <div class="flex justify-between mt-6 " >
        <x-button-back route="anggota.index" />
        <x-button-submit title="Kirim" />
    </div>
  </div>

  <div class=" mt-6 lg:hidden block">

    <button type="submit" class="bg-primary  text-white font-semibold w-full h-[46px]   rounded ">Kirim</button>
</div>
</form>


@endsection
