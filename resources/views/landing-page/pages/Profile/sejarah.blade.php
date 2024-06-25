@extends('landing-page.layouts.app')

@section('content')

<div class="container">
    <p class="py-5"><h1>Sejarah Dekranasda Kota Sukabumi</h1></p>
    @foreach($profile as $profil)
    <p>{!! $profil->sejarah !!}</p>
    @endforeach
</div>
@endsection