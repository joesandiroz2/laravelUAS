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
                        <div id="alert-message" class="text-sm font-medium">
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
    <!-- Slider -->
    <div data-hs-carousel='{
    "loadingClasses": "opacity-0",
    "isAutoPlay": true
  }' class="relative">
        <div class="hs-carousel relative overflow-hidden w-full h-screen bg-white">
            <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                <div class="hs-carousel-slide">
                    <div class="h-full bg-cover bg-no-repeat bg-center" style="background-image: url('https://images.unsplash.com/photo-1578985545062-69928b1d9587?q=80&w=1989&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                        <div class="flex flex-col justify-center h-full p-6 bg-neutral-800 opacity-50">
                            <div class="self-center text-center text-4xl text-white font-bold">Kelezatan Menggiurkan</div>
                            <div class="mt-1.5 self-center text-center text-xl text-white">Nikmatilah kue-kue menggugah selera kami yang dibuat dengan cinta dan semangat</div>
                        </div>
                    </div>
                </div>
                <div class="hs-carousel-slide">
                    <div class="h-full bg-cover bg-no-repeat bg-center" style="background-image: url('https://images.unsplash.com/photo-1542826438-bd32f43d626f?q=80&w=1892&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                        <div class="flex flex-col justify-center h-full p-6 bg-neutral-800 opacity-50">
                            <div class="self-center text-center text-4xl text-white font-bold">Karya Seni dalam Setiap Potongan</div>
                            <div class="mt-1.5 self-center text-center text-xl text-white">Lihatlah desain-desain indah yang memukau indera.</div>
                        </div>
                    </div>
                </div>
                <div class="hs-carousel-slide">
                    <div class="h-full bg-cover bg-no-repeat bg-center" style="background-image: url('https://plus.unsplash.com/premium_photo-1664205765598-85bfc3f61942?q=80&w=1770&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')">
                        <div class="flex flex-col justify-center h-full p-6 bg-neutral-800 opacity-50">
                            <div class="self-center text-center text-4xl text-white font-bold">Perayaan yang Manis</div>
                            <div class="mt-1.5 self-center text-center text-xl text-white">Dari hari ulang tahun hingga pernikahan, biarkan kue-kue kami menjadikan momen istimewa Anda tak terlupakan.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
            <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
            <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
            <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer dark:border-neutral-600 dark:hs-carousel-active:bg-blue-500 dark:hs-carousel-active:border-blue-500"></span>
        </div>
    </div>
    <!-- End Slider -->

{{--    <div class="container mx-auto py-8">--}}
{{--        <h3 class="text-5xl text-center mb-8">Recommendation</h3>--}}
{{--        <div class="grid grid-cols-3 gap-8">--}}
{{--            @for ($i = 0; $i < 3; $i++)--}}
{{--                <div class="flex flex-col group bg-white border shadow-sm rounded-xl overflow-hidden hover:shadow-lg transition w-auto">--}}
{{--                    <div class="relative pt-[50%] sm:pt-[60%] lg:pt-[80%] rounded-t-xl overflow-hidden">--}}
{{--                        <img class="absolute inset-0 object-cover w-full h-full group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-t-xl" src="https://images.unsplash.com/photo-1568827999250-3f6afff96e66?q=80&w=1771&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Image Description">--}}
{{--                    </div>--}}
{{--                    <div class="p-4 md:p-5">--}}
{{--                        <div class="flex justify-between mb-4">--}}
{{--                            <h3 class="text-lg font-bold text-gray-800">--}}
{{--                                Kue 1--}}
{{--                            </h3>--}}
{{--                            <p class="mt-1 text-gray-500">--}}
{{--                                Rp. 10.000--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                        <div class="flex justify-between mb-4">--}}
{{--                            <h4 class="text-base font-bold text-gray-800">--}}
{{--                                Type--}}
{{--                            </h4>--}}
{{--                            <div class="flex items-center mb-2">--}}
{{--                                <svg class="flex-shrink-0 size-5 text-yellow-400 dark:text-yellow-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">--}}
{{--                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>--}}
{{--                                </svg>--}}
{{--                                <svg class="flex-shrink-0 size-5 text-yellow-400 dark:text-yellow-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">--}}
{{--                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>--}}
{{--                                </svg>--}}
{{--                                <svg class="flex-shrink-0 size-5 text-yellow-400 dark:text-yellow-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">--}}
{{--                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>--}}
{{--                                </svg>--}}
{{--                                <svg class="flex-shrink-0 size-5 text-yellow-300 dark:text-yellow-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">--}}
{{--                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>--}}
{{--                                </svg>--}}
{{--                                <svg class="flex-shrink-0 size-5 text-gray-300 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">--}}
{{--                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"></path>--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <hr class="border-gray-500">--}}
{{--                        <div class="flex justify-between mt-6">--}}
{{--                            <a href="@auth()# @else /login @endauth" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">--}}
{{--                                Detail--}}
{{--                            </a>--}}
{{--                            <a href="@auth()# @else /login @endauth" class="py-2 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">--}}
{{--                                Add to cart--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endfor--}}

{{--        </div>--}}
{{--    </div>--}}
<script>
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
