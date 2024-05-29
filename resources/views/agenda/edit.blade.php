@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
<form action="{{route('agenda.update', $agenda->id)}}" method="POST" enctype="multipart/form-data">
@csrf
@method('put')

<x-input id="title" name="title" label="Title"  value="{{$agenda->title}}"/>
<x-input type="date" id="tanggal_mulai" name="tanggal_mulai" label="Tanggal Mulai"  value="{{$agenda->tanggal_mulai}}"/>
<x-input type="date" id="tanggal_berakhir" name="tanggal_berakhir" label="Tanggal Berakhir"  value="{{$agenda->tanggal_berakhir}}"/>
<x-input id="jam" name="jam" label="Jam"  value="{{$agenda->jam}}"/>
<x-input id="lokasi" name="lokasi" label="Lokasi"  value="{{$agenda->lokasi}}"/>
    <x-textarea id="keterangan" name="keterangan" rows="3" label="Keterangan"  value="{{$agenda->keterangan}} "/>
<x-input type="file" id="foto" name="foto" label="Foto"  value="{{$agenda->foto}}"/>

<div class="col-span-2 flex justify-between mt-6">
    <x-button-back route="agenda.index" />
    <x-button-submit title="Update" />
</div>
</form>


@endsection
