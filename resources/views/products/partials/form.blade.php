<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-4">
        <x-input-label for="name">{{ __('Nama Produk') }}</x-input-label>
        <x-text-input id="name" class="mt-1 block w-full" type="text" name="name"
            value="{{ old('name') }}" required />
        @error('name')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="stock">{{ __('Stok') }}</x-input-label>
        <x-text-input id="stock" class="mt-1 block w-full" type="number" name="stock"
            value="{{ old('stock') }}" required />
        @error('stock')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="description">{{ __('Deskripsi') }}</x-input-label>
        <textarea id="description" class="mt-1 block w-full" name="description" required>{{ old('description') }}</textarea>
        @error('description')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="price">{{ __('Harga') }}</x-input-label>
        <x-text-input id="price" class="mt-1 block w-full" type="number" step="0.01" name="price"
            value="{{ old('price') }}" required />
        @error('price')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="photo">{{ __('Foto Utama') }}</x-input-label>
        <input type="file" id="photo" name="photo" class="mt-1 block w-full" accept="image/*" required />
        @error('photo')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="photo_2">{{ __('Foto 2') }}</x-input-label>
        <input type="file" id="photo_2" name="photo_2" class="mt-1 block w-full" accept="image/*" />
        @error('photo_2')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="photo_3">{{ __('Foto 3') }}</x-input-label>
        <input type="file" id="photo_3" name="photo_3" class="mt-1 block w-full" accept="image/*" />
        @error('photo_3')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <div class="mb-4">
        <x-input-label for="photo_4">{{ __('Foto 4') }}</x-input-label>
        <input type="file" id="photo_4" name="photo_4" class="mt-1 block w-full" accept="image/*" />
        @error('photo_4')
            <x-input-error-set :message="$message" class="mt-2" />
        @enderror
    </div>

    <br/>

    <div class="flex items-center space-x-4">
        <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800">
            {{ __('Simpan') }}
        </x-primary-button>

        <x-secondary-button href="{{ route('products.index') }}">
            Kembali
        </x-secondary-button>
    </div>

</form>
