@extends('layouts.ecom-layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <div class="flex items-center justify-center gap-3 mb-8">
            <span class="text-gray-400 font-semibold text-lg">Shopping Cart</span>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <a href="/checkout.html">
                <span class="text-blue-500 font-semibold text-lg">Checkout</span>
            </a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <span class="text-gray-400 font-semibold text-lg">Order Complete</span>
        </div>

        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Billing Details Form -->
                <div class="lg:col-span-2">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Billing details</h2>

                    <form method="POST" action="{{ route('save.order.cust') }}" class="space-y-6">
                        @csrf
                        <!-- First Name & Last Name -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <input type="text" name="user_id" value="{{ session('id') }}" class="hidden">
                            <div>
                                <label class="block text-gray-700 text-sm mb-2">
                                    Full name <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="name"
                                    class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-gray-500"
                                    required>
                            </div>
                            <input type="text" name="is_paid" value="0" class="hidden">
                            <div>
                                <label class="block text-gray-700 text-sm mb-2">
                                    City <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="city"
                                    class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-gray-500"
                                    required>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-gray-700 text-sm mb-2">
                                    Phone <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="phone"
                                    class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-gray-500"
                                    required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm mb-2">
                                    Email <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="email"
                                    class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-gray-500"
                                    required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm mb-2">
                                    Post Code <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="post_code"
                                    class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-gray-500"
                                    required>
                            </div>
                        </div>

                        <!-- Street Address -->
                        <div>
                            <label class="block text-gray-700 text-sm mb-2">
                                Street address <span class="text-red-500">*</span>
                            </label>
                            <textarea type="text" placeholder="House number and street name" name="address"
                                class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-gray-500 mb-3" required>
                            </textarea>
                        </div>
                        {{-- <div>
                            <label class="block text-gray-700 text-sm mb-2">
                                Upload Document <span class="text-red-500">*</span>
                            </label>
                            <label
                                class="flex items-center gap-3 w-full px-4 py-3 border border-gray-300 rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition">
                                <div class="bg-gray-800 text-white text-sm font-medium px-4 py-2 rounded-md">
                                    Choose File
                                </div>
                                <span id="fileName" class="text-gray-500 text-sm truncate">
                                    No file chosen
                                </span>
                                <input type="file" name="proof" id="fileInput" class="hidden">
                            </label>
                        </div> --}}
                        <button
                            class="w-full bg-gray-800 text-white font-bold py-4 rounded hover:bg-gray-900 transition text-sm tracking-wide">
                            Continue Payment
                        </button>
                    </form>
                </div>

                <!-- Your Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow-lg p-6 sticky top-4">
                        <h2 class="text-xl font-bold text-gray-800 mb-6">YOUR ORDER</h2>

                        <!-- Product Header -->
                        <div class="flex justify-between items-center pb-3 mb-4 border-b-2 border-gray-200">
                            <span class="font-semibold text-gray-800">Product</span>
                        </div>

                        <!-- Product Items -->
                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between items-start">
                                <span class="text-gray-700">{{ $shoe->name }}</span>
                                <span class="font-semibold text-gray-800">{{ number_format($shoe->price) }}</span>
                            </div>
                            <div class="flex justify-between items-start">
                                <span class="text-gray-700">Quantity</span>
                                <span class="font-semibold text-gray-800">x
                                    {{ number_format($orderData['quantity']) }}</span>
                            </div>
                            <div class="flex justify-between items-center py-3 border-t border-b border-gray-200">
                                <span class="font-semibold text-gray-800">Subtotal</span>
                                <span
                                    class="font-semibold text-gray-800">{{ number_format($orderData['sub_total_amount'], '0', ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-start">
                                <span class="text-gray-700">Tax 11%</span>
                                <span
                                    class="font-semibold text-gray-800">{{ number_format($orderData['tax_total']) }}</span>
                            </div>
                            <div class="flex justify-between items-start">
                                <span class="text-gray-700">Promo Code</span>
                                <span class="font-semibold">{{ $orderData['promo_code_name'] }}</span>
                            </div>
                            <div class="flex justify-between items-start">
                                <span class="text-gray-700">Discount</span>
                                <span class="font-semibold text-red-600">{{ number_format($orderData['discount']) }}</span>
                            </div>
                            {{-- <div class="flex justify-between items-center py-3 border-t border-b border-gray-200">
                                <span class="font-semibold text-gray-800">Grand Total</span>
                                <span class="font-semibold text-gray-800">{{ number_format($orderData['grand_total_amount'], '0', ',', '.') }}</span>
                            </div> --}}

                        </div>

                        <!-- Shipping -->
                        <div class="py-4 border-b border-gray-200">
                            <h3 class="font-semibold text-gray-800 mb-3">Shipping</h3>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="shipping" value="local" checked
                                        class="w-4 h-4 text-blue-500 accent-blue-500">
                                    <span class="text-gray-700">Local Pickup</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="shipping" value="flat"
                                        class="w-4 h-4 text-blue-500 accent-blue-500">
                                    <span class="text-gray-700">Flat Rate</span>
                                </label>
                            </div>
                        </div>

                        <!-- Total -->
                        <div class="flex justify-between items-center py-4 mb-6">
                            <span class="font-bold text-gray-800 text-lg">Total</span>
                            <span
                                class="font-bold text-gray-800 text-2xl">{{ number_format($orderData['grand_total_amount'], '0', ',', '.') }}</span>
                        </div>

                        <!-- Payment Methods -->
                        <div class="mb-6">
                            <h3 class="font-semibold text-gray-800 mb-3">Payment methods</h3>
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <div class="flex items-start gap-2">
                                    <i class="fas fa-info-circle text-blue-500 mt-0.5"></i>
                                    <p class="text-sm text-gray-700">
                                        Sorry, it seems that there are no available payment methods for your state.
                                        Please
                                        contact us if you require assistance or wish to make alternate arrangements.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Place Order Button -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Show selected filename
        document.getElementById("fileInput").addEventListener("change", function() {
            let name = this.files.length > 0 ? this.files[0].name : "No file chosen";
            document.getElementById("fileName").textContent = name;
        });
    </script>
@endsection
