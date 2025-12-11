@extends('layouts.ecom-layout')


@section('content')
    {{-- <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg p-8 mt-10">
        <!-- Icon Success -->
        <div class="flex justify-center mb-5">
            <div class="bg-green-100 w-20 h-20 rounded-full flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-600" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 00-1.414-1.414L8 11.172 4.707 7.879a1 1 0 10-1.414 1.414l4.25 4.25a1 1 0 001.414 0l8.75-8.75z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>

        <h2 class="text-center font-bold text-2xl mb-1">Order Berhasil!</h2>
        <p class="text-center text-gray-700 font-semibold mb-2">
            Kode Transaksi: <span class="text-blue-600 font-bold">{{ $productTrasaction->booking_trx_id }}</span>
        </p>
        <p class="text-center text-gray-600 mb-6">
            Terima kasih telah melakukan pemesanan. Kami sedang memproses pesanan Anda.
        </p>

        <!-- Detail Transaksi -->
        <div class="border rounded-lg p-5 mb-6 bg-gray-50">
            <h3 class="font-semibold text-lg mb-3 text-gray-800">Detail Transaksi</h3>

            <div class="space-y-2 text-sm text-gray-700">
                <div class="flex justify-between"><span>Nama</span><span
                        class="font-semibold">{{ $productTrasaction->name }}</span></div>
                <div class="flex justify-between"><span>Email</span><span>{{ $productTrasaction->email }}</span></div>
                <div class="flex justify-between"><span>Phone</span><span>{{ $productTrasaction->phone }}</span></div>
                <div class="flex justify-between"><span>Alamat</span><span>{{ $productTrasaction->address }},
                        {{ $productTrasaction->city }}, {{ $productTrasaction->post_code }}</span></div>
                <div class="border-b my-2"></div>

                <div class="flex justify-between">
                    <img src="{{ Storage::url($productTrasaction->shoe->thumbnail) }}" alt="">
                    <span>Rp
                        {{ number_format($productTrasaction->sub_total_amount, 0, ',', '.') }}</span>
                </div>

                <div class="flex justify-between"><span>Quantity</span><span>x
                        {{ number_format($productTrasaction->quantity) }}</span></div>

                <div class="flex justify-between"><span>Subtotal</span><span>Rp
                        {{ number_format($productTrasaction->sub_total_amount, 0, ',', '.') }}</span></div>
                <div class="flex justify-between"><span>Tax 11%</span><span>Rp
                        {{ number_format($productTrasaction->sub_total_amount * 0.11, 0, ',', '.') }}</span></div>
                <div class="flex justify-between text-red-500"><span>Promo</span><span>- Rp
                        {{ number_format($productTrasaction->discount_amount, 0, ',', '.') }}</span></div>
                <div class="flex justify-between font-bold text-gray-900"><span>Total</span><span>Rp
                        {{ number_format($productTrasaction->grand_total_amount, 0, ',', '.') }}</span></div>
                <div class="mt-2 flex justify-between text-xs text-gray-600">
                    <span>Status</span>
                    <span
                        class="px-2 py-1 rounded text-white
                    {{ $productTrasaction->is_paid ? 'bg-green-600' : 'bg-yellow-500' }}">
                        {{ $productTrasaction->is_paid ? 'Sudah Verifikasi' : 'Menunggu Konfirmasi' }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Button Aksi -->
        <div class="space-y-3">
            <a href="/"
                class="block w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-lg text-center">
                Kembali ke Beranda
            </a>
            <a href=""
                class="block w-full border border-gray-400 hover:bg-gray-100 font-semibold py-3 rounded-lg text-center">
                Lihat Riwayat Order
            </a>
        </div>

        <p class="text-center text-gray-500 text-xs mt-6">
            Jika ada pertanyaan hubungi <a class="text-blue-600" href="#">support</a>.
        </p>
    </div> --}}
@section('content')
    <style>
        @keyframes checkmark {
            0% {
                transform: scale(0) rotate(0deg);
            }

            50% {
                transform: scale(1.2) rotate(180deg);
            }

            100% {
                transform: scale(1) rotate(360deg);
            }
        }

        .checkmark-animate {
            animation: checkmark 0.6s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>

    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-slate-100 py-12 px-4">
        <div class="max-w-5xl mx-auto">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden fade-in-up">
                <!-- Success Header -->
                <div class="bg-gradient-to-r from-emerald-500 to-teal-500 py-12 px-8 text-center">
                    <div
                        class="checkmark-animate inline-flex items-center justify-center w-24 h-24 bg-white rounded-full mb-4 shadow-lg">
                        <svg class="w-14 h-14 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h1 class="text-4xl font-bold text-white mb-3">Order Berhasil!</h1>
                    <p class="text-emerald-50 text-lg">Kode Transaksi: <span
                            class="font-bold bg-white/20 px-4 py-1 rounded-full">ECOMIRL4841</span></p>
                </div>

                <!-- Message -->
                <div class="px-8 py-6 bg-blue-50 border-l-4 border-blue-400">
                    <p class="text-gray-700 text-center text-lg">
                        Terima kasih telah melakukan pemesanan. Kami sedang memproses pesanan Anda.
                    </p>
                </div>

                <!-- Main Content -->
                <div class="p-10">
                    <div class="grid grid-cols-2 gap-8">
                        <!-- Left Column - Customer Info -->
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                <svg class="w-7 h-7 mr-2 text-emerald-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Informasi Pembeli
                            </h2>

                            <div class="space-y-4">
                                <div
                                    class="bg-gradient-to-r from-gray-50 to-gray-100 p-5 rounded-xl border border-gray-200">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-2 font-semibold">Nama</p>
                                    <p class="text-gray-800 font-bold text-lg">{{ $productTrasaction->name }}</p>
                                </div>
                                <div
                                    class="bg-gradient-to-r from-gray-50 to-gray-100 p-5 rounded-xl border border-gray-200">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-2 font-semibold">Email</p>
                                    <p class="text-gray-800 font-bold text-lg">{{ $productTrasaction->email }}</p>
                                </div>
                                <div
                                    class="bg-gradient-to-r from-gray-50 to-gray-100 p-5 rounded-xl border border-gray-200">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-2 font-semibold">Phone</p>
                                    <p class="text-gray-800 font-bold text-lg">{{ $productTrasaction->phone }}</p>
                                </div>
                                <div
                                    class="bg-gradient-to-r from-gray-50 to-gray-100 p-5 rounded-xl border border-gray-200">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-2 font-semibold">Alamat</p>
                                    <p class="text-gray-800 font-bold">{{ $productTrasaction->address }}</p>
                                </div>
                                <div
                                    class="bg-gradient-to-r from-gray-50 to-gray-100 p-5 rounded-xl border border-gray-200">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-2 font-semibold">Kota</p>
                                    <p class="text-gray-800 font-bold">{{ $productTrasaction->city }}</p>
                                </div>
                                <div
                                    class="bg-gradient-to-r from-gray-50 to-gray-100 p-5 rounded-xl border border-gray-200">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-2 font-semibold">Kode Pos
                                    </p>
                                    <p class="text-gray-800 font-bold">{{ $productTrasaction->post_code }}</p>
                                </div>
                            </div>

                            <!-- Status Badge -->
                            <div class="mt-6 bg-amber-50 border-2 border-amber-200 rounded-xl p-5">
                                <div class="flex items-center justify-between">
                                    @if ($productTrasaction->is_paid == true)
                                        <span class="text-gray-700 font-bold text-lg">Status Pesanan</span>
                                        <span
                                            class="bg-gradient-to-r from-green-400 to-green-500 text-white px-6 py-2 rounded-full text-sm font-bold shadow-md">
                                            Berhasil
                                        </span>
                                    @else
                                        <span class="text-gray-700 font-bold text-lg">Status Pesanan</span>
                                        <span
                                            class="bg-gradient-to-r from-amber-400 to-amber-500 text-amber-900 px-6 py-2 rounded-full text-sm font-bold shadow-md">
                                            Menunggu Konfirmasi
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Product & Payment -->
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                                <svg class="w-7 h-7 mr-2 text-emerald-500" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg>
                                Detail Produk
                            </h2>

                            <!-- Product Section -->
                            <div
                                class="bg-gradient-to-br from-slate-50 to-slate-100 rounded-xl p-6 mb-6 border border-gray-200">
                                <div class="flex gap-4 mb-6">
                                    <img src="{{ asset(Storage::url($productTrasaction->shoe->thumbnail)) }}"
                                        alt="Keyboard 1"
                                        class="w-1/3 rounded-lg shadow-md hover:scale-105 transition-transform cursor-pointer">
                                </div>
                                <div class="flex justify-between items-center">
                                    <p class="text-gray-500 font-medium">Price:</p>
                                    <p class="text-xl font-bold text-gray-700">Rp {{ number_format($productTrasaction->shoe->price, '0',',','.') }}</p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <p class="text-gray-500 font-medium">Quantity:</p>
                                    <p class="text-xl font-bold text-gray-700">X {{ $productTrasaction->quantity }}</p>
                                </div>
                            </div>

                            <!-- Price Breakdown -->
                            <div class="bg-white rounded-xl border-2 border-gray-200 p-6">
                                <h3 class="text-lg font-bold text-gray-800 mb-4 pb-3 border-b-2 border-gray-200">Rincian
                                    Pembayaran</h3>
                                <div class="space-y-4">
                                    <div class="flex justify-between text-gray-600 text-lg">
                                        <span>Subtotal</span>
                                        <span class="font-bold">Rp
                                            {{ number_format($productTrasaction->sub_total_amount, '0', ',', '.') }}</span>
                                    </div>
                                    <div class="flex justify-between text-gray-600 text-lg">
                                        <span>Tax 11%</span>
                                        <span class="font-bold">Rp
                                            {{ number_format($productTrasaction->sub_total_amount * 0.11, '0', ',', '.') }}</span>
                                    </div>
                                    <div class="flex justify-between text-emerald-600 text-lg">
                                        <span>Promo</span>
                                        <span class="font-bold">- Rp
                                            {{ number_format($productTrasaction->discount_amount, '0', ',', '.') }}</span>
                                    </div>
                                    <div class="flex justify-between items-center pt-4 border-t-2 border-gray-300">
                                        <span class="text-2xl font-bold text-gray-800">Total</span>
                                        <span
                                            class="text-3xl font-bold bg-gradient-to-r from-emerald-600 to-teal-600 bg-clip-text text-transparent">Rp
                                            {{ number_format($productTrasaction->grand_total_amount, '0', ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Price Breakdown -->
                            <div class="bg-white rounded-xl border-2 border-gray-200 p-6 mt-6">
                                <h3 class="text-lg font-bold text-gray-800 mb-4 pb-3 border-b-2 border-gray-200">Bukti Bayar
                                </h3>
                                <div class="space-y-4">
                                    <div class="w-full">
                                        <img src="{{ asset(Storage::url($productTrasaction->proof)) }}"
                                            alt="Bukti Pembayaran"
                                            class="w-full h-auto object-cover rounded-lg shadow-md hover:scale-105 transition-transform cursor-pointer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="grid grid-cols-2 gap-4 mt-10">
                        <a href="{{ route('dashboard') }}">
                            <button
                                class="bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-600 hover:to-teal-600 text-white font-bold py-4 px-8 rounded-xl shadow-lg transform transition hover:scale-105 active:scale-95 text-lg">
                                <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg>
                                Kembali ke Beranda
                            </button>
                        </a>
                        <button
                            class="bg-white border-2 border-gray-300 hover:border-emerald-500 hover:bg-emerald-50 text-gray-700 font-bold py-4 px-8 rounded-xl transition text-lg">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg>
                            Lihat Riwayat Order
                        </button>
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-8 py-5 text-center border-t-2 border-gray-200">
                    <p class="text-gray-600">
                        Jika ada pertanyaan hubungi
                        <a href="#"
                            class="text-emerald-600 hover:text-emerald-700 font-bold underline transition">support</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection
