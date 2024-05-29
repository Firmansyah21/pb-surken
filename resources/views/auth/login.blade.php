@extends('layouts.guest')

@section('content')

<section class="relative" >
    <img src="{{asset('assets/img/hero.jpg')}}" class="min-h-screen" alt="Background Image" style="position: absolute; width: 100%; height: 100%; object-fit: cover; z-index: -1;">

    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto lg:h-screen lg:py-0">

        <div class="w-full pt-3 pb-3 mt-16 md:mt-[6rem] bg-white rounded-lg shadow dark:border  lg:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-lg text-center font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                Login
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " placeholder="name@company.com" required>
                        @error('email')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <div class="relative">
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " required>
                            <i class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer fas fa-eye" style="width: 20px; height: 20px;"></i>
                            <i class="toggle-password absolute right-3 top-1/2 transform -translate-y-1/2 cursor-pointer fa-solid fa-eye-slash" style="width: 20px; height: 20px; display: none;"></i>
                        </div>
                        @error('password')
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                              <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" >
                            </div>
                            <div class="ml-3 text-sm">
                              <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                            </div>
                        </div>
                        {{-- <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a> --}}
                    </div>
                    <button type="submit" class="w-full text-white bg-primary hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400 text-center">
                       Belum Punya Akun? <a href="{{route('register')}}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Daftar Disini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

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
