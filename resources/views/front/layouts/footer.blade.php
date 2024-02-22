<footer class="footer">
    <div class="col-md-6">
        <div class="footer-item">
        </div>
        <div class="footer-item">
            <h3>WHATSAPP</h3>
            <p><i class="fab fa-whatsapp footer-icons"></i> +{{ $siteSettings->whatsapp_number }}</p>
        </div>
        <div class="footer-item">
            <p><i class="fa fa-envelope footer-icons"></i> {{ $siteSettings->email_address }}</p>
        </div>

    </div>
    <div class="col-md-6">
        <!-- Adres bilgisi -->
        <address>
            <h3>Adres</h3>
            <p>{{ $siteSettings->address }}</p>
        </address>
        <div class="footer-item social-icons-footer">
            @if ($siteSettings->instagram)
                <a href="{{ $siteSettings->instagram }}"><i class="fab fa-instagram footer-icons"></i></a>
            @endif
            @if ($siteSettings->pinterest)
                <a href="{{ $siteSettings->pinterest }}"><i class="fab fa-pinterest footer-icons"></i></a>
            @endif
            @if ($siteSettings->twitter)
                <a href="{{ $siteSettings->twitter }}"><i class="fab fa-twitter footer-icons"></i></a>
            @endif
            @if ($siteSettings->facebook)
                <a href="{{ $siteSettings->facebook }}"><i class="fab fa-facebook footer-icons"></i></a>
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <p class="footer-copyright"> <a href="https://www.instagram.com/marsiadesign/" style="color:#fff;"
                target="_blank">Marsia Design</a>
            &copy; Tüm hakları saklıdır.</p>

    </div>
</footer>

<script src="{{ asset('front/js/slide.js') }}"></script>
<script src="{{ asset('front/js/myjs.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@3.0.9/dist/js/splide.min.js"></script>


<!-- Bootstrap CSS -->

<!-- jQuery (Bootstrap için gerekli) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lozad@1.14.0/dist/lozad.min.js"></script>


<!-------Benim Scriptler------>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.hakkimizda-button');
        const contents = document.querySelectorAll('.hakkimizda-content');

        // Varsayılan olarak "Hakkımızda" içeriğini göster
        document.getElementById('genel-content').style.display = 'block';

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const contentId = this.getAttribute('data-content');
                contents.forEach(content => {
                    content.style.display = 'none';
                });
                document.getElementById(contentId + '-content').style.display = 'block';
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('.search-form').submit(function(event) {
            var searchTerm = $('.input-search').val();
            if (!searchTerm.trim()) {
                // Eğer arama kutusu boşsa formu gönderme
                event.preventDefault();
            }
        });
    });
</script>
<style>
    #whatsapp-button {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 999999;
    }

    #whatsapp-button a {
        background-color: #25d366;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        font-size: 24px;
        text-decoration: none;
        box-shadow: 5px 5px 15px 1px #075e54a2;
        transition: background-color 0.3s ease;
    }

    #whatsapp-button i {
        font-size: 34px;
    }

    #whatsapp-button a:hover {
        background-color: #d20808;
    }

    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
        z-index: 99999999;
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 30%;
        /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
<!-- İlgili çerez kontrolü ve modal açma işlemleri -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Çerez kabul durumunu kontrol et
        var cookiesAccepted = getCookie('cookiesAccepted');

        // Eğer çerez kabul edilmemişse ve modal daha önce gösterilmemişse
        if (!cookiesAccepted) {
            openModal(); // Modalı aç
        }
    });

    // Çerez kontrolü için yardımcı fonksiyon
    function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
    }
</script>

<script>
    var modal = document.getElementById("myModal");

    function openModal() {
        modal.style.display = "block";
    }

    function closeModal() {
        modal.style.display = "none";
    }

    function acceptCookies() {
        // Çerezleri kabul etme işlemleri
        closeModal(); // Modalı kapat
    }

    function rejectCookies() {
        // Çerezleri reddetme işlemleri
        closeModal(); // Modalı kapat
    }

    function acceptCookies() {
        // Çerez kabul durumunu kaydet
        document.cookie = "cookiesAccepted=true;path=/";

        // Modal içeriğini güncelle
        document.getElementById('cookiesAcceptedInfo').style.display = 'block';

        // Modalı kapat
        closeModal();
    }

    function rejectCookies() {
        // Çerez reddetme durumunu kaydet (Opsiyonel)
        document.cookie = "cookiesAccepted=false;path=/";

        // Modalı kapat
        closeModal();
    }

    function closeModal() {
        // Modalı kapat
        var modal = document.getElementById("myModal");
        modal.style.display = "none";
    }
</script>

</body>

</html>
