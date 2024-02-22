@extends('admin.layouts.master')
@section('title', 'Galeri')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!---------Tablo Yapısı------------>
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;"><ion-icon name="images-sharp"></ion-icon> Fotoğraflar</h6>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            @if (count($galeries) > 0)
                                <table class="table mb-0">
                                    <thead style="color: #874c9e">
                                        <tr>
                                            <th scope="col">Fotoğraf</th>
                                            <th scope="col">Başlık</th>
                                            <th scope="col">İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp

                                        @foreach ($galeries as $galery)
                                            <tr style="color: #874c9e;">
                                                <td><img src="{{ asset('uploads/galeries/' . $galery->image) }}
                                                    " alt="{{ $galery->title }}" style="width: 75px;"></td>
                                                <td>{{ $galery->title }}</td>
                                                <td>
                                                    <a href="{{ route('galeries.edit', $galery) }}"
                                                        class="btn btn-sm btn-primary">Düzenle</a>
                                                        <form action="{{ route('galeries.destroy', $galery) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Silmek istediğinize eminmisiniz?')">Sil</button>

                                                    </form>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <p class="text-center">Henüz bir içerik yok.</p>
                                <div class="text-center">
                                    <a href="{{route('galeries.create')}}">Fotoğraf Ekle</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>
@endsection
