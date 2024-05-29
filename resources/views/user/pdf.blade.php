@extends('layouts.pdf')
@section('pdf')

@section('title', 'Data User')

<tr>
    <th>NO</th>
    <th>UserName</th>
    <th>Email</th>
    <th>Role</th>
    <th>Dibuat</th>
</tr>

@php $i=1 @endphp
@foreach($user as $item)
<tr>
    <td>{{ $i++ }}</td>
    <td>{{ $item->name }}</td>
    <td>{{ $item->email }}</td>
    <td>{{ $item->roles->first()->name }}</td> <
    <td>{{$item->created_at->format('d-F-Y')}}</td>
</tr>
@endforeach

@endsection
