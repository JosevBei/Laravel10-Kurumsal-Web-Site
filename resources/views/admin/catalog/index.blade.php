@extends('admin.layouts.master')
@section('title', 'Katalog')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!---------Tablo Yapısı------------>
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;"><ion-icon name="book"></ion-icon> Katalog</h6>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            @if (count($catalogs) > 0)
                                <table class="table mb-0">
                                    <thead style="color: #874c9e">
                                        <tr>
                                            <th scope="col">Katalog</th>
                                            <th scope="col">İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($catalogs as $catalog)
                                            <tr style="color: #874c9e;">
                            
                                                <td>catalogmosaiclamp.pdf</td>
                                                <td>
                                                    <a href="{{ route('catalog.edit', $catalog->id) }}"
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
