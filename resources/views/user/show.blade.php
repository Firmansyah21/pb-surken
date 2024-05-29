@extends('layouts.admin')
@section('container')

@include('components.breadcrumbs')


<div class="w-full bg-white shadow-md ">

    <div class="px-4 min-h-[500px]">

        <div class="flex items-center gap-4 mb-4 pt-5 ">
            <h1 class="text-xl font-semibold">Detail User</h1>
        </div>

        <table class="table-auto w-full mt-4 text-left text-xs md:text-sm">
            <tr class="border-b">
                <td class="py-2">Id</td>
                <td class="px-2">:</td>
                <td>{{$user->id}}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2">Username</td>
                <td class="px-2">:</td>
                <td>{{$user->name}}</td>
            </tr>
            <tr class="border-b">
                <td class="py-2">Email </td>
                <td class="px-2">:</td>
                <td>{{$user->email}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">Role </td>
                <td class="px-2">:</td>
                <td>{{$user->roles->pluck('name')->join(', ')}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2"> Dibuat Pada</td>
                <td class="px-2">:</td>
                <td>{{$user->created_at->format('d-F-Y H:i:s')}}</td>
            </tr>

            <tr class="border-b">
                <td class="py-2">DiUbah Pada </td>
                <td class="px-2">:</td>
                <td>{{$user->updated_at->format('d-F-Y H:i:s')}}</td>
            </tr>


        </table>



    </div>

</div>


@endsection
