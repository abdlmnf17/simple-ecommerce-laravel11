<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Produk') }}
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-lg">
          

            <div class="p-4 sm:p-6 dark:bg-gray-900 border-b border-gray-200">
                <div class="flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0 sm:space-x-4">
                    @can('delete products')
                    <a href="{{ route('products.create') }}" class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md shadow">
                        Tambah Produk
                    </a>
                    @endcan

                    <form action="{{ route('products.index') }}" method="GET"
                          class="flex flex-col sm:flex-row items-center mt-4 sm:mt-0 space-y-2 sm:space-y-0 sm:space-x-4">
                        <input type="text" name="search" placeholder="Cari produk..."
                               value="{{ request('search') }}"
                               class="border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500 w-full sm:w-auto">
                        <button type="submit"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md shadow focus:outline-none">
                            Cari
                        </button>
                    </form>
                </div>

                <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse ($products as $product)
                        <div class="bg-white shadow-md rounded-lg p-4 flex flex-col">
                            <img src="{{ Storage::url($product->photo) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">
                                <a href="{{ route('products.show', $product->id) }}" class="hover:text-blue-600">{{ $product->name }}</a>
                            </h3>
                            <p class="text-sm text-gray-600">Stok: {{ $product->stock }}</p>
                            <p class="text-sm text-gray-600 truncate">{{ $product->description }}</p>
                            <p class="text-lg font-bold text-gray-900 mt-auto">{{ number_format($product->price, 2, ',', '.') }}</p>
                            <div class="mt-4 flex space-x-2">
                                @can('delete products', $product)
                                    <x-confirm-delete-modal>
                                        <x-slot name="trigger">
                                            <button @click="isOpen = true" class="text-red-600 hover:text-red-900 flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                                Hapus
                                            </button>
                                        </x-slot>

                                        <x-slot name="title">
                                            Konfirmasi Hapus
                                        </x-slot>

                                        <x-slot name="content">
                                            Apakah Anda yakin ingin menghapus produk ini?
                                        </x-slot>

                                        <x-slot name="footer">
                                            <form id="deleteForm-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <x-primary-button type="submit" class="bg-red-600 hover:bg-red-700">
                                                    Hapus
                                                </x-primary-button>
                                                <x-secondary-button @click="isOpen = false">
                                                    Batal
                                                </x-secondary-button>
                                            </form>
                                        </x-slot>
                                    </x-confirm-delete-modal>
                                @endcan
                            </div>
                        </div>
                    @empty
                        <div class="col-span-1 sm:col-span-2 lg:col-span-3 text-center text-sm text-gray-500">
                            Tidak ada data yang ditemukan.
                        </div>
                    @endforelse
                </div>

                <div class="mt-4">
                    {{ $products->appends(request()->input())->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
