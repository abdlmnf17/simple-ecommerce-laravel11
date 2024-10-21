<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tentang Kami') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg">Selamat Datang di Bengkel Kami!</h3>
                    <p class="mt-4">
                        Di {{ config('app.name', 'Laravel') }}, kami berdedikasi untuk memberikan layanan terbaik bagi semua kebutuhan otomotif Anda. Dengan pengalaman lebih dari 10 tahun di industri, kami memahami betul bagaimana menjaga kendaraan Anda dalam kondisi optimal.
                    </p>
                    <p class="mt-4">
                        Kami menawarkan berbagai layanan mulai dari perawatan rutin, perbaikan mesin, hingga penjualan suku cadang berkualitas tinggi. Tim mekanik kami yang terampil dan bersertifikat siap membantu Anda dengan berbagai masalah kendaraan Anda.
                    </p>
                    <h4 class="mt-6 font-semibold">Misi Kami</h4>
                    <p class="mt-4">
                        Misi kami adalah untuk menyediakan layanan berkualitas tinggi dan memenuhi ekspektasi pelanggan. Kami percaya bahwa kepercayaan adalah kunci dalam hubungan kami dengan pelanggan, dan kami selalu berusaha untuk menjaga transparansi dalam setiap transaksi.
                    </p>
                    <h4 class="mt-6 font-semibold">Visi Kami</h4>
                    <p class="mt-4">
                        Visi kami adalah menjadi bengkel pilihan utama di [Nama Kota/Area] yang dikenal dengan layanan profesional dan keandalan. Kami ingin menjadi mitra terpercaya bagi pelanggan dalam menjaga performa kendaraan mereka.
                    </p>
                    <h4 class="mt-6 font-semibold">Nilai-Nilai Kami</h4>
                    <ul class="list-disc ml-6 mt-4">
                        <li>Kejujuran: Kami berkomitmen untuk memberikan informasi yang akurat dan jujur kepada pelanggan.</li>
                        <li>Kualitas: Kami menggunakan suku cadang berkualitas dan alat modern untuk setiap pekerjaan.</li>
                        <li>Kepuasan Pelanggan: Kami selalu berusaha untuk melebihi harapan pelanggan kami.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
