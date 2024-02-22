<!doctype html>
<html lang="tr" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- loader-->
    <link href="{{ asset('back/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('back/assets/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('back/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!--favicon-->

    <link rel="icon" type="image/x-icon" href="{{ asset('back/assets/images/marsia.png') }}">

    <!-- CSS Files -->
    <link href="{{ asset('back/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('back/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('back/assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!--Theme Styles-->
    <link href="{{ asset('back/assets/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/assets/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/assets/css/header-colors.css') }}" rel="stylesheet" />

    <title>Marsia - @yield('title')</title>
</head>

<body>


    <!--start wrapper-->
    <div class="wrapper">

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('back/assets/images/marsia.png') }}" class="logo-icon" alt="logo icon">
                    </a>
                </div>
                <div>
                    <h4 class="logo-text">Marsia</h4>
                </div>
                <div class="toggle-icon ms-auto">
                    <ion-icon name="menu-sharp"></ion-icon>
                </div>
            </div>

            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{ route('dashboard') }}" class="">
                        <div class="parent-icon">
                            <ion-icon name="home-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Yönetim Paneli</div>
                    </a>
                </li>

                <!-- Kategori Yönetimi -->
                <li class="menu-label">Uygulamalar</li>
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon">
                            <ion-icon name="cloudy-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Cari Hesaplar</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('excel-data.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Tablo
                            </a>
                        </li>
                        <li> <a href="{{ route('people.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Kişiler
                            </a>
                        </li>
                        <li> <a href="{{ route('product-types.index') }}">
                                <ion-icon name="ellipse-outline"></ion-icon>Ürünler
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="menu-label">İçerik Yönetimi</li>

                <!-- Kategori Yönetimi -->
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon">
                            <ion-icon name="layers"></ion-icon>
                        </div>
                        <div class="menu-title">Kategori</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('categories.index') }}">
                                <ion-icon name="grid-sharp"></ion-icon>Kategoriler
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categories.create') }}">
                                <ion-icon name="add-circle-sharp"></ion-icon>Kategori Ekle
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Ürün Yönetimi -->
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon">
                            <ion-icon name="cube-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Ürün</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('products.index') }}">
                                <ion-icon name="apps-sharp"></ion-icon>Ürünler
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('products.create') }}">
                                <ion-icon name="add-circle-sharp"></ion-icon>Ürün Ekle
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Galeri Yönetimi -->
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon">
                            <ion-icon name="image-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Galeri</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('galeries.index') }}">
                                <ion-icon name="images-sharp"></ion-icon>Fotoğraflar
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('galeries.create') }}">
                                <ion-icon name="add-circle-sharp"></ion-icon>Fotoğraf Ekle
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Slider Yönetimi -->
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon">
                            <ion-icon name="play-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Slider</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('slider.view') }}">
                                <ion-icon name="eye-sharp"></ion-icon>Görüntüle
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Hakkımızda Yönetimi -->
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon">
                            <ion-icon name="information-circle-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Hakkımızda</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('about.view') }}">
                                <ion-icon name="eye-sharp"></ion-icon>Görüntüle
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Katalog Yönetimi -->
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon">
                            <ion-icon name="book"></ion-icon>
                        </div>
                        <div class="menu-title">Katalog</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('catalog.index') }}">
                                <ion-icon name="eye-sharp"></ion-icon>Görüntüle
                            </a>
                        </li>
                    </ul>
                </li>

                <!-------Site Yönetimi------->
                <li class="menu-label">Site Yönetimi</li>
                <!-- Teklif Yönetimi -->
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon">
                            <ion-icon name="document-text-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Teklifler</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('offer.view.admin') }}">
                                <ion-icon name="eye-sharp"></ion-icon>Görüntüle
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- İletişim Formu Yönetimi -->
                <li>
                    <a class="has-arrow" href="javascript:;">
                        <div class="parent-icon">
                            <ion-icon name="mail-sharp"></ion-icon>
                        </div>
                        <div class="menu-title">Mesajlar</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('message.view') }}">
                                <ion-icon name="eye-sharp"></ion-icon>Görüntüle
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Site Ayarları -->
                <li class="mb-5">
                    <a class="has-arrow " href="javascript:;">
                        <div class="parent-icon">
                            <ion-icon name="cog"></ion-icon>
                        </div>
                        <div class="menu-title">Site Ayarları</div>
                    </a>
                    <ul>
                        <li> <a href="{{ route('site-settings.index') }}">
                                <ion-icon name="locate"></ion-icon>Yönet
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end navigation-->
        </aside>
        <!--end sidebar -->
        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand gap-3">
                <div class="mobile-menu-button">
                    <ion-icon name="menu-sharp"></ion-icon>
                </div>
                <div class="top-navbar-right ms-auto">

                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item mobile-search-button">
                            <a class="nav-link" href="javascript:;">
                                <div class="">
                                    <ion-icon name="search-sharp"></ion-icon>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dark-mode-icon" href="javascript:;">
                                <div class="mode-icon">
                                    <ion-icon name="moon-sharp"></ion-icon>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item dropdown dropdown-large dropdown-apps">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                data-bs-toggle="dropdown">
                                <div class="">
                                    <ion-icon name="apps-sharp"></ion-icon>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-dark">
                                <div class="row row-cols-3 g-3 p-3">
                                    <a href="https://www.youtube.com/" target="_blank">
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-danger text-white">
                                                <ion-icon name="logo-youtube"></ion-icon>
                                            </div>
                                            <div class="app-title">Youtube</div>
                                        </div>
                                    </a>
                                    <a href="https://www.google.com/" target="_blank">
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-royal text-white">
                                                <ion-icon name="logo-chrome"></ion-icon>
                                            </div>
                                            <div class="app-title">Google</div>
                                        </div>
                                    </a>
                                    <a href="https://web.whatsapp.com/" target="_blank">
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-success text-white">
                                                <ion-icon name="logo-whatsapp"></ion-icon>
                                            </div>
                                            <div class="app-title">Whatsapp</div>
                                        </div>
                                    </a>
                                    <a href="https://www.instagram.com/" target="_blank">
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-purple text-white">
                                                <ion-icon name="logo-instagram"></ion-icon>
                                            </div>
                                            <div class="app-title">İnstagram</div>
                                        </div>
                                    </a>
                                    <a href="https://mail.google.com/" target="_blank">
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-warning text-white">
                                                <ion-icon name="mail"></ion-icon>
                                            </div>
                                            <div class="app-title">G-Mail</div>
                                        </div>
                                    </a>
                                    <a href="https://www.facebook.com/" target="_blank">
                                        <div class="col text-center">
                                            <div class="app-box mx-auto bg-gradient-info text-white">
                                                <ion-icon name="logo-facebook"></ion-icon>
                                            </div>
                                            <div class="app-title">Facebook</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <!-----------------Bildirim ALanı-------------------->
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                data-bs-toggle="dropdown">
                                <div class="position-relative">
                                    <span class="notify-badge">{{ $notifications->count() }}</span>
                                    <ion-icon name="notifications-sharp"></ion-icon>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="msg-header">
                                    <p class="msg-header-title">Bildirimler</p>
                                    @if ($notifications->count() > 0)
                                        <form action="{{ route('notific.clear') }}" class="msg-header-clear ms-auto"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class=" btn btn-sm btn-warning"
                                                style="color: white;">Temizle</button>
                                        </form>
                                    @endif

                                </div>
                                <div class="header-notifications-list">
                                    @foreach ($notifications as $notification)
                                        <a  class="dropdown-item"
                                            @if ($notification->type === 'offer') style="color: #e33b2eff;" href="{{ route('offer.view.admin') }}" 
                                            @else style="color: #923eb9ff;" href="{{ route('message.view') }}" @endif>
                                            <div class="d-flex align-items-center">
                                                <div class="notify text-{{ $notification->type }}">
                                                    <!-- Assuming type determines the color -->
                                                    <ion-icon name="notifications-outline"></ion-icon>
                                                    <!-- Assuming icon is stored in the database -->
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">{{ $notification->title }} <span
                                                            class="msg-time float-end">{{ $notification->created_at->diffForHumans() }}</span>
                                                    </h6>
                                                    <p class="msg-info">{{ $notification->message }}</p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <a href="{{ route('admin.notif') }}">
                                    <div class="text-center msg-footer">Tüm Bildirimleri Gör</div>
                                </a>
                            </div>
                        </li>
                        <!-----------------Bildirim ALanı-------------------->


                        <li class="nav-item dropdown dropdown-user-setting">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                data-bs-toggle="dropdown">
                                <div class="user-setting">
                                    <img src="{{ asset('storage/' . $siteSettings->logo) }}" class="user-img">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="d-flex flex-row align-items-center gap-2">
                                            <img src="{{ asset('storage/' . $siteSettings->logo) }}" alt=""
                                                class="rounded-circle" width="54" height="54">
                                            <div class="">
                                                <h6 class="mb-0 dropdown-user-name">{{ Auth::user()->name }}</h6>
                                                <small
                                                    class="mb-0 dropdown-user-designation text-secondary">{{ Auth::user()->role }}
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('profiles', Auth::User()) }}">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <ion-icon name="person-circle-outline"></ion-icon>
                                            </div>
                                            <div class="ms-3"><span>Profilim</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('home') }}" target="_blank">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <ion-icon name="globe-outline"></ion-icon>
                                            </div>
                                            <div class="ms-3"><span>Siteyi Görüntüle</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('site-settings.index') }}">
                                        <div class="d-flex align-items-center">
                                            <div class="">
                                                <ion-icon name="settings-outline"></ion-icon>
                                            </div>
                                            <div class="ms-3"><span>Site Ayarları</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <form action="{{ route('logout.post') }}" method="POST">
                                    @csrf
                                    <li>
                                        <button type="submit" class="dropdown-item"
                                            style="border: none; background: none; cursor: pointer;">
                                            <div class="d-flex align-items-center">
                                                <div class="">
                                                    <ion-icon name="log-out-outline"></ion-icon>
                                                </div>
                                                <div class="ms-3"><span>Çıkış Yap</span></div>
                                            </div>
                                        </button>
                                    </li>
                                </form>

                            </ul>
                        </li>

                    </ul>

                </div>
            </nav>
        </header>
        <!--end top header-->
