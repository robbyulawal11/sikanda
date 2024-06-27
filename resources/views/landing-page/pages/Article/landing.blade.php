<div class="container-fluid py-5">
    <div class="container">
        <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
            <h6 class="text-primary text-uppercase">Artikel Terbaru</h6>
            <h1 class="display-5 text-uppercase mb-0">Artikel Terbaru Dekranasda <br>Kota Sukabumi</h1>
            <a class="text-primary text-uppercase" href="{{ url('article') }}">Artikel Lainnya<i
                    class="bi bi-chevron-right"></i></a>
        </div>
        <div class="row g-5">
            @foreach ($articleslatesttwo as $atwo)
                <div class="col-lg-6">
                    <div class="blog-item">
                        <div class="row g-0 bg-light overflow-hidden p-4" style="height: 100%;">
                            <div class="col-12 col-sm-5 h-100 d-flex justify-content-center align-items-center">
                                <img class="img-fluid mt-4 ml-4" src="{{ asset('/images/articles/' . $atwo->image) }}"
                                    alt="{{ $atwo->title }}"
                                    style="max-width: 100%; max-height: 100%; object-fit: cover;">
                            </div>
                            <div class="col-12 col-sm-7 h-100 d-flex flex-column justify-content-start">
                                <div class="p-4">
                                    <div class="d-flex mb-3">
                                        <small><i
                                                class="bi bi-calendar-date me-2"></i>{{ $atwo->updated_at->format('d M, Y') }}</small>
                                    </div>
                                    <h5 class="text-uppercase mb-3">{{ $atwo->title }}</h5>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mt-1 ml-4">
                                    <p>{!! Str::limit($atwo->body, 100) !!}</p>
                                    <a class="text-primary text-uppercase"
                                        href="{{ route('landing.article.show', ['id' => $atwo->id]) }}">Selengkapnya<i
                                            class="bi bi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
