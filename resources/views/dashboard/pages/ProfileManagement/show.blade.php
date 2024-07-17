@extends('dashboard.layouts.app')

@section('content')
    <div class="toast align-items-center text-bg-success border-0" style="position: absolute; top: 20px; right: 20px;"
        id="toast" data-delay="3000" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body text-white fs-5">
                {{ session('success') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
    <div>
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
                <button type="button" class="btn btn-warning"><a
                        href="{{ route('profile.edit', $item->id) }}">Edit</a></button>
            </div>
        @endforeach
    </div>
    @if (session('success'))
        <script>
            $(document).ready(function() {
                $('#toast').toast('show');
            });
        </script>
    @endif
@endsection
