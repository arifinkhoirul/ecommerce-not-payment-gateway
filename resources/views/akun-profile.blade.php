@extends('layouts.ecom-layout')

@section('content')
    <div class="max-w-5xl mx-auto mt-10">

        <!-- ================= PROFILE CARD ================= -->
        <div class="bg-white shadow-md rounded-xl p-6 flex items-center gap-6">
            <div class="w-24 h-24 rounded-full bg-blue-600 text-white flex items-center justify-center text-3xl font-bold">
                IR
            </div>

            <div class="flex-1">
                <h1 class="text-2xl font-semibold">{{ session('name') }}</h1>
                <p class="text-gray-500">{{ session('email') }}</p>
            </div>

            <div class="flex items-center gap-3">
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Edit Profil</button>

                <form method="POST">
                    <button
                        class="px-4 py-2 border border-red-500 text-red-500 rounded-lg hover:bg-red-500 hover:text-white">
                        Logout
                    </button>
                </form>
            </div>
        </div>


        <!-- ================= TITLE ================= -->
        <h2 class="text-2xl font-bold mt-10 mb-4">Daftar Pembelian</h2>


        <!-- ================= PURCHASE LIST ================= -->
        <div class="space-y-6">

            @forelse ($dataShoppingUser as $dataShoping)
                <div class="bg-white shadow-md rounded-xl p-5 flex gap-5">

                    <!-- Gambar Produk -->
                    <img src="{{ asset(Storage::url($dataShoping->shoe->thumbnail)) }}"
                        class="w-36 h-36 rounded-lg object-cover">

                    <!-- Detail Produk -->
                    <div class="flex-1">
                        <h3 class="text-xl font-semibold">{{ $dataShoping->shoe->name }}</h3>
                        <p class="text-gray-600">Quantity: {{ $dataShoping->quantity }}</p>
                        <p class="text-gray-600">Harga: <span class="font-semibold">Rp
                                {{ number_format($dataShoping->grand_total_amount) }}</span></p>

                        @if ($dataShoping->is_paid == 0)
                            <span class="inline-block mt-2 px-4 py-1 rounded-full text-sm bg-yellow-100 text-yellow-600">
                                pembayaran anda sedang di check
                            </span>
                        @else
                            <span class="inline-block mt-2 px-4 py-1 rounded-full text-sm bg-green-100 text-green-600">
                                pembayaran berhasil
                            </span>
                        @endif

                        <!-- Bukti Bayar -->
                        <div class="mt-3">
                            <p class="font-medium text-gray-700 mb-1">Bukti Pembayaran:</p>
                            <img src="{{ asset(Storage::url($dataShoping->proof)) }}" class="w-48 rounded-md shadow object-cover">
                        </div>
                    </div>

                    <!-- Tombol Konfirmasi -->
                    <div class="flex flex-col justify-center">
                        <button class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                            Konfirmasi Pesanan
                        </button>
                    </div>

                </div>
            @empty
                <p>anda belum berbelanja</p>
            @endforelse

        </div>

    </div>
@endsection
