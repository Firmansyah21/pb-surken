@extends('layouts.pdf')
@section('pdf')

@section('title', 'Data Kategori')

<tr>
    <th>NO</th>
    <th>Nama</th>
    <th>Usia</th>
  </tr>
  @php $i=1 @endphp
  @foreach($kategori as $k)
  <tr>
  <td>{{ $i++ }}</td>
  <td>{{$k->name}}</td>
  <td>{{$k->usia}}</td>

  </tr>
  @endforeach


@endsection
