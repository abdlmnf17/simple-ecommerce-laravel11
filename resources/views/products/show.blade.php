<!-- resources/views/products/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detail Produk') }}: {{ $product->name }}
        </h2>
    </x-slot>

    <section class="py-12 sm:py-16">
        <div class="container mx-auto px-4">
            <!-- Breadcrumb Navigation -->
            <nav class="flex">
                <ol role="list" class="flex items-center">
                    <li class="text-left">
                        <div class="-m-1">
                            <a href="{{ route('dashboard') }}" class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800"> Home </a>
                        </div>
                    </li>
                    <li class="text-left">
                        <div class="flex items-center">
                            <span class="mx-2 text-gray-400">/</span>
                            <div class="-m-1">
                                <a href="{{ route('products.index') }}" class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800"> Products </a>
                            </div>
                        </div>
                    </li>
                    <li class="text-left">
                        <div class="flex items-center">
                            <span class="mx-2 text-gray-400">/</span>
                            <div class="-m-1">
                                <a href="#" class="rounded-md p-1 text-sm font-medium text-gray-600 focus:text-gray-900 focus:shadow hover:text-gray-800" aria-current="page">{{ $product->name }}</a>
                            </div>
                        </div>
                    </li>
                </ol>
            </nav>

            <div class="mt-8 grid grid-cols-1 gap-12 lg:grid-cols-5 lg:gap-16">
                <!-- Image Gallery -->
                <div class="lg:col-span-3">
                    <div class="lg:flex lg:items-start">
                        <div class="lg:order-2 lg:ml-5">
                            <div class="max-w-xl overflow-hidden rounded-lg">
                                <div x-data="{ swiper: null }" class="swiper-container">
                                    <div class="swiper-wrapper">
                                        @foreach ([$product->photo, $product->photo_2, $product->photo_3, $product->photo_4] as $photo)
                                            @if ($photo)
                                            <div class="swiper-slide">
                                                <img src="{{ Storage::url($photo) }}" alt="{{ $product->name }}" class="h-200 w-full object-cover rounded-lg">
                                            </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2 w-full lg:order-1 lg:w-32 lg:flex-shrink-0">
                            <div class="flex flex-row items-start lg:flex-col">
                                @foreach ([$product->photo, $product->photo_2, $product->photo_3, $product->photo_4] as $photo)
                                    @if ($photo)
                                    <button type="button" class="flex-0 aspect-square mb-3 h-20 overflow-hidden rounded-lg border-2 border-transparent text-center">
                                        <img src="{{ Storage::url($photo) }}" alt="{{ $product->name }}" class="h-full w-full object-cover">
                                    </button>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="lg:col-span-2">
                    <h1 class="text-2xl font-bold text-gray-500 sm:text-3xl">{{ $product->name }}</h1>
                    <div class="mt-5 flex items-center">
                        <div class="flex items-center">
                            <!-- Add star ratings here -->
                            <svg class="block h-4 w-4 align-middle text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="..."></path></svg>
                        </div>
                    </div>
                    <div class="font-bold text-gray-500">{{ $product->description }}</div>
                    <div class="mt-10 flex flex-col items-center justify-between space-y-4 border-t border-b py-4 sm:flex-row sm:space-y-0">
                        <div class="flex items-end">
                            <h1 class="text-3xl font-bold text-gray-600">Rp {{ number_format($product->price, 0, ',', '.') }}</h1>
                        </div>

                        <form action="{{ route('cart.add') }}" method="POST" class="flex items-center">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <div class="flex items-center mr-4">
                                <label for="quantity" class="mr-2 text-gray-800 dark:text-gray-200">Quantity:</label>
                                <input
                                    type="number"
                                    id="quantity"
                                    name="quantity"
                                    min="1"
                                    max="{{ $product->stock }}"
                                    value="1"
                                    class="border rounded-md px-3 py-2 w-16 text-center transition duration-150 ease-in-out focus:outline-none focus:ring focus:ring-gray-300"
                                    onchange="updateQuantity(this.value, {{ $product->stock }})"
                                >
                            </div>

                            <button type="submit" class="flex items-center justify-center rounded-md bg-blue-900 px-6 py-2 text-base font-bold text-white transition-all duration-200 ease-in-out hover:bg-gray-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Tambah ke Keranjang
                            </button>
                        </form>
                    </div>


                    <ul class="mt-8 space-y-2">
                        <li class="flex items-center text-sm font-medium text-gray-600">
                            <svg class="mr-2 block h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Gratis ongkir seluruh wilayah Indonesia
                        </li>
                        <li class="flex items-center text-sm font-medium text-gray-600">
                            <svg class="mr-2 block h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            Stok tersisa: {{ $product->stock }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

<script>
const swiper = new Swiper('.swiper-container', {
    direction: 'horizontal',
    loop: true,
    pagination: {
        el: '.swiper-pagination',
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

function updateQuantity(value, max) {
    const quantityInput = document.getElementById('quantity');
    if (value > max) {
        quantityInput.value = max;
        alert('Maksimal jumlah yang bisa dipilih adalah ' + max);
    }
}
</script>
