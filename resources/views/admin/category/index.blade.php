@extends('admin.layouts.master')
@section('title', 'Kategoriler')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!---------Tablo Yapısı------------>
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;"><ion-icon name="grid-sharp"></ion-icon> Kategoriler</h6>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            @if (count($categories) > 0)
                                <table class="table mb-0">
                                    <thead style="color: #874c9e">
                                        <tr>
                                            <th scope="col">Sıra</th>
                                            <th scope="col">Kategori Adı</th>
                                            <th scope="col">Düzenle</th>
                                            <th scope="col">Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp

                                        @foreach ($categories as $category)
                                            <tr style="color: #874c9e;">
                                                <th scope="row">{{ $counter++ }}</th>
                                                <td>{{ $category->name }}</td>
                                                <td>
                                                    <a href="{{ route('categories.edit', $category) }}"
                                                        class="btn btn-sm btn-primary">Düzenle</a>
                                                </td>
                                                <td>
                                                    <form action="{{ route('categories.destroy', $category) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Kategoriyi silmek istediğine emin misin? Bu işlem geri alınamaz. Kategori: {{ $category->name }}')">Sil</button>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <p>Henüz bir kategori oluşturulmadı.</p>
                                <a href="{{route('categories.create')}}">Kategori Ekle</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page content-->
    </div>
@endsection
