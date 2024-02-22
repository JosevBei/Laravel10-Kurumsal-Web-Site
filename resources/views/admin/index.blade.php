@extends('admin.layouts.master')
@section('title', 'Yönetim Paneli')
@section('content')





    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content">

            <!--start breadcrumb-->
            <!--end breadcrumb-->


            <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-4">
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="fs-5">
                                    <ion-icon name="eye-outline"></ion-icon>
                                </div>
                                <div>
                                    <p class="mb-0">Görüntülenme</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <div>
                                    <h5 class="mb-0">{{ number_format($statistics['viewCount'], 0, ',', '.') }}
                                    </h5>
                                </div>
                                <div class="ms-auto" id="chart1"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="fs-5">
                                    <ion-icon name="cube-outline"></ion-icon>
                                </div>
                                <div>
                                    <p class="mb-0">Ürün Sayısı</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <div>
                                    <h5 class="mb-0">{{ $statistics['totalProducts'] }}</h5>
                                </div>
                                <div class="ms-auto" id="chart2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="fs-5">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div>
                                    <p class="mb-0">Teklif Sayısı</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <div>
                                    <h5 class="mb-0">{{ $statistics['totalOffers'] }}</h5>
                                </div>
                                <div class="ms-auto" id="chart3"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center gap-2">
                                <div class="fs-5">
                                    <ion-icon name="mail-outline"></ion-icon>
                                </div>
                                <div>
                                    <p class="mb-0">Mesaj Sayısı</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mt-3">
                                <div>
                                    <h5 class="mb-0">{{ $statistics['totalMessages'] }}</h5>
                                </div>
                                <div class="ms-auto" id="chart4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->




            <div class="row">
                <!-- Admin Index Blade -->
                <div class="col-12 col-lg-8 col-xl-8 d-flex">
                    <div class="card radius-10 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <h6 class="mb-0">En Popüler Ürünler</h6>
                                <div class="ms-auto">
                                    <div class="d-flex align-items-center font-13 gap-2">
                                        <span class="border px-1 rounded cursor-pointer"><i
                                                class="bx bxs-circle me-1 text-primary"></i>Görüntülenme Sayısı</span>
                                    </div>
                                </div>
                            </div>
                            <div class="chart-container1">
                                <canvas id="chart5"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4 col-xl-4 d-flex">
                    <div class="card radius-10 overflow-hidden w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <h6 class="mb-0">Kategori Durumu</h6>
                            </div>
                            <div class="chart-container6">
                                <div class="piechart-legend">
                                    <h2 class="mb-1">{{ $statistics['totalProducts'] }}</h2>
                                    <h6 class="mb-0">Toplam Ürün</h6>
                                </div>
                                <canvas id="chart6"></canvas>
                            </div>
                        </div>
                        <ul class="list-group list-group-flush">
                            @foreach ($categories as $category)
                                <li class="list-group-item d-flex justify-content-between align-items-center border-top">
                                    {{ $category->name }}
                                    <span class="badge bg-tiffany rounded-pill">{{ $category->products_count }}</span>
                                </li>
                            @endforeach
                        </ul>



                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
        <!-- end page content-->
    </div>
    <!-- Örnek olarak Chart.js kullanımı -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var popularProductNames = {!! json_encode($popularProductStats['popularProductNames']) !!};
        var popularProductHits = {!! json_encode($popularProductStats['popularProductHits']) !!};

        var ctx5 = document.getElementById('chart5').getContext('2d');
        var chart5 = new Chart(ctx5, {
            type: 'bar',
            data: {
                labels: popularProductNames,
                datasets: [{
                    label: 'Görüntülenme',
                    data: popularProductHits,
                    backgroundColor: [
                        '#923eb9', '#18bb6b', '#ffab4d', '#3498db', '#e74c3c',
                        '#2ecc71', '#f39c12', '#1abc9c', '#9b59b6', '#d35400',
                        '#34495e', '#c0392b', '#27ae60', '#f1c40f', '#7f8c8d',
                        '#3498db', '#e74c3c', '#2ecc71', '#f39c12', '#1abc9c',
                        '#c0392b', '#27ae60', '#f1c40f', '#7f8c8d', '#3498db',
                        '#e74c3c', '#2ecc71', '#f39c12', '#1abc9c', '#c0392b',
                        '#27ae60', '#f1c40f', '#7f8c8d', '#3498db', '#e74c3c',
                        '#2ecc71', '#f39c12', '#1abc9c', '#c0392b', '#27ae60',
                        '#f1c40f', '#7f8c8d', '#3498db', '#e74c3c', '#2ecc71',
                        '#f39c12', '#1abc9c', '#c0392b', '#27ae60', '#f1c40f',
                        '#7f8c8d', '#3498db', '#e74c3c', '#2ecc71', '#f39c12',
                        '#1abc9c', '#c0392b', '#27ae60', '#f1c40f', '#7f8c8d',
                        '#3498db', '#e74c3c', '#2ecc71', '#f39c12', '#1abc9c',
                        '#c0392b', '#27ae60', '#f1c40f', '#7f8c8d', '#3498db',
                        '#e74c3c', '#2ecc71', '#f39c12', '#1abc9c', '#c0392b',
                        '#27ae60', '#f1c40f', '#7f8c8d', '#3498db', '#e74c3c',
                        '#2ecc71', '#f39c12', '#1abc9c', '#c0392b', '#27ae60',
                        '#f1c40f', '#7f8c8d', '#3498db', '#e74c3c', '#2ecc71'
                    ],
                    tension: 0.4,
                    borderColor: '#923eb9',
                    borderWidth: 0,
                    borderRadius: 0
                }]
            },
            options: {
                maintainAspectRatio: false,
                barPercentage: 0.7,
                categoryPercentage: 0.35,
                plugins: {
                    legend: {
                        maxWidth: 20,
                        boxHeight: 20,
                        position: 'bottom',
                        display: true,
                    }
                },
                scales: {
                    x: {
                        stacked: false,
                        beginAtZero: true
                    },
                    y: {
                        stacked: false,
                        beginAtZero: true
                    }
                }
            }
        });

        //Chart 6
        var categoryData = {!! json_encode($categoryStats) !!};

        var ctx6 = document.getElementById('chart6').getContext('2d');
        var chart6 = new Chart(ctx6, {
            type: 'pie',
            data: {
                labels: categoryData.map(category => category.name),
                datasets: [{
                    data: categoryData.map(category => category.productCount),
                    backgroundColor: [
                        '#923eb9', '#18bb6b', '#ffab4d', '#3498db', '#e74c3c',
                        '#2ecc71', '#f39c12', '#1abc9c', '#9b59b6', '#d35400',
                        '#34495e', '#c0392b', '#27ae60', '#f1c40f', '#7f8c8d',
                        '#3498db', '#e74c3c', '#2ecc71', '#f39c12', '#1abc9c',
                        '#c0392b', '#27ae60', '#f1c40f', '#7f8c8d', '#3498db',
                        '#e74c3c', '#2ecc71', '#f39c12', '#1abc9c', '#c0392b',
                        '#27ae60', '#f1c40f', '#7f8c8d', '#3498db', '#e74c3c',
                        '#2ecc71', '#f39c12', '#1abc9c', '#c0392b', '#27ae60',
                        '#f1c40f', '#7f8c8d', '#3498db', '#e74c3c', '#2ecc71',
                        '#f39c12', '#1abc9c', '#c0392b', '#27ae60', '#f1c40f',
                        '#7f8c8d', '#3498db', '#e74c3c', '#2ecc71', '#f39c12',
                        '#1abc9c', '#c0392b', '#27ae60', '#f1c40f', '#7f8c8d',
                        '#3498db', '#e74c3c', '#2ecc71', '#f39c12', '#1abc9c',
                        '#c0392b', '#27ae60', '#f1c40f', '#7f8c8d', '#3498db',
                        '#e74c3c', '#2ecc71', '#f39c12', '#1abc9c', '#c0392b',
                        '#27ae60', '#f1c40f', '#7f8c8d', '#3498db', '#e74c3c',
                        '#2ecc71', '#f39c12', '#1abc9c', '#c0392b', '#27ae60',
                        '#f1c40f', '#7f8c8d', '#3498db', '#e74c3c', '#2ecc71'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                cutout: 105,
                plugins: {
                    legend: {
                        display: false,
                    }
                }
            }
        });
    </script>
@endsection
