<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'AfrikaVibe') }}</title>

    {{-- <!-- Fonts --> --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- <!-- Google Web Fonts --> --}}
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap"
        rel="stylesheet"> --}}

    {{-- <!-- Icon Font Stylesheet --> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"> --}}

    {{-- <!-- Libraries Stylesheet --> --}}
    <link href="{{ asset('/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="/public/vendor/adminlte/dist/css/adminlte.min.css"> --}}

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('/css/bootstrap.min.css ') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="/public/bootstrap5/css/bootstrap.min.css"> --}}
    {{-- <!-- Template Stylesheet --> --}}
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    {{-- <!-- Scripts --> --}}

    <link rel="stylesheet" href="/public/css/tailwind.css">
    <link rel="stylesheet" href="/public/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="/public/jquery.mobile-1.4.5/jquery.mobile.icons-1.4.5.min.css">


    {{-- <!-- Styles --> --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <!-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v${1:2.x.x}/dist/alpine.js" defer></script> -->

    <script>
        tailwind.config = {
            darkMode: 'true',
            theme: {
                extend: {
                    // colors: {
                    //   primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
                    // }
                },
                fontFamily: {
                    'body': [
                        'Inter',
                        'ui-sans-serif',
                        'system-ui',
                        '-apple-system',
                        'system-ui',
                        'Segoe UI',
                        'Roboto',
                        'Helvetica Neue',
                        'Arial',
                        'Noto Sans',
                        'sans-serif',
                        'Apple Color Emoji',
                        'Segoe UI Emoji',
                        'Segoe UI Symbol',
                        'Noto Color Emoji'
                    ],
                    'sans': [
                        'Inter',
                        'ui-sans-serif',
                        'system-ui',
                        '-apple-system',
                        'system-ui',
                        'Segoe UI',
                        'Roboto',
                        'Helvetica Neue',
                        'Arial',
                        'Noto Sans',
                        'sans-serif',
                        'Apple Color Emoji',
                        'Segoe UI Emoji',
                        'Segoe UI Symbol',
                        'Noto Color Emoji'
                    ]
                }
            }
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans">
    <div class="max-h-screen bg-gray-100 dark:bg-gray-900">

        <x-banner />
        <nav
            class="relative sm:flex sm:justify-center sm:items-center sm:right-0 min-w-screen bg-dots-darker bg-white selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:left-0 text-right z-50 bg-white max-w-full">
                    @auth

                        @livewire('navigation-menu')
                    @else
                        <div class="flex gap-2">
                            <div class="flex">
                                <!-- Logo -->
                                <div class="shrink-0 flex items-center">
                                    {{-- <a href="{{ route('dashboard') }}">
                            <x-application-mark class="block h-9 w-auto" />
                        </a> --}}

                                    <x-application-name />


                                </div>

                                <!-- Navigation Links -->
                                <div class="space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                    {{-- <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                            </x-nav-link> --}}
                                    {{-- navigation items --}}
                                    {{-- <x-nav-item /> --}}

                                    {{-- <livewire:chatify /> --}}
                                    <div class="flex gap-3 justify-between ">
                                        <x-secondary-button>
                                            <a wire:navigate href="{{ route('login') }}"
                                                class=" text-gray-800 hover:text-gray-900 focus:rounded-md focus:text-green-800">Log
                                                in</a>
                                        </x-secondary-button>
                                        @if (Route::has('register'))
                                            <x-secondary-button>
                                                <a wire:navigate href="{{ route('register') }}"
                                                    class="ml-4 font-semibold text-gray-800 hover:text-gray-900 focus:rounded-md ">Register</a>
                                            </x-secondary-button>
                                        @endif
                                    </div>
                                </div>

                            </div>


                        </div>
                    @endauth
                </div>
            @endif

        </nav>

        <main>
            {{ $slot }}
        </main>
    </div>

    {{-- @push('scripts') --}}


    <script src="{{ asset('/public/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js') }}"></script>

{{--
    <script src="{{ asset('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script src="{{ asset('/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    {{-- <script src="/vendor/adminlte/dist/js/adminlte.min.js"></script> --}}

    {{-- <script src="/public/bootstrap5/js/bootstrap.min.js"></script> --}}
    {{-- <!-- Template Javascript --> --}}
    <script src="{{ asset('/js/main.js') }}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('js/main.js') }}"></script>
    {{-- @endpush --}}


    @livewireScripts
    @stack('modals')

</body>

</html>
