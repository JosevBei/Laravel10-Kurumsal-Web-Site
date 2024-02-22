@extends('admin.layouts.master')
@section('title', 'Slider')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!---------Tablo Yapısı------------>
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;"><ion-icon name="play-sharp"></ion-icon> Slider</h6>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            @if (count($sliders) > 0)
                                <table class="table mb-0">
                                    <thead style="color: #874c9e">
                                        <tr>
                                            <th scope="col">Fotoğraf</th>
                                            <th scope="col">Başlık</th>
                                            <th scope="col">İçerik Yazısı</th>
                                            <th scope="col">İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp

                                        @foreach ($sliders as $slider)
                                            <tr style="color: #874c9e;">
                                                <td><img src="{{ asset('uploads/sliders/' . $slider->image) }}
                                                    " alt="{{ $slider->title }}" style="width: 75px;"></td>
                                                <td>{{ $slider->title }}</td>
                                                <td>{{ $slider->description }}</td>
                                                <td>
                                                    <a href="{{ route('slider.edit', $slider->id) }}"
                                                        class="btn btn-sm btn-primary">Düzenle</a>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <p>Henüz slider yok.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>
@endsection
