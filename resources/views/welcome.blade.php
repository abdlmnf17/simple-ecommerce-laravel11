<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-gray-800 dark:text-gray-200">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">{{ __("Selamat Datang di Website Kami!") }}</h1>
                <p class="mb-6">{{ __("Kami menyediakan berbagai produk dan layanan untuk memenuhi kebutuhan Anda.") }}</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4 text-center">
                        <i class="fas fa-star text-blue-500 text-3xl"></i>
                        <h2 class="text-lg font-semibold mt-2">{{ __("Produk Unggulan") }}</h2>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">{{ __("Jelajahi koleksi produk kami yang terbaik dan terlaris.") }}</p>
                        <a href="/products" class="mt-4 inline-block bg-blue-500 text-white rounded-lg px-3 py-2 hover:bg-blue-600">{{ __("Lihat Produk") }}</a>
                    </div>

                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4 text-center">
                        <i class="fas fa-comments text-blue-500 text-3xl"></i>
                        <h2 class="text-lg font-semibold mt-2">{{ __("Testimoni Pelanggan") }}</h2>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">{{ __("Dengarkan apa yang dikatakan pelanggan kami tentang pengalaman mereka.") }}</p>
                        <a href="#" class="mt-4 inline-block bg-blue-500 text-white rounded-lg px-3 py-2 hover:bg-blue-600">{{ __("Baca Selengkapnya") }}</a>
                    </div>

                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-4 text-center">
                        <i class="fas fa-tags text-blue-500 text-3xl"></i>
                        <h2 class="text-lg font-semibold mt-2">{{ __("Promo Spesial") }}</h2>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">{{ __("Dapatkan diskon hingga 50% untuk produk pilihan!") }}</p>
                        <a href="#" class="mt-4 inline-block bg-blue-500 text-white rounded-lg px-3 py-2 hover:bg-blue-600">{{ __("Lihat Promo") }}</a>
                    </div>
                </div>

                <div class="mt-8">
                    <h2 class="text-xl font-bold mb-4">{{ __("Fitur Kami") }}</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-4 text-center">
                            <i class="fas fa-truck text-blue-500 text-3xl"></i>
                            <h3 class="font-semibold mt-2">{{ __("Kecepatan Pengiriman") }}</h3>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">{{ __("Pengiriman cepat dan tepat waktu.") }}</p>
                        </div>
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-4 text-center">
                            <i class="fas fa-headset text-blue-500 text-3xl"></i>
                            <h3 class="font-semibold mt-2">{{ __("Dukungan Pelanggan") }}</h3>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">{{ __("Tim dukungan siap membantu Anda.") }}</p>
                        </div>
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-4 text-center">
                            <i class="fas fa-check-circle text-blue-500 text-3xl"></i>
                            <h3 class="font-semibold mt-2">{{ __("Kualitas Terjamin") }}</h3>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">{{ __("Produk berkualitas tinggi dengan jaminan.") }}</p>
                        </div>
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-4 text-center">
                            <i class="fas fa-thumbs-up text-blue-500 text-3xl"></i>
                            <h3 class="font-semibold mt-2">{{ __("Pilihan Beragam") }}</h3>
                            <p class="mt-2 text-gray-600 dark:text-gray-400">{{ __("Berbagai pilihan produk untuk Anda.") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
