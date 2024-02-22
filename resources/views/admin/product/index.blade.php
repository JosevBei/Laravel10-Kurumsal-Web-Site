@extends('admin.layouts.master')

@section('title', 'Ürünler')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;"><ion-icon name="apps-sharp"></ion-icon> Ürünler</h6>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            @if (count($products) > 0)
                                <table class="table mb-0">
                                    <thead style="color: #874c9e;">
                                        <tr>
                                            <th scope="col">Ürün</th>
                                            <th scope="col">Ürün Adı</th>
                                            <th scope="col">Açıklaması</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col">Düzenle | Sil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr style="color: #874c9e;">
                                                <th><img src="{{ asset('uploads/products/' . $product->image) }}
                                                    " alt="{{ $product->name }}" style="width: 75px;"></th>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>{{ $product->category->name }}</td>
                                                <td>
                                                    <a href="{{ route('products.edit', $product) }}"
                                                        class="btn btn-sm btn-primary">Düzenle</a>
                                                    <form action="{{ route('products.destroy', $product) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Silmek istediğine emin misin?')">Sil</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>Henüz Ürün Eklenmemiş.</p>
                                <a href="{{route('products.create')}}">Ürün Ekle</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
