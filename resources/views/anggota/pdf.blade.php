@extends('layouts.pdf')
@section('pdf')

@section('title', 'Data Anggota')

<tr>
    <th>NO</th>
    <th>Id Anggota</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Jenis Kelamin</th>
    <th>No Hp</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Kategori</th>
    <th>User</th>
    <th>Status</th>
    <th>
        Dibuat
    </th>
</tr>

@php $i=1 @endphp
@foreach($anggota as $item)
<tr>
    <td>{{ $i++ }}</td>
    <td>{{$item->id_anggota}}</td>
    <td>{{$item->nama_lengkap}}</td>
    <td>{{$item->alamat}}</td>
    <td>{{$item->jenis_kelamin}}</td>
    <td>{{$item->no_telp}}</td>
    <td>{{$item->tempat_lahir}}</td>
    <td>{{$item->tanggal_lahir}}</td>
    <td>{{$item->hasil_klasifikasi}}</td>
    <td>{{$item->user->name}}</td>
    <td>{{$item->status_anggota}}</td>
    <td>{{$item->created_at->format('d-F-Y')}}</td>
</tr>
@endforeach

@endsection
