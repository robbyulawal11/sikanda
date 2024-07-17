@extends('landing-page.layouts.app')

@section('content')
    <style>
        .gallery-item {
            overflow: hidden;
            position: relative;
            border-radius: 5px;
        }

        .gallery-item img {
            display: block;
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
            opacity: 0.9;
        }
    </style>
    <div class="container-fluid py-2">
        <div class="container">
            <div class="border-start border-5 border-primary ps-3 my-3" style="max-width: 1000px;">
                <h6 class="text-primary text-uppercase">Arsip Galeri</h6>
                <h1 class="display-5 text-uppercase mb-0">Galeri Dekranasda <br> Kota Sukabumi</h1>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center">
        <div class="d-flex flex-column my-4 me-4">
            @foreach ($paginateGalleries as $item)
                <div class="mb-4 gallery-item" style="cursor: pointer" href="{{ $item->id }}" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop" data-image="{{ asset('images/galeries/' . $item->gambar) }}"
                    data-id="{{ $item->id }}" data-deskripsi="{{ $item->deskripsi }}"
                    data-penerbit="{{ $item->author }}">
                    <img class="rounded-sm" width="300" src="{{ asset('images/galeries/' . $item->gambar) }}"
                        alt="{{ $item->author }}">
                </div>
            @endforeach
        </div>
        <div class="d-flex flex-column-reverse my-4 me-4">
            @foreach ($paginateGalleries as $item)
                <div class="mb-4 gallery-item" style="cursor: pointer" href="{{ $item->id }}" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop" data-image="{{ asset('images/galeries/' . $item->gambar) }}"
                    data-id="{{ $item->id }}" data-deskripsi="{{ $item->deskripsi }}"
                    data-penerbit="{{ $item->author }}">
                    <img class="rounded-sm" width="300" src="{{ asset('images/galeries/' . $item->gambar) }}"
                        alt="{{ $item->author }}">
                </div>
            @endforeach
        </div>
        <div class="d-flex flex-column my-4 me-4">
            @foreach ($paginateGalleries as $item)
                <div class="mb-4 gallery-item" style="cursor: pointer" href="{{ $item->id }}" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop" data-image="{{ asset('images/galeries/' . $item->gambar) }}"
                    data-id="{{ $item->id }}" data-deskripsi="{{ $item->deskripsi }}"
                    data-penerbit="{{ $item->author }}">
                    <img class="rounded-sm" width="300" src="{{ asset('images/galeries/' . $item->gambar) }}"
                        alt="{{ $item->author }}">
                </div>
            @endforeach
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="d-flex justify-content-end p-3">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid d-flex flex-column justify-content-center align-items-center">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="">
                                    <h5 id="modalDeskripsi" class="card-text text-capitalize"></h5>
                                    <p id="modalPenerbit"></p>
                                </div>
                            </div>
                            <div class="col-md-12 mb-2">
                                <img id="modalImage" class="w-100" src="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var staticBackdrop = document.getElementById('staticBackdrop');
            staticBackdrop.addEventListener('show.bs.modal', function(event) {
                // Button that triggered the modal
                var button = event.relatedTarget;
                // Extract info from data-* attributes
                var image = button.getAttribute('data-image');
                var id = button.getAttribute('data-id');
                var penerbit = button.getAttribute('data-penerbit');
                var deskripsi = button.getAttribute('data-deskripsi');

                // Update the modal's content.
                var modalImage = staticBackdrop.querySelector('#modalImage');
                var modalDeskripsi = staticBackdrop.querySelector('#modalDeskripsi');
                var modalPenerbit = staticBackdrop.querySelector('#modalPenerbit');

                modalImage.src = image;
                modalImage.alt = id;
                modalDeskripsi.textContent = '' + deskripsi;
                modalPenerbit.textContent = 'Foto oleh ' + penerbit;
            });
        });
    </script>
@endsection
