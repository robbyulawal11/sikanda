@extends('dashboard.layouts.app')

@section('content')
    <section id="create_catalog">
        <div class="container">
            <form method="post" action="{{ route('catalog.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3 visually-hidden">
                    <label for="exampleFormControlInput1" class="form-label">Nama Penjual</label>
                    <input type="hidden" name="seller" class="form-control" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group w-100 visually-hidden">
                    <label class="w-100">User ID
                        <input type="hidden" class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                            value="{{ Auth::user()->id }}">
                    </label>
                    @if ($errors->has('user_id'))
                        <p class="text-danger">{{ $errors->first('user_id') }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Produk</label>
                    <textarea class="form-control" name="deskripsi" rows="3" required></textarea>
                </div>
                <div class="mb-1">
                    <label for="exampleFormControlInput1" class="form-label">Whatsapp</label>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">+62</span>
                    <input type="text" name="wa" id="wa" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Instagram</label>
                    <input type="text" name="ig" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Upload Gambar</label>
                    <br>
                    <input type="file" name="image" required>
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
