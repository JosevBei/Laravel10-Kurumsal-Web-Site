@extends('admin.layouts.master')
@section('title', 'İletişim')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!---------Tablo Yapısı------------>
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;"><ion-icon name="mail-sharp"></ion-icon> İletişim Mesajları</h6>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            @if (count($messages) > 0)
                                <table class="table mb-0">
                                    <thead style="color: #874c9e">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">İsim Soyisim</th>
                                            <th scope="col">E-Posta Adresi</th>
                                            <th scope="col">Konu</th>
                                            <th scope="col">Mesaj</th>
                                            <th scope="col">Tarih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp

                                        @foreach ($messages as $mes)
                                            <tr style="color: #874c9e;">
                                                <th scope="row">{{ $counter++ }}</th>
                                                <td>{{ $mes->name }}</td>
                                                <td>{{ $mes->email }}</td>
                                                <td>{{ $mes->subject }}</td>
                                                <td>{{ $mes->message }}</td>
                                                <td>{{ \Carbon\Carbon::parse($mes->created_at)->format('d/m/Y')}}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <p class="text-center">Henüz bir mesajınız yok.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>
@endsection
