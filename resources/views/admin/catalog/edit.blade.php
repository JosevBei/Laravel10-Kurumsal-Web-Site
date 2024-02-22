@extends('admin.layouts.master')

@section('title', 'Kataloğu Güncelle')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;">Kataloğu Güncelle</h6>
                    <hr>
                    <div class="card" style="margin-bottom: 400px;">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <form action="{{ route('catalog.update', $catalogs->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">

                                        <div class="form-group">
                                            <br>
                                            <p>{{ $catalogs->pdf }}</p>
                                            <input type="file" id="pdf" name="pdf" class="form-control">
                                        </div>


                                        <div class="form-group mt-3">
                                            <button type="submit" class="btn btn-primary btn-block" style="width: 100%;">
                                                Güncelle</button>
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
