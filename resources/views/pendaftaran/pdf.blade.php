@extends('layouts.pdf')
@section('pdf')

@section('title', 'Data Pendaftaran')

<tr>
    <th>NO</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>Jenis Kelamin</th>
    <th>No Hp</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Akte Kelahiran</th>
    <th>Ijazah</th>
    <th>Dibuat</th>

</tr>

@php $i=1 @endphp
@foreach($pendaftaran as $item)
<tr>
    <td>{{ $i++ }}</td>
    <td>{{$item->nama_lengkap}}</td>
    <td>{{$item->alamat}}</td>
    <td>{{$item->jenis_kelamin}}</td>
    <td>{{$item->no_telp}}</td>
    <td>{{$item->tempat_lahir}}</td>
    <td>{{$item->tanggal_lahir}}</td>
    <td>
        <a href="{{ asset($item->ijazah) }}" target="_blank" rel="noopener noreferrer" style="color: blue; text-decoration: underline;">Lihat PDF</a>
    </td>
    <td>
        <a href="{{ asset($item->akte) }}" target="_blank" rel="noopener noreferrer" style="color: blue; text-decoration: underline;">Lihat PDF</a>
    </td>
    <td>{{$item->created_at->format('d-F-Y')}}</td>
</tr>
@endforeach

@endsection
