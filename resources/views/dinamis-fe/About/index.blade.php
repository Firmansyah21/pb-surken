@extends('layouts.admin')
@section('container')

<section class="w-full bg-slate-400 px-4 shadow-md">

    <table>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach ($hero as $heros)
        <tr>
            <td>{{$heros->id}}</td>
            <td>{{$heros->title}}</td>
            <td><img src="{{asset('hero/'.$heros->image)}}" alt="" width="100"></td>
            <td>
                <a href="{{route('hero.edit', $heros->id)}}" class="bg-blue-500 text-white rounded-lg shadow-xl p-2.5">Edit</a>
                <a href="{{route('hero.destroy', $heros->id)}}" class="bg-red-500 text-white rounded-lg shadow-xl p-2.5">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>

</section>

@endsection
