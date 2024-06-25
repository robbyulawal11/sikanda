@extends('landing-page.layouts.app')

@section('content')

<div class="container">
    <p class="py-5"><h1>Tentang Dekranasda Kota Sukabumi</h1></p>
    @foreach($profile as $profil)
    <p>{!! $profil->tentang !!}</p>
    @endforeach
    
    <h1>Struktur Organisasi Dekranasda</h1>
    <img src="https://i.pinimg.com/736x/70/7d/33/707d337694d84264e3afc44dfc35b018.jpg">
</div>
@endsection