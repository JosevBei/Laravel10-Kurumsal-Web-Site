@extends('admin.layouts.master')

@section('title', 'Kişiyi Düzenle')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;">Kişiyi Düzenle</h6>
                    <hr>
                    <div class="card" style="margin-bottom: 400px;">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <form action="{{ route('people.update', $person->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-12">
                                        <label class="form-label">Kişi Adı</label>
                                        <input type="text" class="form-control" name="name" value="{{ $person->name }}"
                                            required>
                                    </div>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-12 mt-3">
                                        <label class="form-label">Kişi Tipi</label>
                                        <select class="form-select" name="type" required>
                                            <option value="Cari" {{ $person->type === 'Cari' ? 'selected' : '' }}>Cari</option>
                                            <option value="Tedarikci" {{ $person->type === 'Tedarikci' ? 'selected' : '' }}>Tedarikçi</option>
                                        </select>
                                    </div>
                                    @error('type')
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
