<!-- resources/views/ast/excel_data/create_table.blade.php -->

@extends('admin.layouts.master')

@section('title', 'Yeni Excel Tablosu Oluştur')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;">ASTA - Yeni Excel Tablosu Oluştur</h6>
                    <hr>
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <h6 class="mt-4 mb-3 text-uppercase text-center" style="color: #923eb9ff;">
                                    {{ $person->name }} - Yeni Excel Tablosu Oluştur</h6>
                                <hr>
                                <form action="{{ route('excel-data.store-table', $person->id) }}" method="post">
                                    @csrf
                                    <div class="form-group mb-4">
                                        <label for="date">Tarih</label>
                                        <input type="date" name="date" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="product_type_id">Ürün Tipi</label>
                                        <select name="product_type_id" class="form-control">
                                            @foreach ($productTypes as $productType)
                                                <option value="{{ $productType->id }}">{{ $productType->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="quantity">Adet</label>
                                        <input type="number" name="quantity" class="form-control" required min="0">
                                    </div>
                                    <button type="submit" class="btn btn-success mt-4" style="width: 100%;">Tablo Oluştur</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
