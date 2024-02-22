@extends('admin.layouts.master')

@section('title', 'Ürün Cinsini Düzenle')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;">Ürün Cinsini Düzenle</h6>
                    <hr>
                    <div class="card" style="margin-bottom: 400px;">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <form action="{{ route('product-types.update', $productType->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <label class="form-label">Ürün Cinsi Adı</label>
                                        <input type="text" class="form-control" name="name" value="{{ $productType->name }}"
                                            required>
                                    </div>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-12 mt-3">
                                        <label class="form-label">Fiyat (₺)</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="price" step="0.01"
                                                value="{{ $productType->price }}" required>
                                            <span class="input-group-text">₺</span>
                                        </div>
                                    </div>
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                    <div class="col-12 mt-3">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Güncelle</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
