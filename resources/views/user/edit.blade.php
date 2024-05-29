@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')

<div>


    <form action="{{route('user.update', $user->id)}}" method="post" class="space-y-4">
        @csrf
        @method('put')
        <x-input required id="name" label="Nama" :value="$user->name" />
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm" value="{{$user->email}}">
        </div>
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none sm:text-sm" value="{{$user->password}}">
        </div>
        <div class="mb-2">
            <label for="role" class="block text-sm font-medium text-gray-700" required>
                Role
            </label>
            <select name="role" id="role" class="block w-full mt-1 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                <option value="admin" {{ $user->hasRole('admin') ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->hasRole('user') ? 'selected' : '' }}>User</option>
            </select>
        </div>



        <div class="flex justify-between mt-6">
            <x-button-back route="user.index" />
            <x-button-submit title="Update" />
        </div>

    </form>
</div>

@endsection

