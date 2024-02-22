@extends('front.layouts.master')
@section('title', $product->name)
@section('product-description')
    <meta name="description" content="{{ $product->description }}" />
@endsection
@section('content')
<div class=" container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('uploads/products/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="bars col-md-6 product-info">
            <h1 class="top-text">{{ $product->name }}</h1>
            <hr>
            <p>{{ $product->description }}</p>
            <p class="text-center"><i class="fa-solid fa-eye"></i> Bu ürünü Toplam {{$product->hits}} kişi inceledi</p>
            <table>
                <tr>
                    <th><i class="fa-solid fa-hashtag"></i> Ürün Kodu</th>
                    <td>{{ $product->product_code }}</td>
                </tr>
                <tr>
                    <th><i class="fa-solid fa-ruler-vertical"></i> Uzunluk</th>
                    <td> {{ $product->length }} cm</td>
                </tr>
                <tr>
                    <th><i class="fa-solid fa-ruler-horizontal"></i> Genişlik</th>
                    <td>{{ $product->width }} cm</td>
                </tr>
                <tr>
                    <th><i class="fa-solid fa-weight-hanging"></i> Ağırlık</th>
                    <td>{{ $product->weight }} kg</td>
                </tr>
            </table>
            <div class="contact-div">
                <a href="https://api.whatsapp.com/send?phone=905323314805" class="contact-button"
                   target="_blank"><i class="fab fa-whatsapp"></i> Bizimle İletişime Geçin</a>
            </div>
        </div>
    </div>
</div>
<style>
    .bars{
        border: 1px solid #c80707;
    }

    .top-text {
        color: #c80707; /* Başlık rengi */
    }

    hr {
        border-color: #c80707; /* Çizgi rengi */
    }

    img.img-fluid {
        width: 100%; /* Resmi sabit genişlikte tut */
        height: auto;
    }

    .product-info {
        border-color: #c80707; /* Çizgi rengi */

        padding: 20px;
        background: #fff;
        color: #c80707; /* Ürün bilgisi metin rengi */
        border-radius: 10px; /* Köşe yuvarlama */
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .product-info h1, .product-info p {
        margin-bottom: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid #fff; /* Tablo sınırlarının rengi */
    }

    th, td {
        color: #fff;
        padding: 15px;
        text-align: left;
        background-color: #c80707; /* Başlık arka plan rengi */

    }

    th {
        background-color: #c80707; /* Başlık arka plan rengi */
        color: #fff; /* Başlık metin rengi */
    }

    .contact-div {
        margin-top: 20px;
    }

    .contact-button {
        width: 100%;
        background-color: #c80707; /* Buton arka plan rengi */
        color: #ffffff; /* Buton metin rengi */
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-size: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s, color 0.3s;
    }

    .contact-button i {
        margin-right: 10px;
    }

    .contact-button:hover {
        text-decoration: none;
        background-color: #880202;
        color: #fff;
    }

</style>

@endsection
