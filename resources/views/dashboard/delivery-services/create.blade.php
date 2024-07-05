<x-dashboard.layout>
    <div class="h-full p-6">
        <p class="text-4xl font-bold my-4">{{ $title }}</p>
        <form action="/dashboard/delivery-services" method="POST" enctype="multipart/form-data" class="w-96 pb-6">
            @csrf

            <div class="grid gap-4 lg:gap-6">
                <div>
                    <label for="kode" class="block mb-2 text-sm text-gray-700 font-medium">Kode</label>
                    <input type="text" name="kode" id="kode" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                </div>

                <div>
                    <label for="nama" class="block mb-2 text-sm text-gray-700 font-medium">Nama</label>
                    <input type="text" name="nama" id="nama" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                </div>
            </div>
            <!-- End Grid -->
            <div class="mt-6 grid grid-cols-2 gap-6">
                <a href="/dashboard/delivery-services" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Go Back
                </a>
                <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                    Save
                </button>
            </div>
        </form>
    </div>
    <script></script>
</x-dashboard.layout>
