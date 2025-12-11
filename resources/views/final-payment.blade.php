@extends('layouts.ecom-layout')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <div class="flex items-center justify-center gap-3 mb-8">
            <span class="text-gray-400 font-semibold text-lg">Shopping Cart</span>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <a href="">
                <span class="text-gray-400 font-semibold text-lg">Checkout</span>
            </a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <span class="text-blue-500 font-semibold text-lg">Final Payment</span>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <span class="text-gray-400 font-semibold text-lg">Order Complete</span>
        </div>

        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-xl p-8 space-y-8">

            <h2 class="text-2xl font-bold text-gray-900 mb-4">Checkout & Payment Confirmation</h2>

            <form action="{{ route('order.confirm') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <!-- Customer Information -->
                <div class="space-y-4">
                    <h3 class="font-semibold text-xl text-gray-800">Customer Information</h3>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-medium text-gray-700">Full Name *</label>
                            <input type="text" class="w-full border rounded-lg px-4 py-3 mt-1 focus:border-gray-600"
                                value="{{ $orderData['name'] }}" placeholder="Your Full Name" disabled>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700">City *</label>
                            <input type="text" class="w-full border rounded-lg px-4 py-3 mt-1 focus:border-gray-600"
                                value="{{ $orderData['city'] }}" placeholder="City" disabled>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700">Phone *</label>
                            <input type="text" class="w-full border rounded-lg px-4 py-3 mt-1 focus:border-gray-600"
                                value="{{ $orderData['phone'] }}" placeholder="08xxxx" disabled>
                        </div>

                        <div>
                            <label class="text-sm font-medium text-gray-700">Email *</label>
                            <input type="email" class="w-full border rounded-lg px-4 py-3 mt-1 focus:border-gray-600"
                                value="{{ $orderData['email'] }}" placeholder="email@example.com" disabled>
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-gray-700">Street Address *</label>
                        <textarea class="w-full border rounded-lg px-4 py-3 mt-1 focus:border-gray-600" placeholder="Full Address" disabled>{{ $orderData['address'] }}</textarea>
                    </div>
                </div>


                <!-- PRODUCT SUMMARY + TOTAL -->
                <div class="border rounded-xl p-6 bg-gray-50 space-y-4">

                    <h3 class="font-semibold text-xl text-gray-800">Order Summary</h3>

                    <div class="flex items-center gap-4">
                        <img src="{{ asset(Storage::url($shoe->thumbnail)) }}" class="w-20 h-20 rounded object-cover">
                        <span class="ml-auto font-semibold text-gray-800">
                            Rp {{ number_format($shoe->price, 0, ',', '.') }}
                        </span>
                    </div>

                    <hr>

                    <div class="text-sm space-y-2">
                        <div class="flex justify-between">
                            <span>Quantity</span>
                            <span>x {{ $orderData['quantity'] }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($orderData['sub_total_amount'], 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Tax 11%</span>
                            <span>Rp {{ number_format($orderData['tax_total'], 0, ',', '.') }}</span>
                        </div>

                        <div class="flex justify-between text-red-600">
                            <span>Discount</span>
                            <span>- Rp {{ number_format($orderData['discount'], 0, ',', '.') }}</span>
                        </div>

                        <div class="flex justify-between font-bold text-lg pt-2 border-t">
                            <span>Total</span>
                            <span>Rp {{ number_format($orderData['grand_total_amount'], 0, ',', '.') }}</span>
                        </div>
                    </div>

                </div>
                {{-- <input type="text" name="shoe_size" value="0"> --}}

                <!-- UPLOAD PAYMENT PROOF -->
                <div class="space-y-2">
                    <h3 class="font-semibold text-xl text-gray-800">Upload Payment Proof</h3>

                    <label
                        class="flex items-center gap-3 w-full px-4 py-3 border border-gray-300 rounded-lg cursor-pointer bg-white hover:bg-gray-50 transition">
                        <div class="bg-gray-800 text-white text-sm font-medium px-4 py-2 rounded-md">
                            Choose File
                        </div>
                        <span id="fileName" class="text-gray-500 text-sm truncate">No file chosen</span>
                        <input type="file" name="proof" id="fileInput" class="hidden" required>
                    </label>
                    @error('proof')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <button class="w-full bg-gray-900 text-white py-3 rounded-lg font-semibold hover:bg-gray-800 transition">
                    Confirm & Submit Payment
                </button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById("fileInput").addEventListener("change", function() {
            document.getElementById("fileName").textContent = this.files[0]?.name ?? "No file chosen";
        });
        // Show selected filename
        document.getElementById("fileInput").addEventListener("change", function() {
            let name = this.files.length > 0 ? this.files[0].name : "No file chosen";
            document.getElementById("fileName").textContent = name;
        });
    </script>
@endsection
