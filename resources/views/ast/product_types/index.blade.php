@extends('admin.layouts.master')

@section('title', 'Ürün Cinsleri')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-12 mx-auto">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0 text-uppercase" style="color: #f3a01d;">
                            <ion-icon name="cube"></ion-icon> AST - Ürün Cinsleri
                        </h6>
                        <a href="{{ route('product-types.create') }}" class="btn btn-sm btn-success"><ion-icon
                                name="add-circle"></ion-icon> Yeni Ürün Cinsi Ekle</a>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            @if (count($productTypes) > 0)
                                <table class="table mb-0">
                                    <thead style="color: #874c9e">
                                        <tr>
                                            <th scope="col">Sıra</th>
                                            <th scope="col">Ürün Cinsi Adı</th>
                                            <th scope="col">Fiyat</th>
                                            <th scope="col">İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp

                                        @foreach ($productTypes as $productType)
                                            <tr style="color: #874c9e;">
                                                <th scope="row">{{ $counter++ }}</th>
                                                <td>{{ $productType->name }}</td>
                                                <td>{{ $productType->price }}₺</td>
                                                <td>
                                                    <a href="{{ route('product-types.edit', $productType->id) }}"
                                                        class="btn btn-sm btn-primary">Düzenle</a>
                                                    <form
                                                        action="{{ route('product-types.destroy', $productType->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Ürün cinsini silmek istediğine emin misin? Bu işlem geri alınamaz. Ürün Cinsi: {{ $productType->name }}')">Sil</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <p>Henüz ürün cinsi eklenmemiş.</p>
                                <a href="{{ route('product-types.create') }}" class="btn btn-success">Yeni Ürün Cinsi
                                    Ekle</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
