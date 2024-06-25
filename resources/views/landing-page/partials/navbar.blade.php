<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <a href="/" class="navbar-brand ms-lg-5">
        <h1 class="m-0 text-uppercase text-dark"><img src="{{ asset('assets/media/images/logo.png') }}" height=62 width=62 alt="SIKANDA"></i> SIKANDA</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="{{ url('/') }}" class="nav-item nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle {{ Request::is('about', 'visimisi', 'sejarah', 'geografis', 'demografis') ? 'active' : '' }}" data-bs-toggle="dropdown">Profil</a>
                <div class="dropdown-menu m-0">
                    <a href="{{ url('about') }}" class="dropdown-item">Tentang</a>
                    <a href="{{ url('visimisi') }}" class="dropdown-item">Visi Misi</a>
                    <a href="{{ url('sejarah') }}" class="dropdown-item">Sejarah</a>
                    <a href="{{ url('geografis') }}" class="dropdown-item">Geografis</a>
                    <a href="{{ url('demografis') }}" class="dropdown-item">Demografis</a>
                </div>
            </div>
            <a href="{{ url('article') }}" class="nav-item nav-link {{ Request::is('article', 'article/show*', 'article/search*') ? 'active' : '' }}">Artikel</a>
            <a href="{{ url('gallery') }}" class="nav-item nav-link {{ Request::is('gallery') ? 'active' : '' }}">Galeri</a>
            <a href="{{ url('catalog') }}" class="nav-item nav-link {{ Request::is('catalog') ? 'active' : '' }}">Katalog</a>
            <a href="{{ route('dashboard') }}" class="nav-item nav-link nav-contact bg-primary text-white px-5 ms-lg-5">Login <i
                    class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</nav>
<!-- Navbar End -->
