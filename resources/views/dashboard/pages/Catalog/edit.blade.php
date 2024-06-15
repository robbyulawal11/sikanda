@extends('dashboard.layouts.app')

@section('content')
    <h1>Edit a Product</h1>
    <section id="create_catalog">
        <div class="container">
          <form method="post" action="{{ route('update', ['catalog'=> $catalog]) }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
              <input type="text" name="nama" class="form-control" value="{{ $catalog->nama }}">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Penjual</label>
              <input type="text" name="seller" class="form-control" value="{{ $catalog->seller }}">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Harga</label>
              <input type="text" name="harga" class="form-control" value="{{ $catalog->harga }}">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Produk</label>
              <textarea class="form-control" name="deskripsi" rows="3">{{ $catalog->deskripsi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Whatsapp</label>
                <input type="text" name="wa" class="form-control" value="{{ $catalog->wa }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Instagram</label>
                <input type="text" name="ig" class="form-control" value="{{ $catalog->ig }}">
            </div>
            <div class="mb-3">
              <img src="{{ asset('images/catalogs/'. $catalog->image) }}" alt="{{ $catalog->id }}" width="75"></td>
              <label for="exampleInputEmail1" class="form-label">Upload Gambar</label>
              <br>
              <input type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </section>
@endsection