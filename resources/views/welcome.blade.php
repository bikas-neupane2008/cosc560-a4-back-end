<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Dashboard</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
        <symbol id="post" viewBox="0 0 16 16">
            <path d="M 4.16 0.96 L 4.16 7.140 L 4.22 7.33 L 5.69 9.28 L 5.73 9.35 L 6 9.77 L 7.32 11.84 L 6.2 11.84 L 6.11 11.92 L 4.48 13.7 L 4.48 11.84 L 3.52 11.84 C 2.79 11.84 2.24 11.29 2.24 10.56 L 2.24 3.84 C 2.24 3.11 2.79 2.56 3.52 2.56 L 3.84 2.56 L 3.84 1.92 L 3.52 1.92 C 2.46 1.92 1.6 2.78 1.6 3.84 L 1.6 10.56 C 1.6 11.62 2.46 12.48 3.52 12.48 L 3.84 12.48 L 3.84 15.11 L 4.37 14.64 L 6.84 12.48 L 12.8 12.48 C 13.86 12.48 14.72 11.62 14.72 10.56 L 14.72 3.84 C 14.72 2.78 13.86 1.92 12.8 1.92 L 8 1.92 L 8 0.96 Z M 4.8 1.6 L 7.36 1.6 L 7.36 6.24 L 6.2 5.78 L 6.08 5.74 L 5.96 5.78 L 4.8 6.24 Z M 8 2.56 L 12.8 2.56 C 13.53 2.56 14.08 3.11 14.08 3.84 L 14.08 9.28 L 6.48 9.28 L 7.94 7.14 L 8 7.14 Z M 6.08 6.43 L 7.35 6.94 L 6.6 8 L 5.56 8 L 4.81 6.94 Z M 6.85 9.92 L 14.08 9.92 L 14.08 10.56 C 14.08 11.29 13.53 11.84 12.8 11.84 L 8.07 11.84 Z"></path>
        </symbol>
        <symbol id="signout" viewBox="0 0 16 16">
            <path d="M11.809 3.31L15.646 7.146c0.225 0.225 0.354 0.536 0.354 0.854s-0.129 0.629-0.354 0.854L11.809 12.69c-0.2 0.2-0.469 0.31-0.75 0.31-0.584 0-1.06-0.476-1.06-1.06v-1.94H6c-0.553 0-1-0.447-1-1v-2c0-0.553 0.447-1 1-1h4V4c0-0.584 0.476-1.06 1.06-1.06 0.281 0 0.55 0.11 0.75 0.31zM5 3H3c-0.553 0-1 0.447-1 1v8c0 0.553 0.447 1 1 1h2c0.553 0 1 0.447 1 1s-0.447 1-1 1H3c-1.656 0-3-1.344-3-3V4c0-1.656 1.344-3 3-3h2c0.553 0 1 0.447 1 1s-0.447 1-1 1z"></path>
        </symbol>
        <symbol id="user" viewBox="0 0 16 16">
            <path d="M10.88 4a2.86 2.86 0 1 0 -5.72 0 2.86 2.86 0 1 0 5.72 0zM3.43 4a4.57 4.57 0 1 1 9.14 0 4.57 4.57 0 1 1 -9.14 0zM1.76 14.5h12.48c-0.32-2.03-2.03-3.93-4.61-3.93H4.37c-2.58 0-4.29 1.9-4.61 3.93zM0 15.45C0 12.01 2.85 9.5 4.37 9.5h7.26C13.15 9.5 16 12.01 16 15.45c0 0.52-0.42 0.93-0.93 0.93H0.93C0.42 16.38 0 15.97 0 15.45z"></path>
        </symbol>
        <symbol id="home" viewBox="0 0 16 16">
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
            <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
        </symbol>
        <symbol id="dashbaord" viewBox="0 0 16 16">
            <path d="M0 3C0 1.897 0.897 1 2 1H14c1.103 0 2 0.897 2 2V13c0 1.103-0.897 2-2 2H2c-1.103 0-2-0.897-2-2V3zm2 2V13H7V5H2zm12 0H9V13H14V5z"></path>
        </symbol>
        <symbol id="login" viewBox="0 0 16 16">
            <path d="M6.81 3.31L10.65 7.15c0.225 0.225 0.354 0.536 0.354 0.854s-0.129 0.629-0.354 0.854L6.81 12.69c-0.2 0.2-0.469 0.31-0.75 0.31-0.584 0-1.06-0.476-1.06-1.06v-1.94H1c-0.553 0-1-0.447-1-1v-2c0-0.553 0.447-1 1-1h4V4c0-0.584 0.476-1.06 1.06-1.06 0.281 0 0.55 0.11 0.75 0.31zM11 13h2c0.553 0 1-0.447 1-1V5c0-0.553-0.447-1-1-1h-2c-0.553 0-1-0.447-1-1s0.447-1 1-1h2c1.656 0 3 1.344 3 3v6c0 1.656-1.344 3-3 3h-2c-0.553 0-1-0.447-1-1s0.447-1 1-1z"></path>
        </symbol>
        <symbol id="signup" viewBox="0 0 16 16">
            <path d="M2.4 4a4 4 0 1 1 8 0 4 4 0 1 1 -8 0zM0 15.072C0 11.994 2.494 9.5 5.572 9.5h2.856C11.506 9.5 14 11.994 14 15.072c0 0.512-0.416 0.928-0.928 0.928H0.928C0.416 16 0 15.584 0 15.072zM15.75 9.75v-2h-1.5c-0.416 0-0.75-0.334-0.75-0.75s0.334-0.75 0.75-0.75h1.5v-2c0-0.416 0.334-0.75 0.75-0.75s0.75 0.334 0.75 0.75v2h1.5c0.416 0 0.75 0.334 0.75 0.75s-0.334 0.75-0.75 0.75h-1.5v2c0 0.416-0.334 0.75-0.75 0.75s-0.75-0.334-0.75-0.75z"></path>
        </symbol>
    </svg>

    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="#">Main Page</a>

        <ul class="navbar-nav flex-row d-md-none">
          <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch"
              aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
              <svg class="bi">
                <use xlink:href="#search" />
              </svg>
            </button>
          </li>
          <li class="nav-item text-nowrap">
            <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
              aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
              <svg class="bi">
                <use xlink:href="#list" />
              </svg>
            </button>
          </li>
        </ul>

        <div id="navbarSearch" class="navbar-search w-100 collapse">
          <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
        </div>
      </header>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                    aria-pressed="true">
                    <svg class="bi me-2 opacity-50" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Admin Panel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page"
                                    href="{{ route('home') }}">
                                    <svg class="bi">
                                        <use xlink:href="#home" />
                                    </svg>
                                    Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page"
                                    href="{{ route('admin.dashboard') }}">
                                    <svg class="bi">
                                        <use xlink:href="#dashbaord" />
                                    </svg>
                                    Dashboard
                                </a>
                            </li>
                        </ul>
                        <hr class="my-3">
                        <ul class="nav flex-column mb-auto">
                            @if(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <svg class="bi">
                                        <use xlink:href="#signout" />
                                    </svg>
                                    Sign out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @else
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('login') }}">
                                    <svg class="bi">
                                        <use xlink:href="#login" />
                                    </svg>
                                    Login
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2" href="{{ route('register') }}">
                                    <svg class="bi">
                                        <use xlink:href="#signup" />
                                    </svg>
                                    Signup
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Dashboard</h1>
                </div>
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js"
        integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous">
    </script>
</body>

</html>
