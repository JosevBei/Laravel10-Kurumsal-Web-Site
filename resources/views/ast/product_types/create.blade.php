@extends('admin.layouts.master')

@section('title', 'Yeni Ürün Cinsi Ekle')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;">Yeni Ürün Cinsi Ekle</h6>
                    <hr>
                    <div class="card" style="margin-bottom: 400px;">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <form action="{{ route('product-types.store') }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Ürün Cinsi Adı</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-12 mt-3">
                                        <label class="form-label">Fiyat (₺)</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="price" step="0.01" required>
                                            <span class="input-group-text">₺</span>
                                        </div>
                                    </div>
                                    @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                        <div class="d-grid mt-3">
                                            <button type="submit" class="btn btn-primary">Ekle</button>
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
