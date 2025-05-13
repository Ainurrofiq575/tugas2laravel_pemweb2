<x-layouts.app :title="'Edit Category'">
    <div class="flex justify-center items-center min-h-screen py-10">
        <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold text-blue-600 mb-6 text-center">Edit Product Category</h1>

            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <!-- Name Input -->
                <div class="mb-4">
                    <label class="block text-lg font-semibold text-gray-700 mb-2">Category Name</label>
                    <input type="text" name="name" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name', $category->name) }}" required placeholder="Enter category name">
                </div>

                <!-- Slug Input -->
                <div class="mb-4">
                    <label class="block text-lg font-semibold text-gray-700 mb-2">Slug</label>
                    <input type="text" name="slug" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('slug', $category->slug) }}" required placeholder="Enter category slug">
                </div>

                <!-- Description Textarea -->
                <div class="mb-4">
                    <label class="block text-lg font-semibold text-gray-700 mb-2">Description</label>
                    <textarea name="description" class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" placeholder="Add a description">{{ old('description', $category->description) }}</textarea>
                </div>

                <!-- Display Current Image -->
                @if($category->image)
                    <div class="mb-4 text-center">
                        <img src="{{ $category->image }}" alt="{{ $category->name }}" class="w-32 h-32 object-cover rounded-md mx-auto shadow">
                    </div>
                @endif

                <!-- URL Input for Image -->
                <div class="mb-4">
                    <label class="block text-lg font-semibold text-gray-700 mb-2">Image URL</label>
                    <input type="url" name="image_url" 
                        value="{{ old('image_url', $category->image) }}" 
                        placeholder="https://example.com/image.jpg"
                        class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <!-- Submit and Cancel Buttons -->
                <div class="flex items-center justify-between mt-6">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">Update Category</button>
                    <a href="{{ route('categories.index') }}" class="text-gray-600 hover:underline">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</x-layouts.app>
