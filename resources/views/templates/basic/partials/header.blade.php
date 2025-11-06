@php
    $languages = App\Models\Language::get();
    $selectLang = $languages->where('code', config('app.locale'))->first();
    $homeUrl = request()->routeIs('home') ? '' : route('home');
@endphp

<header class="header" id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand logo" href="{{ route('home') }}">
                <img src="{{ siteLogo() }}" alt="logo">
            </a>
            <button class="navbar-toggler header-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span id="hiddenNav"><i class="las la-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-menu ms-auto align-items-lg-center">
                    @gs('multi_language')
                        <li class="nav-item d-inline-block d-lg-none">
                            <div class="custom--dropdown">
                                <div class="custom--dropdown__selected">
                                    <span class="thumb">
                                        <img class="flag" src="{{ $selectLang->image_src }}" alt="lang">
                                    </span>
                                    <span class="text">{{ strtoupper($selectLang->code) }}</span>
                                </div>
                                <ul class="dropdown-list">
                                    @foreach ($languages as $language)
                                        <li class="dropdown-list__item langSel" data-value="{{ $selectLang->code }}">
                                            <span class="thumb">
                                                <img class="flag" src="{{ $language->image_src }}" alt="lang">
                                            </span>
                                            <span class="text">{{ strtoupper($language->code) }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endgs
                    <li class="nav-item {{ menuActive('home') }}">
                        <a class="nav-link text-white" href="{{ route('home') }}">@lang('Home')</a>
                    </li>
                    @foreach ($pages as $page)
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('pages', $page->slug) }}">
                                {{ __($page->name) }}
                            </a>
                        </li>
                    @endforeach
                    <li class="nav-item {{ menuActive('blog') }}">
                        <a class="nav-link text-white" href="{{ route('blog') }}">@lang('Blog')</a>
                    </li>
                    <li class="nav-item {{ menuActive('contact') }}">
                        <a class="nav-link text-white" href="{{ route('contact') }}">@lang('Contact')</a>
                    </li>
                    @gs('multi_language')
                        <li class="nav-item d-lg-block d-none">
                            <div class="custom--dropdown">
                                <div class="custom--dropdown__selected">
                                    <span class="thumb">
                                        <img class="flag"
                                            src="{{ getImage(getFilePath('language') . '/' . $selectLang->image) }}"
                                            alt="lang">
                                    </span>
                                    <span class="text">{{ strtoupper($selectLang->code) }}</span>
                                </div>
                                <ul class="dropdown-list">
                                    @foreach ($languages as $language)
                                        <li class="dropdown-list__item langSel" data-value="{{ $language->code }}">
                                            <span class="thumb">
                                                <img class="flag" src="{{ $language->image_src }}" alt="lang">
                                            </span>
                                            <span class="text">{{ strtoupper($language->code) }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @endgs
                </ul>
            </div>
        </nav>
    </div>
</header>

<style>
    /* === HEADER BLACK & WHITE TEXT === */

.header {
    background-color: #000 !important;
    width: 100%;
    z-index: 999;
}

.navbar {
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
}

/* Make all text white */
.navbar .nav-link,
.navbar .custom--dropdown__selected,
.navbar .dropdown-list__item .text,
.navbar-toggler i,
.navbar-toggler span {
    color: #fff !important;
}

/* Make toggler icon visible */
.navbar-toggler {
    border: none;
    color: #fff;
}

/* Logo size */
.navbar-brand.logo img {
    max-height: 55px;
}

/* === MOBILE RESPONSIVE FIX === */
@media (max-width: 991px) {
        body {
        padding-top: 70px; /* same as your navbar height */
    }
    .navbar {
        position: relative;
        padding: 10px 0;
        min-height: 70px; /* keeps space visible */
    }

    /* Center logo */
    .navbar-brand.logo {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        z-index: 10;
    }

    /* Keep toggler visible on the right */
    .navbar-toggler {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        z-index: 20;
    }

    .navbar-toggler i {
    color: #fff !important;
    font-size: 28px;
}

    /* Keep enough space for dropdown */
    .navbar-collapse {
        margin-top: 70px;
    }
}

/* Dropdown background + text color */
.custom--dropdown .dropdown-list {
    background-color: #000;
}

.custom--dropdown .dropdown-list__item .text {
    color: #fff;
}

/* Force menu text white for all states */
.navbar-dark .navbar-nav .nav-link {
    color: #fff !important;
}

.navbar-dark .navbar-nav .nav-link:hover,
.navbar-dark .navbar-nav .nav-link:focus,
.navbar-dark .navbar-nav .nav-link.active {
    color: #f1f1f1 !important; /* slightly lighter white for hover */
}

/* Optional: make the dropdown text also white */
.custom--dropdown__selected .text,
.custom--dropdown__item .text {
    color: #fff !important;
}

/* Active menu link color */
.navbar-dark .navbar-nav .nav-link.active,
.navbar-dark .navbar-nav .nav-link.show,
.navbar-dark .navbar-nav .nav-item.active .nav-link {
    color: #4CA6F0 !important;
}

/* Also apply on hover for a smooth feel */
.navbar-dark .navbar-nav .nav-link:hover,
.navbar-dark .navbar-nav .nav-link:focus {
    color: #4CA6F0 !important;
}
/* Make dropdown caret white */
.custom--dropdown__selected::after {
    color: #fff !important;
}
.custom--dropdown__selected i {
    color: #fff !important;
}


</style>