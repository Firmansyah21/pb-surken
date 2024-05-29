@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
    <form action="{{route('gallery.update', ['gallery' => $galeri->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-input type="text" id="title" name="title" label="Title" required :value="$galeri->title" />
        <x-input id="foto" name='foto' type="file" label='Gambar' />
        <div class="col-span-2 flex justify-between mt-6">
            <x-button-back route="gallery.index" />
            <x-button-submit title="Update" />
        </div>
    </form>


@endsection





