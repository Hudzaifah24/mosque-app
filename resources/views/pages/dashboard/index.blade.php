<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mosque App</title>
    <meta name="developer" content="Hudzaifah">
    <meta name="description" content="">

    @include('includes.header')
    @stack('style')
</head>
<body class="bg-gray-100 font-family-karla flex">

    @include('components.dashboard.sidebar')

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        @include('components.dashboard.navbar')

        <!-- Mobile Header & Nav -->
        @include('components.dashboard.navbar-mobile')

        <div class="w-full overflow-x-hidden border-t flex flex-col h-full">
            <!-- content / main -->
            @yield('content')

            <!-- footer -->
            @include('components.dashboard.footer')
        </div>

    </div>

    @include('includes.footer')
    @stack('script')
</body>
</html>
