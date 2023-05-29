<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <script defer src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sidebar/main.css') }}" />

    <style>
    body {
        background-color: #fbfbfb;
    }

    @media (min-width: 991.98px) {
        main {
            padding-left: 240px;
            /* background: #F5F5F5; */
        }
    }



    /* Sidebar */
    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        padding: 58px 0 0;
        /* Height of navbar */
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
        width: 240px;
        z-index: 600;
    }

    @media (max-width: 991.98px) {
        .sidebar {
            width: 100%;
        }
    }

    .sidebar .active {
        border-radius: 5px;
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: 0.5rem;
        overflow-x: hidden;
        overflow-y: auto;
        /* Scrollable contents if viewport is shorter than content. */
    }

    .card-img {
        height: 330px;
    }
    </style>
    @yield('style')
</head>

<body class="antialiased">
    <!--Main Navigation-->
    <header>
        <!-- Sidebar -->
        <nav id="sidebarMenu" class="navbar-collapse collapse d-lg-block sidebar bg-white">
            <div class="position-sticky">
                <div class="list-group list-group-flush mx-3 mt-4">
                    <a href="{{ route('admin.orders.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple avatar-nam d-flex align-items-center gap-3 user-name"
                        aria-current="true">
                        <i class="fas fa-user fa-fw"></i>
                        <span>{{ auth()->user()->name }} {{ auth()->user()->surname }}</span>
                    </a>
                </div>
                <div class="list-group list-group-flush mx-3 mt-4 d-flex gap-2">
                    <a href="{{ route('index') }}"
                        class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center gap-3"
                        aria-current="true">
                        <i class="fas fa-regular fa-arrow-right fa-flip-horizontal fa-fw"></i><span>На главную</span>
                    </a>
                    <a href="{{ route('admin.orders.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center gap-3"
                        aria-current="true">
                        <i class="fas fa-solid fa-calendar-check fa-fw"></i><span>Заказы</span>
                    </a>
                    <a href="{{ route('admin.statuses.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center gap-3"
                        aria-current="true">
                        <i class="fas fa-solid fa-check fa-fw"></i><span>Статусы заказа</span>
                    </a>
                    <a href="{{ route('admin.paintings.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center gap-3"
                        aria-current="true">
                        <i class="fas fa-regular fa-palette fa-fw"></i><span>Товары</span>
                    </a>
                    <a href="{{ route('admin.artists.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center gap-3"
                        aria-current="true">
                        <i class="fas fa-users-line fa-fw"></i><span>Художники</span>
                    </a>
                    <a href="{{ route('admin.plots.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center gap-3"
                        aria-current="true">
                        <i class="fas fa-list fa-fw"></i><span>Сюжеты</span>
                    </a>
                    <a href="{{ route('admin.styles.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center gap-3"
                        aria-current="true">
                        <i class="fas fa-list fa-fw"></i><span>Стили</span>
                    </a>
                    <a href="{{ route('admin.techniques.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center gap-3"
                        aria-current="true">
                        <i class="fas fa-list fa-fw"></i><span>Техники</span>
                    </a>
                    <a href="{{ route('admin.materials.index') }}"
                        class="list-group-item list-group-item-action py-2 ripple d-flex align-items-center gap-3"
                        aria-current="true">
                        <i class="fas fa-list fa-fw"></i><span>Материалы</span>
                    </a>
                </div>

                <div class="list-group list-group-flush mx-3 mt-4">
                    <a class="list-group-item list-group-item-action py-2 ripple btn-logout d-flex align-items-center gap-3"
                        href="{{ route('admin.logout') }}">
                        <i class="fas fa-sharp fa-light fa-arrow-right-from-bracket fa-flip-horizontal fa-fw"></i>
                        <span>Выйти</span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- Sidebar -->

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg bg-white fixed-top navbar-colored">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Brand -->
                <a class="profile-logo px-3" href="{{ route('user.orders.index') }}">
                    Soul Art
                </a>
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-thin fa-bars"></i>
                </button>
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->
    @yield('content')
</body>

</html>