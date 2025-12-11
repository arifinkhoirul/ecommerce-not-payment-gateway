{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.ecom-layout')

@section('content')
    {{-- {{dd($bannerImages)}} --}}
    <!-- Hero Banner Carousel -->
    <section class="relative px-[200px] mt-5">
        <div class="relative w-full h-[500px] overflow-hidden">
            <!-- Slide 1 -->
            @forelse ($bannerImages as $bannerImage)
                <div class="carousel-slide absolute inset-0 opacity-100 transition-opacity duration-700">
                    <img src="{{ asset(Storage::url($bannerImage->image)) }}" alt="Banner 1"
                        class="w-full h-full object-cover">
                </div>
            @empty
                <p>tidak ada banner</p>
            @endforelse

            <!-- Carousel Controls -->
            <button id="prevBtn"
                class="absolute left-6 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-4 rounded-full shadow-xl z-10 transition">
                <i class="fas fa-chevron-left text-gray-800 text-xl"></i>
            </button>
            <button id="nextBtn"
                class="absolute right-6 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white p-4 rounded-full shadow-xl z-10 transition">
                <i class="fas fa-chevron-right text-gray-800 text-xl"></i>
            </button>

            <!-- Carousel Indicators -->
            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-3 z-10">
                <button class="indicator w-3 h-3 rounded-full bg-white shadow-lg transition"></button>
                <button class="indicator w-3 h-3 rounded-full bg-white/50 shadow-lg transition"></button>
                <button class="indicator w-3 h-3 rounded-full bg-white/50 shadow-lg transition"></button>
            </div>
        </div>
    </section>

    <!-- Product Categories -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-8 gap-6">
                <!-- Fashion -->
                @forelse ($categories as $category)
                    <div class="text-center group cursor-pointer">
                        <div class="bg-gray-50 p-6 rounded-lg mb-3 group-hover:shadow-lg transition-all">
                            <img src="{{ Storage::url($category->icon) }}" alt="Fashion"
                                class="w-20 h-20 mx-auto object-cover rounded">
                        </div>
                        <h4 class="font-bold text-gray-800 mb-1">{{ $category->name }}</h4>
                        <p class="text-xs text-gray-500">7 PRODUCTS</p>
                    </div>
                @empty
                    <p>category tidak ada</p>
                @endforelse

            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-8 bg-gray-50 border-t border-b">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-4 gap-8">
                <!-- Free Shipping -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <i class="fas fa-truck text-4xl text-blue-600"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-1">FREE SHIPPING & RETURN</h4>
                        <p class="text-sm text-gray-600">Free shipping on all orders over $99.</p>
                    </div>
                </div>

                <!-- Money Back -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <i class="fas fa-dollar-sign text-4xl text-blue-600"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-1">MONEY BACK GUARANTEE</h4>
                        <p class="text-sm text-gray-600">100% money back guarantee</p>
                    </div>
                </div>

                <!-- Online Support -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <i class="fas fa-headset text-4xl text-blue-600"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-1">ONLINE SUPPORT 24/7</h4>
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>

                <!-- Secure Payment -->
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <i class="fas fa-lock text-4xl text-blue-600"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-800 mb-1">SECURE PAYMENT</h4>
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Promotional Banners -->
    <section class=" py-8 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 gap-6">
                <!-- Nice Shoes Banner -->
                <div
                    class="bg-gray-900 text-white p-8 rounded-lg flex items-center justify-between relative overflow-hidden">
                    <div class="flex items-center gap-6">
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=200" alt="Shoes"
                            class="w-40 h-32 object-cover rounded">
                    </div>
                    <div class="text-right">
                        <div class="text-sm mb-2 flex items-center justify-end gap-2">
                            <span>UP TO</span>
                            <span class="bg-red-500 px-4 py-1 text-2xl font-bold rounded">50%</span>
                            <span>OFF</span>
                        </div>
                        <div class="text-gray-400 text-sm mb-2">FLASH SALES ON</div>
                        <div class="text-4xl font-bold">NICE SHOES</div>
                    </div>
                </div>

                <!-- Top Electronics Banner -->
                <div class="bg-gray-100 p-8 rounded-lg flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <img src="https://images.unsplash.com/photo-1484704849700-f032a568e944?w=100" alt="Earphone"
                            class="w-24 h-24 object-contain">
                        <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=100" alt="Headphone"
                            class="w-24 h-24 object-contain">
                        <img src="https://images.unsplash.com/photo-1527864550417-7fd91fc51a46?w=100" alt="Mouse"
                            class="w-24 h-24 object-contain">
                    </div>
                    <div class="text-right">
                        <h3 class="text-3xl font-bold text-gray-800 leading-tight">TOP ELECTRONIC<br>FOR GIFTS</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Grid -->
    <div class="bg-gray-50 col-span-9 px-[200px]">
        <div class="grid grid-cols-4 gap-4">
            <!-- Product 1 - PT Speaker -->
            @forelse ($productsLimit as $product)
            <a href="{{route('product.detail', $product->slug)}}">
                <div class="border rounded-lg p-4 bg-white hover:shadow-lg transition relative">
                    <span
                        class="absolute top-3 left-3 bg-green-500 text-white text-xs px-2 py-1 rounded font-semibold">HOT</span>
                    <button class="absolute top-3 right-3 text-gray-400 hover:text-red-500">
                        <i class="far fa-heart"></i>
                    </button>
                    <img src="{{ asset(Storage::url($product->thumbnail)) }}" class="w-full h-32 object-contain mb-3">
                    <p class="text-xs text-gray-500 mb-1">{{ $product->category->name }}</p>
                    <h4 class="font-semibold text-sm mb-2">{{ $product->name }}</h4>
                    <div class="flex mb-2">
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                    </div>
                    <div>
                        <span class="text-gray-400 line-through text-xs mr-1">$29.00</span>
                        <span class="text-lg font-bold text-gray-800">Rp {{ number_format($product->price, '0', ',','.') }}</span>
                    </div>
                </div>
            </a>
            @empty
                <p>data produk belum ada</p>
            @endforelse

        </div>
        <div class="flex justify-center mt-8">
            <a href="{{ route('products') }}">
                <button
                    class="bg-blue-600 hover:bg-blue-700 mb-4 text-white font-bold py-3 px-12 rounded transition duration-300 flex items-center gap-2">
                    <span>SHOP NOW</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </a>
        </div>

        <!-- Newsletter Section -->
        <section class="bg-gray-100 py-8 border-t mt-[80px]">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <i class="fas fa-envelope text-5xl text-gray-700"></i>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">Subscribe To Our Newsletter</h3>
                            <p class="text-sm text-gray-600">Get all the latest information on Events, Sales and Offers.
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-0 w-1/2">
                        <input type="email" placeholder="Your E-mail Address"
                            class="flex-1 px-4 py-3 border border-gray-300 focus:outline-none focus:border-blue-600">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 font-bold transition">
                            SUBSCRIBE NOW!
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-white py-12 border-t">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-4 gap-8 mb-12">
                    <!-- Customer Service -->
                    <div>
                        <h4 class="text-lg font-bold text-gray-800 mb-4">CUSTOMER SERVICE</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">Help & FAQs</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">Order Tracking</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">Shipping & Delivery</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">Orders History</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">Advanced Search</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">Login</a></li>
                        </ul>
                    </div>

                    <!-- About Us -->
                    <div>
                        <h4 class="text-lg font-bold text-gray-800 mb-4">ABOUT US</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">About Us</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">Careers</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">Our Stores</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">Corporate Sales</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">Careers</a></li>
                        </ul>
                    </div>

                    <!-- More Information -->
                    <div>
                        <h4 class="text-lg font-bold text-gray-800 mb-4">MORE INFORMATION</h4>
                        <ul class="space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">Affiliates</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">Refer a Friend</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">Student Beans Offers</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">Gift Vouchers</a></li>
                        </ul>
                    </div>

                    <!-- Social Media -->
                    <div>
                        <h4 class="text-lg font-bold text-gray-800 mb-4">SOCIAL MEDIA</h4>
                        <div class="flex gap-3">
                            <a href="#"
                                class="w-10 h-10 border border-gray-300 rounded flex items-center justify-center hover:bg-blue-600 hover:text-white hover:border-blue-600 transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 border border-gray-300 rounded flex items-center justify-center hover:bg-blue-400 hover:text-white hover:border-blue-400 transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 border border-gray-300 rounded flex items-center justify-center hover:bg-pink-600 hover:text-white hover:border-pink-600 transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Product Categories Links -->
                <div class="border-t pt-8 space-y-3">
                    <!-- Fashion -->
                    <div class="flex items-start gap-2">
                        <span class="font-bold text-gray-800">Fashion:</span>
                        <div class="flex flex-wrap gap-2 text-sm text-gray-600">
                            <a href="#" class="hover:text-blue-600">Tops & Blouses</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Accessories</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Dresses & Skirts</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Shoes & Boots</a>
                            <span>|</span>
                            <a href="#" class="text-blue-600 font-semibold">View All →</a>
                        </div>
                    </div>

                    <!-- Electronics -->
                    <div class="flex items-start gap-2">
                        <span class="font-bold text-gray-800">Electronics:</span>
                        <div class="flex flex-wrap gap-2 text-sm text-gray-600">
                            <a href="#" class="hover:text-blue-600">Cables & Adapters</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Electronic Cigarettes</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Batteries</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Chargers</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Home Electronic</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Bags & Cases</a>
                            <span>|</span>
                            <a href="#" class="text-blue-600 font-semibold">View All →</a>
                        </div>
                    </div>

                    <!-- Gifts -->
                    <div class="flex items-start gap-2">
                        <span class="font-bold text-gray-800">Gifts:</span>
                        <div class="flex flex-wrap gap-2 text-sm text-gray-600">
                            <a href="#" class="hover:text-blue-600">Gifts for Boyfriend</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Gifts for Husband</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Gifts for Dad</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Gifts for Grandpa</a>
                            <span>|</span>
                            <a href="#" class="text-blue-600 font-semibold">View All →</a>
                        </div>
                    </div>

                    <!-- Home & Garden -->
                    <div class="flex items-start gap-2">
                        <span class="font-bold text-gray-800">Home & Garden:</span>
                        <div class="flex flex-wrap gap-2 text-sm text-gray-600">
                            <a href="#" class="hover:text-blue-600">Sofas & Couches</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Armchairs</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Bed Frames</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Bedside Tables</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Dressing Tables</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Chest of Drawers</a>
                            <span>|</span>
                            <a href="#" class="text-blue-600 font-semibold">View All →</a>
                        </div>
                    </div>

                    <!-- Music -->
                    <div class="flex items-start gap-2">
                        <span class="font-bold text-gray-800">Music:</span>
                        <div class="flex flex-wrap gap-2 text-sm text-gray-600">
                            <a href="#" class="hover:text-blue-600">Guitar</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Drums Sets</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Percussions</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Pedals & Effects</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Sound Cards</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Studio Equipments</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Piano & Keyboards</a>
                            <span>|</span>
                            <a href="#" class="text-blue-600 font-semibold">View All →</a>
                        </div>
                    </div>

                    <!-- Sports -->
                    <div class="flex items-start gap-2">
                        <span class="font-bold text-gray-800">Sports:</span>
                        <div class="flex flex-wrap gap-2 text-sm text-gray-600">
                            <a href="#" class="hover:text-blue-600">Sports & Fitness</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Boating & Sailing</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Clothing</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Exercise & Fitness</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Golf</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Hunting & Fishing</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Leisure Sports</a>
                            <span>|</span>
                            <a href="#" class="hover:text-blue-600">Running</a>
                            <span>|</span>
                            <a href="#" class="text-blue-600 font-semibold">View All →</a>
                        </div>
                    </div>
                </div>

                <!-- Payment Methods -->
                <div class=" flex justify-end items-center gap-8 mt-8 pt-8 border-t">
                    <span class="font-bold text-gray-800">PAYMENT METHODS</span>
                    <div class="flex gap-3">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa"
                            class="h-8">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/b5/PayPal.svg" alt="PayPal"
                            class="h-8">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/b/ba/Stripe_Logo%2C_revised_2016.svg"
                            alt="Stripe" class="h-8">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Verisign_logo.svg" alt="VeriSign"
                            class="h-8">
                    </div>
                </div>
            </div>
        </footer>

        <!-- Copyright -->
        <div class="bg-gray-100 py-4 border-t">
            <div class="container mx-auto px-4 text-center">
                <p class="text-sm text-gray-600">Porto eCommerce. © 2021. All Rights Reserved</p>
            </div>
        </div>
    @endsection

    @push('scripts')
        <script>
            // Carousel functionality
            let currentSlide = 0;
            const slides = document.querySelectorAll('.carousel-slide');
            const indicators = document.querySelectorAll('.indicator');
            const totalSlides = slides.length;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.style.opacity = i === index ? '1' : '0';
                });
                indicators.forEach((indicator, i) => {
                    if (i === index) {
                        indicator.classList.remove('bg-white/50');
                        indicator.classList.add('bg-white');
                    } else {
                        indicator.classList.remove('bg-white');
                        indicator.classList.add('bg-white/50');
                    }
                });
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % totalSlides;
                showSlide(currentSlide);
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                showSlide(currentSlide);
            }

            document.getElementById('nextBtn').addEventListener('click', nextSlide);
            document.getElementById('prevBtn').addEventListener('click', prevSlide);

            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    currentSlide = index;
                    showSlide(currentSlide);
                });
            });

            // Auto slide every 5 seconds
            setInterval(nextSlide, 5000);
        </script>
    @endpush
