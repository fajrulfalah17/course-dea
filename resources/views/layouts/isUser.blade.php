<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD ADMIN - BLOG LARAVEL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div>
        <header>

            <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">SKUY</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/dashboard">Dashboard</a>
                            </li>
                        </ul>
                    </div>
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
