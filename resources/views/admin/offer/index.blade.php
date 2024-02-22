@extends('admin.layouts.master')
@section('title', 'Teklifler')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!---------Tablo Yapısı------------>
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;"><ion-icon name="document-text-sharp"></ion-icon> Teklifler</h6>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            @if (count($offers) > 0)
                                <table class="table mb-0">
                                    <thead style="color: #874c9e">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">İsim Soyisim</th>
                                            <th scope="col">E-Posta Adresi</th>
                                            <th scope="col">Telefon</th>
                                            <th scope="col">Teklif Detayları</th>
                                            <th scope="col">Tahmini Bütçe</th>
                                            <th scope="col">Tarih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp

                                        @foreach ($offers as $offer)
                                            <tr style="color: #874c9e;">
                                                <th scope="row">{{ $counter++ }}</th>
                                                <td>{{ $offer->name }}</td>
                                                <td>{{ $offer->email }}</td>
                                                <td>{{ $offer->phone }}</td>
                                                <td>{{ $offer->project_details }}</td>
                                                <td>{{ number_format($offer->estimated_price, 0, ',', '.') }}$</td>
                                                <td>{{ \Carbon\Carbon::parse($offer->created_at)->format('d/m/Y')}}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                            <p class="text-center">Henüz teklifiniz yok.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>
@endsection
