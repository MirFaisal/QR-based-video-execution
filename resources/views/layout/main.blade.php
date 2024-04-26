<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Genaret QR</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
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
    <script>
        // Place this script at the end of your Blade template or in a separate JavaScript file.
            $(document).ready(function () {
                $("#qrForm").submit(function (event) {
                    event.preventDefault(); // Prevent the default form submission
                    // Collect form data
                    var formData = new FormData(this);
                    console.log(formData);
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
    </script>
</body>
</html>