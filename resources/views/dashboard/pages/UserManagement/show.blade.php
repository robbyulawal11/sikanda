@extends('dashboard.layouts.app')

@section('content')
    <div class="d-flex flex-direction-row justify-content-end mb-3">
        <input class="form-control me-2 w-25" id="search" type="search" placeholder="Search" aria-label="Search">
    </div>
    <table class="table table-striped table-hover align-middle">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama</th>
                <th scope="col">Role</th>
                <th scope="col">Email</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $u)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><img src="{{ asset('images/users/' . $u->image) }}" alt="{{ $u->id }}" width="75">
                    </td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->role }}</td>
                    <td>{{ $u->email }}</td>
                    <td><button type="button" class="btn btn-success"><a
                                href="{{ route('user.edit', ['user' => $u->id]) }}"><i class="bi bi-pencil-square fs-3"></i></a></button>
                    
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $u->id }}"><i class="bi bi-trash fs-3"></i></button>
                        <!-- Modal -->
                            <div class="modal fade" id="exampleModal{{ $u->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $u->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title fs-5" id="exampleModalLabel{{ $u->id }}">Peringatan</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah kamu yakin ingin menghapus data ini?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">Tidak</button>
                                            <form action="{{ route('user.destroy', $u->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Ya! Saya yakin</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- Modal End --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="pagination-links">
        {{ $user->links() }}
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
