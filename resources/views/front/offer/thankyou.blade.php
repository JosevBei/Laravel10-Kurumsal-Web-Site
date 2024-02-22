<!-- resources/views/front/offer/thankyou.blade.php -->

@extends('front.layouts.master')
@section('title', 'Teklif Teşekkür')
@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white">
                        <h3 class="text-center"><i class="fas fa-check-circle"></i> Teşekkür Ederiz!</h3>
                    </div>
                    <div class="card-body">
                        <p class="lead text-center">
                            Teklifiniz başarıyla alındı. İlginiz için teşekkür ederiz. <br>
                            En kısa sürede sizinle iletişime geçeceğiz.
                        </p>
                        <h5 class="text-center mt-4 mb-3">Teklif Detayları</h5>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><i class="fas fa-user"></i> Adınız ve Soyadınız</td>
                                    <td>{{ $offer->name }}</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-envelope"></i> E-posta Adresiniz</td>
                                    <td>{{ $offer->email }}</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-phone"></i> Telefon Numaranız</td>
                                    <td>{{ $offer->phone }}</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-file-alt"></i> Proje Detayları</td>
                                    <td>{{ $offer->project_details }}</td>
                                </tr>
                                <tr>
                                    <td><i class="fas fa-dollar-sign"></i> Tahmini Bütçe</td>
                                    <td>${{ $offer->estimated_price }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="text-center"><i class="fa-solid fa-circle-exclamation"></i> Bu sayfayı tekrar görüntüleyebilmek için lütfen linki kopyalayınız!</p>
                        <div class="text-center mt-3">
                            <button id="copyButton" class="btn btn-secondary"><i class="fa-solid fa-copy"></i> Linki Kopyala</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
         .btn-secondary {
            background-color: #c80707;
            border: none;
            color: #fff;
            transition: background-color 0.3s, border-color 0.3s, color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #8b0404;
        }
        .card {
            border: 2px solid #c80707;
            color: #c80707;
            transition: transform 0.2s;
            margin-bottom: 50px;
            border-radius: 10px;
        }

        .card-header {
            background-color: #c80707;
            border-color: #c80707;
            border-radius: 8px 8px 0 0;
        }

        .card-header h3 {
            color: #fff;
        }

        .table {
            color: #c80707;
        }

        .table td {
            border-color: #c80707;
        }

        .table th {
            border-color: #c80707;
            background-color: #c80707;
            color: #fff;
        }
    </style>
    <script>
        document.getElementById("copyButton").addEventListener("click", function() {
            copyToClipboard(window.location.href);
            alert('Link kopyalandı!');
        });

        function copyToClipboard(text) {
            var dummy = document.createElement("textarea");
            document.body.appendChild(dummy);
            dummy.value = text;
            dummy.select();
            document.execCommand("copy");
            document.body.removeChild(dummy);
        }
    </script>

@endsection
