<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Porto eCommerce</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* small custom styles to match the screenshot look */
        .sidebar::-webkit-scrollbar {
            display: none;
        }

        .fade-out {
            opacity: 0;
            transition: opacity 0.3s ease;
        }
    </style>
</head>

<body class="font-sans" data-barba="wrapper">

    {{-- LOADING ANIMATION --}}
    <div id="pageLoader" class="fixed inset-0 bg-white bg-opacity-80 flex items-center justify-center hidden z-50">
        <div class="relative w-12 h-12">
            <div class="absolute w-full h-full border-4 border-blue-600 border-t-transparent rounded-full animate-spin">
            </div>
            <div
                class="absolute inset-2 w-8 h-8 border-4 border-blue-400 border-t-transparent rounded-full animate-spin [animation-duration:1.2s]">
            </div>
        </div>
    </div>


    <!-- Top Bar -->
    <div class="bg-gray-100 border-b">
        <div class="container mx-auto px-4 py-2 flex justify-between items-center text-sm">
            <div class="flex items-center gap-2">
                <i class="fas fa-truck text-blue-600"></i>
                <span class="text-gray-700">FREE Express Shipping On Orders $99+</span>
            </div>
            <div class="flex items-center gap-4">
                <select class="bg-transparent text-gray-700 border-none focus:outline-none">
                    <option>USD</option>
                    <option>EUR</option>
                </select>
                <select class="bg-transparent text-gray-700 border-none focus:outline-none">
                    <option>Eng</option>
                    <option>Id</option>
                </select>
                <a href="#" class="text-gray-700 hover:text-blue-600">My account</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">Cart</a>
                <a href="#" class="text-gray-700 hover:text-blue-600">Log In</a>
                <div class="flex gap-3 ml-2">
                    <a href="#" class="text-gray-700 hover:text-blue-600"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-gray-700 hover:text-blue-600"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-700 hover:text-blue-600"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="bg-white border-b shadow-sm">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between gap-8">
                <!-- Logo -->
                <div class="text-3xl font-bold">
                    <span class="text-gray-800">PORTO</span>
                    <div class="text-xs text-gray-500 font-normal">eCommerce</div>
                </div>

                <!-- Search Bar -->
                <div class="flex-1 max-w-2xl">
                    <div class="flex border-2 border-blue-600 rounded">
                        <input type="text" placeholder="Search..." class="flex-1 px-4 py-2 focus:outline-none">
                        <select class="border-l-2 border-blue-600 px-4 py-2 bg-white focus:outline-none text-gray-700">
                            <option>All Categories</option>
                            <option>Fashion</option>
                            <option>Electronics</option>
                        </select>
                        <button class="bg-blue-600 text-white px-6 py-2 hover:bg-blue-700">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>

                @if (Route::has('login'))
                    <nav class="-mx-3 flex flex-1 justify-end">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                Dashboard
                            </a>

                            <!-- User Actions -->
                            <div class="flex items-center gap-6">
                                <div class="flex items-center gap-2 cursor-pointer">
                                    <i class="fas fa-user text-2xl text-gray-700"></i>
                                    <div>
                                        <div class="text-xs text-gray-500">Welcome</div>
                                        <div class="font-semibold text-gray-800">{{ session('name') }}</div>
                                    </div>
                                </div>
                                <div class="relative cursor-pointer">
                                    <i class="fas fa-heart text-2xl text-gray-700"></i>
                                    <span
                                        class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs font-semibold">0</span>
                                </div>
                                <div class="relative cursor-pointer">
                                    <i class="fas fa-shopping-cart text-2xl text-gray-700"></i>
                                    <span
                                        class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs font-semibold">5</span>
                                </div>
                            </div>
                            <form action="{{ route('logout') }}" method="POST" class="ps-5">
                                @csrf
                                <button type="submit"
                                    class="px-5 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-full shadow-md transition-all duration-300 hover:shadow-lg hover:-translate-y-1 flex items-center gap-2">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    Logout
                                </button>
                            </form>
                        @else
                            <div class="flex items-center gap-3">

                                <a href="{{ route('login') }}"
                                    class="px-4 py-2 border border-blue-600 text-blue-700 rounded-lg font-medium
                    hover:bg-blue-100 hover:border-blue-600 transition-all duration-200
                    dark:hover:text-white dark:border-blue-600 dark:hover:bg-blue-600">
                                    Login
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="px-4 py-2 rounded-lg font-medium
                        bg-blue-600 text-white hover:bg-blue-700
                        transition-all duration-200 shadow-md hover:shadow-lg">
                                        Register
                                    </a>
                                @endif
                            </div>
                        @endauth
                    </nav>
                @endif
            </div>
        </div>
    </header>

    <!-- Navigation -->
    <nav class="bg-white border-b">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-600 text-white px-6 py-4 flex items-center gap-2 hover:bg-blue-700 font-semibold">
                    <i class="fas fa-bars"></i>
                    ALL DEPARTMENTS
                </button>
                <div class="flex items-center gap-8 text-gray-700">
                    <a href="{{ route('dashboard') }}" class="py-4 hover:text-blue-600 font-medium">Home</a>
                    <a href="{{ route('products') }}" class="py-4 hover:text-blue-600 font-medium">Products</a>
                    <a href="" class="py-4 hover:text-blue-600 font-medium">Blog</a>
                    <a href="" class="py-4 hover:text-blue-600 font-medium">Store</a>
                    <a href="{{ route('profile.akun') }}" class="py-4 hover:text-blue-600 font-medium">Profile</a>
                    {{-- <a href="#" class="py-4 hover:text-blue-600 font-medium">Pages</a>
                    <a href="#" class="py-4 hover:text-blue-600 font-medium">Buy Porto</a> --}}
                </div>
                <div class="flex items-center gap-8">
                    <a href="#" class="text-red-600 font-bold">FLASH DEALS</a>
                    <a href="#" class="font-bold text-gray-800">NEW ARRIVALS</a>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-phone text-gray-700"></i>
                        <span class="font-bold text-gray-800">1-800-234-5678</span>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div data-barba="container" data-barba-namespace="products">
        @yield('content')
    </div>

</body>

<script src="https://unpkg.com/@barba/core"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

<script>
    const pageLoader = document.getElementById('pageLoader');

    barba.init({
        transitions: [{
            async leave({
                current
            }) {
                // Tampilkan loader
                pageLoader.classList.remove('hidden');

                await gsap.to(current.container, {
                    opacity: 0,
                    duration: 0.3
                });
            },

            async enter({
                next
            }) {
                await gsap.from(next.container, {
                    opacity: 0,
                    duration: 0.3
                });

                // Sembunyikan loader setelah animasi selesai
                pageLoader.classList.add('hidden');
            }
        }]
    });
</script>



@stack('scripts')


</html>
