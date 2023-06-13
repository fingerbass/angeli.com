<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Glider --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.8/glider.min.js"
            integrity="sha512-AZURF+lGBgrV0WM7dsCFwaQEltUV5964wxMv+TSzbb6G1/Poa9sFxaCed8l8CcFRTiP7FsCgCyOm/kf1LARyxA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    {{--FlexSlider --}}
    <script src="{{ asset('vendor/flexslider/jquery.flexslider-min.js') }}"></script>

    <!-- Styles -->

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

    {{-- Glider --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.8/glider.min.css"
          integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    {{-- FlexSlider --}}
    <link rel="stylesheet" href="{{ asset('vendor/flexslider/flexslider.css') }}">

    @livewireStyles
</head>
<body class="font-sans antialiased">
<x-banner/>

<div class="min-h-screen bg-gray-100">
    @livewire('navigation')

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

@stack('modals')

@livewireScripts

<script>
    function dropdown() {
        return {
            open: false,
            show() {
                let x = document.getElementsByTagName('html')[0];
                this.open = !this.open;
                this.open ? x.style.overflow = 'hidden' : x.style.overflow = 'auto';
            },
            close() {
                this.open = false;
                document.getElementsByTagName('html')[0].style.overflow = 'auto';
            }
        }
    }
</script>

@stack('script')

</body>
</html>
