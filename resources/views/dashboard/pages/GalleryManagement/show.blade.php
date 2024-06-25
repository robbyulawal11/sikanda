@extends('dashboard.layouts.app')

@section('content')
    <div class="d-flex flex-direction-row justify-content-end mb-3">
        <input class="form-control me-2 w-25" id="search" type="search" placeholder="Search" aria-label="Search">
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Gambar</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Author</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td><img src="{{ asset('images/galeries/' . $item->gambar) }}" alt="{{ $item->id }}" width="75">
                    </td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->author }}</td>
                    <td><button type="button" class="btn btn-success"><a href="{{ route('gallery.edit', $item->id) }}"><i
                                    class="bi bi-pencil-square fs-3"></i></a></button></td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $item->id }}"><i class="bi bi-trash fs-3"></i></button>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel{{ $item->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel{{ $item->id }}">Peringatan
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h3>Apakah kamu yakin ingin menghapus data ini?</h3>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Tidak</button>
                                        <form action="{{ route('gallery.destroy', $item->id) }}" method="POST">
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
