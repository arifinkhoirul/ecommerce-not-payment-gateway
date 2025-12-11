@extends('layouts.ecom-layout')


@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 bg-white rounded-lg shadow-lg p-6">
            <!-- Left Column - Product Image -->
            {{-- {{dd($shoe->shoePhotos)}} --}}
            {{-- <div class="relative">
                <div class="absolute top-4 left-4 z-10">
                    <span class="bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">HOT</span>
                    <span class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full mt-2 block w-fit">-15%</span>
                </div>

                <div class="flex items-center justify-center bg-gray-100 rounded-lg p-8 mb-4">
                    <img src="{{ asset(Storage::url($productDetail[0]->thumbnail)) }}" alt="Beats Solo HD"
                        class="max-w-full h-auto">
                </div>

                <!-- Thumbnail Images -->
                <div class="grid grid-cols-4 gap-2">
                    @forelse ($productDetail[0]->shoePhotos as $photo)
                        <div class="border-2 border-gray-800 rounded-lg p-2 bg-white cursor-pointer">
                            <img src="{{ asset(Storage::url($photo->photo)) }}" alt="Thumbnail 1" class="w-full h-auto">
                        </div>
                    @empty
                        <p>belum ada foto produk</p>
                    @endforelse
                </div>
            </div> --}}

            <div class="relative">
                <div class="absolute top-4 left-4 z-10">
                    <span class="bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">HOT</span>
                    <span class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full mt-2 block w-fit">-15%</span>
                </div>

                <!-- MAIN IMAGE -->
                <div class="flex items-center justify-center bg-gray-100 rounded-lg p-8 mb-4">
                    <img id="mainImage" src="{{ asset(Storage::url($productDetail[0]->thumbnail)) }}" alt="Main Product"
                        class="max-w-full h-auto transition-all duration-300">
                </div>

                <!-- THUMBNAILS -->
                <div class="grid grid-cols-4 gap-2">
                    @forelse ($productDetail[0]->shoePhotos as $photo)
                        <div class="thumb border-2 border-gray-300 hover:border-gray-500 rounded-lg p-2 bg-white cursor-pointer transition"
                            data-url="{{ asset(Storage::url($photo->photo)) }}">
                            <img src="{{ asset(Storage::url($photo->photo)) }}" class="w-full h-auto">
                        </div>
                    @empty
                        <p>belum ada foto produk</p>
                    @endforelse
                </div>
            </div>


            <!-- Right Column - Product Details -->
            <div class="flex flex-col">
                <div class="flex items-center justify-between mb-2">
                    <h1 class="text-3xl font-bold text-gray-800">{{ $productDetail[0]->name }}</h1>
                    <div class="flex gap-2">
                        <button
                            class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded hover:bg-gray-100">
                            <i class="fas fa-chevron-left text-sm"></i>
                        </button>
                        <button
                            class="w-8 h-8 flex items-center justify-center border border-gray-300 rounded hover:bg-gray-100">
                            <i class="fas fa-chevron-right text-sm"></i>
                        </button>
                    </div>
                </div>

                <!-- Rating -->
                <div class="flex items-center mb-4">
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <span class="text-gray-500 text-sm ml-2">( 6 Reviews )</span>
                </div>

                <!-- Price -->
                <div class="mb-6">
                    <span class="text-gray-400 line-through text-xl mr-2">Rp 1.500.000</span>
                    <span
                        class="text-4xl font-bold text-gray-800">Rp{{ number_format($productDetail[0]->price, '0', ',', '.') }}</span>
                </div>

                <!-- Description -->
                <p class="text-gray-600 leading-relaxed mb-4">
                    {{ $productDetail[0]->about }}
                </p>

                <!-- Category -->
                <div class="mb-6">
                    <span class="text-gray-500 text-sm">{{ $productDetail[0]->category->name }}</span>
                    {{-- <span class="text-gray-500 text-sm">{{ $productDetail[0]->slug }}</span> --}}
                    <span class="text-gray-800 font-semibold text-sm">{{ $productDetail[0]->name }}</span>
                </div>

                <!-- Quantity and Add to Cart -->
                <div class="flex items-center gap-4 mb-6">
                    <form action="{{ route('cart.save', $productDetail[0]->slug ) }}" method="POST">
                        @csrf
                        <button
                            class="flex-1 bg-gray-800 text-white py-3 px-6 rounded hover:bg-gray-900 transition font-semibold">
                            Buy
                        </button>
                        {{-- @error('shoe_id')
                            <p class="text-danger">{{$message}}</p>
                        @enderror --}}
                    </form>
                    <button
                        class="flex-1 bg-white text-gray-900 py-3 px-6 rounded hover:bg-blue-400 transition font-semibold">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        ADD TO CART
                    </button>
                </div>

                <!-- Social Share and Wishlist -->
                <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                    <button
                        class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded hover:bg-gray-100">
                        <i class="fab fa-facebook-f text-gray-600"></i>
                    </button>
                    <button
                        class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded hover:bg-gray-100">
                        <i class="fab fa-twitter text-gray-600"></i>
                    </button>
                    <button
                        class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded hover:bg-gray-100">
                        <i class="fab fa-linkedin-in text-gray-600"></i>
                    </button>
                    <button
                        class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded hover:bg-gray-100">
                        <i class="fab fa-google-plus-g text-gray-600"></i>
                    </button>
                    <button
                        class="w-10 h-10 flex items-center justify-center border border-gray-300 rounded hover:bg-gray-100">
                        <i class="fas fa-envelope text-gray-600"></i>
                    </button>
                    <button class="flex items-center gap-2 ml-auto text-gray-700 hover:text-red-500 transition">
                        <i class="far fa-heart"></i>
                        <span class="font-semibold text-sm">ADD TO WISHLIST</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Tabs Section -->
        <div class="bg-white rounded-lg shadow-lg mt-8 p-6">
            <div class="border-b border-gray-200 mb-6">
                <div class="flex gap-8">
                    <button class="pb-4 border-b-2 border-gray-800 font-bold text-gray-800">DESCRIPTION</button>
                    <button class="pb-4 text-gray-500 hover:text-gray-800">REVIEWS (1)</button>
                </div>
            </div>

            <!-- Description Content -->
            <div class="text-gray-600 leading-relaxed">
                <p class="mb-6">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, nostrud ipsum consectetur sed do, quis nostrud
                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                    reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat.
                </p>

                <div class="space-y-3 mb-6">
                    <div class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 mt-1"></i>
                        <span>Any Product types that You want - Simple, Configurable</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 mt-1"></i>
                        <span>Downloadable/Digital Products, Virtual Products</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <i class="fas fa-check-circle text-green-500 mt-1"></i>
                        <span>Inventory Management with Backordered items</span>
                    </div>
                </div>

                <p>
                    Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
        </div>

        <!-- Related Products Section -->
        <div class="mt-12">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-800">RELATED PRODUCTS</h2>
                <div class="flex gap-2">
                    <button
                        class="w-8 h-8 flex items-center justify-center border-2 border-blue-500 text-blue-500 rounded-full hover:bg-blue-500 hover:text-white transition">
                        <i class="fas fa-chevron-left text-sm"></i>
                    </button>
                    <button
                        class="w-8 h-8 flex items-center justify-center border-2 border-gray-300 text-gray-400 rounded-full hover:border-blue-500 hover:text-blue-500 transition">
                        <i class="fas fa-chevron-right text-sm"></i>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
                <!-- Product 1 -->
                {{-- {{$productRelated}} --}}
                @forelse ($productRelated as $productRltd)
                    <a href="{{ route('product.detail', $productRltd->slug) }}">

                        <div class="bg-white rounded-lg shadow hover:shadow-xl transition group">
                            <div class="relative p-4">
                                <div class="absolute top-2 left-2 z-10">
                                    <span
                                        class="bg-green-500 text-white text-xs font-bold px-2 py-1 rounded-full block mb-1">HOT</span>
                                    <span
                                        class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full block">-27%</span>
                                </div>
                                <button
                                    class="absolute top-2 right-2 w-8 h-8 bg-white rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition shadow hover:bg-red-50">
                                    <i class="far fa-heart text-gray-600 hover:text-red-500"></i>
                                </button>
                                <img src="{{ asset(Storage::url($productRltd->thumbnail)) }}" alt="Drone"
                                    class="w-full h-48 object-contain mb-4">
                            </div>
                            <div class="p-4 border-t">
                                <p class="text-xs text-gray-500 uppercase mb-1">{{ $productRltd->category->name }}</p>
                                <h3 class="font-semibold text-gray-800 mb-2">{{ $productRltd->name }}</h3>
                                <div class="flex text-yellow-400 text-xs mb-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <div>
                                    <span class="text-gray-400 line-through text-sm mr-2">$59.00</span>
                                    <span
                                        class="text-xl font-bold text-gray-800">Rp{{ number_format($productRltd->price, '0', ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <p>belum ada produk yang mirip</p>
                @endforelse
            </div>

        </div>
    </div>

    <script>
        document.querySelectorAll('.thumb').forEach(thumb => {
            thumb.addEventListener('click', function() {
                const newSrc = this.getAttribute('data-url');
                const mainImage = document.getElementById('mainImage');

                // Animasi Fade-out → Ganti gambar → Fade-in
                mainImage.style.opacity = 0;

                setTimeout(() => {
                    mainImage.src = newSrc;
                    mainImage.style.opacity = 1;
                }, 200);
            });
        });
    </script>
@endsection
