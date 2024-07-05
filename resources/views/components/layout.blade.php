<!doctype html>
<html class="h-full bg-gray-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
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
    <x-navbar />

{{--    <x-header>{{ $title }}</x-header>--}}

    {{ $slot }}
</div>
<script>
    $(function () {
        @auth()
        $.ajax({
            type: "GET",
            url: "/isCartExists",
            success: function(result, status, xhr) {
                if (result.isCartExists) {
                    $(".cart-exists").removeClass("hidden");
                }
            },
            error: function(xhr, status, error) {
                console.log(xhr, status, error);
            }
        });
        @endauth
    })
</script>
</body>
</html>
