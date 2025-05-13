<x-layouts.app :title="('Produk')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" class="text-gray-900 font-semibold">Update Produk</flux:heading>
        <flux:subheading size="lg" class="mb-6 text-gray-700">Kelola data produk yang ada</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full shadow-md p-2 rounded-md">
            {{ session()->get('successMessage') }}
        </flux:badge>
    @elseif(session()->has('errorMessage'))
        <flux:badge color="red" class="mb-3 w-full shadow-md p-2 rounded-md">
            {{ session()->get('errorMessage') }}
        </flux:badge>
    @endif

    <form action="{{ route('product.update', $product->id) }}" method="post" class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
        @method('patch')
        @csrf

        <!-- Nama Produk -->
        <flux:input label="Nama Produk" name="name" value="{{ $product->name }}" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />

        <!-- Slug Produk -->
        <flux:input label="Slug" name="slug" value="{{ $product->slug }}" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" disabled />

        <!-- Deskripsi -->
        <flux:textarea label="Deskripsi" name="description" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ $product->description }}</flux:textarea>

        <!-- SKU Produk -->
        <flux:input label="SKU" name="sku" value="{{ $product->sku }}" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />

        <!-- Harga Produk -->
        <flux:input type="number" label="Harga" name="price" value="{{ $product->price }}" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />

        <!-- Stok Produk -->
        <flux:input type="number" label="Stok" name="stock" value="{{ $product->stock }}" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />

        <!-- Kategori Produk -->
        <flux:select label="Kategori Produk" name="product_category_id" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $category->id == $product->product_category_id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </flux:select>

        <!-- URL Gambar Produk -->
        <flux:input label="URL Gambar" name="image_url" value="{{ $product->image_url }}" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />

        <!-- Status Aktif -->
        <flux:select label="Status" name="is_active" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            <option value="1" {{ $product->is_active ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ !$product->is_active ? 'selected' : '' }}>Tidak Aktif</option>
        </flux:select>

        <flux:separator class="my-6" />

        <!-- Tombol Submit dan Kembali -->
        <div class="flex justify-between mt-6">
            <flux:button type="submit" variant="primary" class="px-6 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Update
            </flux:button>
            <flux:link href="{{ route('product.index') }}" variant="ghost" class="ml-3 text-blue-600 hover:text-blue-800">
                Kembali
            </flux:link>
        </div>
    </form>
</x-layouts.app>
