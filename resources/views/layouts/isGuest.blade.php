<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BLOG LARAVEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div>
        <header>
            <!-- Fixed navbar -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">SKUY LIVING</a>
                </div>
            </nav>
        </header>



        {{-- content --}}
        <div>
            <main class="flex-shrink-0">
                @yield('content')
            </main>
        </div>
        {{-- end content --}}

        <footer>
            <div class="text-center p-3" style="position: absolute;
            width: 100%;">
                © 2020 Copyright:
                <a class="text-dark text-decoration-none" href="https://www.instagram.com/arunika_2021/">Arunika Production 2021</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
    @include('sweetalert::alert')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
