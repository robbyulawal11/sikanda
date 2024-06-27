@extends('dashboard.layouts.app')

@section('content')
    <form class="container d-flex flex-column justify-content-center mb-5" action="{{ route('gallery.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="form-group mb-3">
            <label for="exampleInputEmail1" class="form-label">Upload Gambar</label>
            <br>
            <input type="file" class="form-control @error('deskripsi') is-invalid @enderror" name="gambar">
            @if ($errors->has('gambar'))
                <p class="text-danger">{{ $errors->first('gambar') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label class="w-100" id="deskripsi">Deskripsi
                <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
                    value="{{ old('deskripsi') }}"></textarea>
            </label>
            @if ($errors->has('deskripsi'))
                <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
            @endif
        </div>
        <div class="form-group w-100 visually-hidden">
            <label class="w-100">Pemilik
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
        {{-- <div class="form-group">
            <label>Kategori</label>
            <select class="form-control" name="kategori_id">
                <option>Pilih Kategori</option>
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}">{{ $item->namaKategori }}</option>
                @endforeach

            </select>
        </div> --}}
        <div class="d-flex gap-3 justify-content-end mt-5">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
