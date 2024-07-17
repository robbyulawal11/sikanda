@extends('landing-page.layouts.app')

@section('content')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 800px;">
                <h6 class="text-primary text-uppercase">Profil Dekranasda</h6>
                <h1 class="display-5 text-uppercase mb-0">Tentang Dekranasda <br> Kota Sukabumi</h1>
            </div>
        </div>
    </div>

    <div class="container bg-light p-3">
        <p class=>
        <h1>Tentang Dekranasda Kota Sukabumi</h1>
        </p>
        @foreach ($profile as $profil)
            <p>{!! $profil->tentang !!}</p>
        @endforeach

        <h1>Struktur Organisasi Dekranasda</h1>
        <img src="{{ asset('images/profiles/' . $profil->gambarStrukturOrganisasi) }}"
            class="img-fluid rounded mx-auto d-block">
    </div>
@endsection
