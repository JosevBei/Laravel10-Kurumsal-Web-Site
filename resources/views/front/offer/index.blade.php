<!-- resources/views/front/offer/index.blade.php -->

@extends('front.layouts.master')
@section('title', 'Özel Teklif Alın')
@section('content')

    <div class="offer-area container mt-5">
        <h1 class="text-center text-red">Özel Teklif Alın</h1>
        <p class="lead text-center">
            Hayalinizdeki tasarımı bizimle paylaşın.
            <br>
            Size özel bir teklif hazırlayalım ve birlikte tasarımınızı hayata geçirelim.
        </p>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form action="{{ route('submit.offer') }}" method="POST" onsubmit="return validateForm()">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label text-red">İsim Soyisim</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Örn: John Doe" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label text-red">E-posta Adresiniz</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Örn: john@example.com" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label text-red">Telefon Numaranız</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="number" class="form-control" id="phone" name="phone"
                                placeholder="Örn: 555-555-5555" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="project_details" class="form-label text-red">Proje Detayları</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-file-alt"></i></span>
                            <textarea class="form-control" id="project_details" name="project_details" rows="4"
                                placeholder="Örn: Avize tasarımında istediğiniz renk, malzeme, boyut vb. detaylar" required></textarea>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="estimated_price" class="form-label text-red">Tahmini Bütçe ($) </label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" id="estimated_price" name="estimated_price"
                                placeholder="Örn: 500.00" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Teklif Al</button>
                </form>
            </div>
        </div>
    </div>
    <style>
        .offer-area {
            max-width: 50%;
            color: #333;
            background: #ffffff;
            padding-top: 40px;
            padding-bottom: 40px;
            margin-bottom: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.373);
        }

        .offer-area h1 {
            color: #c80707;
        }

        .lead {
            margin-top: 15px;
            color: #880202;
            font-weight: 400;
        }

        .text-red {
            color: #c80707;
        }

        .btn-primary {
            background-color: #c80707;
            border-color: #c80707;
            color: #fff;
            transition: background-color 0.3s, border-color 0.3s, color 0.3s;
        }

        .btn-primary:hover {
            background-color: #880202;
            border-color: #880202;
        }

        .form-control {
            border-color: #c80707;
            color: #495057;
        }

        .form-control:focus {
            border: none;
            box-shadow: none;
            transition: 0.5s;
        }

        /* Daha fazla özel stil eklemek ister misin? Mesela input'lara border-radius ekleyebiliriz. */
        .form-control {
            border-radius: 5px;
        }

        /* İkinci bir renk teması ekleyerek düğmeyi daha çekici hale getirebiliriz. */
        .btn-secondary {
            background-color: #343a40;
            border-color: #343a40;
            color: #fff;
            transition: background-color 0.3s, border-color 0.3s, color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #1d2124;
            border-color: #1d2124;
        }

        /* İnput gruplarına özel stil */
        .input-group-text {
            background-color: #c80707;
            color: #fff;
            border-color: #c80707;
        }

        .input-group-text:hover {
            background-color: #880202;
            border-color: #880202;
        }

        @media screen and (max-width: 671px) {
            .offer-area {
                max-width: 90%;
                color: #333;
                background: #f8f9fa;
                padding-top: 40px;
                padding-bottom: 40px;
                margin-bottom: 50px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.373);
            }
        }
    </style>
    <script>
        function validateForm() {
            var estimatedPrice = document.getElementById('estimated_price').value;
            // Regular expression to allow only numbers with optional decimal points
            var regex = /^\d+(\.\d{1,2})?$/;

            if (!regex.test(estimatedPrice)) {
                alert('Geçerli bir fiyat giriniz. Örn: 500.00$');
                return false;
            }

            return true;
        }
    </script>

@endsection
