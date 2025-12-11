@extends('layouts.ecom-layout')


@section('content')
    <div class="max-w-7xl mx-auto px-4 py-8" data-barba="container" data-barba-namespace="all-products">

        <div class="flex gap-6">
            <!-- SIDEBAR -->
            <aside class="w-72 bg-white border rounded-md p-4 shadow-sm sticky top-6 h-[80vh] overflow-auto sidebar">
                <h3 class="text-sm font-semibold tracking-wide">CATEGORIES</h3>
                <ul class="mt-4 space-y-2 text-sm text-gray-600">
                    @forelse ($categories as $category)
                        <li class="pl-1">{{ $category->name }}</li>
                    @empty
                        <p>category belum tersedia</p>
                    @endforelse
                </ul>

                <div class=" border-t pt-4">
                    <h4 class="text-sm font-semibold">PRICE</h4>
                    <div class="mt-3">
                        <input type="range" min="0" max="100" value="20" class="w-full" />
                        <div class="flex justify-between text-xs text-gray-500 mt-2">
                            <span>Rp0</span>
                            <span>Rp10jt+</span>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- CONTENT -->
            <section class="flex-1">
                <!-- toolbar -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-4">
                        <label class="text-sm text-gray-600"><!-- CAROUSEL (Swiper.js with autoplay, arrows, pagination) -->
                            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

                            <div class="w-full max-w-xl mb-6">
                                <div class="swiper mySwiper rounded-lg">
                                    <div class="swiper-wrapper">
                                        {{-- {{ dd($products) }} --}}
                                        @forelse ($bannerImages as $bannerImage)
                                            @if ($bannerImage->status != false)
                                                <div class="swiper-slide"><img
                                                        src="{{ asset(Storage::url($bannerImage->image)) }}"
                                                        class="w-full rounded-lg" /></div>
                                            @endif
                                        @empty
                                            <p>data belum ada</p>
                                        @endforelse
                                    </div>

                                    <!-- Pagination -->
                                    <div class="swiper-pagination"></div>

                                    <!-- Navigation buttons -->
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>

                            <!-- SORT BAR MOVED BELOW BANNER -->

                            <div class="flex items-center justify-between mt-4">
                                <div class="flex items-center gap-2">
                                    <span class="font-medium">Sort By:</span>
                                    <select class="border rounded px-2 py-1 text-sm">
                                        <option>Default sorting</option>
                                        <option>Popularity</option>
                                        <option>Latest</option>
                                        <option>Price: Low to High</option>
                                        <option>Price: High to Low</option>
                                    </select>
                                </div>

                                <div class="flex items-center gap-2">
                                    <span class="font-medium">Show:</span>
                                    <select class="border rounded px-2 py-1 text-sm">
                                        <option>12</option>
                                        <option>24</option>
                                        <option>36</option>
                                    </select>
                                    <button class="border rounded p-1">🔳</button>
                                    <button class="border rounded p-1">📄</button>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- product grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- render several cards -->
                    @forelse ($products as $product)
                        @if ($product->stock <= 0)
                            <a
                                href="{{ $product->stock > 0 ? route('product.detail', $product->slug) : 'javascript:void(0)' }}">
                                <div
                                    class="relative bg-white border rounded-md p-4 flex flex-col
        {{ $product->stock == 0 ? 'opacity-60 pointer-events-none' : 'hover:shadow-lg transition' }}">

                                    <div class="relative">
                                        <img src="{{ asset(Storage::url($product->thumbnail)) }}" alt="product"
                                            class="w-full h-48 object-contain" />

                                        {{-- Label jika stok habis --}}
                                        @if ($product->stock == 0)
                                            <div
                                                class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center rounded-md">
                                                <span class="text-white font-bold text-lg">OUT OF STOCK</span>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mt-4 flex-1">
                                        <div class="text-xs text-gray-400 uppercase">{{ $product->category->name }}</div>
                                        <h3 class="font-medium mt-1">{{ $product->name }}</h3>

                                        @if ($product->stock > 0)
                                            <div class="text-sm text-gray-400">Stok : {{ $product->stock }}</div>
                                        @else
                                            <div class="text-sm text-red-500 font-semibold">Stok Habis</div>
                                        @endif

                                        <div class="flex items-center mt-2">
                                            <div class="text-yellow-400 text-sm mr-2">★★★★★</div>
                                        </div>

                                        <div class="mt-3">
                                            <div class="text-sm text-gray-400 line-through">$29.00</div>
                                            <div class="text-lg font-bold">Rp
                                                {{ number_format($product->price, '0', ',', '.') }}</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @else
                            <a href="{{ route('product.detail', $product->slug) }}">
                                <div class="bg-white border rounded-md p-4 flex flex-col">
                                    <div class="relative">
                                        <img src="{{ asset(Storage::url($product->thumbnail)) }}" alt="product"
                                            class="w-full h-48 object-contain" />
                                    </div>
                                    <div class="mt-4 flex-1">
                                        <div class="text-xs text-gray-400 uppercase">{{ $product->category->name }}</div>
                                        <h3 class="font-medium mt-1">{{ $product->name }}</h3>
                                        <div class="text-sm text-gray-400">Stok : {{ $product->stock }}</div>
                                        <div class="flex items-center mt-2">
                                            <div class="text-yellow-400 text-sm mr-2">★★★★★</div>
                                        </div>
                                        <div class="mt-3">
                                            <div class="text-sm text-gray-400 line-through">$29.00</div>
                                            <div class="text-lg font-bold">Rp
                                                {{ number_format($product->price, '0', ',', '.') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @empty
                        <p>data belum ada</p>
                    @endforelse

                </div>
            </section>
        </div>
        <div>
            {{ $products->links('vendor.pagination.numbered') }}
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.mySwiper', {
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endsection
