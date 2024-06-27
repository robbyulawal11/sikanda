@extends('dashboard.layouts.app')
@section('content')
    <form action="{{ route('category.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label>Nama Kategori <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('namaKategori') is-invalid @enderror"
                placeholder="Masukkan nama kategori" name="namaKategori" value="{{ old('namaKategori') }}">
        </div>
        <div class="form-group mb-3">
            <label>Deskripsi <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('descKategori') is-invalid @enderror"
                placeholder="Masukkan deskripsi dari kategori" name="descKategori" value="{{ old('descKategori') }}">
        </div>
        <div class="d-flex gap-3 justify-content-end mt-5">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
