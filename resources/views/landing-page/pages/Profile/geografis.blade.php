@extends('landing-page.layouts.app')

<style>
    .full-width-map {
        width: 100%;
        height: 450px;
        /* Adjust height as needed */
    }

    .full-width-map iframe {
        width: 100% !important;
        height: 100% !important;
    }
</style>

@section('content')
    <div class="container">
        <div class="container-fluid py-5">
            <div class="container">
                <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 800px;">
                    <h6 class="text-primary text-uppercase">Profil Dekranasda</h6>
                    <h1 class="display-5 text-uppercase mb-0">Geografis <br> Kota Sukabumi</h1>
                </div>
            </div>
        </div>

        <div class='widget-content full-width-map container'>
            {!! $profil->alamatPetaDekranasda !!}
        </div>
        <div class="container">
            @foreach ($profile as $profil)
                <p>{!! $profil->geografi !!}</p>
            @endforeach
        </div>
    </div>
@endsection
