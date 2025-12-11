@extends('layouts.ecom-layout')

@section('content')
    <div class="bg-gray-50 min-h-screen py-10">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6">

            {{-- ================= Sidebar Profile ================= --}}
            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex flex-col items-center text-center">

                    {{-- Foto Avatar --}}
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=1D4ED8&color=fff"
                        class="w-24 h-24 rounded-full mb-3 shadow">

                    <h2 class="text-xl font-semibold text-gray-800">{{ session('name') }}</h2>
                    <p class="text-gray-500 text-sm">{{ session('email') }}</p>

                    {{-- Tombol Edit --}}
                    <a href="#"
                        class="mt-4 w-full py-2 rounded-md text-center bg-blue-600 text-white hover:bg-blue-700 transition font-medium">
                        Edit Profil
                    </a>

                    {{-- Logout Modern --}}
                    <form method="POST" class="w-full mt-3">
                        <button type="submit"
                            class="w-full py-2 border border-red-500 text-red-500 rounded-md hover:bg-red-500 hover:text-white transition font-medium">
                            Logout
                        </button>
                    </form>
                </div>
            </div>


            {{-- ================= Content User Purchases ================= --}}
            <div class="md:col-span-2 bg-white rounded-xl shadow p-6">
                <h3 class="text-2xl font-semibold mb-5 text-gray-700">Riwayat Pembelian</h3>

                <div class="grid md:grid-cols-2 gap-5">

                    {{-- Produk Dummy 1 --}}
                    <div class="border rounded-lg p-4 hover:shadow-md transition">
                        <img src="https://images.unsplash.com/photo-1581291518857-4e27b48ff24e"
                            class="w-full h-36 object-cover rounded-md mb-3">

                        <h4 class="font-semibold text-gray-800 text-lg">Headphone Wireless</h4>
                        <p class="text-sm text-gray-500 mb-2">Rp 350.000</p>

                        <span class="text-xs px-3 py-1 rounded-full bg-green-100 text-green-700">
                            Completed
                        </span>

                        <a href="#"
                            class="block mt-3 w-full text-center py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                            Lihat Detail
                        </a>
                    </div>

                    {{-- Produk Dummy 2 --}}
                    <div class="border rounded-lg p-4 hover:shadow-md transition">
                        <img src="https://images.unsplash.com/photo-1517336714731-489689fd1ca8"
                            class="w-full h-36 object-cover rounded-md mb-3">

                        <h4 class="font-semibold text-gray-800 text-lg">Mechanical Keyboard</h4>
                        <p class="text-sm text-gray-500 mb-2">Rp 450.000</p>

                        <span class="text-xs px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">
                            Pending
                        </span>

                        <a href="#"
                            class="block mt-3 w-full text-center py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                            Lihat Detail
                        </a>
                    </div>

                    {{-- Produk Dummy 3 --}}
                    <div class="border rounded-lg p-4 hover:shadow-md transition">
                        <img src="https://images.unsplash.com/photo-1518773553398-650c184e0bb3"
                            class="w-full h-36 object-cover rounded-md mb-3">

                        <h4 class="font-semibold text-gray-800 text-lg">Gaming Mouse</h4>
                        <p class="text-sm text-gray-500 mb-2">Rp 250.000</p>

                        <span class="text-xs px-3 py-1 rounded-full bg-red-100 text-red-700">
                            Canceled
                        </span>

                        <a href="#"
                            class="block mt-3 w-full text-center py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 transition">
                            Lihat Detail
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
