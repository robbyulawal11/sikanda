    <!-- Footer Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container pt-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">DEKRANASDA</h5>
                    <p class="mb-4"><b>DEWAN KERAJINAN NASIONAL DAERAH KOTA SUKABUMI</b></br>
                        Pusat Informasi Promosi dan Perdagangan Hasil Kerajinan Kota Sukabumi</p>
                    @foreach ($profile as $profil)
                        <p class="mb-2"><i class="bi bi-geo-alt text-primary me-2"></i>{!! $profil->alamatDeskanasda !!}</p>
                    @endforeach
                    @foreach ($profile as $profil)
                        <p class="mb-2"><i class="bi bi-envelope-open text-primary me-2"></i>{!! $profil->emailDeskranasda !!}</p>
                    @endforeach
                    @foreach ($profile as $profil)
                        <p class="mb-0"><i class="bi bi-telephone text-primary me-2"></i>{!! $profil->noTeleponDeskranasda !!}</p>
                    @endforeach


                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Profil</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="about"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Tentang</a>
                        <a class="text-body mb-2" href="visimisi"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Visi Misi</a>
                        <a class="text-body mb-2" href="sejarah"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Sejarah</a>
                        <a class="text-body mb-2" href="geografis"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Geografis</a>
                        <a class="text-body mb-2" href="demografis"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Demografis</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Tautan Pintas</h5>
                    <div class="d-flex flex-column justify-content-start">
                        <a class="text-body mb-2" href="{{ url('/') }}"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Beranda</a>
                        <a class="text-body mb-2" href="{{ url('article') }}"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Artikel</a>
                        <a class="text-body mb-2" href="{{ url('gallery') }}"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Galeri</a>
                        <a class="text-body mb-2" href="{{ url('catalog') }}"><i
                                class="bi bi-arrow-right text-primary me-2"></i>Katalog</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase border-start border-5 border-primary ps-3 mb-4">Ikuti Kami</h5>
                    <div class="d-flex">
                        @foreach ($profile as $profil)
                            <a class="btn btn-outline-primary btn-square me-2" href="{{ $profil->linkInstagram }}"><i
                                    class="bi bi-instagram"></i></a>
                            <a class="btn btn-outline-primary btn-square me-2" href="{{ $profil->linkFacebook }}"><i
                                    class="bi bi-facebook"></i></a>
                            <a class="btn btn-outline-primary btn-square me-2" href="{{ $profil->linkTwitter }}"><i
                                    class="bi bi-twitter"></i></a>
                        @endforeach

                    </div>
                </div>
                {{-- <div class="col-12 text-center text-body">
                    <a class="text-body" href="">Terms & Conditions</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Privacy Policy</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Customer Support</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Payments</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">Help</a>
                    <span class="mx-1">|</span>
                    <a class="text-body" href="">FAQs</a>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark text-white-50 py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-white" href="#">Sikanda 2024</a>. All Rights
                        Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-white" href="https://htmlcodex.com">Kelompok 1 JDA</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->
