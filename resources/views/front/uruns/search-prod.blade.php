@extends('front.layouts.master')

@section('title', 'Arama Sonuçları')
@section('home-description')
    <meta name="description" content="{{ $siteSettings->site_description }}" />
@endsection
@section('content')
    <div class="result-area container mt-5">
        <h2 class="top-text">Arama Sonuçları</h2>
        <hr>

        <p style="float: left">Anahtar Kelime : <strong class="">{{ $searchTerm }}</strong></p>

        <div class="table-responsive mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr class="baslik">
                        <th>Ürün</th>
                        <th>Ürün Adı</th>
                        <th>Kategori</th>
                        <th>Ürün Kodu</th>
                        <th>Seç</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $prod)
                        <tr>
                            <td>
                                <img src="{{ asset('uploads/products/' . $prod->image) }}" alt="{{ $prod->name }}"
                                    style="max-width: 100px; max-height: 100px;">
                            </td>
                            <td>{{ $prod->name }}</td>
                            <td>{{ $prod->category->name }}</td>
                            <td>{{ $prod->product_code }}</td>
                            <td>
                                <a href="{{ route('product.show', ['category' => $prod->category->slug, 'slug' => $prod->slug]) }}">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .result-area a {
            padding: 20px 0px;
            text-align: center;
            justify-content: center;
            display: flex;
            margin: auto;
            border-radius: 10px;
            color: #ffffff;
            background: #c80707;
        }

        a:hover{
            text-decoration: none;
        }

        .result-area {
            margin-bottom: 50px;
            background-color: #f8f9fa;
            /* Arka plan rengi */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.486);
        }

        .top-text {
            text-align: center;
            color: #c80707;
            margin-bottom: 20px;
        }

        .keyword-text {
            float: left;
            color: #c80707;
            font-weight: 500;
        }

        .table {
            background-color: #fff;
            /* Tablo arka plan rengi */
        }

        .table th,
        .table td {
            border: 1px solid #dee2e6;
            /* Hücre sınırları */
            padding: 15px;
            text-align: center;
        }

        .table th {
            background-color: #c80707;
            /* Başlık arka plan rengi */
            color: #fff;
            /* Başlık metin rengi */
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
            /* Satırın üzerine gelindiğinde arka plan rengi */
        }

        .table img {
            max-width: 80px;
            /* Resim maksimum genişliği */
            max-height: 80px;
            /* Resim maksimum yüksekliği */
            border-radius: 5px;
            /* Resim kenar yarıçapı */
        }
    </style>


@endsection
