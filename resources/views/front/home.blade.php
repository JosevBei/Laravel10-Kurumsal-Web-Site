@extends('front.layouts.master')
@section('title', 'Anasayfa')
@section('home-description')
    <meta name="description" content="{{ $siteSettings->site_description }}" />
@endsection
@section('content')
    <!-------------Slider------------>
    <div class="splitview skewed">
        <div class="panel bottom">
            <div class="content">
                <div class="description">
                    <h1>{{ $firstSlide->title }}</h1>
                    <p>{{ $firstSlide->description }}</p>
                </div>
                <img src="{{ asset('uploads/sliders/' . $firstSlide->image) }}" class="lazyload" alt="{{ $firstSlide->title }}"
                    loading="lazy" />
            </div>
        </div>

        <div class="panel top">
            <div class="content">
                <div class="description">
                    <h1>{{ $lastSlider->title }}</h1>
                    <p>{{ $lastSlider->description }}</p>
                </div>
                <img src="{{ asset('uploads/sliders/' . $lastSlider->image) }}" class="lazyload"
                    alt="{{ $lastSlider->title }}" loading="lazy" />
            </div>
        </div>

        <div class="handle"></div>
    </div>
    <!-------------Slider------------>

    <!-------------Ürünler------------>
    <h1 class="top-text hideme"> ÜRÜNLERİMİZ </h1>
    <hr>
    <div id="splide" class="splide hideme">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach ($products as $product)
                    <li class="splide__slide">
                        <a
                            href="{{ route('product.show', ['category' => $product->category->slug, 'slug' => $product->slug]) }}">
                            <img src="{{ asset('uploads/products/' . $product->image) }}
                            "
                                alt="{{ $product->name }}" class="lazyload" loading="lazy">
                        </a>


                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-------------Ürünler------------>
    <!--------Ara Tanıtım Divi-------->
    <div class="hizmet-area hideme">
        <div class="container">
            <div class="hizmet-item">
                <i class="fa-solid fa-fire-flame-simple"></i>
                <h3> +800 ürün çeşidi ve model seçeneği </h3>
            </div>
            <div class="hizmet-item">
                <i class="fa-solid fa-user-tie"></i>
                <h3> 30 yıldan fazla deneyim </h3>
            </div>
            <div class="hizmet-item">
                <i class="fa-solid fa-handshake"></i>
                <h3> %100 Müşteri Memnuniyeti </h3>
            </div>
            <div class="hizmet-item">
                <i class="fa-solid fa-hands-holding-circle"></i>
                <h3> Projeye özel tasarım </h3>
            </div>
        </div>
    </div>
    <div id="whatsapp-button">
        <a href="https://wa.me/905323314805" target="_blank">
            <i class="fab fa-whatsapp"></i>
            <!-- Font Awesome WhatsApp simgesini ekleyin -->
        </a>
    </div>

    <!-------------Galeri--------->
    <div id="galeri" class="hideme"></div>
    <h1 class="top-text"> GALERİ </h1>
    <hr>

    <div class="gallery container-fluid hideme">
        @foreach ($galeries as $galery)
            <div class="gallery-item">
                <a href="{{ asset('uploads/galeries/' . $galery->image) }}" data-lightbox="gallery"
                    data-title="{{ $galery->title }}">
                    <img src="{{ asset('uploads/galeries/' . $galery->image) }}" class="lazyload"
                        alt="{{ $galery->title }}" loading="lazy">
                </a>
            </div>
        @endforeach

        <a href="{{ route('gallery.show') }}" class="allbtn hideme"> Tümünü Görüntüle </a>

    </div>
    <!-------------Galeri--------->
    <div class="teklif container hideme">
        <p> Sayın Müşterimiz,

            Estetik zevkinize ve mekânınızın özel atmosferine uygun, el yapımı ve özel tasarlanmış avizelerle mekanınızı
            aydınlatmaya ne dersiniz? Biz, özel aydınlatma ürünleri yapma konusunda uzmanlaşmış bir ekip olarak, sizin için
            benzersiz ve göz alıcı
            avizeler tasarlamak için buradayız.
        </p>
        <a href="{{ route('offer.view') }}" class="hideme"> Teklif Al </a>
    </div>
    <!-------------Hakkımızda--------->
    <div class="hakkimizda-section container hideme" id="hakkimizda">
        <h1 class="text-light">HAKKIMIZDA</h1>
        <hr>

        <div class="hakkimizda-container">
            <div class="btns">
                <button class="hakkimizda-button" data-content="genel"> Hakkımızda</button>
                <button class="hakkimizda-button" data-content="vizyon"> Vizyon</button>
                <button class="hakkimizda-button" data-content="misyon"> Misyon</button>
            </div>


            <hr>
            <div class="hakkimizda-content translate" id="genel-content">
                @foreach ($about as $abo)
                    @if ($abo->name === 'Biz Kimiz')
                        <img src="{{ asset('uploads/abouts/' . $abo->image) }}" class="lazyload" alt="{{ $abo->name }}"
                            loading="lazy">
                        <h2> {{ $abo->name }} </h2>
                        <p>
                            {{ $abo->content }}
                        </p>
                    @endif
                @endforeach
            </div>

            <div class="hakkimizda-content" id="vizyon-content">
                @foreach ($about as $abo)
                    @if ($abo->name === 'Vizyon')
                        <img src="{{ asset('uploads/abouts/' . $abo->image) }}" class="lazyload" alt="{{ $abo->name }}"
                            loading="lazy">
                        <h2>{{ $abo->name }}</h2>
                        <p>
                            {{ $abo->content }}
                        </p>
                    @endif
                @endforeach
            </div>

            <div class="hakkimizda-content" id="misyon-content">
                @foreach ($about as $abo)
                    @if ($abo->name === 'Misyon')
                        <img src="{{ asset('uploads/abouts/' . $abo->image) }}" class="lazyload" alt="{{ $abo->name }}"
                            loading="lazy">
                        <h2>{{ $abo->name }}</h2>
                        <p>
                            {{ $abo->content }}
                        </p>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!-------------Hakkımızda--------->
    <div class="mt-5 container hideme">
        <h1 class="top-text">İLETİŞİM</h1>
        <hr />
    </div>

    <section id="iletisim" class="hideme">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center mb-3">İletişim Formu</h3>
                    <form id="contact-form" method="post" action="{{ route('submitContactForm') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">'İsim Soyisim:</label>
                            <input type="text" class="form-control" id="name" name="name" required />
                        </div>

                        <div class="form-group">
                            <label for="email">E-posta Adresiniz:</label>
                            <input type="email" class="form-control" id="email" name="email" required />
                        </div>

                        <div class="form-group">
                            <label for="subject">Konu:</label>
                            <input type="text" class="form-control" id="subject" name="subject" required />
                        </div>

                        <div class="form-group">
                            <label for="message">Mesajınız:</label>
                            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mb-3">
                            Gönder
                        </button>
                    </form>
                </div>
                <div class="col-md-6">
                    <div class="mt-5 ml-5 map">
                        <address class="map-google">
                            <div><iframe width="600px" height="500" frameborder="0" scrolling="no" marginheight="0"
                                    marginwidth="0"
                                    src="https://maps.google.com/maps?width=100%25&amp;height=500&amp;hl=en&amp;q=K%C4%B1r%C4%B1k%20Cam%20Mosaic%20Lamp%20-%20Mozaik%20Lamba%20Ye%C5%9Filova,%20Kamac%C4%B1%20Sk.%2021/A,%2034290%20K%C3%BC%C3%A7%C3%BCk%C3%A7ekmece/%C4%B0stanbul+(Lamp%Mosaic)&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                            </div>
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Menünüzü sabit hale getirirken animasyonlu geçiş eklemek için gereken kod
            var navbar = document.querySelector('.navbar'); // Menüyü seçin
            var scrollDistance = 200; // Sabit hale getirilecek mesafe (örneğin 200 piksel)
            var backgroundColor = 'white'; // Arka plan rengi (örneğin beyaz)
            var boxShadowColor = '#001e39a8'; // Box shadow rengi
            var boxShadow = '0px 2px 10px ' + boxShadowColor; // Box shadow efekti
            var transitionDuration = '0.5s'; // Geçiş süresi (örneğin 0.3 saniye)

            // Sayfa kaydırıldığında bu işlevi çalıştırın
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > scrollDistance) {
                    navbar.style.transition = 'background-color ' + transitionDuration + ', box-shadow ' +
                        transitionDuration; // Geçiş efektini ayarlayın
                    navbar.classList.add('fixed-top'); // .navbar sınıfına 'fixed-top' sınıfını ekleyin
                    navbar.style.backgroundColor = backgroundColor; // Arka plan rengini ayarlayın
                    navbar.style.boxShadow = boxShadow; // Box shadow efektini ayarlayın
                } else {
                    navbar.style.transition = 'background-color ' + transitionDuration + ', box-shadow ' +
                        transitionDuration; // Geçiş efektini ayarlayın
                    navbar.classList.remove(
                        'fixed-top'); // .navbar sınıfından 'fixed-top' sınıfını kaldırın
                    navbar.style.backgroundColor =
                        'transparent'; // Arka plan rengini varsayılan olarak ayarlayın
                    navbar.style.boxShadow = 'none'; // Box shadow efektini kaldırın
                }
            });
        });
    </script>
@endsection
