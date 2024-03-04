<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="multikit">
        <meta name="keywords" content="multikit">
        <title>{{ $title ?? 'Perumahan Sentosa' }}</title>
        <link rel="manifest" href="/frontend/manifest.json">
        <meta name="theme-color" content="#ff8d2f">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="apple-mobile-web-app-title" content="multikit">
        <meta name="msapplication-TileImage" content="/frontend/assets/images/favicon/1.svg">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="icon" type="image/x-icon" href="/frontend/assets/images/favicon/7.svg">
        <link rel="shortcut icon" href="/frontend/" type="image/x-icon">
    
        <!-- Google font css link  -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap">
    
        <!-- Bootstrap css -->
        <link id="rtl-link" rel="stylesheet" type="text/css" href="/frontend/assets/css/vendors/bootstrap.css">
    
        <!-- Swiper css -->
        <link rel="stylesheet" type="text/css" href="/frontend/assets/css/vendors/swiper/swiper-bundle.min.css">
    
        <!-- Remix Icon css -->
        <link rel="stylesheet" type="text/css" href="/frontend/assets/css/remixicon.css">
    
        <!-- Style css -->
        <link id="change-link" rel="stylesheet" type="text/css" href="/frontend/assets/css/style.css">
        
        <!-- Style css saya -->
        <link rel="stylesheet" type="text/css" href="/frontend/assets/css/slider.css">
    
        {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" /> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body class="hotel-booking-color">
        {{ $slot }}

        <!-- Bootstrap js-->
        <script src="/frontend/assets/js/vendors/bootstrap/bootstrap.bundle.min.js"></script>

        <!-- swiper js -->
        <script src="/frontend/assets/js/swiper-bundle.min.js"></script>
        <script src="/frontend/assets/js/custom_swiper.js"></script>

        <!-- Loader js -->
        <script src="/frontend/assets/js/loader.js"></script>
        
        {{-- slider --}}
        <script src="/frontend/assets/js/slider.js"></script>
        
        <!-- Theme js-->
        {{-- <script src="/frontend/assets/js/script.js"></script> --}}

        <!-- Theme Settings js-->
        {{-- <script src="/frontend/assets/js/theme-setting.js"></script> --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />
    </body>
</html>
