@extends('landing-page.layouts.app')

@section('body')


<div class="container">
    <h1>Search Results for "{{ $query }}"</h1>

    @if ($searchArticles->count() > 0)
        @foreach ($searchArticles as $sa)
            <div class="article">
                <h2>{{ $sa->title }}</h2>
                <p>{{ $sa->body }}</p>
                <small>Published on {{ $sa->created_at->format('Y-m-d') }}</small>
            </div>
        @endforeach

        {{ $searchArticles->links() }} <!-- Pagination links -->
    @else
        <p>No articles found.</p>
    @endif
</div>

@endsection