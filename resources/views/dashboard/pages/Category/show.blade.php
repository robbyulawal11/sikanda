@extends('dashboard.layouts.app')
@section('content')
    <div class="d-flex flex-direction-row justify-content-end mb-3">
        <input class="form-control me-2 w-25" id="search" type="search" placeholder="Search" aria-label="Search">
    </div>
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->namaKategori }}</td>
                    <td>{{ $item->descKategori }}</td>
                    <td>
                        <a href="{{ route('category.edit', $item->id) }}" class="btn btn-success"><i
                                class="bi bi-pencil-square fs-3"></i></a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal"><i class="bi bi-trash fs-3"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tidak</button>
                    <form action="{{ route('category.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Ya! Saya yakin</button>
                    </form>
                </div>
            </div>
        </div>
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
