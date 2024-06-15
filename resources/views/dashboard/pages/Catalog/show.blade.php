@extends('dashboard.layouts.app')

@section('content')
    <h1>SIKANDA Catalog</h1>
    <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Gambar</th>
            <th scope="col">Nama</th>
            <th scope="col">Seller</th>
            <th scope="col">Harga</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Whatsapp</th>
            <th scope="col">Instagram</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($catalog as $c)
          <tr>
            <th scope="row">{{ $c->id }}</th>
            <td><img src="{{ asset('images/catalogs/'. $c->image) }}" alt="{{ $c->id }}" width="75"></td>
            <td>{{ $c->nama }}</td>
            <td>{{ $c->seller }}</td>
            <td>{{ $c->harga }}</td>
            <td>{{ $c->deskripsi }}</td>
            <td>{{ $c->wa }}</td>
            <td>{{ $c->ig }}</td>
            <td><button type="button" class="btn btn-secondary"><a href="{{ route('edit', ['catalog' => $c->id]) }}">Edit</a></button></td>
            <td><form action="{{ route('delete', $c->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-secondary">Delete</button>
          </form></td>
          </tr>
          @endforeach
        </tbody>
      </table>
@endsection
