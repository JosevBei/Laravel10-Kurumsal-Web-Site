<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $person->name }} - Okan Keskin - PDF</title>
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        *,
        body {
            font-family: "DeJaVu Sans Mono", monospace;
            background-color: #ffffff;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 100px;
            height: auto;
        }

        .date {
            float: right;
            font-size: 14px;
            margin-left: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th {
            color: #fff;
            background: #c80707;
            padding: 15px;
            text-align: left;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
        }

        .no-sales {
            text-align: center;
            margin-top: 20px;
            color: #868e96;
        }

        .total {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
            text-align: right;
            color: #c80707;
        }

        .download-date {
            text-align: right;
            margin-top: 10px;
            margin-bottom: 20px;
            color: #5a5a5a;
        }

        .info-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            color: #353535;
            font-weight: bold;
        }

        .info-box {
            flex: 0 0 48%;
            padding: 10px;
            border: 1px solid #ddd;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="download-date">
        {{ now()->format('d/m/Y') }}
    </div>
    <!-- İndirilen Tarih -->

    <!-- Tablo -->
    <table class="table">
        <thead>

            <tr>
                <th>Tarih</th>
                <th>Ürün</th>
                <th>Adet</th>
                <th>Fiyat</th>
                <th>Toplam Fiyat</th>
                <!-- Düzenle ve Sil sütunları da ekle, gerektiğinde -->
            </tr>
        </thead>
        <tbody>
            @php
                $genelToplam = 0;
            @endphp
            @foreach ($excelData as $data)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($data->date)->format('d/m/Y') }}</td>
                    <td>{{ $data->productType->name }}</td>
                    <td>{{ $data->quantity }}</td>
                    <td>{{ $data->amount }} TL</td>
                    <td>{{ number_format($data->quantity * $data->amount, 2, ',', '.') }} TL</td>
                    <!-- Düzenle ve Sil sütunları da ekle, gerektiğinde -->
                </tr>
                @php
                    $genelToplam += $data->quantity * $data->amount;
                @endphp
            @endforeach
        </tbody>
    </table>
    <!-- Ödemeler Tablosu -->
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>Ödeme Tarihi</th>
                <th>Ödeme Miktarı</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') }}</td>
                    <td>{{ number_format($payment->payment_amount, 2, ',', '.') }} TL</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Bilgiler -->
    <div class="info-container">
        <div class="info-box">
            Genel Toplam: {{ number_format($genelToplam, 2, ',', '.') }} TL
        </div>
        <div class="info-box">
            Ödenen Miktar: {{ number_format($person->odeme, 2, ',', '.') }} TL
        </div>
        <div class="info-box">
            Kalan Ödeme: {{ number_format($genelToplam - $person->odeme, 2, ',', '.') }} TL
        </div>
    </div>

</body>

</html>
