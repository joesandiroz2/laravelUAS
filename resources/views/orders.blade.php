<x-layout>
    <div class="mx-auto max-w-7xl pt-24 pb-6 sm:px-6 lg:px-8 h-full bg-white overflow-y-hidden">
        <h1 class="text-3xl font-semibold text-gray-900 mb-8">Orders</h1>
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50 divide-x divide-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Total Harga</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Status</th>
                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Info</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pesanan2 as $pesanan)
                                <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ date_format(date_create($pesanan->tanggal), "d-m-Y H:i") }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Rp {{ number_format($pesanan->total_harga, 2, ",", ".") }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                        @switch($pesanan->status->nama)
                                            @case("Cart")
                                                <div class="border text-sm rounded-lg px-4 py-2 w-fit bg-red-100 border-red-200 text-red-800" role="alert">
                                                    <span class="font-bold">{{ $pesanan->status->nama }} </span>
                                                </div>
                                                @break
                                            @case("Draft")
                                            @case("Proses")
                                                <div class="border text-sm rounded-lg px-4 py-2 w-fit bg-yellow-100 border-yellow-200 text-yellow-800" role="alert">
                                                    <span class="font-bold">{{ $pesanan->status->nama }} </span>
                                                </div>
                                                @break
                                            @case("Selesai")
                                                <div class="border text-sm rounded-lg px-4 py-2 w-fit bg-teal-100 border-teal-200 text-teal-800" role="alert">
                                                    <span class="font-bold">{{ $pesanan->status->nama }} </span>
                                                </div>
                                                @break
                                            @default
                                                <div class="border text-sm rounded-lg px-4 py-2 w-fit bg-blue-100 border-blue-200 text-blue-800" role="alert">
                                                    <span class="font-bold">{{ $pesanan->status->nama }} </span>
                                                </div>
                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium flex">
                                        <a href="javascript:void(0)" class="hover:bg-gray-200 rounded-full p-1" data-hs-overlay="#detail-{{ $pesanan->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                            </svg>
                                        </a>
                                        <div class="border-t sm:border-t-0 sm:border-s border-gray-200 dark:border-neutral-700 mx-2"></div>
                                        <a href="javascript:void(0)" class="hover:bg-gray-200 rounded-full p-1" data-hs-overlay="#payment-{{ $pesanan->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
                                            </svg>
                                        </a>
                                        <div class="border-t sm:border-t-0 sm:border-s border-gray-200 dark:border-neutral-700 mx-2"></div>
                                        <a href="javascript:void(0)" class="hover:bg-gray-200 rounded-full p-1" data-hs-overlay="#delivery-{{ $pesanan->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                                            </svg>
                                        </a>
                                        <input type="hidden" class="order-id" value="{{ $pesanan->id }}">
                                    </td>
                                    <td>
                                        <div id="detail-{{ $pesanan->id }}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none [--overlay-backdrop:static]" data-hs-overlay-keyboard="false">
                                            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                                                <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                                                    <div class="flex justify-between items-center py-3 px-4 border-b">
                                                        <h3 class="font-bold text-gray-800">
                                                            Detail
                                                        </h3>
                                                        <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#detail-{{ $pesanan->id }}">
                                                            <span class="sr-only">Close</span>
                                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M18 6 6 18"></path>
                                                                <path d="m6 6 12 12"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="p-4 overflow-y-auto">
                                                        <div class="flex flex-col">
                                                            <div class="-m-1.5 overflow-x-auto">
                                                                <div class="p-1.5 min-w-full inline-block align-middle">
                                                                    <div class="border rounded-lg overflow-hidden">
                                                                        <table class="min-w-full divide-y divide-gray-200">
                                                                            <thead class="bg-gray-50 divide-x divide-gray-200">
                                                                            <tr>
                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Produk</th>
                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Jumlah</th>
                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Harga</th>
                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Total</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach($pesanan->detail as $detail)
                                                                                    <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                                                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $detail->produk->nama }}</td>
                                                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $detail->jumlah }}</td>
                                                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Rp {{ number_format($detail->harga, 2, ",", ".") }}</td>
                                                                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Rp {{ number_format($detail->harga * $detail->jumlah, 2, ",", ".") }}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                                                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#detail-{{ $pesanan->id }}">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="payment-{{ $pesanan->id }}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none [--overlay-backdrop:static]" data-hs-overlay-keyboard="false">
                                            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                                                <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                                                    <div class="flex justify-between items-center py-3 px-4 border-b">
                                                        <h3 class="font-bold text-gray-800">
                                                            Payment
                                                        </h3>
                                                        <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#payment-{{ $pesanan->id }}">
                                                            <span class="sr-only">Close</span>
                                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M18 6 6 18"></path>
                                                                <path d="m6 6 12 12"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="p-4 overflow-y-auto">
                                                        <div class="flex flex-col">
                                                            <div class="-m-1.5 overflow-x-auto">
                                                                <div class="p-1.5 min-w-full inline-block align-middle">
                                                                    <div class="border rounded-lg overflow-hidden">
                                                                        <table class="min-w-full divide-y divide-gray-200">
                                                                            <thead class="bg-gray-50 divide-x divide-gray-200">
                                                                            <tr>
                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Total Harga</th>
                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Metode</th>
                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Status</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach($pesanan->pembayaran as $pembayaran)
                                                                                <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                                                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ date_format(date_create($pembayaran->tanggal), "d-m-Y H:i") }}</td>
                                                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">Rp {{ number_format($pembayaran->total_harga, 2, ",", ".") }}</td>
                                                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">@if($pembayaran->metode == "bank_transfer") Bank Transfer @else {{ $pembayaran->metode }} @endif</td>
                                                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">
                                                                                        @if($pembayaran->status == "not_pay")
                                                                                            <div class="border text-sm rounded-lg px-4 py-2 w-fit bg-red-100 border-red-200 text-red-800" role="alert">
                                                                                                <span class="font-bold">Not Pay</span>
                                                                                            </div>
                                                                                        @else
                                                                                            <div class="border text-sm rounded-lg px-4 py-2 w-fit bg-teal-100 border-teal-200 text-teal-800" role="alert">
                                                                                                <span class="font-bold">Paid</span>
                                                                                            </div>
                                                                                        @endif
                                                                                    </td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                                                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#payment-{{ $pesanan->id }}">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="delivery-{{ $pesanan->id }}" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none [--overlay-backdrop:static]" data-hs-overlay-keyboard="false">
                                            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-4xl lg:w-full m-3 lg:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
                                                <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
                                                    <div class="flex justify-between items-center py-3 px-4 border-b">
                                                        <h3 class="font-bold text-gray-800">
                                                            Delivery
                                                        </h3>
                                                        <button type="button" class="flex justify-center items-center size-7 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#delivery-{{ $pesanan->id }}">
                                                            <span class="sr-only">Close</span>
                                                            <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M18 6 6 18"></path>
                                                                <path d="m6 6 12 12"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="p-4 overflow-y-auto">
                                                        <div class="flex flex-col">
                                                            <div class="-m-1.5 overflow-x-auto">
                                                                <div class="p-1.5 min-w-full inline-block align-middle">
                                                                    <div class="border rounded-lg overflow-hidden">
                                                                        <table class="min-w-full divide-y divide-gray-200">
                                                                            <thead class="bg-gray-50 divide-x divide-gray-200">
                                                                            <tr>
                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Jasa</th>
                                                                                <th scope="col" class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase">Invoice</th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            @foreach($pesanan->pengiriman as $pengiriman)
                                                                                <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-100">
                                                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ date_format(date_create($pengiriman->tanggal), "d-m-Y H:i") }}</td>
                                                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $pengiriman->jasa->nama }}</td>
                                                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800">{{ $pengiriman->invoice }}</td>
                                                                                </tr>
                                                                            @endforeach
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t">
                                                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#delivery-{{ $pesanan->id }}">
                                                            Close
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($pesanan2->count() != 0)

    @endif
</x-layout>
