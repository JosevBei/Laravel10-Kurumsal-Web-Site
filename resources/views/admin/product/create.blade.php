@extends('admin.layouts.master')

@section('title', 'Ürün Ekle')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;">Ürün Ekle</h6>
                    <hr>
                    <div class="card" style="margin-bottom: 400px;">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select name="category_id" class="form-select" required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Ürün Adı</label>
                                        <input type="text" name="name" class="form-control" required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Açıklama</label>
                                        <textarea name="description" class="form-control" rows="3" required></textarea>
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Uzunluk</label>
                                        <input type="number" name="length" class="form-control" required>
                                        @error('length')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Genişlik</label>
                                        <input type="number" name="width" class="form-control" required>
                                        @error('width')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Ağırlık</label>
                                        <input type="number" name="weight" class="form-control" required>
                                        @error('weight')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Fotoğraf</label>
                                        <input type="file" name="image" class="form-control" required>
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    
                                    <div class="mb-3">
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
