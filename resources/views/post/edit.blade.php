@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
<form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <x-input type="text" id="title" name="title" label='Nama' :value="$post->title" />
    <x-textarea id="body" name="body" rows="7" label="Konten" :value="$post->body" />
    <x-select-edit id="kategori_id" label="Kategori" :options="$kategori" :selected="$post->kategori_id" />
    <x-input type="file" id="image" name="image" label='Nama' :value="$post->image" />

    <x-label for="status" label="Status"/>
    <select id="status" name="status" class="block w-full mt-1 border-gray-300 mb-2 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
        <option value="0" {{ $post->status == '0' ? 'selected' : '' }}>Draft</option>
        <option value="1" {{ $post->status == '1' ? 'selected' : '' }}>Published</option>
    </select>
    <div class="flex justify-between  mt-6">
        <x-button-back route="post.index" />
        <x-button-submit title="Update" />
     </div>
</form>

@endsection
