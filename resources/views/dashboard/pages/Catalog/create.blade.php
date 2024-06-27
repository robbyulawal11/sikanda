@extends('dashboard.layouts.app')

@section('content')

<style>
    .preview {
        max-width: 100%;
        max-height: 200px;
        margin-top: 10px;
    }
</style>

    <section id="create_catalog">
        <div class="container">
            <form method="post" action="{{ route('catalog.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Produk <span style="color: red;">*</span></label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukan nama produk anda" required>
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
                    <label for="exampleFormControlInput1" class="form-label">Harga <span style="color: red;">*</span></label>
                    <input type="text" name="harga" id="harga" class="form-control" placeholder="Masukan harga produk anda" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Produk <span style="color: red;">*</span></label>
                    <textarea class="form-control" name="deskripsi" rows="3"placeholder="Masukan deskripsi produk anda" required></textarea>
                </div>
                <div class="mb-1">
                    <label for="exampleFormControlInput1" class="form-label">Whatsapp <span style="color: red;">*</span></label>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">+62</span>
                    <input type="text" name="wa" id="wa" class="form-control" placeholder="Masukan nomor anda tanpa angka 0, contoh : 85212345678" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Instagram</label>
                    <input type="text" name="ig" class="form-control" placeholder="Masukan instagram anda tanpa @, contoh : subagyo123">
                </div>
                <div class="mb-3">
                    <label for="imageInput" class="form-label">Unggah Gambar Produk Anda <span style="color: red;">*</span></label>
                    <br>
                    <img id="imagePreview" class="preview d-none" alt="Pratinjau Gambar">
                    <br>
                    <input type="file" id="imageInput" name="image" required>
                </div>
                <div class="d-flex gap-3 justify-content-end mt-5">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('catalog.index') }}" class="btn btn-secondary">Batal</a>
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

        document.getElementById('imageInput').addEventListener('change', function(event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('d-none');
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
                imagePreview.classList.add('d-none');
            }
        });
    </script>
@endsection
