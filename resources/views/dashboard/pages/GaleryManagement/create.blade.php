@extends('dashboard.layouts.app')

@section('content')
    <form class="container d-flex flex-column justify-content-center mb-5" action="{{ route('galery.store') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('POST')ss

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
        <div class="form-group w-100">
            <label class="w-100">Author
                <input type="text" class="form-control @error('author') is-invalid @enderror" name="author"
                    value="{{ old('author') }}">
            </label>
            @if ($errors->has('author'))
                <p class="text-danger">{{ $errors->first('author') }}</p>
            @endif
        </div>
        <div class="d-flex gap-3 justify-content-end">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('galery.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
