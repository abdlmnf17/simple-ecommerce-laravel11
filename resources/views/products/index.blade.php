<title>Produk</title>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Produk') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
            @include('alert.alert-info')

            <div class="p-4 sm:p-6 dark:bg-gray-900 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0 sm:space-x-4">
                    <x-secondary-button href="{{ route('products.create') }}">
                        Tambah Produk
                    </x-secondary-button>

                    <form action="{{ route('products.index') }}" method="GET"
                          class="flex flex-col sm:flex-row items-center mt-4 sm:mt-0 space-y-2 sm:space-y-0 sm:space-x-4">
                        <input type="text" name="search" placeholder="Cari produk..."
                               value="{{ request('search') }}"
                               class="border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 block rounded-md p-2 w-full sm:w-auto">

                        <button type="submit"
                                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
                            Cari
                        </button>
                    </form>
                </div>

                <div class="mt-4 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Stok
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Deskripsi
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Harga
                                </th>
                                <th scope="col"
                                    class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($products as $product)
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                        {{ $product->name }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                        {{ $product->stock }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                        {{ $product->description }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">
                                        {{ number_format($product->price, 2, ',', '.') }}
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900 flex space-x-2">
                                        <x-confirm-delete-modal>
                                            <x-slot name="trigger">
                                                <button @click="isOpen = true"
                                                        class="text-red-600 hover:text-red-900">Hapus</button>
                                            </x-slot>

                                            <x-slot name="title">
                                                Konfirmasi Hapus
                                            </x-slot>

                                            <x-slot name="content">
                                                Apakah Anda yakin ingin menghapus produk ini?
                                            </x-slot>

                                            <x-slot name="footer">
                                                <form id="deleteForm-{{ $product->id }}"
                                                      action="{{ route('products.destroy', $product->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-primary-button type="submit"
                                                                      class="bg-red-600 hover:bg-red-700">
                                                        Hapus
                                                    </x-primary-button>
                                                    <x-secondary-button @click="isOpen = false">
                                                        Batal
                                                    </x-secondary-button>
                                                </form>
                                            </x-slot>
                                        </x-confirm-delete-modal>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500" colspan="5">
                                        Tidak ada data yang ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $products->appends(request()->input())->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

