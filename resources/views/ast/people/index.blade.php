@extends('admin.layouts.master')

@section('title', 'Kişiler')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-xl-12 mx-auto">

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0 text-uppercase" style="color: #f3a01d;">
                            <ion-icon name="people"></ion-icon> AST - Kişiler
                        </h6>
                        <a href="{{ route('people.create') }}" class="btn btn-sm btn-success"><ion-icon
                                name="add-circle"></ion-icon> Yeni Kişi Ekle</a>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-body">
                            @if (count($people) > 0)
                                <table class="table mb-0">
                                    <thead style="color: #874c9e">
                                        <tr>
                                            <th scope="col">Sıra</th>
                                            <th scope="col">Kişi Adı</th>
                                            <th scope="col">Kişi Tipi</th>
                                            <th scope="col">İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1;
                                        @endphp

                                        @foreach ($people as $person)
                                            <tr style="color: #874c9e;">
                                                <th scope="row">{{ $counter++ }}</th>
                                                <td>{{ $person->name }}</td>
                                                <td>{{ $person->type }}</td>
                                                <td>
                                                    <a href="{{ route('people.edit', $person->id) }}"
                                                        class="btn btn-sm btn-primary">Düzenle</a>
                                                    <form action="{{ route('people.destroy', $person->id) }}" method="POST"
                                                        class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Kişiyi silmek istediğine emin misin? Bu işlem geri alınamaz. Kişi: {{ $person->name }}')">Sil</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @else
                                <p>Henüz kişi eklenmemiş.</p>
                                <a href="{{ route('people.create') }}" class="btn btn-success">Yeni Kişi Ekle</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
