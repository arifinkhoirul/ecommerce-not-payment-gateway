{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}




<x-guest-layout>
    {{-- Left Form Section --}}
    <div class="w-1/2 p-10 flex flex-col justify-center">

        <h2 class="text-3xl font-bold mb-2 text-gray-800">Sign Up</h2>
        <p class="text-gray-500 text-sm mb-6">Masuk menggunakan akun anda</p>

        {{-- SESSION STATUS --}}
        @if (session('status'))
            <div class="mb-4 text-green-500 text-sm">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            {{-- EMAIL --}}
            <div>
                <input type="name" name="name" placeholder="Masukkan Nama Anda" value="{{ old('name') }}" required
                    class="w-full bg-gray-100 px-4 py-3 rounded-md border focus:border-blue-500 focus:ring-2 focus:ring-blue-300 outline-none">
                @error('name')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <input type="email" name="email" placeholder="Masukkan Email Anda" value="{{ old('email') }}"
                    required
                    class="w-full bg-gray-100 px-4 py-3 rounded-md border focus:border-blue-500 focus:ring-2 focus:ring-blue-300 outline-none">
                @error('email')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            {{-- PASSWORD --}}
            <div>
                <input type="password" name="password" placeholder="Password" required
                    class="w-full bg-gray-100 px-4 py-3 rounded-md border focus:border-blue-500 focus:ring-2 focus:ring-blue-300 outline-none">
                @error('password')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <input type="password_confirmation" name="password_confirmation" placeholder="password_confirmation" required
                    class="w-full bg-gray-100 px-4 py-3 rounded-md border focus:border-blue-500 focus:ring-2 focus:ring-blue-300 outline-none">
                @error('password_confirmation')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror
            </div>

            {{-- LUPA PASSWORD --}}
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                    Lupa kata sandi anda?
                </a>
            @endif

            {{-- BUTTON --}}
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 transition text-white font-semibold py-3 rounded-md shadow-md">
                SIGN UP
            </button>

            <a href="{{ route('login') }}">
                <button type="button"
                    class="w-full mt-2 border-red-900 hover:bg-blue-700 hover:text-white transition text-blue-700 font-semibold py-3 rounded-md shadow-md">
                    LOG IN ?
                </button>
            </a>

        </form>
    </div>

    {{-- Right Side --}}
    <div
        class="w-1/2 bg-gradient-to-br from-blue-600 to-blue-400 text-white p-10 flex flex-col items-center justify-center relative">

        {{-- Gambar ilustrasi (opsional) --}}
        <img src="{{ asset('image login and register/ecommerce login register.webp') }}"
            alt="illustration" class="w-64 mb-6 drop-shadow-lg">

        <h2 class="text-3xl font-bold">Halo, Teman!</h2>
        <p class="text-sm mt-2 text-white/90 text-center">JIka sudah mempunyai akun maka segeralah klik Login</p>

        {{-- @if (Route::has('register')) --}}
            <a href="{{ route('dashboard') }}"
                class="mt-6 px-8 py-2 border-2 border-white rounded-full hover:bg-white hover:text-blue-600 transition font-semibold">
                BACK TO HOME
            </a>
        {{-- @endif --}}
    </div>
</x-guest-layout>
