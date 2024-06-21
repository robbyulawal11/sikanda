@extends('landing-page.layouts.app')

@section('content')

<div class="container">
    <p><h1>Return "{{ $countArticles }}" Search Results for "{{ $query }}"</h1></p>

    @if ($searchArticles->count() > 0)
        @foreach ($searchArticles as $sa)
        <div class="article-wrapper pb-3 mb-4 border-bottom border-gray-300">
            <div class="article-title-area">
                <h3>{{ $sa->title }}</h3>
                <div class="article-meta big-meta">
                    <small>{{ $sa->updated_at->format('d M, Y') }} | by </small>
                    <small><a href="{{ route('search.articles') }}?query={{ $sa->author }}" title="">{{ $sa->author }}</a></small>
                </div><!-- end meta -->
            </div><!-- end title -->

            <div class="single-post-media mb-3 mt-3">
                <img src="{{ asset('/images/articles/' . $sa->image) }}" alt="{{ $sa->title }}" class="img-fluid" width="2000" height="1200">
            </div><!-- end media -->

            <div class="article-content">
                <div class="pp">
                    {!! Str::limit($sa->body, 200, '...') !!}
                    <a href="{{ route('landing.article.show' , ['id' => $sa->id]) }}" class="read-more">Read More</a>
                </div><!-- end pp -->
            </div><!-- end article-content -->
        </div><!-- end article-wrapper -->
        @endforeach

        <!-- Pagination Links -->
        <div class="pagination-links">
            {{ $searchArticles->links() }}
        </div>

    </div><!-- end page-wrapper -->
</div><!-- end col-lg-9 -->
    @else
        <p>No articles found.</p>
    @endif
</div>

@endsection