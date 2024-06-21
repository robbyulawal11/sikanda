@extends('landing-page.layouts.app')
@section('content')
            <div class="row">
                @foreach ($catalog as $c)
                <div class="col-12 col-sm-4 pb-5">
                    <div class="product-item position-relative bg-light d-flex flex-column text-center">
                        <img class="img-fluid mb-4" src="{{ asset('images/catalogs/' . $c->image) }}" alt="{{ $c->id }}">
                        <h6 class="text-uppercase">{{ $c->nama }}</h6>
                        <h5 class="text-primary mb-0">Rp. {{ number_format($c->harga, 0, ',', '.') }}</h5>
                        <div class="btn-action d-flex justify-content-center">
                            <a class="btn btn-primary py-2 px-3" href="https://wa.me/{{ $c->wa }}"><i class="bi bi-whatsapp"></i></a>
                            <a class="btn btn-primary py-2 px-3" href="{{ $c->id }}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-image="{{ asset('images/catalogs/' . $c->image) }}" data-id="{{ $c->id }}" data-bs-toggle="modal" 
                              data-bs-target="#staticBackdrop" 
                              data-image="{{ asset('images/catalogs/' . $c->image) }}" 
                              data-id="{{ $c->id }}" 
                              data-nama="{{ $c->nama }}"
                              data-harga="{{ $c->harga }}"
                              data-seller="{{ $c->seller }}"
                              data-deskripsi="{{ $c->deskripsi }}"
                              data-wa="{{ $c->wa }}"
                              data-ig="{{ $c->ig }}"><i class="bi bi-eye"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Products End -->

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Catalog</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="container-fluid d-flex flex-column justify-content-center align-items-center">  
              <div class="row">  
                  <div class="col-md-6">  
                      <img id="modalImage" class="w-100" src="">  
                  </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 id="modalNama" class="card-title"></h5>
                      <h5 id="modalHarga"></h5>
                      <p id="modalDeskripsi" class="card-text"></p>
                      <h5 id="modalSeller"></h5>
                      <div>
                        <a id="modalWa" class="btn btn-primary py-2 px-3" href=""><i class="bi bi-whatsapp"></i></a>
                        <a id="modalIg"class="btn btn-primary py-2 px-3" href=""><i class="bi bi-instagram"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

      <script>
          document.addEventListener('DOMContentLoaded', function () {
              var staticBackdrop = document.getElementById('staticBackdrop');
              staticBackdrop.addEventListener('show.bs.modal', function (event) {
                  // Button that triggered the modal
                  var button = event.relatedTarget;
                  // Extract info from data-* attributes
                  var image = button.getAttribute('data-image');
                  var id = button.getAttribute('data-id');
                  var nama = button.getAttribute('data-nama');
                  var harga = button.getAttribute('data-harga');
                  var seller = button.getAttribute('data-seller');
                  var deskripsi = button.getAttribute('data-deskripsi');
                  var wa = button.getAttribute('data-wa');
                  var ig = button.getAttribute('data-ig');

                  // Update the modal's content.
                  var modalImage = staticBackdrop.querySelector('#modalImage');
                  var modalNama = staticBackdrop.querySelector('#modalNama');
                  var modalHarga = staticBackdrop.querySelector('#modalHarga');
                  var modalDeskripsi = staticBackdrop.querySelector('#modalDeskripsi');
                  var modalSeller = staticBackdrop.querySelector('#modalSeller');
                  var modalWa = staticBackdrop.querySelector('#modalWa');
                  var modalIg = staticBackdrop.querySelector('#modalIg');

                  modalImage.src = image;
                  modalImage.alt = id;
                  modalNama.textContent = nama;
                  modalHarga.textContent = 'Rp. ' + harga; 
                  modalDeskripsi.textContent = '' + deskripsi;
                  modalSeller.textContent = 'Penjual: ' + seller;
                  modalWa.href = 'https://wa.me/' + wa;
                  modalIg.href = 'https://instagram.com/' + ig;
  });
              });
      </script>
@endsection   