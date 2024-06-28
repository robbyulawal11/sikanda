@extends('landing-page.layouts.app')

<style>
    .no-spacing p {
        margin: 0;
        padding: 0;
    }

    .no-spacing p:empty {
        display: none;
    }
</style>

@section('content')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 800px;">
                <h6 class="text-primary text-uppercase">Profil Dekranasda</h6>
                <h1 class="display-5 text-uppercase mb-0">Sejarah Dekranasda <br> Kota Sukabumi</h1>
            </div>
        </div>
    </div>


    <div class="container no-spacing">
        @foreach ($profile as $profil)
            {!! $profil->sejarah !!}
        @endforeach
    </div>
@endsection
