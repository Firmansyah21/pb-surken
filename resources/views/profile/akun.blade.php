@extends('layouts.admin')
@section('container')
    @include('components.breadcrumbs')
    @include('alert.success')
<section class="w-full min-h-[500px] bg-white shadow-md border">


        <form action="{{ route('akun.update', $user->id) }}" method="POST"  class="w-full bg-white p-6 rounded-lg">
            @csrf
            @method('put')
            <x-input type="text" id="name" name="name" label="Name" value="{{$user->name}}" />
            <x-input type="email" id="email" name="email" label="Email" value="{{$user->email}}" />
            <x-input type="password" id="password" name="password" label="Password Baru" />
            <x-input type="password" id="password_confirmation" name="password_confirmation" label="Konfirmasi Password" />
            <div class="flex justify-between mt-6">

                <button type="submit" class="bg-primary  text-white font-semibold w-full h-[46px] lg:w-[150px]  rounded focus:outline-none focus:shadow-outline">Kirim</button>
            </div>
        </form>

</section>

@endsection
