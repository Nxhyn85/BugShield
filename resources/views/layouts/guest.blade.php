<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" media="screen" href="{{ asset('custom_css/style.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Custom styles for particles background */
            #particles-container {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 0; /* Ensure it is behind other content */
            }

            #particles-js {
                width: 100%;
                height: 100%;
            }

            .content {
                position: relative;
                z-index: 1; /* Ensure it is above the particles */
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                padding: 2rem;
            }

            .transparent-container {
                background: rgb(37 43 62 / 80%);
                padding: 2rem;
                border-radius: 0.5rem;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                width: 500px;
            }

            .dark-mode .transparent-container {
                background: rgba(31, 41, 55, 0.8); /* Dark background with 80% opacity */
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div id="particles-container">
            <div id="particles-js"></div>
        </div>

        <div class="content">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>
        
            <div class="transparent-container">
                {{ $slot }}
            </div>
        </div>

        <script src="{{ asset('js/particles.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/stats.js') }}"></script>

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                particlesJS.load('particles-js', '{{ asset('json/particles.json') }}', function() {
                    console.log('particles.js loaded - callback');
                });
            });
        </script>
    </body>
</html>
