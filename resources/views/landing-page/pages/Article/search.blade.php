@extends('landing-page.layouts.app')

@section('content')

    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 800px;">
                <h6 class="text-primary text-uppercase">Pencarian Artikel</h6>
                <h2 class="display-5 text-uppercase mb-0">Artikel Dekranasda <br> Kota Sukabumi</h2>
            </div>
        </div>
    </div>


    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-left">
                    <div style="width:75.7%">
                        <h3 class="bg-light p-3">{{ $countArticles }} artikel ditemukan untuk pencarian
                            "{{ $query }}"</h3>
                    </div>
                    <div>
                        <div class="widget pb-3 mb-4 border-bottom border-gray-300">
                            <h3 class="widget-title">Kolom Pencarian</h3>
                            <form action="{{ route('search.articles') }}" method="GET" class="search-form d-flex">
                                <input type="text" name="query" class="form-control me-2"
                                    placeholder="Cari di Sikanda...">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- end widget -->
                    </div>
                </div><!-- end col-12 -->
            </div><!-- end row -->

            <div class="row">
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 bg-light p-3">
                    <div class="page-wrapper">
                        <div class="article-wrapper">

                            @if ($searchArticles->count() > 0)
                                @foreach ($searchArticles as $sa)
                                    <div class="article-wrapper pb-3 mb-4 border-bottom border-gray-300">
                                        <div class="article-title-area">
                                            <h3>
                                                <a href="{{ route('landing.article.show', ['id' => $sa->id]) }}"
                                                    class="read-more" style="color:black">{{ $sa->title }}</a>
                                            </h3>
                                            <div class="article-meta big-meta">
                                                <small>{{ $sa->date_article->format('d M, Y') }} | ditulis oleh </small>
                                                <small>
                                                    <a href="{{ route('search.articles') }}?query={{ $sa->author }}"
                                                        title="">{{ $sa->author }}</a>
                                                </small>
                                            </div><!-- end meta -->
                                        </div><!-- end article-title-area -->

                                        <div class="single-post-media">
                                            <img src="{{ asset('/images/articles/' . $sa->image) }}"
                                                alt="{{ $sa->title }}" class="img-fluid" width="2000" height="1200">
                                        </div><!-- end single-post-media -->

                                        <div class="article-content">
                                            <div class="pp">
                                                {!! Str::limit($sa->body, 200, '...') !!}
                                                <a href="{{ route('landing.article.show', ['id' => $sa->id]) }}"
                                                    class="read-more">Selengkapnya</a>
                                            </div><!-- end pp -->
                                        </div><!-- end article-content -->
                                    </div><!-- end article-wrapper -->
                                @endforeach

                                <!-- Pagination Links -->
                                <div class="pagination-links">
                                    {{ $searchArticles->links() }}
                                </div>
                            @else
                                <p>Tidak Ada Artikel yang Ditemukan.</p>
                            @endif
                        </div><!-- end article-wrapper -->
                    </div><!-- end page-wrapper -->
                </div><!-- end col-lg-9 -->

                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        {{-- <div class="widget pb-3 mb-4 border-bottom border-gray-300"> --}}
                        <!-- Search form is already placed above -->
                    </div><!-- end sidebar -->
                </div><!-- end col-lg-3 -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

@endsection
