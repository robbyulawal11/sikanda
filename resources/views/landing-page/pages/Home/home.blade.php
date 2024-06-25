    @extends('landing-page.layouts.app')
    @section('content')
        <!-- Hero Start -->
        <div class="container-fluid bg-primary py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row justify-content-start content">
                    <div class="col-lg-8 text-center text-lg-start">
                        <h1 class="display-1 text-uppercase text-white mb-lg-4">Sikanda</h1>
                        <h1 class="text-uppercase text-white mb-lg-4">Sistem Informasi Kerajinan Tangan Daerah Kota Sukabumi
                        </h1>
                        <p class="fs-4 text-white mb-lg-4">Tumbuh Bersama, Majukan Warisan Bangsa</p>
                        <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                            <a href="" class="btn btn-outline-light border-2 py-md-3 px-md-5 me-5">Read More</a>
                            <button type="button" class="btn-play" data-bs-toggle="modal"
                                data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-bs-target="#videoModal">
                                <span></span>
                            </button>
                            <h5 class="font-weight-normal text-white m-0 ms-4 d-none d-sm-block">Play Video</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Video Modal Start -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen
                                allowscriptaccess="always" allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video Modal End -->


        <!-- About Start -->
        <div class="container-fluid py-5 z-3">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded" src="{{ asset('assets/img/about-us.jpeg') }}"
                                style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="border-start border-5 border-primary ps-5 mb-5">
                            <h6 class="text-primary text-uppercase">About Us</h6>
                            <h1 class="display-5 text-uppercase mb-0">Visi Misi Dekranasda Kota Sukabumi</h1>
                        </div>
                        <h4 class="text-body mb-4">Dewan Kerajinan Nasional Daerah (DEKRANASDA)</h4>
                        <div class="bg-light p-4">
                            <ul class="nav nav-pills justify-content-between mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item w-50" role="presentation">
                                    <button class="nav-link text-uppercase w-100 active" id="pills-1-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab"
                                        aria-controls="pills-1" aria-selected="true">Our Mission</button>
                                </li>
                                <li class="nav-item w-50" role="presentation">
                                    <button class="nav-link text-uppercase w-100" id="pills-2-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2"
                                        aria-selected="false">Our Vission</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-1" role="tabpanel"
                                    aria-labelledby="pills-1-tab">
                                    @foreach ($profile as $profil)
                                        <p>{!! $profil->visi !!}</p>
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                                    @foreach ($profile as $profil)
                                        <p>{!! $profil->misi !!}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        @include('landing-page.pages.Catalog.catalog')

        <!-- Blog Start -->
        @include('landing-page.pages.Article.landing')
        <!-- Blog End -->
    @endsection
