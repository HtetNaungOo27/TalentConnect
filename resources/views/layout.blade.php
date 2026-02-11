<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    {{-- Tailwind CSS --}}
    @vite('resources/css/app.css')
    
    {{-- Custom Styles --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    {{-- Font Awesome --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- AlpineJS --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    <title>{{ $title ?? 'TalentConnect | Find & Apply Job' }}</title>
</head>

<body class="bg-gray-100 font-sans text-gray-900">

    {{-- Header --}}
    <x-header />

    {{-- Homepage Hero & Banner --}}
    @if(request()->is('/'))
        <x-hero />
        <x-top-banner />
    @endif

    {{-- Main Content --}}
    <main class="container mx-auto px-4 py-6">
        {{-- Flash Alerts --}}
        @if(session('success'))
            <x-alert type="success" message="{{ session('success') }}" />
        @endif
        @if(session('error'))
            <x-alert type="error" message="{{ session('error') }}" />
        @endif

        {{-- Page Slot --}}
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <x-footer />

    {{-- Custom Scripts --}}
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>