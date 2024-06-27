@extends('landing-page.layouts.app')

@section('content')
    <div class="container">
        <p class="py-5">
        <h1>Geografis Kota Sukabumi</h1>
        </p>
        <div class='widget-content'>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15843.35269235799!2d106.8950941!3d-6.909945!3m2!1i1024!2i768!4f26.1!3m3!1m2!1s0x2e6836338e7b5a5d%3A0xdf66e45e7dbe8508!2sGERAI%20DEKRANASDA%20SUKABUMI%20CRAFT%20CENTER!5e0!3m2!1sen!2sid!4v1719286112575!5m2!1sen!2sid"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="container">
            @foreach ($profile as $profil)
                <p>{!! $profil->geografi !!}</p>
            @endforeach
        </div>
    @endsection
