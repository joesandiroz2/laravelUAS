<x-layout>
    @if(session()->has('success'))
        <div id="dismiss-alert" class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 w-2/4">
            <div class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </div>
                    <div class="ms-2">
                        <div id="alert-message" class="text-sm font-medium">
                            {{ session('success') }}
                        </div>
                    </div>
                    <div class="ps-3 ms-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button" id="close-alert" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600">
                                <span class="sr-only">Dismiss</span>
                                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6 6 18"></path>
                                    <path d="m6 6 12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="mx-auto max-w-2xl pt-24 pb-6 sm:px-6 lg:px-8 min-h-full h-full">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6 grid grid-cols-2 place-items-center">
                <h3 class="col-span-2 text-lg leading-6 font-medium text-neutral-900">Profile</h3>
                <p class="col-span-2 mt-1 max-w-2xl text-sm text-neutral-500">This information will be displayed publicly so be careful what you share.</p>
                <div class="col-span-2 items-center grid place-items-center">
                    <img class=" size-48 rounded-full my-10" src="@if(isset($pengguna->gambar)) {{ $pengguna->gambar }} @else https://static.vecteezy.com/system/resources/thumbnails/009/292/244/small/default-avatar-icon-of-social-media-user-vector.jpg @endif" alt="Photo Profile">
                </div>

                <div class="mb-7 text-center">
                    <h3 class="text-lg leading-6 font-medium text-neutral-900">Email</h3>
                    <p class="mt-1 max-w-2xl text-sm text-neutral-500">{{ $pengguna->email }}</p>
                </div>

                <div class="mb-7 text-center">
                    <h3 class="text-lg leading-6 font-medium text-neutral-900">Name</h3>
                    <p class="mt-1 max-w-2xl text-sm text-neutral-500">{{ $pengguna->nama }}</p>
                </div>

                <div class="mb-7 text-center">
                    <h3 class="text-lg leading-6 font-medium text-neutral-900">Phone Number</h3>
                    <p class="mt-1 max-w-2xl text-sm text-neutral-500">{{ $pengguna->nomor_telepon }}</p>
                </div>

                <div class="mb-7 text-center">
                    <h3 class="text-lg leading-6 font-medium text-neutral-900">Join since</h3>
                    <p class="mt-1 max-w-2xl text-sm text-neutral-500">{{ $pengguna->created_at }}</p>
                </div>

                <div class="col-span-2 mb-7 text-center">
                    <h3 class="text-lg leading-6 font-medium text-neutral-900">Address</h3>
                    <p class="mt-1 max-w-2xl text-sm text-neutral-500">{{ $pengguna->alamat }}</p>
                </div>

                <a href="/change-profile" class="col-span-2 bg-indigo-500 hover:bg-indigo-700 text-white font-bold mt-2 py-2 px-4 rounded-full">Change Profile</a>
            </div>
        </div>
    </div>
    <script>
        const alert = $('#dismiss-alert');
        $("#close-alert").on("click", function () {
            alert.toggle(200);
        });

        @if(session()->has('success'))
        setTimeout(function() {
            alert.hide(200);
        }, 5000);
        @endif
    </script>
</x-layout>
