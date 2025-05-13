<x-layouts.app :title="'Dashboard'">
    <div class="py-10 px-4 md:px-8 animate-fade-in">
        <!-- Heading -->
        <div class="text-center mb-10">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-800 dark:text-white">
                Selamat Datang di <span class="text-indigo-600 dark:text-indigo-400">WarungMadura</span>
            </h1>
            <p class="mt-2 text-gray-600 dark:text-gray-300 text-lg max-w-2xl mx-auto">
                Pantau dan kelola warungmu dengan lebih mudah, cepat, dan efisien.
            </p>
        </div>

        <!-- Cards Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto">
            <!-- Total Produk -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border-l-4 border-indigo-500">
                <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">Total Produk</div>
                <div class="text-2xl font-bold text-gray-800 dark:text-white">4</div>
            </div>

            <!-- Total Penjualan Hari Ini -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border-l-4 border-green-500">
                <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">Penjualan Hari Ini</div>
                <div class="text-2xl font-bold text-gray-800 dark:text-white">Rp 100.000</div>
            </div>

            <!-- Stok Menipis -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 border-l-4 border-red-500">
                <div class="text-sm text-gray-500 dark:text-gray-400 mb-2">Produk Stok Menipis</div>
                <div class="text-2xl font-bold text-gray-800 dark:text-white">6 Produk</div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 0.8s ease-out;
        }
    </style>
</x-layouts.app>
