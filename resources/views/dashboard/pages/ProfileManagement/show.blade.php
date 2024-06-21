@extends('dashboard.layouts.app')

@section('content')
    @foreach ($data as $item)
        <div>
            <p>{{ $item->tentang }}</p>
        </div>
        <div>
            <p>{{ $item->sejarah }}</p>
        </div>
        <div>
            <p>{{ $item->visi }}</p>
        </div>
        <div>
            <p>{{ $item->misi }}</p>
        </div>
        <div>
            <p>{{ $item->demografi }}</p>
        </div>
        <div>
            <p>{{ $item->geografi }}</p>
        </div>
        <div>
            <button type="button" class="btn btn-warning"><a href="{{ route('profile.edit', $item->id) }}">Edit</a></button>
        </div>
    @endforeach
@endsection
