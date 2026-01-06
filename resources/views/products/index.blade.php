Buat folder resources/views/products/ dan file index.blade.php:
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Products' }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (Auth::user()->role === 'admin')
                        <a href="{{ route('products.create') }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Tambah Produk
                        </a>
                    @else
                        <p class="text-gray-500">Anda tidak memiliki akses untuk menambah produk</p>
                    @endif
                    <h3 class="text-lg font-semibold mt-6">Daftar Produk</h3>
                    <p class="mt-2">Halaman ini menampilkan daftar produk.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
