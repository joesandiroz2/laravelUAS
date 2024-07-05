<x-dashboard.layout>
    <div class="h-full p-6">
        <p class="text-4xl font-bold my-4">{{ $title }}</p>
        <form action="/dashboard/payments/{{ $pembayaran->id }}" method="POST" class="w-96 pb-6">
            @csrf
            @method('PUT')

            <div class="grid gap-4 lg:gap-6">
                <div>
                    <label for="id_pesanan" class="block mb-2 text-sm text-gray-700 font-medium">ID Pesanan</label>
                    <input type="number" name="id_pesanan" id="id_pesanan" value="{{ (int)$pembayaran->id_pesanan }}" disabled class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                </div>

                <div>
                    <label for="tanggal" class="block mb-2 text-sm text-gray-700 font-medium">Tanggal</label>
                    <input type="datetime-local" name="tanggal" id="tanggal" value="{{ $pembayaran->tanggal }}" disabled class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                </div>

                <div>
                    <label for="total_harga" class="block mb-2 text-sm text-gray-700 font-medium">Total Harga</label>
                    <input type="number" name="total_harga" id="total_harga" value="{{ (int)$pembayaran->total_harga }}" disabled class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                </div>

                <div>
                    <label for="metode" class="block mb-2 text-sm text-gray-700 font-medium">Metode</label>
                    <input type="text" name="metode" id="metode" value="{{ $pembayaran->metode }}" disabled class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                </div>

                <div>
                    <label for="status" class="block mb-2 text-sm text-gray-700 font-medium">Status</label>
                    <div class="relative" data-hs-combo-box="">
                        <div class="relative">
                            <input class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" type="text" name="status" value="{{ $pembayaran->status }}" data-hs-combo-box-input="">
                            <div class="absolute top-1/2 end-3 -translate-y-1/2" data-hs-combo-box-toggle="">
                                <svg class="flex-shrink-0 size-3.5 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m7 15 5 5 5-5"></path>
                                    <path d="m7 9 5-5 5 5"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="absolute z-50 w-full max-h-72 p-1 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300" style="display: none;" data-hs-combo-box-output="">
                            <div class="cursor-pointer py-2 px-4 w-full text-sm text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100" tabindex="0" data-hs-combo-box-output-item="">
                                <div class="flex justify-between items-center w-full">
                                    <span data-hs-combo-box-search-text="not_pay" data-hs-combo-box-value="not_pay">not_pay</span>
                                    <span class="hidden hs-combo-box-selected:block">
                                          <svg class="flex-shrink-0 size-3.5 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 6 9 17l-5-5"></path>
                                          </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="cursor-pointer py-2 px-4 w-full text-sm text-gray-800 hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100" tabindex="0" data-hs-combo-box-output-item="">
                                <div class="flex justify-between items-center w-full">
                                    <span data-hs-combo-box-search-text="paid" data-hs-combo-box-value="paid">paid</span>
                                    <span class="hidden hs-combo-box-selected:block">
                                          <svg class="flex-shrink-0 size-3.5 text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M20 6 9 17l-5-5"></path>
                                          </svg>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="link" class="block mb-2 text-sm text-gray-700 font-medium">Link</label>
                    <input type="text" name="link" id="link" value="{{ $pembayaran->link }}" disabled class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                </div>

                <div>
                    <label for="token" class="block mb-2 text-sm text-gray-700 font-medium">Token</label>
                    <input type="text" name="token" id="token" value="{{ $pembayaran->token }}" disabled class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                </div>

                <div>
                    <label for="midtrans_id" class="block mb-2 text-sm text-gray-700 font-medium">Midtrans ID</label>
                    <input type="text" name="midtrans_id" id="midtrans_id" value="{{ $pembayaran->midtrans_id }}" disabled class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                </div>
            </div>
            <!-- End Grid -->
            <input type="hidden" name="id" value="{{ $pembayaran->id }}">
            <div class="mt-6 grid grid-cols-2 gap-6">
                <a href="/dashboard/payments" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Go Back
                </a>
                <button disabled type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                    Save
                </button>
            </div>
        </form>
    </div>
    <script>
    </script>
</x-dashboard.layout>
