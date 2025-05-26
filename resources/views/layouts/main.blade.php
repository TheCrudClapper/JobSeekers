<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        JobSeekers
    </title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
     <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('websiteCss/app.css') }}">
    <link href="{{ asset('font-awesome/css/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('font-awesome/css/all.min.css') }}" rel="stylesheet" />

    @stack('styles')
</head>
<body>
    <!-- Website Navbar -->
    <nav class="navbar navbar-expand-lg p-3 shadow">
        <div class="container">
            <div>
                <a class="navbar-brand" href="/">
                    <img height="40" width="40" src="{{ asset('images/logo.png') }}">
                    <span class="fw-bold">JobSeekers</span>
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-secondary" href="/">Home</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link text-secondary" href="/job/job-browser">Find Jobs</a>
                    </li>
                </ul>
                <div class="d-flex">
                    @guest
                        <a href="/account/login" class="btn btn-outline-secondary me-2"  type="submit">Login</a>
                        <a href="/account/register" class="btn bg-primary text-white" type="submit">Register</a>
                    @endguest
                    @auth
                        <a href="/account/profile" class="btn btn-outline-secondary me-2" type="submit">Account</a>
                        <a href="/job/create" class="btn bg-primary text-white" type="submit">Post Offer</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <!-- Website Content -->
    <div class="container-fluid">
        <main role="main" class="pb-3">
            @yield("content")
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
    <script src="{{ asset('jquery/dist/jquery.min.js') }}"></script>
</body>

<!-- Website Footer -->
<div class="footer">
    <p>Job Portal made by TheCrudClapper 2025 MIT License</p>
</div>
