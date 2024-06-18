@extends('dashboard.layouts.app')

@section('content')
    <h1>Manajemen Artikel</h1>
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Gambar</th>
            <th scope="col">Judul</th>
            <th scope="col">Penulis</th>
            <th scope="col">Artikel</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($article as $article)
          <tr>
            <th scope="row">{{ $article->id }}</th>
            <td><img src="{{ asset('images/articles/'. $article->image) }}" alt="{{ $article->title }}" width="75"></td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->author }}</td>
            <td>{{ Str::limit(($article->body),200) }}</td>
            <td><button type="button" class="btn btn-secondary"><a href="{{ route('edit', ['article' => $article->id]) }}">Edit</a></button></td>
            <td><form action="{{ route('delete', $article->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-secondary">Delete</button>
          </form></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    
@endsection
