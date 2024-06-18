@extends('dashboard.layouts.app')

@section('content')
    <h1>Edit a Product</h1>
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
                    <input type="text" name="seller" class="form-control" value="{{ $catalog->seller }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control" value="{{ $catalog->harga }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Produk</label>
                    <textarea class="form-control" name="deskripsi" rows="3" required>{{ $catalog->deskripsi }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Whatsapp</label>
                    <input type="text" name="wa" class="form-control" value="{{ $catalog->wa }}" required>
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
                    <input type="file" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
    <script>
        document.getElementById('harga').addEventListener('input', function (e) {
            if (e.target.value.match(/[^0-9.]/)) {
                e.target.value = e.target.value.replace(/[^0-9.]/g, '');
            }
        });
    </script>
@endsection
