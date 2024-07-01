@extends('dashboard.layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

@section('content')
    {{-- Search box --}}
    <div class="d-flex flex-direction-row justify-content-end mb-3">
        <input class="form-control me-2 w-25" id="search" type="search" placeholder="Cari" aria-label="Search">
    </div>

    {{-- toast notification --}}
    <div class="toast align-items-center text-bg-success border-0 " id="toast" data-delay="3000" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body text-white fs-5">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>

    <table id="showarticle" class="table table-striped table-hover fs-6">
        <thead>
            <tr>
                <th scope="col" class="text-center"><b>No</b></th>
                <th scope="col" class="text-center"><b>Tanggal</b></th>
                <th scope="col" class="text-center"><b>Judul</b></th>
                <th scope="col" class="text-center"><b>Penulis</b></th>
                <th scope="col" class="text-center"><b>Aksi</b></th>
                {{-- <th scope="col"> </th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($paginateArticles as $article)
                <tr>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{ $article->date_article->format('d M, Y') }}</td>
                    <td>{{ Str::limit($article->title, 75) }}</td>
                    <td>{{ $article->author }}</td>
                    <td class="text-nowrap"><a href="{{ route('article.edit', ['article' => $article->id]) }}"
                            class="btn btn-success"><i class="bi bi-pencil-square fs-3 ms-1"></i></a>

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
                                        <button type="button" class="btn btn-success"
                                            data-bs-dismiss="modal">Tidak</button>
                                        <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Ya! Saya yakin</button>
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
    {{-- <table>
        <tr id="no-results" class="d-none">
            <td colspan="5" class="text-center">Tidak ada hasil yang ditemukan</td>
        </tr>
    </table> --}}

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
            $('#showarticle').DataTable({
                "paging": false, // Disable default paging
                "language": {
                    "lengthMenu": "Menampilkan -- hasil per halaman",
                    "zeroRecords": "Tidak ada hasil yang ditemukan",
                    "infoEmpty": "Tidak ada hasil yang ditemukan",
                    "emptyTable": "Tidak ada hasil yang ditemukan",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                    "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                    "infoFiltered": "(Menyaring dari _MAX_ total data)",

                }

            });

            // Handle search input
            $('#search').on('keyup', function() {
                $('#showarticle').DataTable().search(this.value).draw();
            });

        });
    </script>

    @if (session('success'))
        <script>
            $(document).ready(function() {
                $('#toast').toast('show');
            });
        </script>
    @endif
@endsection
