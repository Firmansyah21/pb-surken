
@extends('layouts.admin')
@section('container')
@include('components.breadcrumbs')
<form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

                <x-input label="Nama" type="text" id="name" name="name" required />
                <x-input label="Email" type="email" id="email" name="email" required />

                <div class="mb-2">
                    <label for="password" class="block text-xs md:text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password" placeholder="••••••••" class="mt-1 block w-full py-2 px-3 border border-gray-500 rounded-md shadow-sm focus:outline-none sm:text-sm" required>
                        <i class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer fas fa-eye" style="width: 20px; height: 20px;"></i>
                        <i class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer fa-solid fa-eye-slash" style="width: 20px; height: 20px; display: none;"></i>
                    </div>
                    @error('password')
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>



                <div class="mb-2">
                    <label for="role" class="block text-sm font-medium text-gray-700" required>
                        Role
                    </label>
                    <select name="role" id="role" class="mt-1 block w-full py-2 px-3 border border-gray-500 rounded-md shadow-sm focus:outline-none sm:text-sm">
                        <option value="" disabled selected>Pilih Salah Satu</option>
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <div class="hidden lg:block">
                    <div class="flex justify-between mt-6 " >
                        <x-button-back route="anggota.index" />
                        <x-button-submit title="Kirim" />
                    </div>
                  </div>

                  <div class=" mt-6 lg:hidden block">

                    <button type="submit" class="bg-primary  text-white font-semibold w-full h-[46px]   rounded ">Kirim</button>
                </div>
</form>
@endsection

@push('scripts')
<script>
    const togglePassword = document.querySelectorAll('.toggle-password');
    togglePassword.forEach((toggle) => {
        toggle.addEventListener('click', () => {
            const input = toggle.previousElementSibling;
            if (input.getAttribute('type') === 'password') {
                input.setAttribute('type', 'text');
                toggle.querySelector('.fa-eye').style.display = 'none';
                toggle.querySelector('.fa-eye-slash').style.display = 'block';
            } else {
                input.setAttribute('type', 'password');
                toggle.querySelector('.fa-eye').style.display = 'block';
                toggle.querySelector('.fa-eye-slash').style.display = 'none';
            }
        });
    });
</script>


@endpush
