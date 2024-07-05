<!doctype html>
<html class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title></title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous"></script>
    <script>
        window.csrf = "{{ csrf_token() }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>
<body class="h-full">

<div class="min-h-full h-full">
    <!-- Navigation Toggle -->
    <div class="flex justify-end p-2 lg:hidden">
        <button type="button" class="p-2 inline-flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#sidebar-mini" aria-controls="sidebar-mini" aria-label="Toggle navigation">
            <span class="sr-only">Toggle Navigation</span>
            <svg class="flex-shrink-0 size-4" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
            </svg>
        </button>
    </div>
    <!-- End Navigation Toggle -->

    <!-- Sidebar -->
    <div id="sidebar-mini" class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-20 bg-white border-e border-gray-200 lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
        <div class="flex flex-col justify-center items-center gap-y-2 py-4">
            <div class="mb-4">
                <a class="flex-none" href="/">
                    <svg class="w-10 h-auto" width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="100" height="100" rx="10" fill="black"/>
                        <path d="M36.8182 68V31.6364H43.4055V48.8061H61.5945V31.6364H68.1818V68H61.5945V54.3105H43.4055V68H36.8182Z" fill="white"/>
                    </svg>
                </a>
            </div>

            <a class="hs-tooltip [--placement:right] inline-block" href="/dashboard/orders">
                <button type="button" class="hs-tooltip-toggle w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                    <span class="material-symbols-outlined">receipt_long</span>
                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg whitespace-nowrap" role="tooltip">
                      Orders
                    </span>
                </button>
            </a>

            <a class="hs-tooltip [--placement:right] inline-block" href="/dashboard/payments">
                <button type="button" class="hs-tooltip-toggle w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                    <span class="material-symbols-outlined">payments</span>
                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg whitespace-nowrap" role="tooltip">
                      Payments
                    </span>
                </button>
            </a>

            <a class="hs-tooltip [--placement:right] inline-block" href="/dashboard/deliveries">
                <button type="button" class="hs-tooltip-toggle w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                    <span class="material-symbols-outlined">local_shipping</span>
                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg whitespace-nowrap" role="tooltip">
                      Deliveries
                    </span>
                </button>
            </a>

            <a class="hs-tooltip [--placement:right] inline-block" href="/dashboard/products">
                <button type="button" class="hs-tooltip-toggle w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                    <span class="material-symbols-outlined">cake</span>
                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg whitespace-nowrap" role="tooltip">
                      Products
                    </span>
                </button>
            </a>

            <a class="hs-tooltip [--placement:right] inline-block" href="/dashboard/users">
                <button type="button" class="hs-tooltip-toggle w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                    <span class="material-symbols-outlined">group</span>
                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg whitespace-nowrap" role="tooltip">
                      Users
                    </span>
                </button>
            </a>

            <a class="hs-tooltip [--placement:right] inline-block" href="/dashboard/delivery-services">
                <button type="button" class="hs-tooltip-toggle w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                    <span class="material-symbols-outlined">forklift</span>
                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg whitespace-nowrap" role="tooltip">
                        Delivery Service
                    </span>
                </button>
            </a>

            <a class="hs-tooltip [--placement:right] inline-block" href="/dashboard/categories">
                <button type="button" class="hs-tooltip-toggle w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                    <span class="material-symbols-outlined">label</span>
                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg whitespace-nowrap" role="tooltip">
                      Categories
                    </span>
                </button>
            </a>

{{--            <a class="hs-tooltip [--placement:right] inline-block" href="/dashboard/payment-methods">--}}
{{--                <button type="button" class="hs-tooltip-toggle w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">--}}
{{--                    <span class="material-symbols-outlined">credit_card</span>--}}
{{--                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg whitespace-nowrap" role="tooltip">--}}
{{--                      Payment Methods--}}
{{--                    </span>--}}
{{--                </button>--}}
{{--            </a>--}}

            <a class="hs-tooltip [--placement:right] inline-block" href="/dashboard/statuses">
                <button type="button" class="hs-tooltip-toggle w-[2.375rem] h-[2.375rem] inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                    <span class="material-symbols-outlined">check_circle</span>
                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 inline-block absolute invisible z-20 py-1.5 px-2.5 bg-gray-900 text-xs text-white rounded-lg whitespace-nowrap" role="tooltip">
                      Statuses
                    </span>
                </button>
            </a>
        </div>
    </div>
    <!-- End Sidebar -->

    <div class="pl-20 min-h-full h-full">
        {{ $slot }}
    </div>
</div>

</body>
</html>
