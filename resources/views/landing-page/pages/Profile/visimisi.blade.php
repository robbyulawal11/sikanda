@extends('landing-page.layouts.app')

@section('content')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 800px;">
                <h6 class="text-primary text-uppercase">Profil Dekranasda</h6>
                <h1 class="display-5 text-uppercase mb-0">Visi dan Misi Dekranasda <br> Kota Sukabumi</h1>
            </div>
        </div>
    </div>

    <div class="container">
        @foreach ($profile as $profil)
            <p>
            <h2>Visi Dekranasda Kota Sukabumi:</h2>
            </p>
            <p>{!! $profil->visi !!}</p>
            <p><br>
            <h2>Misi Dekranasda Kota Sukabumi</h2>
            <p>{!! $profil->misi !!}</p>
        @endforeach
    </div>
@endsection
