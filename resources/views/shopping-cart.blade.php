@extends('layouts.ecom-layout')


@section('content')
    <div class="container mx-auto px-4 py-8">
        <!-- Breadcrumb -->
        <div class="flex items-center justify-center gap-3 mb-8">
            <span class="text-blue-500 font-semibold text-lg">Shopping Cart</span>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <a href="{{ route('cart.customer.data') }}">
                <span class="text-gray-400 font-semibold text-lg">Checkout</span>
            </a>
            <i class="fas fa-chevron-right text-gray-400"></i>
            <span class="text-gray-400 font-semibold text-lg">Order Complete</span>
        </div>

        {{-- {{$orderData}} --}}
        @livewire('order-form', ['shoe' => $shoe])
    </div>
@endsection
