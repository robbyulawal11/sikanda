@extends('landing-page.layouts.app')

@section('content')

<div class="container-fluid py-5">
    <div class="container">
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase">Arsip Artikel</h6>
            <h1 class="display-5 text-uppercase mb-0">Artikel <br>Dekranasda <br>Kota Sukabumi</h1>
        </div>
    </div>
</div>

<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="article-wrapper pb-3 mb-4 border-bottom border-gray-300">
                        <div class="article-title-area">
                            <h3>{{ $showArticle->title }}</h3>
                            <div class="article-meta big-meta">
                                <small>{{ $showArticle->updated_at->format('d M, Y') }} | by </small>
                                <small><a href="{{ route('search.articles') }}?query={{ $showArticle->author }}" title="">{{ $showArticle->author }}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end title -->

                        <div class="single-post-media mb-3 mt-3">
                            <img src="{{ asset('/images/articles/' . $showArticle->image) }}" alt="{{ $showArticle->title }}" class="img-fluid">
                        </div><!-- end media -->

                        <div class="article-content">
                            <div class="pp">
                                {!! $showArticle->body !!}
                            </div><!-- end pp -->
                        </div><!-- end article-content -->
                    </div><!-- end article-wrapper -->


                </div><!-- end page-wrapper -->
            </div><!-- end col-lg-9 -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget pb-3 mb-4 border-bottom border-gray-300">
                        <h2 class="widget-title">Search</h2>
                        <form action="{{ route('search.articles') }}" method="GET" class="form-inline search-form">
                            <div class="form-group">
                                <input type="text" name="query" class="form-control" placeholder="Search articles...">
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </form>
                    </div><!-- end widget -->

                    <div class="widget pb-3 mb-4 border-bottom border-gray-300">
                        <h2 class="widget-title">Recent Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <a href="garden-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="upload/garden_sq_09.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">5 Beautiful buildings you need to before dying</h5>
                                        <small>12 Jan, 2016</small>
                                    </div>
                                </a>
                                <a href="garden-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="upload/garden_sq_06.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">Let's make an introduction for creative life</h5>
                                        <small>11 Jan, 2016</small>
                                    </div>
                                </a>
                                <a href="garden-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 last-item justify-content-between">
                                        <img src="upload/garden_sq_02.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">Did you see the most beautiful sea in the world?</h5>
                                        <small>07 Jan, 2016</small>
                                    </div>
                                </a>
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->

                    <div class="widget pb-3 mb-4 border-bottom border-gray-300">
                        <h2 class="widget-title">Popular Categories</h2>
                        <div class="link-widget">
                            <ul>
                                <li><a href="#">Gardening <span>(21)</span></a></li>
                                <li><a href="#">Outdoor Living <span>(15)</span></a></li>
                                <li><a href="#">Indoor Living <span>(31)</span></a></li>
                                <li><a href="#">Shopping Guides <span>(22)</span></a></li>
                                <li><a href="#">Pool Design <span>(66)</span></a></li>
                            </ul>
                        </div><!-- end link-widget -->
                    </div><!-- end widget -->
                </div><!-- end sidebar -->
            </div><!-- end col-lg-3 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

@endsection
