<x-layout>
    <div id="loading" class="fixed flex items-center justify-center z-50 w-full h-full bg-white opacity-50">
        <div class="animate-spin inline-block size-8 border-[3px] border-current border-t-transparent text-blue-600 rounded-full dark:text-blue-500" role="status" aria-label="loading">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
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
                    <div id="alert-message-success" class="text-sm font-medium"></div>
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
    <div id="dismiss-alert-error" class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 w-2/4">
        <div class="hs-removing:translate-x-5 hs-removing:opacity-0 transition duration-300 bg-red-50 border border-red-200 text-sm text-red-800 rounded-lg p-4" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="flex-shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                        <path d="m9 12 2 2 4-4"></path>
                    </svg>
                </div>
                <div class="ms-2">
                    <div id="alert-message-error" class="text-sm font-medium"></div>
                </div>
                <div class="ps-3 ms-auto">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" id="close-alert-error" class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600">
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
    <div class="mx-auto max-w-7xl pt-24 pb-6 sm:px-6 lg:px-8 h-full bg-white overflow-y-hidden">
        <h1 class="text-3xl font-semibold text-gray-900 mb-8">Shopping Cart</h1>
        <div class="grid grid-cols-5 gap-16">
            <div class="col-span-3 overflow-y-auto pr-8" style="max-height: 555.200px">
                @foreach($orders as $order)
                    <hr class="my-8">
                    <div class="grid grid-cols-12">
                        <img class="col-span-3 w-40 h-40 object-cover mr-4" src="{{ $order->produk->gambar }}" alt="gambar kue">
                        <div class="col-span-9 flex flex-col justify-center ml-8 gap-2">
                            <div class="flex justify-between">
                                <p class="font-bold text-lg">{{ $order->produk->nama }}</p>
                            </div>
                            <div id="cont-jumlah-{{ $order->id }}" class="flex justify-between">
                                <p>Quantity</p>
                                <p id="jumlah-{{ $order->id }}">{{ $order->jumlah }}</p>
                            </div>
                            <div id="cont-harga-{{ $order->id }}" class="flex justify-between">
                                <p>Price</p>
                                <p id="harga-{{ $order->id }}">Rp {{ number_format($order->produk->harga, 2, ",", ".") }}</p>
                            </div>
                            <hr>
                            <div id="cont-subtotal-{{ $order->id }}" class="flex justify-between">
                                <p class="font-bold text-lg">Subtotal</p>
                                <p id="subtotal-{{ $order->id }}" class="font-bold text-lg">Rp {{ number_format($order->jumlah * $order->produk->harga,2,",",".") }}</p>
                            </div>
                            <div class="flex justify-end mt-2">
                                <a href="javascript:void(0)" class="del-item hover:bg-gray-200 rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                    </svg>
                                </a>
                                <a href="javascript:void(0)" class="min-item-qty @if($order->jumlah == 1) hidden @endif hover:bg-gray-200 rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </a>
                                <a href="javascript:void(0)" class="add-item-qty hover:bg-gray-200 rounded-full p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                    </svg>
                                </a>
                                <input type="hidden" class="id_pesanan-{{ $order->id_pesanan }}" value="{{ $order->id_pesanan }}">
                                <input type="hidden" id="id-{{ $order->id }}" value="{{ $order->id }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($orders->count() > 0)
                <div class="col-span-2">
                    <div class="bg-gray-100 px-6 py-8 rounded-lg h-min mb-6">
                        <p class="text-2xl mb-6 font-bold">Order Summary</p>
    {{--                    <div class="flex justify-between">--}}
    {{--                        <p>Subtotal</p>--}}
    {{--                        <p id="sum-subtotal">Rp {{ number_format($subtotal, 2, ",", ".") }}</p>--}}
    {{--                    </div>--}}
    {{--                    <hr class="my-4">--}}
    {{--                    <div class="flex justify-between">--}}
    {{--                        <p>Tax</p>--}}
    {{--                        <p id="sum-tax">Rp {{ number_format($tax, 2, ",", ".") }}</p>--}}
    {{--                    </div>--}}
                        <hr class="my-4">
                        <div class="flex justify-between">
                            <p class="text-xl font-semibold">Total</p>
                            <p id="sum-total" class="text-xl font-semibold">Rp {{ number_format($subtotal, 2, ",", ".") }}</p>
                        </div>
                        <button id="checkout" class="w-full bg-indigo-600 text-white mt-6 rounded-lg py-2 hover:bg-indigo-700">Checkout</button>
                        <input type="hidden" class="id_pesanan-{{ $orders->first()->id_pesanan }}" value="{{ $orders->first()->id_pesanan }}">
                    </div>
                    <div class="bg-white px-6 py-8 rounded-lg h-min">
                        <button id="checkPayment" class="w-full bg-red-600 text-white rounded-lg py-2 hover:bg-red-700">
                            Not Paid!
                            Press Checkout to pay it, click this if you already paid
                        </button>
                        <input type="hidden" class="id_pesanan-{{ $orders->first()->id_pesanan }}" value="{{ $orders->first()->id_pesanan }}">
                    </div>
                </div>
            @endif
        </div>
    </div>
    <script>
        const loading = $('#loading');
        loading.hide();

        const alertError = $('#dismiss-alert-error');
        $("#close-alert-error").on("click", function () {
            alertError.toggle(200);
        });
        alertError.hide();

        const alertSuccess = $('#dismiss-alert-success');
        $("#close-alert-success").on("click", function () {
            alertSuccess.toggle(200);
        });
        alertSuccess.hide();

        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number);
        }
        let midtrans_id, payment_id, payment_link = "";
        @if(isset($payment))
            midtrans_id = "{{ $payment->midtrans_id }}";
            payment_id = "{{ $payment->id }}";
            payment_link = "{{ $payment->link }}";
        @endif

        function updSum(subtotal, tax, total) {
            // $('#sum-subtotal').text(rupiah(subtotal));
            // $('#sum-tax').text(rupiah(tax));
            // $('#sum-total').text(rupiah(total));
            $('#sum-total').text(rupiah(subtotal));
        }

        $('.add-item-qty').on('click', (e) => {
            e.preventDefault();
            const clickedElement = $(e.currentTarget);
            const id_pesanan = clickedElement.siblings('[class^="id_pesanan-"]').first();
            const minusButton = clickedElement.siblings('[class^="min-item-qty"]').first();
            const id = clickedElement.siblings('[id^="id-"]').first();

            $.ajax({
                type: "POST",
                url: "/addCartQty",
                data: {
                    id_pesanan: id_pesanan.val(),
                    id: id.val(),
                },
                success: function(data, textStatus, jqXHR) {
                    if (textStatus === "success") {
                        const jumlah = clickedElement.parents().siblings('[id^="cont-jumlah"]').children('[id^="jumlah"]');
                        const harga = clickedElement.parents().siblings('[id^="cont-harga"]').children('[id^="harga"]');
                        const subtotal = clickedElement.parents().siblings('[id^="cont-subtotal"]').children('[id^="subtotal"]');

                        const newJumlah = parseInt(jumlah.text()) + 1;
                        const newSubtotal = newJumlah * parseInt(harga.text().slice(3).slice(0, -3).replaceAll('.', ''));

                        jumlah.text(newJumlah);
                        subtotal.text(rupiah(newSubtotal));
                        updSum(data.subtotal, data.tax, data.total);

                        if(newJumlah > 1) {
                            minusButton.removeClass('hidden');
                        }
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(jqXHR.responseJSON.message);
                }
            });
        });
        $('.min-item-qty').on('click', (e) => {
            e.preventDefault();
            const clickedElement = $(e.currentTarget);
            const id_pesanan = clickedElement.siblings('[class^="id_pesanan-"]').first();
            const id = clickedElement.siblings('[id^="id-"]').first();

            $.ajax({
                type: "POST",
                url: "/minCartQty",
                data: {
                    id_pesanan: id_pesanan.val(),
                    id: id.val(),
                },
                    success: function(data, textStatus, jqXHR) {
                    if (textStatus === "success") {
                        const jumlah = clickedElement.parents().siblings('[id^="cont-jumlah"]').children('[id^="jumlah"]');
                        const harga = clickedElement.parents().siblings('[id^="cont-harga"]').children('[id^="harga"]');
                        const subtotal = clickedElement.parents().siblings('[id^="cont-subtotal"]').children('[id^="subtotal"]');

                        const newJumlah = parseInt(jumlah.text()) - 1;
                        const newSubtotal = newJumlah * parseInt(harga.text().slice(3).slice(0, -3).replaceAll('.', ''));

                        jumlah.text(newJumlah);
                        subtotal.text(rupiah(newSubtotal));
                        updSum(data.subtotal, data.tax, data.total);
                        if(newJumlah === 1) {
                            clickedElement.addClass('hidden');
                        }
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(jqXHR.responseJSON.message);
                }
            });
        });
        $('.del-item').on('click', (e) => {
            e.preventDefault();
            const clickedElement = $(e.currentTarget);
            const id_pesanan = clickedElement.siblings('[class^="id_pesanan-"]').first();
            const id = clickedElement.siblings('[id^="id-"]').first();

            $.ajax({
                type: "POST",
                url: "/delCart",
                data: {
                    id_pesanan: id_pesanan.val(),
                    id: id.val(),
                },
                success: function(data, textStatus, jqXHR) {
                    if (textStatus === "success") {
                        location.reload();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error(jqXHR.responseJSON.message);
                }
            });
        });
        $('#checkout').on('click', (e) => {
            loading.show();
            e.preventDefault();
            const clickedElement = $(e.currentTarget);
            const id_pesanan = clickedElement.siblings('[class^="id_pesanan-"]').first();

            if (payment_link !== "") {
                loading.hide();
                window.open(payment_link, '_blank');
            } else {
                const items = [];
                @foreach($orders as $order)
                items.push(
                    {
                        "item_id": "{{ $order->produk->kode }}",
                        "price": parseInt("{{ $order->produk->harga }}"),
                        "quantity": parseInt("{{ $order->jumlah }}"),
                        "name": "{{ $order->produk->nama }}",
                        "brand": "Hestia Bakery",
                        "category": "{{ $order->produk->kategori->nama }}",
                        "merchant_name": "Zeus"
                    }
                );
                @endforeach

                const total_harga = parseInt($('#sum-total').text().slice(3).slice(0, -3).replaceAll('.', ''));
                const data = {
                    "first_name": "{{ Auth::user()->nama }}",
                    "last_name": "",
                    "email": "{{ Auth::user()->email }}",
                    "gross_amount": total_harga,
                    "item_details": items
                };
                fetch('https://bobwatcherx-upbkafe.hf.space/create-transaction/', {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'Content-Type': 'application/json'
                    }
                }).then(createTransRes => createTransRes.json())
                    .then(createTransJson => {
                        fetch(`https://bobwatcherx-upbkafe.hf.space/listtransaction?email={{ Auth::user()->email }}`, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        }).then(listTransRes => listTransRes.json())
                            .then(listTransJson => {
                                const listTransNotPay = listTransJson.data.find(obj => {
                                    return obj.status === "not_pay";
                                });
                                midtrans_id = listTransNotPay.order_id;
                                $.ajax({
                                    type: "POST",
                                    url: "/checkout",
                                    data: {
                                        id_pesanan: id_pesanan.val(),
                                        total_harga: total_harga,
                                        link: createTransJson.transaction_redirect_url,
                                        status: listTransNotPay.status,
                                        metode: listTransNotPay.method_payment,
                                        token: createTransJson.transaction_token,
                                        midtrans_id: midtrans_id,
                                    },
                                    success: function(data2, textStatus, jqXHR) {
                                        loading.hide();
                                        if (textStatus === "success") {
                                            window.open(createTransJson.transaction_redirect_url, '_blank');
                                        }
                                    },
                                    error: function(jqXHR, textStatus, errorThrown) {
                                        loading.hide();
                                        console.error(jqXHR.responseJSON.message);
                                    }
                                });
                            }).catch(error => {
                                loading.hide();
                                console.error('Error:', error)
                            });
                    }).catch(error => {
                        loading.hide();
                        console.error('Error:', error)
                    });
            }

        });
        $('#checkPayment').on('click', (e) => {
            loading.show();
            const clickedElement = $(e.currentTarget);
            const id_pesanan = clickedElement.siblings('[class^="id_pesanan-"]').first();

            fetch(`https://bobwatcherx-upbkafe.hf.space/listtransaction?email={{ Auth::user()->email }}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(listTransRes => listTransRes.json())
            .then(listTransJson => {
                console.log(listTransJson, midtrans_id);
                const listTransPaid = listTransJson.data.find(obj => {
                    return obj.order_id === midtrans_id;
                });

                if(listTransPaid !== undefined && listTransPaid.status === "paid") {
                    $.ajax({
                        type: "POST",
                        url: "updStatus",
                        data: {
                            status: listTransPaid.status,
                            metode: listTransPaid.method_payment,
                            id_pesanan: id_pesanan.val(),
                            id: payment_id,
                        },
                        success: function(data2, textStatus, jqXHR) {
                            if (textStatus === "success") {
                                loading.hide();
                                $('#alert-message-success').text("Payment Success");
                                alertSuccess.toggle(200);
                                setTimeout(function() {
                                    alertSuccess.hide(200);
                                    window.open("/menu", '_self');
                                }, 5000);
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            loading.hide();
                            console.error(jqXHR.responseJSON.message);
                        }
                    });
                } else {
                    loading.hide();
                    $('#alert-message-error').text("You haven't pay the bill yet");
                    if ($('#dismiss-alert-error:hidden').length) {
                        alertError.toggle(200);
                    } else {
                        alertError.toggle(200);
                        alertError.toggle(200);
                    }
                    setTimeout(function() {
                        alertError.hide(200);
                    }, 5000);
                }
            })
            .catch(error => {
                loading.hide();
                console.error('Error:', error)
            });
        });
    </script>
</x-layout>
