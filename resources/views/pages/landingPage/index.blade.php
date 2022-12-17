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

    <script>
        let element = document.documentElement;

        document.querySelector('#btnCloseFullScreen').style.display = "none";
        document.querySelector('#btnCloseFullScreen2').style.display = "none";

        let btnOpenFullScreen = document.querySelector("#btnOpenFullScreen");
        let btnOpenFullScreen2 = document.querySelector("#btnOpenFullScreen2");

        let btnCloseFullScreen = document.querySelector("#btnCloseFullScreen");
        let btnCloseFullScreen2 = document.querySelector("#btnCloseFullScreen2");

        let navbarSm = document.querySelector('#navbarSm');
        let navbarLg = document.querySelector('#navbarLg');

        function openFullScreen() {
            if (element.requestFullscreen) {
                element.requestFullscreen();
            } else if (element.mozRequestFullscreen) {
                element.mozRequestFullscreen();
            } else if (element.webkitRequestFullscreen) {
                element.webkitRequestFullscreen();
            } else if (element.msRequestFullscreen) {
                element.msRequestFullscreen();
            }

            btnOpenFullScreen.style.display = "none";
            btnCloseFullScreen.style.display = "block";

            btnOpenFullScreen2.style.display = "none";
            btnCloseFullScreen2.style.display = "block";

            navbarSm.style.opacity = "0";
            navbarLg.style.opacity = "0";

            navbarSm.classList.add("h-0");
            navbarLg.classList.add("h-0");

            navbarSm.style.padding = "0px";
            navbarLg.style.padding = "0px";
        }

        function closeFullScreen() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullscreen) {
                document.mozCancelFullscreen();
            } else if (document.webkitexitFullscreen) {
                document.webkitexitFullscreen();
            } else if (document.msexitFullscreen) {
                document.msexitFullscreen();
            }

            btnOpenFullScreen.style.display = "block";
            btnCloseFullScreen.style.display = "none";

            btnOpenFullScreen2.style.display = "block";
            btnCloseFullScreen2.style.display = "none";

            navbarSm.style.opacity = "1";
            navbarLg.style.opacity = "1";

            navbarSm.classList.remove("h-0");
            navbarLg.classList.remove("h-0");

            navbarSm.style.paddingLeft = "24px";
            navbarSm.style.paddingRight = "24px";
            navbarSm.style.paddingTop = "20px";
            navbarSm.style.paddingBottom = "20px";

            navbarLg.style.paddingLeft = "24px";
            navbarLg.style.paddingRight = "24px";
            navbarLg.style.paddingTop = "8px";
            navbarLg.style.paddingBottom = "8px";
        }
    </script>
    @include('includes.footer')
    @stack('script')
</body>
</html>
