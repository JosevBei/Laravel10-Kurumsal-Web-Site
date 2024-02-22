@extends('admin.layouts.master')

@section('title', 'Fotoğraf Ekle')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;">Fotoğraf Ekle</h6>
                    <hr>
                    <div class="card" style="margin-bottom: 400px;">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <form action="{{ route('galeries.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Fotoğraf Adı</label>
                                        <input type="text" name="title" class="form-control" required>
                                        @error('title')
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
