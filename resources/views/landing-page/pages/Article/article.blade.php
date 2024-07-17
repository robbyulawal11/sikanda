@extends('landing-page.layouts.app')

@section('content')
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 800px;">
                <h6 class="text-primary text-uppercase">Arsip Artikel</h6>
                <h2 class="display-5 text-uppercase mb-0">Artikel Dekranasda <br> Kota Sukabumi</h1>
            </div>
        </div>
    </div>

    <section class="section wb">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 bg-light p-3">
                    <div class="page-wrapper">
                        @foreach ($paginateArticles as $pa)
                            <div class="article-wrapper pb-3 mb-4 border-bottom border-gray-300">
                                <div class="article-title-area">
                                    <h3><a href="{{ route('landing.article.show', ['id' => $pa->id]) }}" class="read-more"
                                            style="color:black">{{ $pa->title }}</a></h3>
                                    <div class="article-meta big-meta">
                                        <small>{{ $pa->date_article->format('d M, Y') }} | ditulis oleh </small>
                                        <small><a href="{{ route('search.articles') }}?query={{ $pa->author }}"
                                                title="">{{ $pa->author }}</a></small>
                                    </div><!-- end meta -->
                                </div><!-- end title -->

                                <div class="single-post-media mb-3 mt-3">
                                    <img src="{{ asset('/images/articles/' . $pa->image) }}" alt="{{ $pa->title }}"
                                        class="img-fluid" width="2000" height="1200">
                                </div><!-- end media -->

                                <div class="article-content">
                                    <div class="pp">
                                        {!! Str::limit($pa->body, 200, '...') !!}
                                        <a href="{{ route('landing.article.show', ['id' => $pa->id]) }}"
                                            class="read-more">Selengkapnya</a>
                                    </div><!-- end pp -->
                                </div><!-- end article-content -->
                            </div><!-- end article-wrapper -->
                        @endforeach

                        <!-- Pagination Links -->
                        <div class="pagination-links pagination-lg">
                            {{ $paginateArticles->links() }}
                        </div>

                    </div><!-- end page-wrapper -->
                </div><!-- end col-lg-9 -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="widget pb-3 mb-4 border-bottom border-gray-300 bg-light p-3">
                            <h3 class="widget-title">Kolom Pencarian</h3>
                            <form action="{{ route('search.articles') }}" method="GET" class="search-form d-flex">
                                <input type="text" name="query" class="form-control me-2"
                                    placeholder="Cari di Sikanda...">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- end widget -->

                        <div class="widget pb-3 mb-4 border-bottom border-gray-300 bg-light p-3">
                            <h3 class="widget-title">Artikel Terbaru</h3>
                            <div class="blog-list-widget">
                                @foreach ($articleslatestfive as $afive)
                                    <div class="list-group">
                                        <a href="{{ route('landing.article.show', ['id' => $afive->id]) }}"
                                            class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="w-100 justify-content-between">
                                                {{-- <img src="{{ asset('/images/articles/' . $afive->image) }}" alt="" class="img-fluid float-left" width="50"> --}}
                                                <h6 class="mb-1">{{ $afive->title }}</h6>
                                                <small>{{ $afive->date_article->format('d M, Y') }}</small>
                                            </div>
                                        </a>
                                @endforeach
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->
                    {{-- 
                    <div class="widget pb-3 mb-4 mt-5 border-top border-bottom border-gray-300">
                        <br>
                        <h4 class="widget-title">Kategori Populer</h4>
                        <div class="link-widget">
                            <ul>
                                <li><a href="#">Gardening <span>(21)</span></a></li>
                                <li><a href="#">Outdoor Living <span>(15)</span></a></li>
                                <li><a href="#">Indoor Living <span>(31)</span></a></li>
                                <li><a href="#">Shopping Guides <span>(22)</span></a></li>
                                <li><a href="#">Pool Design <span>(66)</span></a></li>
                            </ul>
                        </div><!-- end link-widget -->
                    </div><!-- end widget --> --}}
                </div><!-- end sidebar -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
        </div><!-- end container -->
    </section>
@endsection
