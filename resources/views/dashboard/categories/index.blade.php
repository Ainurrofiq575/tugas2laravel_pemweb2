<x-layouts.app :title="('Product Categories')">

    <h1 class="text-3xl font-bold text-blue-600 mb-6">Product Categories</h1>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full table-auto border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">No</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Image</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Slug</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Description</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 border-b">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($categories as $key => $category)
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm text-gray-800">{{ $key + 1 }}</td>
                    <td class="px-6 py-4">
                        @if($category->image)
                            <img src="{{ $category->image }}" alt="{{ $category->name }}" class="w-16 h-16 object-cover rounded-md">
                        @else
                            <span class="text-gray-400 italic">No Image</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $category->name }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $category->slug }}</td>
                    <td class="px-6 py-4 text-sm text-gray-900">{{ $category->description }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600">
                        <a href="#" class="text-blue-500 hover:underline">Edit</a> |
                        <a href="#" class="text-red-500 hover:underline">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layouts.app>
