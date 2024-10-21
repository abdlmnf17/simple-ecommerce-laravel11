<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Riwayat Pembelian') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">{{ __("Riwayat Pembelian") }}</h1>

                    <table class="min-w-full border-collapse border border-gray-200">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">{{ __('No Sales Invoice') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Pelanggan') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Metode Pembayaran') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Status') }}</th>
                                <th class="border border-gray-300 px-4 py-2">{{ __('Nota') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sales as $sale)
                                <tr class="text-center">
                                    <td class="border border-gray-300 px-4 py-2">{{ $sale->no_sales }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $sale->user ? $sale->user->name : 'Tidak Ada User' }}</td>

                                    <td class="border border-gray-300 px-4 py-2">{{ $sale->payment_method }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $sale->status }}</td>

                                    <td class="border border-gray-300 px-4 py-2">
                                        <a href="{{ route('sales.print', $sale->id) }}" class="text-blue-600 hover:underline">
                                            {{ __('Print Nota') }}
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                    @if($sales->isEmpty())
                        <p class="mt-4">{{ __('Tidak ada riwayat pembelian.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
