@extends('dashboard.layouts.app')

@section('content')
    <h1>Edit Artikel</h1>
    <section id="edit_article">
        <div class="container">
          <form method="post" action="{{ route('update', ['article'=> $article]) }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Title</label>
              <input type="text" name="title" class="form-control" value="{{ $article->title }}">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Penulis</label>
              <input type="text" name="author" class="form-control" value="{{ $article->author }}">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Artikel</label>
              <textarea class="form-control" name="body" rows="3">{{ $article->body }}</textarea>
            </div>
            <div class="mb-3">
              <img src="{{ asset('images/articles/'. $article->image) }}" alt="{{ $article->title }}" width="75"></td>
              <label for="exampleInputEmail1" class="form-label">Upload Gambar</label>
              <br>
              <input type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </section>
@endsection