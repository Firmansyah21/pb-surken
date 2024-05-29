@extends('layouts.pdf')
@section('pdf')

@section('title', 'Data Prestasi')

<tr>
    <th>NO</th>
    <th>Title</th>
    <th>Tanggal</th>
    <th>Tingkat</th>
    <th>Juara</th>
    <th>Lokasi</th>
    <th>Kategori</th>
    <th>Anggota</th>
</tr>

@php $i=1 @endphp
@foreach($prestasi as $item)
<tr>
    <td>{{ $i++ }}</td>
    <td>{{$item->title}}</td>
    <td>{{$item->tanggal}}</td>
    <td>{{$item->tingkat}}</td>
    <td>{{$item->juara}}</td>
    <td>{{$item->lokasi}}</td>
    <td>{{$item->kategori->nama ?? ''}}</td>
    <td>{{$item->anggota->nama_lengkap}}</td>

</tr>
@endforeach

@endsection
