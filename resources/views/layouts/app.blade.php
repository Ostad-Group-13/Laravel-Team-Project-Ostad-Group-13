<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'OstadGroup13') }}</title>
        <link rel="shortcut icon" href="{{ asset('images/CP-Logo.png') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900 flex">

            <!-- Sidebar -->
            <x-admin-sidebar />

            <!-- Main Content -->
            <div id="main-dashbord-content" class="sideActive flex-1 flex flex-col bg-white dark:bg-gray-900">

                <div class="flex items-center justify-between w-full bg-white dark:bg-gray-800 shadow px-10 py-2">
                    <div class="flex items-center">
                        <!-- Toggle Button -->
                        <div class="flex items-center bg-white dark:bg-gray-800">
                            <button id="toggle-sidebar" class="text-gray-500 dark:text-gray-300 hover:text-gray-700 dark:hover:text-gray-200 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>                          
                            </button>
                        </div>

                        <!-- Page Heading -->
                        @if (isset($header))
                            <header class="bg-white dark:bg-gray-800">
                                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                    {{ $header }}
                                </div>
                            </header>
                        @endif
                    </div>

                    <!-- profile avter -->
                    <x-profile />

                </div>

                <!-- Page Content -->
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 dark:bg-gray-800 p-6">
                    {{ $slot }}
                </main>
            </div>
        </div>

        <!-- JavaScript -->
        <script>
            // Get the sidebar and toggle button
            const sidebar = document.getElementById('sidebar');
            const toggleButton = document.getElementById('toggle-sidebar');
            const mainContent = document.getElementById('main-dashbord-content');

            // Toggle the sidebar open and close
            toggleButton.addEventListener('click', () => {
                // Check if sidebar is currently hidden
                if (sidebar.classList.contains('-translate-x-full')) {
                    sidebar.classList.remove('-translate-x-full');
                    sidebar.classList.add('translate-x-0');
                    mainContent.classList.add('sideActive'); // Add class to main content
                } else {
                    sidebar.classList.remove('translate-x-0');
                    sidebar.classList.add('-translate-x-full');
                    mainContent.classList.remove('sideActive'); // Remove class from main content
                }
            });
        </script>

        @stack('modals')

        @livewireScripts
    </body>
</html>
