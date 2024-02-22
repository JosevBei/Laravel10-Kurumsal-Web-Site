@extends('admin.layouts.master')

@section('title', 'Profilim')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;"><ion-icon name="person-sharp"></ion-icon> Profilim</h6>
                    <hr>
                    <div class="card" style="margin-bottom: 400px;">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <form action="{{ route('profile.update', $user) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label class="form-label">İsim Soyisim</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $user->name) }}" required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">E-Post</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email', $user->email) }}" required>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
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
