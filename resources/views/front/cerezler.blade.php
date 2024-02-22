@extends('front.layouts.master')

@section('title', 'Home')
@section('home-description')
    <meta name="description" content="{{ $siteSettings->site_description }}" />
@endsection
@section('content')
    <div class="container mt-4">
        <div class="card cookie-notification">
            <div class="card-body">
                <h3 class="card-title"> Çerez Kullanımı Hakkında Bildirim</h3>

                <p> Sayın Ziyaretçimiz, </p>

                <p> Bu web sitesi, sizlere daha iyi hizmet sunabilmek, sitemizi geliştirebilmek ve kullanım deneyiminizi
                    kişiselleştirebilmek amacıyla çerezleri kullanmaktadır. Çerezler, web sitesinin daha etkili çalışmasına
                    yardımcı olan küçük metin dosyalarıdır. </p>

                <p> ('Aşağıda kullanmış olduğumuz çerez türleri bulunmaktadır:')</p>

                <ul>
                    <li> Zorunlu Çerezler: Bu çerezler, web sitesinin temel işlevselliği için gereklidir ve siteyi kullanmanızı
                        sağlar.</li>
                    <li> Analitik Çerezler: Bu çerezler, web sitesini nasıl kullandığınızı anlamamıza yardımcı olur. Topladığımız
                        bu veriler, sadece istatistiksel analizler için kullanılır ve kişisel bilgiler içermez.</li>
                    <li> Çeviri Çerezleri: Bu çerezler, sizin dil tercihinizi hatırlamamıza yardımcı olur. Böylece, sonraki
                        ziyaretlerinizde sitemizi tercih ettiğiniz dilde görüntüleyebiliriz.</li>
                </ul>

                <p> Sitemizi kullanmaya devam ederek, yukarıda belirtilen çerez kullanımını kabul etmiş olursunuz.</p>

                <p class="mt-3"> Saygılarımızla,<br>{{$siteSettings->site_title}}</p>
            </div>
        </div>
    </div>

    <style>
        .container {
            max-width: 800px;
            /* Örneğin, içerik genişliğini sınırla */
            margin: 0 auto;
            /* Merkezine almak için */
        }

        .cookie-notification {
            /* İstediğiniz stil ayarlamalarını burada yapabilirsiniz */
            border: 2px solid #c21010;
            border-radius: 10px;
            margin-bottom: 50px;
            margin-top: 30px;
        }
    </style>
@endsection
