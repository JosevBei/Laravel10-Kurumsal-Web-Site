@extends('admin.layouts.master')

@section('title', 'Yeni Kişi Ekle')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;">Yeni Kişi Ekle</h6>
                    <hr>
                    <div class="card" style="margin-bottom: 400px;">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <form action="{{ route('people.store') }}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <label class="form-label">Kişi Adı</label>
                                        <input type="text" class="form-control" name="name" required>
                                    </div>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-12 mt-3">
                                        <label class="form-label">Kişi Tipi</label>
                                        <select class="form-select" name="type" required>
                                            <option value="Cari">Cari</option>
                                            <option value="Tedarikci">Tedarikçi</option>
                                        </select>
                                    </div>
                                    @error('type')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-12 mt-3">
                                        <div class="d-grid">
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
