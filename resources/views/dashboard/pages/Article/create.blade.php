@extends('dashboard.layouts.app')

@section('content')
    <h1>Buat Artikel</h1>
    <section id="create_article">
        <div class="container w-100">
          <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Judul</label>
              <input type="text" name="title" placeholder="Judul Artikel" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Penulis</label>
              <input type="text" name="author" placeholder="Nama Penulis Artikel" class="form-control">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Artikel</label>
              <textarea class="form-control" placeholder="Isi Artikel" name="body" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Upload Gambar</label>
              <br>
              <input type="file" name="image">
            </div>
            <button type="submit" class="btn btn-secondary">Submit</button>
          </form>
        </div>
    </section>
@endsection