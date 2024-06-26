@extends('dashboard.layouts.app')

@section('content')
    <section id="create_user">
        <div class="container">
            <form method="post" id="userForm" action="{{ route('user.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Role</label>
                    <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="role" required>
                        <option selected></option>
                        <option value="Copywriter">Copywriter</option>
                        <option value="Penjual">Penjual</option>
                      </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                    <div id="email-error" class="text-danger" style="display: none;">Maaf E-mail Telah digunakan!, Silahkan gunakan E-mail lain</div>
                </div>
                <div class="mb-1">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control">
                    <span class="input-group-text p-0"><button type="button" id="togglePassword" class="btn btn-success btn-md" required>
                        <i class="bi bi-eye-slash fs-4"></i>
                    </button></span>
                  </div>
                </div>
                <div class="mb-1">
                    <label for="exampleFormControlInput1" class="form-label">Whatsapp</label>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">+62</span>
                    <input type="text" name="wa" id="wa" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat Lengkap</label>
                    <textarea class="form-control" name="alamat" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Upload Foto Anda</label>
                    <br>
                    <input type="file" name="image" required>
                </div>
                <button type="submit" class="btn btn-secondary">Submit</button>
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
    </script>
@endsection
