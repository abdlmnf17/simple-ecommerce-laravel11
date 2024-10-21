<x-app-layout>
    <div class="container mx-auto p-6">
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Keranjang') }}
            </h2>
        </x-slot>

        @if(session('cart'))
            <div class="mt-4 overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4 border">Product</th>
                            <th class="py-2 px-4 border">Quantity</th>
                            <th class="py-2 px-4 border">Price</th>
                            <th class="py-2 px-4 border">Total</th>
                            <th class="py-2 px-4 border">Remove</th> <!-- Tambahkan kolom remove -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $id => $details)
                            <tr class="hover:bg-gray-100 text-center">
                                <td class="py-2 px-4 border">{{ $details['name'] }}</td>
                                <td class="py-2 px-4 border">{{ $details['quantity'] }}</td>
                                <td class="py-2 px-4 border">{{ number_format($details['price'], 2) }}</td>
                                <td class="py-2 px-4 border">{{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                                <td class="py-2 px-4 border">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">
                                            Remove
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <form action="{{ route('checkout.confirm') }}" method="GET" class="mt-6 text-center">
                @csrf

                <select name="payment_method" class="border border-gray-300 p-2 mb-4" required>
                    <option value="">Pilih Metode Pembayaran</option>
                    <option value="qris">QRIS</option>
                    <option value="paypal">PayPal</option>
                    <option value="bank_transfer">Bank Transfer</option>
                </select>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Lanjut ke Konfirmasi</button>
            </form>


        @else
            <p class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">Keranjang Kamu Kosong.</p>
        @endif
    </div>
</x-app-layout>
