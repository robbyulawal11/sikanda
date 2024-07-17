@extends('dashboard.layouts.app')

@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet" />
    <form class="container d-flex flex-column justify-content-center mb-5"
        action="{{ route('gallery.update', ['gallery' => $gallery]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <div class="d-flex flex-column mb-3 ">
                <label for="gambar" class="form-label">Gambar Produk <span class="text-danger">*</span></label>
                <div id="image_preview" style="width:500px" class="mb-3">
                    @if ($gallery->gambar)
                        <div class='img-div' id='existing-img'>
                            <img src="{{ asset('images/galeries/' . $gallery->gambar) }}"
                                class='img-responsive image img-thumbnail' title='{{ $gallery->gambar }}'>
                            <div class='middle'>
                                <button id='action-icon' value='existing-img' class='btn btn-danger'
                                    role='{{ $gallery->gambar }}'>
                                    <i class='fa fa-trash'></i>
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="">
                <input type="file" id="images" class="form-control" placeholder="Upload Gambar Galeri Produk"
                    name="gambar">
            </div>
        </div>
        <div class="form-group">
            <label class="w-100" id="deskripsi">Deskripsi <span class="text-danger">*</span>
                <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi">{{ $gallery->deskripsi }}</textarea>
            </label>
            @if ($errors->has('deskripsi'))
                <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
            @endif
        </div>
        <div class="form-group w-100 visually-hidden">
            <label class="w-100">Author
                <input type="hidden" class="form-control @error('author') is-invalid @enderror" name="author"
                    value="{{ Auth::user()->name }}">
            </label>
            @if ($errors->has('author'))
                <p class="text-danger">{{ $errors->first('author') }}</p>
            @endif
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
        <div class="d-flex gap-3 justify-content-end mt-5">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
    <script>
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
