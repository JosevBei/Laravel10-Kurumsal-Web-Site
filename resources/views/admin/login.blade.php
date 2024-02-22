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

    <title>Marsia Design - Giriş Paneli</title>
</head>

<body>

    <div class="login-bg-overlay au-sign-in-basic"></div>

    <!--start wrapper-->
    <div class="wrapper">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white p-3">
                <div class="container-fluid">
                    <a href="javascript:;"><img src="{{asset('back/assets/images/marsia.png')}}" width="30" alt="" />Marsia Design</a>
                </div>
            </nav>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto mt-5">
                    <div class="card radius-10">
                        <div class="card-body p-4">
                            <form class="form-body row g-3" action="{{route('login.post')}}" method="POST">
                              @csrf
                                <div class="col-12 col-lg-12">
                                </div>
                                <div class="col-12 col-lg-12">
                                    <div class="position-relative border-bottom my-3">
                                        <h5 class="text-center" style="color: #923eb9;">Giriş Yap</h5>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="inputEmail" class="form-label">E-Posta</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail"
                                        placeholder="abc@mail.com">
                                </div>
                                <div class="col-12">
                                    <label for="inputPassword" class="form-label">Şifre</label>
                                    <input type="password" name="password" class="form-control" id="inputPassword"
                                        placeholder="*****">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="remember" type="checkbox" role="switch"
                                            id="flexSwitchCheckRemember" value="1">
                                        <label class="form-check-label" for="flexSwitchCheckRemember">Beni
                                            Hatırla</label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6 text-end">
                                    <a href="{{ route('password.reset') }}">Şifreni mi unuttun?</a>

                                </div>
                                <div class="col-12 col-lg-12">
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Giriş Yap</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="my-5">
                <div class="text-center">
                    <p class="my-4">Marsia Design | Copyright © 2020 - {{ now()->year }}</p>
                </div>
            </div>
        </footer>
    </div>
    <!--end wrapper-->


</body>

</html>
