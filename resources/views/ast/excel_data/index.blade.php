<!-- resources/views/ast/excel_data/index.blade.php -->

@extends('admin.layouts.master')

@section('title', 'Kişi Seç')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h6 class="mb-0 text-uppercase text-center" style="color: #f3a01d;"><ion-icon name="cloudy"></ion-icon>
                        <strong>ASTA</strong> - Adetli Sistem Takip Aplikasyonu</h6>
                    <hr>
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <div class="row">
                                    <div class="col-md-6" style="color:#e33b2eff;">
                                        <h6 class="mt-4 mb-3 text-uppercase text-center">Cari
                                            Kişiler</h6>
                                        <hr>
                                        <table class="table table-bordered" style="color:#e33b2eff;">
                                            <thead>
                                                <tr>
                                                    <th>İsim</th>
                                                    <th>İşlemler</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cariPeople as $cari)
                                                    <tr>
                                                        <td>{{ $cari->name }}</td>
                                                        <td><a href="{{ route('excel-data.show-tables', $cari->id) }}"
                                                                class="btn btn-sm btn-primary"
                                                                style="width: 100%; background:#e33b2eff; border:none;">Tablo</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="mt-4 mb-3 text-uppercase text-center" style="color: #923eb9ff;">Tedarikçi
                                            Kişiler</h6>
                                        <hr>
                                        <table class="table table-bordered" style="color: #923eb9ff;">
                                            <thead>
                                                <tr>
                                                    <th>İsim</th>
                                                    <th>İşlemler</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($tedarikciPeople as $tedarikci)
                                                    <tr>
                                                        <td>{{ $tedarikci->name }}</td>
                                                        <td><a href="{{ route('excel-data.show-tables', $tedarikci->id) }}"
                                                                class="btn btn-sm btn-primary"
                                                                style="width: 100%;">Tablo</a></td>
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
        </div>
    </div>
@endsection
