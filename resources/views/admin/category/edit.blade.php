@extends('admin.layouts.master')
@section('title', 'Kategori Düzenle')
@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <!---------Form Yapısı------------>
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;">Kategori Düzenle</h6>
                    <hr>
                    <div class="card" style="margin-bottom: 400px;">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <form action="{{ route('categories.update', $category) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <label class="form-label">Kategori Adı</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}" required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
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
            <!-- end form content-->
        </div>
        <!-- end page content-->
    </div>
@endsection
