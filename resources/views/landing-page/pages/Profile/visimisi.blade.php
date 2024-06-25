@extends('landing-page.layouts.app')

@section('content')

<div class="container">
    <p class="py-5"><h1>Visi Misi Dekranasda Kota Sukabumi</h1></p>
    @foreach($profile as $profil)
    <p>{!! $profil->visi !!}</p>
    <p>{!! $profil->misi !!}</p>
    @endforeach
</div>
@endsection