@extends('admin.layouts.master')
@section('title', 'Hakkımızda')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!---------Tablo Yapısı------------>
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;"><ion-icon name="information-circle-sharp"></ion-icon> Hakkımızda</h6>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            @if (count($abouts) > 0)
                                <table class="table mb-0">
                                    <thead style="color: #874c9e">
                                        <tr>
                                            <th scope="col">Fotoğraf</th>
                                            <th scope="col">Başlık</th>
                                            <th scope="col">Açıklama</th>
                                            <th scope="col">İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp

                                        @foreach ($abouts as $about)
                                            <tr style="color: #874c9e;">
                                                <td><img src="{{ asset('uploads/abouts/' . $about->image) }}
                                                    " alt="{{ $about->name }}" style="width: 75px;"></td>
                                                <td>{{ $about->name }}</td>
                                                <td>{{ $about->content }}</td>
                                                <td>
                                                    <a href="{{ route('about.edit', $about->id) }}"
                                                        class="btn btn-sm btn-primary">Düzenle</a>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <p class="text-center">Henüz bir içerik yok.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>
@endsection
