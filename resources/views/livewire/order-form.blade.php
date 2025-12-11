<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Cart Items Section -->
    <div class="lg:col-span-2">
        <!-- Table Header -->
        <div class="bg-white rounded-lg shadow mb-4">
            <div class="grid grid-cols-12 gap-4 p-4 border-b font-semibold text-gray-700">
                <div class="col-span-5">PRODUCT</div>
                <div class="col-span-2 text-center">PRICE</div>
                <div class="col-span-3 text-center">QUANTITY</div>
                <div class="col-span-2 text-right">SUBTOTAL</div>
            </div>
            {{-- {{dd($shoe->name)}} --}}
            <!-- Cart Item 1 -->

            <div class="grid grid-cols-12 gap-4 p-4 border-b items-center">
                <div class="col-span-5 flex items-center gap-4">
                    <button class="text-gray-400 hover:text-red-500">
                        <i class="fas fa-times"></i>
                    </button>
                    <img src="{{ asset(Storage::url($shoe->thumbnail)) }}" alt="Backpack"
                        class="w-20 h-20 object-cover rounded">
                    <span class="font-medium text-gray-700">{{ $shoe->name }}</span>
                </div>
                <div class="col-span-2 text-center text-gray-600">Rp {{ number_format($shoe->price, '0', ',', '.') }}
                </div>
                <div class="col-span-3 flex items-center justify-center">
                    <div class="flex items-center border border-gray-300 rounded">
                        <button class="px-3 py-2 hover:bg-gray-100" wire:click="decrementQty">
                            <i class="fas fa-minus text-xs"></i>
                        </button>
                        <input type="number" name="quantity" value="{{ $quantity }}"
                            class="w-12 text-center border-l border-r border-gray-300 py-2 focus:outline-none">
                        <button class="px-3 py-2 hover:bg-gray-100" wire:click="incrementQty">
                            <i class="fas fa-plus text-xs"></i>
                        </button>
                    </div>
                </div>
                <div class="col-span-2 text-right font-semibold text-gray-800">
                    {{ number_format($subTotalAmount, '0', ',', '.') }}</div>
            </div>
        </div>
        {{-- <p>{{$promoCode}}</p> --}}
        <!-- Coupon Section -->
        <div class="bg-white rounded-lg shadow p-4">
            <div class="flex gap-3">
                <input type="text" name="promo" placeholder="Coupon Code"
                    wire:model.live.debounce.500ms="promoCode"
                    class="flex-1 px-4 py-3 border border-gray-300 rounded focus:outline-none focus:border-gray-400">
                <button class="px-6 py-3 bg-gray-100 text-gray-700 font-semibold rounded hover:bg-gray-200 transition"
                    wire:click="updatedPromoCode">
                    APPLY COUPON
                </button>
                <button class="px-6 py-3 bg-gray-800 text-white font-semibold rounded hover:bg-gray-900 transition">
                    UPDATE CART
                </button>
            </div>
            @if ($alertPromoMessage == 'kode promo berhasil yeay')
                <p class="text-green-600 mt-2">{{ $alertPromoMessage }}</p>
            @elseif ($alertPromoMessage == 'kode promo tidak tersedia')
                <p class="text-red-600 mt-2">{{ $alertPromoMessage }}</p>
            @else
                <p></p>
            @endif
        </div>
    </div>

    <!-- Cart Totals Section -->
    <div class="lg:col-span-1">
        <form wire:submit.prevent="submit">
            <div class="bg-white rounded-lg shadow p-6 sticky top-4">
                <h2 class="text-xl font-bold text-gray-800 mb-6">CART TOTALS</h2>

                <!-- Subtotal -->
                <div class="flex justify-between items-center mb-4 pb-4 border-b">
                    <span class="text-gray-600 font-medium">Subtotal</span>
                    <span class="font-semibold text-gray-800">{{ number_format($subTotalAmount, '0', ',', '.') }}</span>
                </div>
                <!-- Subtotal -->
                <div class="flex justify-between items-center mb-4 pb-4 border-b">
                    <span class="text-gray-600 font-medium">Tax 11%</span>
                    <span class="font-semibold text-gray-800">{{ number_format($totalTax, '0', ',', '.') }}</span>
                </div>
                <!-- Subtotal -->
                <div class="flex justify-between items-center mb-4 pb-4 border-b">
                    <span class="text-gray-600 font-medium">discount</span>
                    <span class="font-semibold text-red-500">- {{ $discount }}</span>
                </div>
                <!-- Subtotal -->
                <div class="flex justify-between items-center mb-4 pb-4 border-b">
                    <span class="text-gray-600 font-medium">Grand Total</span>
                    <span class="font-semibold text-gray-800">{{ number_format($grandTotalAmount, '0', ',', '.') }}</span>
                </div>

                <button class="w-full py-3 bg-gray-800 text-white font-semibold rounded hover:bg-gray-900 transition mb-4">
                    UPDATE TOTALS
                </button>
            </div>
        </form>
    </div>
</div>
