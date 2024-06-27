@extends('dashboard.layouts.app')

@section('content')
    <section id="create_user">
        <div class="container">
            <form method="post" action="{{ route('update.profile', Auth::user()->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Role</label>
                    <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="role" required>
                        <option selected >{{ Auth::user()->role }}</option>
                        <option value="Copywriter">Copywriter</option>
                        <option value="Penjual">Penjual</option>
                      </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}" required>
                </div>
                <div class="mb-1">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" value="{{ Auth::user()->password }}" required>
                    <span class="input-group-text p-0"><button type="button" id="togglePassword" class="btn btn-success btn-md" required>
                        <i class="bi bi-eye-slash fs-4"></i>
                    </button></span>
                  </div>
                </div>
                <div class="mb-1">
                    <label for="exampleFormControlInput1" class="form-label">Whatsapp</label>
                </div>
                <div class="input-group mb-3">
                    <input type="text" name="wa" id="wa" class="form-control" value="{{ Auth::user()->wa }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat Lengkap</label>
                    <textarea class="form-control" name="alamat" rows="3" required>{{ Auth::user()->alamat }}</textarea>
                </div>
                <div class="mb-3">
                    <img src="{{ asset('images/users/'. Auth::user()->image) }}" alt="" width="75">
                    </td>
                    <label for="exampleInputEmail1" class="form-label">Upload Foto Anda</label>
                    <br>
                    <input type="file" name="image">
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </section>
    <script>
            document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        
        togglePassword.addEventListener('click', function (e) {
            // Toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Toggle the eye icon
            this.querySelector('i').classList.toggle('bi-eye-slash');
            this.querySelector('i').classList.toggle('bi-eye');

            this.classList.toggle('btn-outline-secondary');
            this.classList.toggle('btn-danger');
        });
    });
        document.getElementById('wa').addEventListener('input', function (e) {
            if (e.target.value.match(/[^0-9.]/)) {
                e.target.value = e.target.value.replace(/[^0-9.]/g, '');
            }
        });
    </script>
@endsection
