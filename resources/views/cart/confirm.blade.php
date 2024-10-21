<x-app-layout>
    <div class="container mx-auto p-6">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Konfirmasi Pembayaran') }}
            </h2>
        </x-slot>

        <div class="mt-10 bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
            <h3 class="text-lg font-bold text-gray-800 dark:text-gray-200">
                Metode Pembayaran: {{ ucfirst($paymentMethod) }}
            </h3>
            <p class="mt-2 text-gray-800 dark:text-gray-200">
                Silakan periksa dan konfirmasi informasi pembayaran Anda.
            </p>

            <!-- Detail Produk -->
            <div class="mt-6">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Detail Produk:</h4>
                <table class="min-w-full mt-4 bg-white dark:bg-gray-700 border border-gray-300 text-gray-800 dark:text-gray-200">
                    <thead>
                        <tr class="bg-gray-200 dark:bg-gray-600">
                            <th class="py-2 px-4 border">Produk</th>
                            <th class="py-2 px-4 border">Jumlah</th>
                            <th class="py-2 px-4 border">Harga</th>
                            <th class="py-2 px-4 border">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $grandTotal = 0; @endphp
                        @foreach (session('cart') as $id => $details)
                            @php
                                $totalPrice = $details['price'] * $details['quantity'];
                                $grandTotal += $totalPrice;
                            @endphp
                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-600 text-center">
                                <td class="py-2 px-4 border">{{ $details['name'] }}</td>
                                <td class="py-2 px-4 border">{{ $details['quantity'] }}</td>
                                <td class="py-2 px-4 border">{{ number_format($details['price'], 2) }}</td>
                                <td class="py-2 px-4 border">{{ number_format($totalPrice, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4 text-right">
                    <span class="font-bold text-lg">Total Keseluruhan: Rp {{ number_format($grandTotal, 2) }}</span>
                </div>
            </div>

            <div class="mt-6 text-gray-800 dark:text-gray-200">
                @if ($paymentMethod == 'qris')
                    <div class="text-center">
                        <p>Silakan gunakan QR code berikut untuk menyelesaikan pembayaran:</p>
                        <img src="/qrcode-test.png" alt="QRIS Code" class="w-48 h-48 mx-auto mt-2">
                    </div>
                @elseif ($paymentMethod == 'paypal')
                    <div>
                        <p>Untuk pembayaran melalui PayPal, silakan kirimkan jumlah yang sesuai ke akun:</p>
                        <p class="font-bold">email@example.com</p>
                    </div>
                @elseif ($paymentMethod == 'bank_transfer')
                    <div>
                        <p>Silakan transfer ke rekening berikut:</p>
                        <div class="mt-2">
                            <p class="font-bold">Bank ABC</p>
                            <p>No. Rekening: <span class="font-semibold">1234567890</span></p>
                            <p>Atas Nama: <span class="font-semibold">Laravel</span></p>
                        </div>
                    </div>
                @endif
            </div>

            <form action="{{ route('checkout.process') }}" method="POST" class="mt-8 text-center">
                @csrf
                <input type="hidden" name="payment_method" value="{{ $paymentMethod }}">
                <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded hover:bg-green-600 transition">
                    Konfirmasi Pembayaran
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
