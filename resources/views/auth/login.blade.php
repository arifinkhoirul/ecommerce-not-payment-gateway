{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



<x-guest-layout>
    {{-- Left Form Section --}}
    <div class="w-1/2 p-10 flex flex-col justify-center">

        <h2 class="text-3xl font-bold mb-2 text-gray-800">Sign In</h2>
        <p class="text-gray-500 text-sm mb-6">Masuk menggunakan akun anda</p>

        {{-- SESSION STATUS --}}
        @if (session('status'))
            <div class="mb-4 text-green-500 text-sm">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            {{-- EMAIL --}}
            <div>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
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

            {{-- LUPA PASSWORD --}}
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">
                    Lupa kata sandi anda?
                </a>
            @endif

            {{-- BUTTON --}}
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 transition text-white font-semibold py-3 rounded-md shadow-md">
                SIGN IN
            </button>

            <a href="{{ route('register') }}">
                <button type="button"
                    class="w-full mt-2 border-red-900 hover:bg-blue-700 hover:text-white transition text-blue-700 font-semibold py-3 rounded-md shadow-md">
                    DON'T HAVE ACCOUNT?
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
        <p class="text-sm mt-2 text-white/90 text-center">Daftar dan mulai gunakan layanan kami sekarang</p>

        {{-- @if (Route::has('register')) --}}
            <a href="{{ route('dashboard') }}"
                class="mt-6 px-8 py-2 border-2 border-white rounded-full hover:bg-white hover:text-blue-600 transition font-semibold">
                BACK TO HOME
            </a>
        {{-- @endif --}}
    </div>
</x-guest-layout>
