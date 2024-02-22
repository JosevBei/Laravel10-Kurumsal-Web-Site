<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bakım Modu</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            position: relative;
            font-family: 'Montserrat', sans-serif;
            color: #c80707;
            padding: 50px;
            margin: 0;

            &::before {
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                content: '';
                background: url('{{ asset('storage/' . $siteSettings->logo) }}') no-repeat center center fixed;
                background-size: cover;
                background-position: top center;
                opacity: 0.2;
                z-index: -1;
            }
        }

        .navbar-brand {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
        }

        .card {
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid #c80707;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            justify-content: center;
            margin-top: 30px;
        }

        h1 {
            color: #c80707;
        }

        p {
            font-size: 18px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('storage/' . $siteSettings->logo) }}" alt="{{$siteSettings->site_title}}" style="max-width: 100px;">
            </a>
        </div>
    </nav>

    <div class="container text-center">
        <div class="tr card">
            <h1>Bakım Modu</h1>
            <p>Size daha iyi bir hizmet verebilmek adına sitemiz şu anda bakım modunda.</p>
            <p>Kısa bir süre içinde tekrar hizmetinizde olacağız. Anlayışınız için teşekkür ederiz.</p>
        </div>
        <div class="en card">
            <h1>Maintenance Mode</h1>
            <p>Our website is currently undergoing maintenance to provide you with better service.</p>
            <p>We will be back in service shortly. Thank you for your understanding.</p>
        </div>
    </div>

    <!-- Bootstrap JS ve Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
