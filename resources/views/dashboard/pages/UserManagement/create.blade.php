@extends('dashboard.layouts.app')

@section('content')

<style>
    .preview {
        max-width: 100%;
        max-height: 200px;
        margin-top: 10px;
    }
</style>

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
                    <label for="exampleFormControlInput1" class="form-label">Role <span style="color: red;">*</span></label>
                    <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="role" required>
                        <option selected></option>
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
                    <label for="exampleInputEmail1" class="form-label">Upload Foto Anda <span style="color: red;">*</span></label>
                    <br>
                    <img id="imagePreview" class="preview d-none" alt="Pratinjau Gambar">
                    <br>
                    <input type="file" id="imageInput" name="image" required>
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
            if (e.target.value.match(/[^0-9.]/)) {
                e.target.value = e.target.value.replace(/[^0-9.]/g, '');
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

    document.getElementById('imageInput').addEventListener('change', function(event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('d-none');
                }
                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '';
                imagePreview.classList.add('d-none');
            }
        });
    </script>
@endsection
