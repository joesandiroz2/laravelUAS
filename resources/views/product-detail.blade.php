<x-layout>
    <div class="mx-auto max-w-7xl py-24 px-8 h-full bg-white">
        <p class="text-3xl font-bold">{{ $produk->nama }}</p>
        <div class="grid grid-cols-2">
            <img class="max-w-96 max-h-96 my-4" src="../{{ $produk->gambar }}" alt="{{ $produk->nama }}">
            <div class="flex flex-col">
                <div class="mb-5">
                    <p class="text-lg font-normal text-gray-500 mb-1">Category</p>
                    <p class="text-xl font-medium">{{ $produk->kategori->nama }}</p>
                </div>
                <div class="mb-5">
                    <p class="text-lg font-normal text-gray-500 mb-1">Price</p>
                    <p class="text-xl font-medium">Rp {{ number_format($produk->harga,2,",",".") }}</p>
                </div>
                <div class="mb-5">
                    <p class="text-lg font-normal text-gray-500 mb-1">Description</p>
                    <p class="text-xl font-medium text-justify">{{ $produk->deskripsi }}</p>
                </div>
                <a href="/menu" class="flex w-32 justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                    Go Back
                </a>
            </div>
        </div>
    </div>
</x-layout>
