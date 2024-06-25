@extends('dashboard.layouts.app')

@section('content')

<div class="d-flex flex-direction-row justify-content-end mb-3">
  <input class="form-control me-2 w-25" id="search" type="search" placeholder="Search" aria-label="Search">
</div>
<table class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col" class="text-center"><b>id</b></th>
        {{-- <th scope="col" class="text-center"><b>Gambar</b></th> --}}
        <th scope="col" class="text-center"><b>Judul</b></th>
        <th scope="col" class="text-center"><b>Penulis</b></th>
        {{-- <th scope="col" class="text-center"><b>Artikel</b></th> --}}
        <th scope="col" class="text-center"><b>Edit</b></th>
        <th scope="col" class="text-center"><b>Delete</b></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($paginateArticles as $article)
      <tr>
        <th scope="row">{{ $article->id }}</th>
        {{-- <td>
          @if($article->image && $article->image !== "1")
          <img src="{{ asset('images/articles/' . $article->image) }}" alt="{{ $article->title }}" width="75">
          @else
              No Image
          @endif
        </td> --}}
        <td>{{ $article->title }}</td>
        <td>{{ $article->author }}</td>
        {{-- <td>{!! Str::limit(($article->body),150) !!}</td> --}}
        <td><a href="{{ route('article.edit', ['article' => $article->id]) }}" class="btn btn-success"><i class="bi bi-pencil-square fs-3"></i></a></td>
        <td>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $article->id }}">
            <i class="bi bi-trash fs-3"></i>
          </button>

          <!-- Modal -->
          <div class="modal fade" id="deleteModal{{ $article->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $article->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel{{ $article->id }}">Peringatan</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h3>Apakah kamu yakin ingin menghapus data ini?</h3>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                  <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Ya! Saya yakin</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <!-- Pagination Links -->
  <div class="pagination-links">
    {{ $paginateArticles->links() }}
  </div>

  <script>
    const find = document.getElementById("search");
    const contents = document.querySelectorAll("tbody tr");

    find.addEventListener("input", (e) => findData(e.target.value));

    function findData(cari) {
        contents.forEach((content) => {
            if (content.innerText.toLowerCase().includes(cari.toLowerCase())) {
                content.classList.remove("d-none");
            } else {
                content.classList.add("d-none");
            }
        });
    }
</script>
  
@endsection
