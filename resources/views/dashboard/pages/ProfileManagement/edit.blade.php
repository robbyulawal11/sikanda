@extends('dashboard.layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="{{ asset('assets/css/index.css') }}" rel="stylesheet" />
    <div class="container">
        <form method="POST" onsubmit="return submitForm()" action="{{ route('profile.update', ['profile' => $data]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <div class="d-flex flex-column mb-3 ">
                    <label for="gambarHero" class="form-label">Gambar Hero <span class="text-danger">*</span></label>
                    <img src="{{ asset('images/profiles/' . $data->gambarHero) }}" alt="{{ $data->gambarHero }}"
                        width="200" style="border-radius: 10px">
                </div>
                <div class="">
                    <input type="file" class="form-control" placeholder="Upload Gambar Hero" name="gambarHero">
                    <p class="text-danger">Edit gambar hero dengan gambar yang minimal memiliki 1600 x 1200 pixel</p>
                </div>

            </div>
            <div class="form-group mb-3">
                <div class="d-flex flex-column mb-3 ">
                    <label for="gambarAbout" class="form-label">Gambar About <span class="text-danger">*</span></label>
                    <img src="{{ asset('images/profiles/' . $data->gambarAbout) }}" alt="{{ $data->gambarAbout }}"
                        width="200" style="border-radius: 10px">
                </div>
                <div class="">
                    <input type="file" class="form-control" placeholder="Upload Gambar About" name="gambarAbout">
                    <p class="text-danger">Edit gambar about dengan gambar yang minimal memiliki 1600 x 1200 pixel</p>
                </div>

            </div>
            <div class="form-group mb-3">
                <div class="d-flex flex-column mb-3 ">
                    <label for="gambarStrukturOrganisasi" class="form-label">Gambar Struktur Organisasi <span
                            class="text-danger">*</span></label>
                    <img src="{{ asset('images/profiles/' . $data->gambarStrukturOrganisasi) }}"
                        alt="{{ $data->gambarStrukturOrganisasi }}" width="200" style="border-radius: 10px">
                </div>
                <div class="">
                    <input type="file" class="form-control" placeholder="Upload Gambar Struktur Organisasi"
                        name="gambarStrukturOrganisasi">
                    <p class="text-danger">Edit gambar struktur organisasi dengan gambar yang minimal memiliki 1600 x 1200
                        pixel</p>
                </div>

            </div>
            <div class="form-group w-100 mb-5">
                <label class="w-100 mb-2">Link Video Youtube <span class="text-danger">*</span>
                    <input type="text" class="form-control @error('videoYoutube') is-invalid @enderror"
                        name="videoYoutube" value="{{ $data->videoYoutube }}">
                </label>
                @if ($errors->has('videoYoutube'))
                    <p class="text-danger">{{ $errors->first('videoYoutube') }}</p>
                @endif
            </div>
            <div class="form-group w-100 mb-5">
                <label for="editor1" class="w-100 "><span class="text-xl font-semibold mb-2">Tentang <span
                            class="text-danger">*</span></span>
                    <div id="editor1">{!! $data->tentang !!}</div>
                    <textarea class="form-control d-none @error('tentang') is-invalid @enderror" name="tentang" id="tentang"
                        style="display:none;">{!! $data->tentang !!}</textarea>
                </label>
                @if ($errors->has('tentang'))
                    <p class="text-danger">{{ $errors->first('tentang') }}</p>
                @endif
            </div>
            <div class="form-group w-100 mb-5">
                <label class="w-100">Sejarah <span class="text-danger">*</span>
                    <div id="editor2">{!! $data->sejarah !!}</div>
                    <textarea class="form-control d-none @error('sejarah') is-invalid @enderror" name="sejarah" id="sejarah"
                        style="display:none;">{!! $data->sejarah !!}</textarea>
                </label>
                @if ($errors->has('sejarah'))
                    <p class="text-danger">{{ $errors->first('sejarah') }}</p>
                @endif
            </div>
            <div class="form-group w-100 mb-5">
                <label class="w-100">Visi <span class="text-danger">*</span>
                    <div id="editor3">{!! $data->visi !!}</div>
                    <textarea class="form-control d-none @error('visi') is-invalid @enderror" name="visi" id="visi"
                        style="display:none;">{!! $data->visi !!}</textarea>
                </label>
                @if ($errors->has('visi'))
                    <p class="text-danger">{{ $errors->first('visi') }}</p>
                @endif
            </div>
            <div class="form-group w-100 mb-5">
                <label class="w-100">Misi <span class="text-danger">*</span>
                    <div id="editor4">{!! $data->misi !!}</div>
                    <textarea class="form-control d-none @error('misi') is-invalid @enderror" name="misi" id="misi"
                        style="display:none;">{!! $data->misi !!}</textarea>
                </label>
                @if ($errors->has('misi'))
                    <p class="text-danger">{{ $errors->first('misi') }}</p>
                @endif
            </div>
            <div class="form-group w-100 mb-5">
                <label class="w-100">Demografi <span class="text-danger">*</span>
                    <div id="editor5">{!! $data->demografi !!}</div>
                    <textarea class="form-control d-none @error('demografi') is-invalid @enderror" name="demografi" id="demografi"
                        style="display:none;">{!! $data->demografi !!}</textarea>
                </label>
                @if ($errors->has('demografi'))
                    <p class="text-danger">{{ $errors->first('demografi') }}</p>
                @endif
            </div>
            <div class="form-group w-100 mb-5">
                <label class="w-100">Geografi <span class="text-danger">*</span>
                    <div id="editor6">{!! $data->geografi !!}</div>
                    <textarea class="form-control d-none @error('geografi') is-invalid @enderror" name="geografi" id="geografi"
                        style="display:none;">{!! $data->geografi !!}</textarea>
                </label>
                @if ($errors->has('geografi'))
                    <p class="text-danger">{{ $errors->first('geografi') }}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- Initialize Quill editor -->
    <script>
        var quill1 = new Quill('#editor1', {
            theme: 'snow'
        });
        var quill2 = new Quill('#editor2', {
            theme: 'snow'
        });
        var quill3 = new Quill('#editor3', {
            theme: 'snow'
        });
        var quill4 = new Quill('#editor4', {
            theme: 'snow'
        });
        var quill5 = new Quill('#editor5', {
            theme: 'snow'
        });
        var quill6 = new Quill('#editor6', {
            theme: 'snow'
        });

        const submitForm = function(e) {

            document.querySelector('textarea[name=tentang]').value = quill1.root.innerHTML;
            document.querySelector('textarea[name=sejarah]').value = quill2.root.innerHTML;
            document.querySelector('textarea[name=visi]').value = quill3.root.innerHTML;
            document.querySelector('textarea[name=misi]').value = quill4.root.innerHTML;
            document.querySelector('textarea[name=demografi]').value = quill5.root.innerHTML;
            document.querySelector('textarea[name=geografi]').value = quill6.root.innerHTML;
        };

        // return true;
    </script>
@endsection
