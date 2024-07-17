@extends('dashboard.layouts.app')

@section('content')


<link href="{{ asset('assets/css/index.css') }}" rel="stylesheet" />

    <section id="create_user">
        <div class="container">
            <form method="post" id="userForm" action="{{ route('user.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Lengkap <span style="color: red;">*</span></label>
                    <input type="text" name="name" class="form-control" placeholder="Masukan nama lengkap anda" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Peran <span style="color: red;">*</span></label>
                    <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="role" required>
                        <option value="Copywriter">Copywriter</option>
                        <option value="Penjual">Penjual</option>
                      </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">E-mail <span style="color: red;">*</span></label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Masukan email anda" required>
                    <div id="email-error" class="text-danger" style="display: none;">Maaf E-mail Telah digunakan!, Silahkan gunakan E-mail lain</div>
                </div>
                <div class="mb-1">
                    <label for="exampleFormControlInput1" class="form-label">Password <span style="color: red;">*</span></label>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Masukan kata sandi anda">
                    <span class="input-group-text p-0"><button type="button" id="togglePassword" class="btn btn-success btn-md" required>
                        <i class="bi bi-eye-slash fs-4"></i>
                    </button></span>
                  </div>
                </div>
                <div class="mb-1">
                    <label for="exampleFormControlInput1" class="form-label">Whatsapp <span style="color: red;">*</span></label>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">+62</span>
                    <input type="text" name="wa" id="wa" class="form-control" placeholder="Masukan nomor anda tanpa angka 0, contoh : 85212345678" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat Lengkap <span style="color: red;">*</span></label>
                    <textarea class="form-control" name="alamat" rows="3" placeholder="Masukan alamat lengkap anda" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="images" class="form-label">Unggah Foto Anda (Format harus: JPEG,PNG,JPG) <span style="color: red;">*</span></label>
                    <br>
                    <label for="" class="form-label">Ukuran maks. 2 mb</label>
                    <br>
                    <input type="file" name="image" id="images" class="form-control" required>
                    <div id="image_preview" style="width:300px" class="mb-3">
                </div>
                <div class="d-flex gap-3 justify-content-end mt-5">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </section>
    <script>
   document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const emailInput = document.getElementById('email');
        const emailError = document.getElementById('email-error');
        
        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('i').classList.toggle('bi-eye-slash');
            this.querySelector('i').classList.toggle('bi-eye');
            this.classList.toggle('btn-outline-secondary');
            this.classList.toggle('btn-danger');
        });

        document.getElementById('wa').addEventListener('input', function (e) {
        // Get the current value and limit it to 13 characters
        const limitedValue = e.target.value.substring(0, 12);

        // Allow backspace key (keyCode 8) for deleting characters
        if (e.keyCode !== 8) {
        // Remove non-numeric characters using a regular expression
        e.target.value = limitedValue.replace(/[^0-9]/g, '');
        }
        });

        document.getElementById('userForm').addEventListener('submit', function(event) {
            var waInput = document.getElementById('wa');
            var waValue = waInput.value;
            if (!waValue.startsWith('+62')) {
                waInput.value = '+62' + waValue;
            }
        });

        // Check email uniqueness
        emailInput.addEventListener('blur', function() {
            const email = this.value;
            const token = document.querySelector('input[name="_token"]').value;

            fetch('{{ route('check.email') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({ email: email })
            })
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    emailError.style.display = 'block';
                    this.classList.add('is-invalid');
                } else {
                    emailError.style.display = 'none';
                    this.classList.remove('is-invalid');
                }
            });
        });
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
