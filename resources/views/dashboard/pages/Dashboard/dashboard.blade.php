@extends('dashboard.layouts.app')

@section('content')
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            <!--begin::Row-->
            <div class="d-flex flex-column justify-content-start gx-5 gx-xl-10">
                <!--begin::Col-->

                <h1>Selamat Datang {{ $user->name }}!</h1>

                <!--begin::Row-->
                <div class="d-flex flex-column justify-content-start g-5 g-xl-10 mb-xl-5">
                    <!--begin::Col-->
                    <div class="col-md-4 mb-md-5 mb-xl-10">
                        <!--begin::Card widget 7-->
                        <div class="card card-flush h-md-50 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-5">
                                <!--begin::Title-->
                                <div class="card-title d-flex flex-column">
                                    <!--begin::Amount-->
                                    <span class="fs-2hx fw-bold text-dark me-2 lh-1 ls-n2">{{ $countUser }}</span>
                                    <!--end::Amount-->
                                    <!--begin::Subtitle-->
                                    <span class="text-gray-400 pt-1 fw-semibold fs-6">Jumlah Total Pengguna</span>
                                    <!--end::Subtitle-->
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Card body-->
                            <div class="card-body d-flex flex-column justify-content-end pe-0">
                                <!--begin::Title-->
                                {{-- <span class="fs-6 fw-bolder text-gray-800 d-block mb-2">Pengguna Baru</span> --}}
                                <!--end::Title-->
                                <!--begin::Users group-->
                                <div class="symbol-group symbol-hover flex-nowrap">
                                    {{-- @foreach ($todayHeroes as $hero)
                                                                  <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" title="{{ $hero->name }}">
                                                                      @if ($hero->image)
                                                                          <img alt="Pic" src="{{ asset('path/to/images/' . $hero->image) }}" />
                                                                      @else
                                                                          <span class="symbol-label bg-{{ $hero->bg_color }} text-inverse-{{ $hero->bg_color }} fw-bold">{{ strtoupper(substr($hero->name, 0, 1)) }}</span>
                                                                      @endif
                                                                  </div>
                                                              @endforeach
                                                              <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                                                                  <span class="symbol-label bg-light text-gray-400 fs-8 fw-bold">+{{ $remainingHeroesCount }}</span>
                                                              </a> --}}
                                </div>
                                <!--end::Users group-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card widget 7-->
                    </div>
                    <!--end::Col-->
                    <div class="d-flex flex-column flex-md-row justify-content-start justify-content-md-between">

                        <div class="card card-flush p-3 w-md-50 mb-10">
                            <!--begin::Header-->
                            <div>
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark text-center">Sebaran Jenis Pengguna</span>
                                </h3>
                                <!--end::Title-->

                                <!--begin::Toolbar-->
                                <div class="min-h-auto ps-4 pe-6" style="height: 400px; min-height: 315px;">
                                    <canvas id="userChart" width="80" height="80"></canvas>
                                </div>
                            </div>
                        </div>
                        <!--begin::List widget 6-->
                        <div class="card card-flush h-md-100">
                            <!--begin::Header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">Jumlah Total Unggahan</span>

                                    <canvas id="barChart" width="auto" height="350" style="min-width: 400px"></canvas>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Content container-->
                    </div>
                </div>
            </div>
            <!--end::Content-->


            <script>
                var ctx = document.getElementById('barChart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: <?php echo json_encode($chartData['labels']); ?>,
                        datasets: [{
                            label: 'Jumlah',
                            data: <?php echo json_encode($chartData['data']); ?>,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)'
                            ],
                        }]
                    },
                    options: {
                        indexAxis: 'y',
                        scales: {
                            xAxes: [{
                                stacked: true
                            }]
                        }
                    }
                });
            </script>



            <script>
                var ctx = document.getElementById('userChart').getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'doughnut', // Set chart type to doughnut
                    data: {
                        labels: <?php echo json_encode($chartUser['labels']); ?>,
                        datasets: [{
                            label: 'User Roles',
                            data: <?php echo json_encode($chartUser['data']); ?>,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)', // Penjual (red)
                                'rgba(54, 162, 235, 0.2)', // Galeri (blue)
                                'rgba(255, 206, 86, 0.2)' // Lainnya (yellow)
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)'
                            ],
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Sebaran Jenis Pengguna', // Set chart title
                            position: 'top' // Position the title on top
                        }
                    }
                });
            </script>





        </div>
    @endsection
