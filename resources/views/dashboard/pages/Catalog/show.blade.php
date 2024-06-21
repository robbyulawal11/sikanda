@extends('dashboard.layouts.app')

@section('content')
    <div class="d-flex flex-direction-row justify-content-between mb-3">
        <h1>SIKANDA Catalog</h1>
        <input class="form-control me-2 w-25" id="search" type="search" placeholder="Search" aria-label="Search">
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Seller</th>
                <th scope="col">Harga</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Whatsapp</th>
                <th scope="col">Instagram</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($catalog as $c)
                <tr>
                    <th scope="row">{{ $c->id }}</th>
                    <td><img src="{{ asset('images/catalogs/' . $c->image) }}" alt="{{ $c->id }}" width="75">
                    </td>
                    <td>{{ $c->nama }}</td>
                    <td>{{ $c->seller }}</td>
                    <td>Rp. {{ number_format($c->harga, 0, ',', '.') }}</td>
                    <td>{{ $c->deskripsi }}</td>
                    <td>{{ $c->wa }}</td>
                    <td>{{ $c->ig }}</td>
                    <td><button type="button" class="btn btn-secondary"><a
                                href="{{ route('catalog.edit', ['catalog' => $c->id]) }}"><i class="bi bi-pencil-square fs-3"></i></a></button></td>
                    <td>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash fs-3"></i></button>
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
            <h3>Apakah kamu yakin ingin menhapus data ini?</h3>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
            <form action="{{ route('catalog.destroy', $c->id) }}" method="POST">
                @csrf
                @method('DELETE')
            <button type="submit" class="btn btn-primary">Ya! Saya yakin</button>
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
