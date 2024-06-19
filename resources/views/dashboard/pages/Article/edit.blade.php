@extends('dashboard.layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="{{ asset('assets/css/index.css') }}" rel="stylesheet" />


<section id="edit_article">
    <div class="container">
      <form class="d-flex flex-column" method="post" action="{{ route('article.update', ['article'=> $article]) }}" enctype="multipart/form-data" onsubmit="return submitForm()">
        @csrf
        @method('PUT')
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Judul</label>
          <input type="text" name="title" class="form-control" value="{{ $article->title }}" required>
          @if ($errors->has('title'))
          <div class="text-danger">{{ $errors->first('title') }}</div>
          @endif
        </div>
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Nama Penulis</label>
          <input type="text" name="author" class="form-control" value="{{ $article->author }}" required>
          @if ($errors->has('author'))
          <div class="text-danger">{{ $errors->first('author') }}</div>
          @endif
        </div>
        <div class="mb-3">
          <label for="exampleFormControlTextarea1" class="form-label">Artikel</label>
          <div id="editor">{!! $article->body !!}</div>
          <textarea class="form-control d-none" name="body" id="body"></textarea>
        </div>
        <div class="mb-3 form-group">
          <label for="images" class="form-label">Upload Gambar</label>
          <br>
          <input type="file" name="image" id="images" class="form-control">
          <div id="image_preview" style="width:30%" class="mb-3">
            @if($article->image)
              <div class='img-div' id='existing-img'>
                <img src="{{ asset('images/articles/' . $article->image) }}" class='img-responsive image img-thumbnail' title='{{ $article->image }}'>
                <div class='middle'>
                  <button id='action-icon' value='existing-img' class='btn btn-danger' role='{{ $article->image }}'>
                    <i class='fa fa-trash'></i>
                  </button>
                </div>
              </div>
            @endif
          </div>
          @if ($errors->has('image'))
          <div class="text-danger">{{ $errors->first('image') }}</div>
          @endif
        </div>
        <button type="submit" class="btn btn-success w-25">Submit</button>
      </form>
    </div>
</section>

<!-- Initialize Quill editor -->
<script>
    var quill = new Quill('#editor', {
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
            $('#image_preview').append("<div class='img-div' id='img-div'><img src='" + URL.createObjectURL(file) + "' class='img-responsive image img-thumbnail' title='" + file.name + "'><div class='middle'><button id='action-icon' value='img-div' class='btn btn-danger' role='" + file.name + "'><i class='fa fa-trash'></i></button></div></div>");
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