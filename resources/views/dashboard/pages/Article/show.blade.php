@extends('dashboard.layouts.app')

@section('content')
    <h1>Manajemen Artikel</h1>
    <div class="d-flex justify-content-between mb-3">
      <form class="form-inline" method="GET" action="{{ route('article.index') }}">
          {{-- <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" value="{{ request()->search }}">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> --}}
      </form>
    </div>
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col" class="text-center"><b>id</b></th>
            <th scope="col" class="text-center"><b>Gambar</b></th>
            <th scope="col" class="text-center"><b>Judul</b></th>
            <th scope="col" class="text-center"><b>Penulis</b></th>
            <th scope="col" class="text-center"><b>Artikel</b></th>
            <th scope="col" class="text-center"><b>Edit</b></th>
            <th scope="col" class="text-center"><b>Delete</b></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($paginateArticles as $article)
          <tr>
            <th scope="row">{{ $article->id }}</th>
            <td>
              @if($article->image && $article->image !== "1")
              <img src="{{ asset('images/articles/' . $article->image) }}" alt="{{ $article->title }}" width="75">
              @else
                  No Image
              @endif
            </td>
            <td>{{ $article->title }}</td>
            <td>{{ $article->author }}</td>
            <td>{!! Str::limit(($article->body),150) !!}</td>
            <td><button type="button" class="btn btn-success"><a href="{{ route('article.edit', ['article' => $article->id]) }}">Edit</a></button></td>
            <td><form action="{{ route('article.destroy', $article->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
          </form></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <!-- Pagination Links -->
    <div class="pagination-links">
      {{ $paginateArticles->links() }}
  </div>
@endsection
