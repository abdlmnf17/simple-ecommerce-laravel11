<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Syarat dan Ketentuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>
                        Selamat datang di {{ config('app.name', 'Laravel') }} ! Dengan mengakses situs ini, Anda setuju untuk mematuhi syarat dan ketentuan berikut:
                    </p>
                    <h4 class="mt-4 font-semibold">1. Penggunaan Layanan</h4>
                    <p class="mt-2">
                        Pengguna diharapkan untuk menggunakan layanan kami sesuai dengan hukum yang berlaku. Anda tidak boleh menggunakan layanan kami untuk tujuan ilegal atau tidak sah.
                    </p>
                    <h4 class="mt-4 font-semibold">2. Informasi yang Diberikan</h4>
                    <p class="mt-2">
                        Kami berusaha untuk memberikan informasi yang akurat dan terkini di situs ini. Namun, kami tidak dapat menjamin bahwa informasi tersebut selalu lengkap atau benar.
                    </p>
                    <h4 class="mt-4 font-semibold">3. Tanggung Jawab Pelanggan</h4>
                    <p class="mt-2">
                        Pelanggan bertanggung jawab atas semua aktivitas yang terjadi di akun mereka. Kami tidak bertanggung jawab atas kerugian atau kerusakan yang disebabkan oleh penyalahgunaan akun.
                    </p>
                    <h4 class="mt-4 font-semibold">4. Pembayaran dan Kebijakan Pengembalian</h4>
                    <p class="mt-2">
                        Pembayaran untuk layanan yang diberikan harus dilakukan pada saat layanan selesai. Kebijakan pengembalian akan diterapkan sesuai dengan syarat dan ketentuan yang berlaku.
                    </p>
                    <h4 class="mt-4 font-semibold">5. Perubahan Syarat dan Ketentuan</h4>
                    <p class="mt-2">
                        Kami berhak untuk mengubah syarat dan ketentuan ini kapan saja. Perubahan akan diberitahukan melalui situs ini, dan penggunaan Anda yang berkelanjutan atas layanan kami dianggap sebagai penerimaan atas perubahan tersebut.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
