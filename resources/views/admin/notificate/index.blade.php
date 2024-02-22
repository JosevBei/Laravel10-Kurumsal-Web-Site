@extends('admin.layouts.master')
@section('title', 'Bildirimler')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!---------Tablo Yapısı------------>
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;"><ion-icon name="notifications-sharp"></ion-icon> Bildirimler</h6>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            @if (count($notificates) > 0)
                                <table class="table mb-0">
                                    <thead style="color: #874c9e">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Bildirim</th>
                                            <th scope="col">Tarih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp

                                        @foreach ($notificates as $notif)
                                            <tr style="color: #874c9e;">
                                                <th scope="row">{{ $counter++ }}</th>
                                                <td>{{ $notif->message }}</td>
                                                <td>{{ \Carbon\Carbon::parse($notif->created_at)->format('d/m/Y | H:i:s')}}</td>

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
