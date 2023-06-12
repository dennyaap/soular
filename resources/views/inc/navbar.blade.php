<nav class="navbar navbar-expand-lg fixed-top navbar-light" id="navbar">
    <div class="container">
        <a href="{{ route('index') }}" class="navbar__logo">Soul Art</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="modal" data-bs-target="#navbarMenu"
            aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item navbar__link">
                    <a href="{{ route('paintings.index') }}" class="nav-link">ГАЛЕРЕЯ</a>
                </li>
                <li class="nav-item navbar__link">
                    <a href="{{ route('artists.index') }}" class="nav-link">НАШИ ХУДОЖНИКИ</a>
                </li>
                <li class="nav-item navbar__link">
                    <a href="{{ route('about.index') }}" class="nav-link">О НАС</a>
                </li>
                <li class="nav-item navbar__link">
                    <a href="{{ route('contacts.index') }}" class="nav-link">КОНТАКТЫ</a>
                </li>
            </ul>
            <form class="navbar__buttons">
                <a href="{{ route('basket.index') }}">
                    <svg width="23" height="26" viewBox="0 0 23 26" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="navbar__img">
                        <path
                            d="M6.1005 7.49581V6.35233C6.1005 3.69994 8.2723 1.09469 10.972 0.847136C11.7222 0.774728 12.4794 0.857425 13.1951 1.0899C13.9107 1.32238 14.5689 1.69949 15.1273 2.19696C15.6856 2.69444 16.1317 3.30125 16.437 3.97834C16.7422 4.65544 16.8998 5.38782 16.8995 6.12835V7.75516M7.90033 24.3886H15.0997C19.9232 24.3886 20.7871 22.4907 21.0391 20.1802L21.939 13.1071C22.263 10.2307 21.4231 7.88483 16.2996 7.88483H6.70044C1.57691 7.88483 0.736988 10.2307 1.06096 13.1071L1.96088 20.1802C2.21285 22.4907 3.07677 24.3886 7.90033 24.3886Z"
                            stroke="#453326" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </a>
                <a href="{{ route('user.orders.index') }}">
                    <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg"
                        class="navbar__img">
                        <path
                            d="M11.5801 10.6942C14.4721 10.6942 16.8165 8.48414 16.8165 5.75794C16.8165 3.03174 14.4721 0.821716 11.5801 0.821716C8.68816 0.821716 6.34375 3.03174 6.34375 5.75794C6.34375 8.48414 8.68816 10.6942 11.5801 10.6942Z"
                            stroke="#453326" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M1 24.4078V21.5943C1 18.3091 3.82373 15.6641 7.29083 15.6641H16.7092C20.1941 15.6641 23 18.326 23 21.5943V24.4078"
                            stroke="#453326" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </form>
        </div>
    </div>
</nav>

<div class="modal left fade" id="navbarMenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" data-bs-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="nav-links d-flex flex-column align-items-center">
                    <a href="{{ route('paintings.index') }}">ГАЛЕРЕЯ</a>
                    <a href="{{ route('artists.index') }}">НАШИ ХУДОЖНИКИ</a>
                    <a href="{{ route('about.index') }}">О НАС</a>
                    <a href="{{ route('contacts.index') }}">КОНТАКТЫ</a>

                    <a href="{{ route('basket.index') }}">
                        КОРЗИНА
                    </a>
                </div>
                <div class="nav-buttons d-flex flex-column align-items-center">
                    @auth
                    <a href="{{ route('user.orders.index') }}">
                        ПРОФИЛЬ
                    </a>

                    <a href="{{ route('user.logout') }}" class="text-danger">
                        ВЫЙТИ
                    </a>
                    @endauth

                    @guest
                    <a href="{{ route('user.login') }}">
                        ВОЙТИ
                    </a>

                    <a href="{{ route('user.create') }}">
                        РЕГИСТРАЦИЯ
                    </a>
                    @endguest
                </div>
            </div>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->


<!-- <nav class="container-fluid navbar fixed-top navbar-expand-lg" id="navbar">
    <div class="container navbar__container navbar__content">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
            aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar__logo">
            <a href="{{ route('index') }}">Soul Art</a>
        </div>
        <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarMenu">
            <ul class="navbar-nav navbar__links">
                <li class="navbar__link">
                    <a href="{{ route('paintings.index') }}">ГАЛЕРЕЯ</a>
                </li>
                <li class="navbar__link">
                    <a href="{{ route('artists.index') }}">НАШИ ХУДОЖНИКИ</a>
                </li>
                <li class="navbar__link">
                    <a href="{{ route('about.index') }}">О НАС</a>
                </li>
                <li class="navbar__link">
                    <a href="{{ route('contacts.index') }}">КОНТАКТЫ</a>
                </li>
            </ul>
        </div>
        <div class="navbar__buttons">
            <a href="{{ route('basket.index') }}">
                <svg width="23" height="26" viewBox="0 0 23 26" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="navbar__img">
                    <path
                        d="M6.1005 7.49581V6.35233C6.1005 3.69994 8.2723 1.09469 10.972 0.847136C11.7222 0.774728 12.4794 0.857425 13.1951 1.0899C13.9107 1.32238 14.5689 1.69949 15.1273 2.19696C15.6856 2.69444 16.1317 3.30125 16.437 3.97834C16.7422 4.65544 16.8998 5.38782 16.8995 6.12835V7.75516M7.90033 24.3886H15.0997C19.9232 24.3886 20.7871 22.4907 21.0391 20.1802L21.939 13.1071C22.263 10.2307 21.4231 7.88483 16.2996 7.88483H6.70044C1.57691 7.88483 0.736988 10.2307 1.06096 13.1071L1.96088 20.1802C2.21285 22.4907 3.07677 24.3886 7.90033 24.3886Z"
                        stroke="#453326" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
            <a href="{{ route('user.orders.index') }}">
                <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="navbar__img">
                    <path
                        d="M11.5801 10.6942C14.4721 10.6942 16.8165 8.48414 16.8165 5.75794C16.8165 3.03174 14.4721 0.821716 11.5801 0.821716C8.68816 0.821716 6.34375 3.03174 6.34375 5.75794C6.34375 8.48414 8.68816 10.6942 11.5801 10.6942Z"
                        stroke="#453326" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M1 24.4078V21.5943C1 18.3091 3.82373 15.6641 7.29083 15.6641H16.7092C20.1941 15.6641 23 18.326 23 21.5943V24.4078"
                        stroke="#453326" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </div>
    </div>
</nav> -->