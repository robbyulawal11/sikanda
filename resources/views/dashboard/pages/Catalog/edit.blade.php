@extends('dashboard.layouts.app')

@section('content')

<link href="{{ asset('assets/css/index.css') }}" rel="stylesheet" />

    <section id="create_catalog">
        <div class="container">
            <form method="POST" action="{{ route('catalog.update', ['catalog' => $catalog]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control" value="{{ $catalog->nama }}" required>
                </div>
                <div class="mb-3 visually-hidden">
                    <label for="exampleFormControlInput1" class="form-label">Nama Penjual <span class="text-danger">*</span></label>
                    <input type="hidden" name="seller" class="form-control" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group w-100 visually-hidden">
                    <label class="w-100">User ID
                        <input type="hidden" class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                            value="{{ Auth::user()->id }}">
                    </label>
                    @if ($errors->has('user_id'))
                        <p class="text-danger">{{ $errors->first('user_id') }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Harga <span class="text-danger">*</span></label>
                    <input type="text" name="harga" id="harga" class="form-control" value="{{ $catalog->harga }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Produk <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="deskripsi" rows="3" required>{{ $catalog->deskripsi }}</textarea>
                </div>
                <div class="mb-1">
                    <label for="exampleFormControlInput1" class="form-label">Whatsapp <span class="text-danger">*</span></label>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">+62</span>
                    <input type="text" name="wa" id="wa" class="form-control" value="{{ $catalog->wa }}"
                        required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Instagram</label>
                    <input type="text" name="ig" class="form-control" value="{{ $catalog->ig }}">
                </div>
                <div class="mb-3 visually-hidden">
                    <label for="exampleFormControlInput1" class="form-label">Alamat Penjual</label>
                    <input type="hidden" name="user_alamat" class="form-control" value="{{ Auth::user()->alamat }}">
                </div>
                <div class="mb-3 form-group">
                    <label for="images" class="form-label">Unggah Foto Produk Anda (Format harus: JPEG,PNG,JPG) <span style="color: red;">*</span></label>
                    <br>
                    <label for="" class="form-label">Ukuran maks. 5 mb</label>
                    <br>
                    <input type="file" name="image" id="images" class="form-control">
                    <div id="image_preview" style="width:500px" class="mb-3">
                        @if ($catalog->image)
                            <div class='img-div' id='existing-img'>
                                <img src="{{ asset('images/catalogs/' . $catalog->image) }}"
                                    class='img-responsive image img-thumbnail' title='{{ $catalog->image }}'>
                                <div class='middle'>
                                    <button id='action-icon' value='existing-img' class='btn btn-danger'
                                        role='{{ $catalog->image }}'>
                                        <i class='fa fa-trash'></i>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="d-flex gap-3 justify-content-end mt-5">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('catalog.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </section>
    <script>
        document.getElementById('harga').addEventListener('input', function(e) {
            if (e.target.value.match(/[^0-9.]/)) {
                e.target.value = e.target.value.replace(/[^0-9.]/g, '');
            }
        });

        document.getElementById('wa').addEventListener('input', function (e) {
        // Get the current value and limit it to 13 characters
        const limitedValue = e.target.value.substring(0, 14);

        // Allow backspace key (keyCode 8) for deleting characters
        if (e.keyCode !== 8) {
        // Remove non-numeric characters using a regular expression
        e.target.value = limitedValue.replace(/[^0-9]/g, '');
        }
        });
        $(document).ready(function() {
                $("#images").change(function() {
                    $('#image_preview').html("");
                    var file = document.getElementById("images").files[0];
                    if (!file) return;
                    if (file.size > 2097152) {
                        alert('File size must be less than 2MB');
                        return false;
                    } else {
                        $('#image_preview').append("<div class='img-div' id='img-div'><img src='" + URL
                            .createObjectURL(file) +
                            "' class='img-responsive image img-thumbnail' title='" + file.name +
                            "'><div class='middle'><button id='action-icon' value='img-div' class='btn btn-danger' role='" +
                            file.name + "'><i class='fa fa-trash'></i></button></div></div>");
                    }
                });

                $('body').on('click', '#action-icon', function(evt) {
                    var divName = this.value;
                    $(`#${divName}`).remove();
                    $('#images').val(''); // Clear the file input
                    evt.preventDefault();
                });
            });
    </script>
@endsection
