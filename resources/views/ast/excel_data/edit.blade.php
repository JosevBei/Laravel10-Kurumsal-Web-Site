@extends('admin.layouts.master')

@section('title', 'Tablo Düzenle')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-8 mx-auto">
                    <h6 class="mb-0 text-uppercase" style="color: #f3a01d;">ASTA - Tablo Düzenle</h6>
                    <hr>
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-body">
                            <div class="border p-3 rounded">
                                <h6 class="mt-4 mb-3 text-uppercase text-center" style="color: #923eb9ff;">
                                    {{ $person->name }} - Tablo Düzenle</h6>
                                <hr>
                                <form
                                    action="{{ route('excel-data.update-table', ['person' => $person->id, 'table' => $table->id]) }}"
                                    method="post">
                                    @csrf
                                    @method('put')
                                    <!-- Tarih Düzenleme -->
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Tarih:</label>
                                        <input type="date" class="form-control" id="date" name="date"
                                            value="{{ $table->date }}">
                                    </div>

                                    <!-- Adet Düzenleme -->
                                    <div class="mb-3">
                                        <label for="quantity" class="form-label">Adet:</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                            value="{{ $table->quantity }}">
                                    </div>

                                    <!-- Fiyat Düzenleme -->
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Fiyat:</label>
                                        <input type="number" class="form-control" id="amount" name="amount"
                                            value="{{ $table->amount }}">
                                    </div>



                                    <!-- Diğer düzenlenecek alanlar buraya eklenecek -->

                                    <button type="submit" class="btn btn-success">Kaydet</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
