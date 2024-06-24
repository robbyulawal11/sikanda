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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
