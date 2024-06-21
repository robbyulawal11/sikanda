@extends('dashboard.layouts.app')

@section('content')
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
            <td><button type="button" class="btn btn-success"><a href="{{ route('article.edit', ['article' => $article->id]) }}"><i class="bi bi-pencil-square fs-3"></i></a></td>
            <td>
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash fs-3"></i></button>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    <!-- Pagination Links -->
    <div class="pagination-links">
      {{ $paginateArticles->links() }}
  </div>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Peringatan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <h3>Apakah kamu yakin ingin menghapus data ini?</h3>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <form action="{{ route('catalog.destroy', $article->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-primary">Ya! Saya yakin</button>
                </form>
                </div>
            </div>
            </div>
        </div>
@endsection
