<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mosque App</title>
    <meta name="developer" content="Hudzaifah">
    <meta name="description" content="">

    @stack('style')
    @include('includes.header')
</head>
<body class="bg-gray-100 font-family-karla flex">

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        @include('components.landing.navbar')

        <!-- Mobile Header & Nav -->
        @include('components.landing.navbar-mobile')

        <div class="w-full overflow-x-hidden border-t flex flex-col h-full">
            <!-- content / main -->
            @yield('content')

            <!-- footer -->
            @include('components.landing.footer')
        </div>
    </div>

    @include('includes.footer')
    @stack('script')
</body>
</html>
