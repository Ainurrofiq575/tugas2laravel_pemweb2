<x-layouts.app :title="('Produk')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" class="text-gray-900 font-semibold">Tambah Produk Baru</flux:heading>
        <flux:subheading size="lg" class="mb-6 text-gray-700">Kelola data produk dengan mudah</flux:subheading>
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

    <form action="{{ route('product.store') }}" method="post" class="bg-white p-6 rounded-lg shadow-lg max-w-3xl mx-auto">
        @csrf

        <flux:input label="Nama Produk" name="name" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        <flux:input label="Slug" name="slug" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        <flux:textarea label="Deskripsi" name="description" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        <flux:input label="SKU" name="sku" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        <flux:input label="Harga" name="price" type="number" step="0.01" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        <flux:input label="Stok" name="stock" type="number" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />

        <flux:select label="Kategori Produk" name="product_category_id" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </flux:select>

        <flux:input label="URL Gambar" name="image_url" type="url" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />

        <flux:select label="Status Aktif" name="is_active" class="mb-4 rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            <option value="1">Aktif</option>
            <option value="0">Tidak Aktif</option>
        </flux:select>

        <flux:separator class="my-6" />

        <div class="flex justify-between mt-6">
            <flux:button type="submit" variant="primary" class="px-6 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Simpan
            </flux:button>
            <flux:link href="{{ route('product.index') }}" variant="ghost" class="ml-3 text-blue-600 hover:text-blue-800">
                Kembali
            </flux:link>
        </div>
    </form>
</x-layouts.app>
