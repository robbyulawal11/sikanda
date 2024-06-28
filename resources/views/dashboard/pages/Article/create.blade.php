    @extends('dashboard.layouts.app')

    <style>
        .editor-container {
            height: 100px; // Replace 300px = any number you want
        }
    </style>

    {{-- <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}" /> --}}
    <!-- Include stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet" />
    @section('content')
        <section id="create_article">
            <div class="container">
                <form class="d-flex flex-column" method="post" action="{{ route('article.store') }}"
                    enctype="multipart/form-data" onsubmit="return submitForm()">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="title" placeholder="Judul Artikel" class="form-control"
                            required>
                        @if ($errors->has('title'))
                            <div class="text-danger">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="mb-3 visually-hidden">
                        <label for="author" class="form-label">Penulis <span class="text-danger">*</span></label>
                        <input type="hidden" name="author" id="author" placeholder="Nama Penulis Artikel"
                            class="form-control" value="{{ Auth::user()->name }}">
                        @if ($errors->has('author'))
                            <div class="text-danger">{{ $errors->first('author') }}</div>
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
                    <div class="mb-3 form-group">
                        <label for="body" class="form-label">Artikel <span class="text-danger">*</span></label>
                        <div class="editor-container">
                            <div id="editor">{!! old('body') !!}</div>
                        </div>
                        <textarea name="body" id="body" style="display:none;">{{ old('body') }}</textarea>
                        @if ($errors->has('body'))
                            <div class="text-danger">{{ $errors->first('body') }}</div>
                        @endif
                    </div>
                    <div class="mb-3 mt-5 form-group pt-10">
                        <label for="images" class="form-label">Unggah Gambar <span class="text-danger">*</span></label>
                        <br>
                        <input type="file" name="image" id="images" class="form-control">
                        <div id="image_preview" style="width:500px" class="mb-3">
                        </div>
                        @if ($errors->has('image'))
                            <div class="text-danger">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                    <div class="d-flex gap-3 justify-content-end mt-5">
                        <button type="submit" class="btn btn-success w-25" id="liveToastBtn">Simpan</button>
                        <a href="{{ route('article.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>

            <!-- Initialize Quill editor -->
            <script>
                var quill = new Quill('#editor', {
                    placeholder: 'Tulis artikel disini...',
                    theme: 'snow'
                });

                function submitForm() {
                    // Get the HTML content from the Quill editor
                    var body = document.querySelector('textarea[name=body]');
                    body.value = quill.root.innerHTML;

                    return true; // Submit the form
                }
            </script>

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

        </section>
    @endsection
