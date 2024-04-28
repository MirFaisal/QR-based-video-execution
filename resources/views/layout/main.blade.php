<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Genaret QR</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    </script>
</head>
<body class="p-4">
    <x-navbar></x-navbar>

    <main class="mt-20">
        @yield('main')
    </main>
    {{-- flowbite cdn --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    {{-- jquary --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    {{-- bultin api for pass qrcode and link --}}
    <script type="module" src="{{ asset('js/main.js') }}"></script>
    <Script>
        $(document).ready(function () {
                // Handle form submission 
                $("#qrForm").submit(function (event) {
                // Collect form data    
                    var formData = new FormData(this);
                    // Send form data via AJAX
                    $.ajax({
                        url: $(this).attr("action"),
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (response) {
                            // Handle successful submission
                            console.log(response);
                            htQrCode = response.qrCode;
                            originalUrl = response.url;
                            $("#qrCode").html(response.qrCode);

                            // You can redirect or show a success message here
                        },
                        error: function (xhr, status, error) {
                            // Handle errors
                            console.error(
                                "There was a problem with the AJAX request:",
                                error
                            );
                            // You can show an error message here
                        },
                        
                    });
                });
            });
    </Script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>