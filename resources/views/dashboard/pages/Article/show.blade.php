@extends('dashboard.layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

@section('content')
    <div class="d-flex flex-direction-row justify-content-end mb-3">
        <input class="form-control me-2 w-25" id="search" type="search" placeholder="Pencarian..." aria-label="Search">
    </div>
    <table id="showarticle" class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col" class="text-center"><b>No</b></th>
                <th scope="col" class="text-center"><b>Judul</b></th>
                <th scope="col" class="text-center"><b>Penulis</b></th>
                <th scope="col" class="text-right"><b>Aksi</b></th>
                <th scope="col"> </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paginateArticles as $article)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ Str::limit($article->title, 75) }}</td>
                    <td>{{ $article->author }}</td>
                    <td><a href="{{ route('article.edit', ['article' => $article->id]) }}" class="btn btn-success"><i
                                class="bi bi-pencil-square fs-3 ms-1"></i></a></td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $article->id }}">
                            <i class="bi bi-trash fs-3 ms-1"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{ $article->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel{{ $article->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title" id="exampleModalLabel{{ $article->id }}">Peringatan</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tidak</button>
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
            <tr id="no-results" class="d-none">
                <td colspan="5" class="text-center">Tidak ada hasil yang ditemukan</td>
            </tr>
        </tbody>
    </table>

    <!-- Pagination Links -->
    <div class="pagination-links pagination-lg">
        {{ $paginateArticles->links() }}
    </div>

    <script>
        const find = document.getElementById("search");
        const contents = document.querySelectorAll("tbody tr:not(#no-results)");
        const noResults = document.getElementById("no-results");

        find.addEventListener("input", (e) => findData(e.target.value));

        function findData(searchText) {
            let hasResults = false;

            contents.forEach((content) => {
                if (content.innerText.toLowerCase().includes(searchText.toLowerCase())) {
                    content.classList.remove("d-none");
                    hasResults = true;
                } else {
                    content.classList.add("d-none");
                }
            });

            if (hasResults) {
                noResults.classList.add("d-none");
            } else {
                noResults.classList.remove("d-none");
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#showarticle').DataTable();
        });
    </script>
@endsection
