<x-layout>
    @if(session()->has('success'))
        <div id="dismiss-alert-success" class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 w-2/4">
            <div class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-teal-50 border border-teal-200 text-sm text-teal-800 rounded-lg p-4" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                            <path d="m9 12 2 2 4-4"></path>
                        </svg>
                    </div>
                    <div class="ms-2">
                        <div id="alert-message-success" class="text-sm font-medium">
                            {{ session('success') }}
                        </div>
                    </div>
                    <div class="ps-3 ms-auto">
                        <div class="-mx-1.5 -my-1.5">
                            <button type="button" id="close-alert-success" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600">
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
                        File has been successfully uploaded.
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

    <div class="mx-auto max-w-7xl pt-24 pb-6 sm:px-6 lg:px-8 min-h-full h-full">
        <form class="flex justify-between mb-4" id="query-form" action="" method="GET">
            @csrf
            <h1 class="text-4xl font-semibold text-gray-900">Menu</h1>
            <div class="flex rounded-lg shadow-sm">
                <input type="text" id="nama" name="nama" class="py-3 px-4 block w-full border-gray-200 shadow-sm rounded-s-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Search" autocomplete="off" value="{{ request()->get('nama') }}">
                <button type="submit" class="w-[2.875rem] h-[2.875rem] flex-shrink-0 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-e-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                </button>
            </div>
            <div class="inline-flex items-center">
                <span class="mr-2">Type</span>
                <select name="kategori" id="kategori" class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-xl text-sm hover:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                    <option value="">All</option>
                    @foreach($categories as $kategori)
                        <option {{ $selected == $kategori->kode ? 'selected' : '' }} value="{{ $kategori->kode }}">{{ $kategori->nama }}</option>
                    @endforeach
                </select>
            </div>
        </form>
        <hr class="mb-4 border-gray-800">
        @if(count($products) == 0)
            <div class="grid justify-items-center">
                <p class="text-center text-gray-500">No product found</p>
            </div>
        @else
            <div class="grid grid-cols-3 gap-8">
                @foreach($products as $produk)
                    <div class="flex flex-col group bg-white border shadow-sm rounded-xl overflow-hidden hover:shadow-lg transition w-auto">
                        <div class="relative pt-[50%] sm:pt-[60%] lg:pt-[80%] rounded-t-xl overflow-hidden">
                            <img class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-t-xl" src="{{ $produk->gambar }}" alt="Image Description">
                        </div>
                        <div class="p-4 md:p-5">
                            <div class="flex justify-between mb-4">
                                <h3 class="text-lg font-bold text-gray-800">
                                    {{ $produk->nama }}
                                </h3>
                                <p class="mt-1 text-gray-500">
                                    Rp {{ number_format($produk->harga,2,",",".") }}
                                </p>
                            </div>
                            <div class="flex justify-between mb-4">
                                <h4 class="text-base text-gray-800">
                                    {{ $produk->kategori->nama }}
                                </h4>
                                <div class="flex items-center mb-2">
                                    <svg class="flex-shrink-0 size-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                    </svg>
                                    <svg class="flex-shrink-0 size-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                    </svg>
                                    <svg class="flex-shrink-0 size-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                    </svg>
                                    <svg class="flex-shrink-0 size-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                    </svg>
                                    <svg class="flex-shrink-0 size-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>
                                    </svg>
                                </div>
                            </div>
                            <hr class="border-gray-500">
                            <div class="flex justify-between mt-6">
                                <a href="/produk/{{ $produk->kode }}" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white select-none hover:bg-green-700 hover:cursor-pointer disabled:opacity-50 disabled:pointer-events-none">
                                    Detail
                                </a>
                                @guest()
                                    <a href="/login" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white select-none hover:bg-blue-700 hover:cursor-pointer disabled:opacity-50 disabled:pointer-events-none">
                                        Add to cart
                                    </a>
                                @else
                                    <input type="hidden" id="kode_produk-{{ $produk->kode }}" value="{{ $produk->kode }}">
                                    <input type="hidden" id="harga-{{ $produk->kode }}" value="{{ $produk->harga }}">
                                    <button type="button" class="add-to-cart flex justify-center rounded-md bg-blue-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Add to Cart</button>
                                @endguest
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <script>
        const alert = $('#dismiss-alert');
        alert.hide(); // Initially hide the element

        $("#kategori").on("change", function () {
            $("#query-form").trigger("submit");
        });

        $("#close-alert").on("click", function () {
            alert.toggle(200);
        });

        $(".add-to-cart").on("click", function(e) {
            e.preventDefault();
            const clickedElement = $(e.currentTarget);
            const harga = clickedElement.siblings('[id^="harga-"]').first().val();
            const kode_produk = clickedElement.siblings('[id^="kode_produk-"]').first().val();

            $.ajax({
                type: "POST",
                url: "/dashboard/orders",
                data: {
                    'email': "{{ session('userEmail') }}",
                    'kode_produk': kode_produk,
                    'harga': harga,
                },
                success: function(data, textStatus, jqXHR) {
                    if (textStatus === "success") {
                        $('.cart-exists').removeClass('hidden');

                        $('#alert-message').text(data.message);
                        if ($('#dismiss-alert:hidden').length) {
                            alert.toggle(200);
                        } else {
                            alert.toggle(200);
                            alert.toggle(200);
                        }
                        setTimeout(function() {
                            alert.hide(200);
                        }, 5000);
                    } else {
                        console(data, textStatus, jqXHR);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR.responseJSON.message);
                }
            });
        })
        const alertSuccess = $('#dismiss-alert-success');
        $("#close-alert-success").on("click", function () {
            alertSuccess.toggle(200);
        });

        @if(session()->has('success'))
        setTimeout(function() {
            alertSuccess.hide(200);
        }, 5000);
        @endif
    </script>
</x-layout>

