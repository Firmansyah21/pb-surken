@extends('layouts.guest')
@section('content')

<section class="relative">
    <img src="{{asset('assets/img/hero.jpg')}}" class="min-h-screen md:h-[111vh]" alt="Background Image" style="position: absolute; width: 100%; height: 100vh; object-fit: cover; z-index: -1;">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 ">

        <div class="w-full mt-0 md:mt-16 bg-white rounded-lg shadow dark:border lg:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-3 md:space-y-6 sm:p-8">
                <h1 class="text-xl text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Registrasi
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Username" required>
                        @error('name')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
                        @error('email')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <div class="relative">
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <i class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer fas fa-eye" style="width: 20px; height: 20px;"></i>
                            <i class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer fa-solid fa-eye-slash" style="width: 20px; height: 20px; display: none;"></i>
                        </div>
                        @error('password')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            <i class="toggle-password2 absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer fas fa-eye" style="width: 20px; height: 20px;"></i>
                            <i class="toggle-password2 absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer fa-solid fa-eye-slash" style="width: 20px; height: 20px; display: none;"></i>
                        </div>
                        @error('password_confirmation')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="w-full text-white bg-primary hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Daftar</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400 text-center">
                       Sudah Punya Akun? <a href="{{route('login')}}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login Disini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    const togglePassword1 = document.querySelectorAll('.toggle-password');
    togglePassword1.forEach((toggle) => {
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

    const togglePassword2 = document.querySelectorAll('.toggle-password2');
    togglePassword2.forEach((toggle) => {
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
