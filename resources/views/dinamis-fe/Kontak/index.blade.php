@extends('layouts.admin')
@section('container')

<section class="w-full bg-slate-400 px-4 shadow-md">

    <div class=" py-6">
        <form action="{{route('create-home')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name='title' id="title" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5" >
            <input type="file" name='image' id="image" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-9 p-2.5" >

    <button type="submit" class="bg-primary-500 text-white rounded-lg shadow-xl p-2.5">Submit

        </form>
    </div>

</section>

@endsection
