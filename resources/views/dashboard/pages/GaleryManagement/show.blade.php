@extends('dashboard.layouts.app')

@section('content')
    <h1>Welcome in Galery</h1>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Gambar</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Author</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td><img src="{{ asset('images/galeries/' . $item->gambar) }}" alt="{{ $item->id }}" width="75">
                    </td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->author }}</td>
                    <td><button type="button" class="btn btn-warning"><a
                                href="{{ route('galery.edit', $item->id) }}">Edit</a></button></td>
                    <td>
                        <form action="{{ route('galery.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
