<x-layout>
    <div class="mx-auto max-w-2xl pt-24 pb-6 sm:px-6 lg:px-8 min-h-full h-full">
        <p class="text-4xl font-bold my-4">{{ $title }}</p>
        <form action="/change-profile" method="POST" enctype="multipart/form-data" class="w-96 pb-6">
            @csrf

            <div class="grid gap-4 lg:gap-6">
                <div>
                    <label for="email" class="block mb-2 text-sm text-gray-700 font-medium">Email</label>
                    <input type="text" name="email" id="email" value="{{ $pengguna->email }}" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                </div>

                <div>
                    <label for="password" class="block mb-2 text-sm text-gray-700 font-medium">Password</label>
                    <input type="password" name="password" id="password" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                </div>

                <div>
                    <label for="confirm_password" class="block mb-2 text-sm text-gray-700 font-medium">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                </div>

                <div>
                    <label for="nama" class="block mb-2 text-sm text-gray-700 font-medium">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ $pengguna->nama }}" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                </div>

                <div>
                    <label for="nomor_telepon" class="block mb-2 text-sm text-gray-700 font-medium">Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ $pengguna->nomor_telepon }}" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                </div>

                <div>
                    <label for="alamat" class="block mb-2 text-sm text-gray-700 font-medium">Alamat</label>
                    <textarea name="alamat" id="alamat" required class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">{{ $pengguna->alamat }}</textarea>
                </div>

                <div>
                    <label for="gambar" class="block mb-2 text-sm text-gray-700 font-medium">Gambar</label>
                    <input type="file" name="gambar" id="gambar" accept="image/*" value="{{ str_replace('img/', '', $pengguna->gambar) }}" class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none
                        file:bg-gray-50 file:border-0
                        file:me-4
                        file:py-3 file:px-4">
                    <img id="preview" class="hidden w-40 h-40 object-cover mt-4" src="/{{ $pengguna->gambar }}" alt="gambar hasil inputan">
                </div>
                <input type="hidden" name="id" value="{{ $pengguna->id }}">
            </div>
            <!-- End Grid -->
            <div class="mt-6 grid grid-cols-2 gap-6">
                <a href="/profile" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Go Back
                </a>
                <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                    Save
                </button>
            </div>
        </form>
    </div>
    <script>
        $('#gambar').on('change', function() {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = $('#preview');
                preview.attr('src', e.target.result);
                preview.show();
            }
            reader.readAsDataURL(this.files[0]);
        });
    </script>
</x-layout>
