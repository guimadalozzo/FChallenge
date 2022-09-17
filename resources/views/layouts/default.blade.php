<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('includes.head')
    </head>
    
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen sm:items-top py-4 sm:pt-0">
            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                @include('includes.header')
            
                @yield('content')
            
                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    @include('includes.footer')
                </div>
            </div>
        </div>
        @stack('js')
    </body>
</html>