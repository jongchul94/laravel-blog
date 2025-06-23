<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="@yield('meta_description', 'My Laravel Blog')">
        <meta property="og:title" content="@yield('meta_title', 'My Laravel Blog')">
        <meta property="og:description" content="@yield('meta_description', 'My Laravel Blog')">
        <meta property="og:type" content="website">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('meta_title', 'My Laravel Blog')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                <div class="mx-auto p-4">
                    {{ $slot }}
                </div>
            </main>
        </div>
        <footer class="mt-12 border-t border-gray-200 dark:border-gray-700 pt-6 pb-4 text-center text-sm text-gray-500 bg-white dark:bg-gray-900 dark:text-gray-400">
            <p>© {{ date('Y') }} Laravel Blog. All rights reserved.</p>
            <p>
                <a href="https://github.com/jongchul94/laravel-blog" target="_blank" class="hover:underline">
                    GitHub Repository
                </a>
            </p>
        </footer>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script defer>
            document.addEventListener('DOMContentLoaded', () => {
                if (localStorage.theme === 'dark') {
                    document.documentElement.classList.add('dark');
                }
            });

            const darkBtn = document.getElementById('darkToggle');
            if (darkBtn) {
                darkBtn.addEventListener('click', () => {
                    document.documentElement.classList.toggle('dark');
                    localStorage.theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
                });
            }
        </script>
    </body>
</html>
