@extends('admin.layouts.master')

@section('title', $person->name)

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h6 class="mb-4 text-uppercase text-center" style="color: #923eb9ff;">
                        <ion-icon name="cloudy"></ion-icon>
                        <strong>ASTA</strong> - {{ $person->name }}
                    </h6>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <div class="d-flex justify-content-start">
                                    <a href="{{ route('excel-data.create-table', $person->id) }}"
                                        class="btn btn-sm btn-success"><ion-icon name="add-circle-outline"></ion-icon> Tablo
                                        Ekle</a>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('excel-data.download-pdf', $person->id) }}"
                                        class="btn btn-sm btn-outline-danger" style="color: #e22229ff"><ion-icon
                                            name="download"></ion-icon> PDF İndir</a>
                                </div>
                                <hr>

                                <!-- Excel Data Tablosu -->
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tarih</th>
                                            <th>Ürün</th>
                                            <th>Adet</th>
                                            <th>Fiyat</th>
                                            <th>Toplam Fiyat</th>
                                            <th>Düzenle</th>
                                            <th>Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $genelToplam = 0; // Başlangıçta genel toplamı sıfıra ayarla
                                            $kalan = 0;
                                        @endphp
                                        @foreach ($excelData as $data)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($data->date)->format('d/m/Y') }}</td>
                                                <td>{{ $data->productType->name }}</td>
                                                <td>{{ $data->quantity }}</td>
                                                <td>{{ $data->amount }}₺</td>
                                                <td>{{ number_format($data->quantity * $data->amount, 2, ',', '.') }}₺</td>
                                                <td>
                                                    <a href="{{ route('excel-data.edit-table', ['person' => $person->id, 'table' => $data->id]) }}"
                                                        class="btn btn-sm btn-primary">Düzenle</a>
                                                </td>
                                                <td>
                                                    <form
                                                        action="{{ route('excel-data.destroy-table', ['person' => $person->id, 'table' => $data->id]) }}"
                                                        method="post" style="display: inline-block;">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Bu tabloyu silmek istediğinizden emin misiniz?')">Sil</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @php
                                                // Her bir veri için genel toplama miktarı ekleyerek güncelle
                                                $genelToplam += $data->quantity * $data->amount;
                                                $kalan = $genelToplam - $person->odeme;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <div class="mt-3 text-uppercase d-flex justify-content-end"
                                    style="color: #923eb9ff; font-weight:500;">
                                    Genel Toplam: {{ number_format($genelToplam, 2, ',', '.') }}₺
                                </div>
                                <!-- Ödeme Formu -->
                                <form action="{{ route('excel-data.update-payment', $person->id) }}" method="post"
                                    class="d-flex align-items-center mt-3">
                                    @csrf
                                    @method('put')
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: #f3a01d; color:#fff;">Ödenen
                                            Miktar:</span>
                                        <input type="number" name="odeme"
                                            style="border:2px solid #f3a01d; box-shadow:none;" class="form-control"
                                            value="{{ $person->odeme }}" step="0.01" readonly>
                                        <span class="input-group-text" style="background: #f3a01d; color:#fff;">₺</span>
                                    </div>
                                </form>
                                <div class="mt-3" style="color: #923eb9ff; font-weight:500;">
                                    Bakiye: {{ number_format($kalan, 2, ',', '.') }}₺
                                </div>
                            </div>

                            <!-- Ödemeler Tablosu -->
                            <div class="mt-4">
                                <h6 class="mb-3 text-uppercase text-center" style="color: #923eb9ff;">Ödemeler</h6>
                                <!-- Yeni Ödeme Ekle Formu -->
                                <form action="{{ route('excel-data.add-payment', $person->id) }}" method="post"
                                    class="d-flex align-items-center mt-3 mb-3">
                                    @csrf
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: #08ab1b; color:#fff;">Ödeme
                                            Tarihi:</span>
                                        <input type="date" name="payment_date"
                                            style="border:2px solid #08ab1b; box-shadow:none;" class="form-control" required>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-text" style="background: #08ab1b; color:#fff;">Ödeme
                                            Miktarı:</span>
                                        <input type="number" name="odeme"
                                            style="border:2px solid #08ab1b; box-shadow:none;" class="form-control"
                                            step="0.01" required>
                                        <span class="input-group-text" style="background: #08ab1b; color:#fff;" >₺</span>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-success ms-3">Onay</button>
                                </form>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Ödeme Tarihi</th>
                                            <th>Ödeme Miktarı</th>
                                            <th>İşlemler</th> <!-- Yeni sütun: İşlemler -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($person->payments as $payment)
                                            <tr>
                                                <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') }}
                                                </td>
                                                <td>{{ $payment->payment_amount }}₺</td>
                                                <td>
                                                    <form
                                                        action="{{ route('excel-data.delete-payment', ['person' => $person->id, 'payment' => $payment->id]) }}"
                                                        method="post" style="display: inline-block;">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Bu ödemeyi silmek istediğinizden emin misiniz?')">Sil</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card {
            margin-bottom: 20px;
        }

        .card-body {
            padding: 1.25rem;
        }

        .border {
            border: 1px solid #ddd;
        }

        .btn-block {
            width: 100%;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .text-center {
            text-align: center;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        /* Tablo stilleri */
        .table th,
        .table td {
            text-align: center;
        }

        .table th:last-child,
        .table td:last-child {
            text-align: right;
        }

        /* Genel Toplam alanı */
        .mt-3 {
            margin-top: 1rem;
        }

        /* Yeni Tablo Ekle butonu */
        .btn-success {
            color: #fff;
        }

        .btn-success:hover {
            color: #fff;
        }

        /* Düzenle ve Sil butonları */
        .duzenle-sil-btn {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .duzenle-btn,
        .sil-btn {
            margin: 0.25rem;
        }
    </style>
@endsection
