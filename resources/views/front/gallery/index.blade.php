@extends('front.layouts.master')
@section('title', 'Galeri')
@section('content')
    <h1 class="text mT-5">GALERİ</h1>
    <hr>
    <div class="ghs container mt-5">
        <div class="row">
            @foreach ($galleries as $gallery)
                <div class="col-md-4 mb-4">
                    <a href="{{ asset('uploads/galeries/' . $gallery->image) }}" target="_about" data-caption="{{ $gallery->title }}"
                        data-bs-toggle="lightbox" data-bs-gallery="gallery" class="card">
                        <img src="{{ asset('uploads/galeries/' . $gallery->image) }}" class="card-img-top" alt="{{ $gallery->title }}">
                        <div class="card-body">
                            <h6 class="card-title">{{ $gallery->title }}</h6>
                        </div>

                    </a>
                    <div class="card-footer">
                        <span><i class="fa-solid fa-share-nodes"></i></span>
                        <a href="https://api.whatsapp.com/send?text={{ url()->current() }}" target="_blank"
                            class="share-icon whatsapp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="https://www.facebook.com/sharer.php?u={{ url()->current() }}" target="_blank"
                            class="share-icon facebook">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/?url={{ url()->current() }}" target="_blank"
                            class="share-icon instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <style>
        a:hover {
            text-decoration: none;
        }

        .ghs .card {
            color: #c80707;
            transition: transform 0.2s;
            width: 100%;
            border: 1px solid #c80707;
            max-width: 500px;
            margin: 0 auto;
            transition: 0.5s;

        }

        .ghs .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.634);
            transform: scale(1.1);
            transition: 0.5s;
            border: none;
        }

        .ghs .card img {
            max-width: 100%;
            height: auto;
            transition: opacity 0.2s;
            transition: 0.6s;
        }

        .ghs .card-title {
            font-size: 14px;
            text-align: center;
            color: #fff;
            background-color: #c80707;
            padding: 10px;
            margin-bottom: 0;
            border-radius: 5px 5px 0 0;
        }

        .ghs .card-footer {
            padding: 20px;
            background: #c80707;
            color: #fff;
        }

        .ghs .card-footer a {
            margin: 0px 30px 0px 30px;
            color: #ffffff;
            font-size: 18px;
        }

        .ghs span {
            background: #fff;
            padding: 10px 15px;
            border-radius: 5px;
            color: #c80707;
        }


        .text {
            text-align: center;
            color: #c80707;
            margin-bottom: 10px;
        }

        /* Küçük ekranlar için stil ayarları */
        @media (max-width: 1200px) {
            .ghs .card-footer {
                padding: 10px;
                background: #c80707;
                color: #fff;
            }

            .ghs .card-footer a {
                margin: 0px 10px 0px 10px;
                color: #ffffff;
                font-size: 16px;
            }
        }

        /* Küçük ekranlar için stil ayarları */
        @media (max-width: 767px) {
            .ghs {
                max-width: 400px;
            }

            .ghs .card-footer {
                padding: 20px;
                background: #c80707;
                color: #fff;
            }

            .ghs .card-footer a {
                margin: 0px 30px 0px 30px;
                color: #ffffff;
                font-size: 18px;
            }

            .ghs span {
                background: #fff;
                padding: 10px 15px;
                border-radius: 5px;
                color: #c80707;
            }
        }
    </style>
@endsection
