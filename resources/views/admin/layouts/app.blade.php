<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        .btn-primary {
            background-color: #255D6C !important;
            border: #255D6C !important;


        }
    </style>
</head>

<body style="background-color:#f8f9fc">

    <nav class="navbar navbar-expand-lg" style="background-color: rgba(0, 0, 0, 0.05);">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{ asset('image/logo.avif') }}" style="height:55px"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"
                            href="{{ route('dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.index') }}">category</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.index') }}">Product</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <div class="container mb-5">

        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted" style="bottom: 0 !important; position: fixed; width:100%;">

        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4 " style="background-color: rgba(0, 0, 0, 0.05);">
            @php
                $year = date('Y');
            @endphp
            © {{ $year }} Copyright:
            <a class="text-reset fw-bold" href="#">Bassion</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
</body>

</html>
