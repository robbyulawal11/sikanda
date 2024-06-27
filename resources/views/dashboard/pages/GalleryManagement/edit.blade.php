@extends('dashboard.layouts.app')

@section('content')
    <form class="container d-flex flex-column justify-content-center mb-5"
        action="{{ route('gallery.update', ['gallery' => $gallery]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <div class="d-flex flex-column mb-3 ">
                <label for="gambar" class="form-label">Gambar Produk <span class="text-danger">*</span></label>
                <img src="{{ asset('images/galeries/' . $gallery->gambar) }}" alt="{{ $gallery->gambar }}" width="200"
                    style="border-radius: 10px">
            </div>
            <div class="">
                <input type="file" class="form-control" placeholder="Upload Gambar Galeri Produk" name="gambar">
            </div>

        </div>
        <div class="form-group">
            <label class="w-100" id="deskripsi">Deskripsi <span class="text-danger">*</span>
                <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ $gallery->deskripsi }}</textarea>
            </label>
            @if ($errors->has('deskripsi'))
                <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
            @endif
        </div>
        <div class="form-group w-100 visually-hidden">
            <label class="w-100">Author
                <input type="hidden" class="form-control @error('author') is-invalid @enderror" name="author"
                    value="{{ Auth::user()->name }}">
            </label>
            @if ($errors->has('author'))
                <p class="text-danger">{{ $errors->first('author') }}</p>
            @endif
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
        <div class="d-flex gap-3 justify-content-end mt-5">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection
