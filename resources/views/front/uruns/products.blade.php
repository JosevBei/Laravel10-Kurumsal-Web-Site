@extends('front.layouts.master')
@section('title', 'Ürünler')
@section('home-description')
    <meta name="description" content="{{ $siteSettings->site_description }}" />
@endsection
@section('content')
    <div class="container mt-5">
        <h1 class="name-text">{{ $category->name }}</h1>
        <hr>
        <div class="container mt-4">
            <div class="row" id="product-container">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 mb-4">
                        <div class="card">
                            <div class="card-image">
                                <img src="{{ asset('uploads/products/' . $product->image) }}" alt="{{ $product->name }}">
                                <a href="https://api.whatsapp.com/send?phone=905323314805" class="contact-button"
                                    target="_blank"><i class="fa fa-whatsapp"></i></a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('product.show', ['category' => $product->category->slug, 'slug' => $product->slug]) }}">
                                    <i class="fa-solid fa-magnifying-glass"></i> Ürünü İncele
                                </a>
                                

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <style>
        .card-footer {
            background: #c80707;
            text-align: center;
        }

        .card-footer a {
            color: #ffffff;
        }

        .card-footer a:hover {
            text-decoration: none;
            font-weight: 700;
        }

        .name-text {
            text-align: center;
            color: #6c010d;
            font-size: 40px;
            font-weight: 500;
            text-transform: uppercase;
        }

        .card {
            border: 2px solid #c80707;
            color: #c80707;
            transition: transform 0.2s;
            width: 100%;
            max-width: 300px;
            margin: 0 auto;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card img {
            max-width: 100%;
            height: auto;
            transition: opacity 0.2s;
        }

        .card:hover img {
            opacity: 0.8;
        }

        .card-title {
            text-align: center;
        }

        /* İletişim butonu stilleri */
        .contact-button {
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translate(-50%, -50%);
            /* Kartın ortasına al */
            background-color: #6c010d;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            text-decoration: none;
            display: none;
            font-size: 24px;
            transition: 0.5s;

        }

        .contact-button:hover {
            background-color: #fff;
            color: #17d25c;
            transition: 0.5s;
        }

        .card:hover .contact-button {
            display: block;
        }
    </style>
    <script>
        $(document).ready(function() {
            // Tüm kartların yüksekliğini bulun
            var maxHeight = 0;
            $('.card').each(function() {
                var currentHeight = $(this).height();
                if (currentHeight > maxHeight) {
                    maxHeight = currentHeight;
                }
            });

            // Tüm kartların yüksekliğini en yüksek karta eşitleyin
            $('.card').height(maxHeight);
        });
    </script>

@endsection
