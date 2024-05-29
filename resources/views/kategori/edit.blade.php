@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
<div>
    <div class="flex items-center gap-4 ">
        <h1 class="text-2xl font-semibold">Edit Kategori</h1>
    </div>

    <form action="{{route('kategori.update', $kategori->id)}}" method="post" class="space-y-4">
        @csrf
        @method('put')
        <x-input  id="name"  name="name" label="Nama Kategori" :value="$kategori->name" />
        <x-input  id="usia" name="usia"  label="Usia" :value="$kategori->usia" />
        <div class="flex justify-between  mt-6">
             <x-button-back route="kategori.index" />
             <x-button-submit title="Update" />
         </div>
    </form>
</div>


@endsection
