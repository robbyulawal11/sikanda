@extends('dashboard.layouts.app')

@section('content')
    <h1>Create a Product</h1>
    <section id="create_catalog">
        <div class="container">
            <form method="post" action="{{ route('catalog.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Penjual</label>
                    <input type="text" name="seller" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Harga</label>
                    <input type="text" name="harga" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Produk</label>
                    <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Whatsapp</label>
                    <input type="text" name="wa" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Instagram</label>
                    <input type="text" name="ig" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Upload Gambar</label>
                    <br>
                    <input type="file" name="image">
                </div>
                <button type="submit" class="btn btn-secondary">Submit</button>
            </form>
        </div>
    </section>
@endsection
