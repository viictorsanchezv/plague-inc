<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- Particle -->
        <script src="{{ URL::asset('js/particles.js') }}" ></script>
        <script src="{{ URL::asset('js/particles.min.js') }}" ></script>
        <!-- Stats JS  -->
        <script src="{{ URL::asset('js/stats.js') }}" ></script>
        
        <!-- Alpine.js -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))

            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

       

        <!-- <script>
            setInterval(() => {
                console.log("tick");
                window.livewire.on('postAdded', postId => {
                    alert('A post was added with the id of: ' + postId);
                })
            }, 1000);
            //Livewire.emit('postAdded');
        </script> -->
    </body>
</html>
