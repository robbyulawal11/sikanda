@extends('dashboard.layouts.app')
@section('content')
    <h1>Edit Kategori</h1>
    <form action="{{ route('category.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
            <label>Nama Kategori</label>
            <input type="integer" class="form-control @error('namaKategori') is-invalid @enderror" name="namaKategori"
                value="{{ $data->namaKategori }}">
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <input type="text" class="form-control @error('descKategori') is-invalid @enderror" name="descKategori"
                value="{{ $data->descKategori }}">
        </div>
        <div class="d-flex gap-3 justify-content-end mt-5">
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
