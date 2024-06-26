@extends('dashboard.layouts.app')

@section('content')
    <section id="create_catalog">
        <div class="container">
            <form method="POST" action="{{ route('catalog.update', ['catalog' => $catalog]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                    <input type="text" name="nama" class="form-control" value="{{ $catalog->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Penjual</label>
                    <input type="text" name="seller" class="form-control" value="{{ Auth::user()->name }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control" value="{{ $catalog->harga }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Produk</label>
                    <textarea class="form-control" name="deskripsi" rows="3" required>{{ $catalog->deskripsi }}</textarea>
                </div>
                <div class="mb-1">
                    <label for="exampleFormControlInput1" class="form-label">Whatsapp</label>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">+62</span>
                    <input type="text" name="wa" id="wa" class="form-control" value="{{ $catalog->wa }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Instagram</label>
                    <input type="text" name="ig" class="form-control" value="{{ $catalog->ig }}">
                </div>
                <div class="mb-3">
                    <img src="{{ asset('images/catalogs/' . $catalog->image) }}" alt="{{ $catalog->id }}" width="75">
                    </td>
                    <label for="exampleInputEmail1" class="form-label">Upload Gambar</label>
                    <br>
                    <input type="file" name="image">
                </div>
                <div class="d-flex gap-3 justify-content-end mt-5">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{ route('catalog.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </section>
    <script>
        document.getElementById('harga').addEventListener('input', function(e) {
            if (e.target.value.match(/[^0-9.]/)) {
                e.target.value = e.target.value.replace(/[^0-9.]/g, '');
            }
        });

        document.getElementById('wa').addEventListener('input', function(e) {
            if (e.target.value.match(/[^0-9.]/)) {
                e.target.value = e.target.value.replace(/[^0-9.]/g, '');
            }
        });
    </script>
@endsection
