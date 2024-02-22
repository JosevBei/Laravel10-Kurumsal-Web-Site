<!doctype html>
<html lang="en" class="light-theme">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- loader-->
    <link href="{{ asset('back/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('back/assets/js/pace.min.js') }}"></script>
    <!--favicon-->

    <link rel="icon" type="image/x-icon" href="{{ asset('back/assets/images/marsia.png') }}">

    <!--plugins-->
    <link href="{{ asset('back/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />

    <!-- CSS Files -->
    <link href="{{ asset('back/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('back/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('back/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('back/assets/css/icons.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <title>Marsia Design - Şifremi Unuttum</title>
</head>

<body>

    <div class="login-bg-overlay au-reset-password-basic"></div>

    <!--start wrapper-->
    <div class="wrapper">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white p-3">
                <div class="container-fluid">
                    <a href="{{ route('login') }}"><img src="{{ asset('back/assets/images/marsia.png') }}"
                            width="30" alt="" />Marsia Design</a>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-7 mx-auto">
                    <div class="reset-passowrd">
                        <div class="card radius-10 w-100 mt-8">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h4>Şifreni Yenile</h4>
                                    <p>Mail bilgilerinizi doğru girdiğiniz takdirde size bir bağlantı göndereceğiz.</p>
                                </div>
                                <form class="form-body row g-3" action="{{ route('password.reset') }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <label for="inputEmail" class="form-label">E-Posta Adresiniz</label>
                                        <input type="email" name="email" class="form-control" id="inputEmail"
                                            placeholder="marsia@marsia.com">
                                    </div>
                                    <div class="col-12 col-lg-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Gönder</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="my-5">
            <div class="container">
                <div class="text-center">
                    <p class="my-4">Marsia Design | Copyright © 2020 - {{ now()->year }}</p>
                </div>
            </div>
        </footer>
    </div>
    <!--end wrapper-->



</body>

</html>
