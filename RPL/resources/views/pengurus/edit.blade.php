@extends('layouts.app')

@section('title','Edit Pengurus')

@section('contents')

<!-- Main -->
<main id="main" class="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Form Edit Pengurus</h5>
            @if ($errors->any())
            <div class="alert alert-danger">
                <div class="alert-title">
                    <h4>Whoops!</h4>
                </div>
                There are some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
            <div class="alert alert-success">{{ session('error') }}</div>
            @endif

            <!-- Vertical Form -->
            <form class="row g-3" action="{{ route('pengurus.update', $penguruses->Nim) }}" method="POST">
            @method('PUT')
                @csrf
                <div class="col-12">
                    <label for="Nim" class="form-label">Nim <span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="Nim" name="Nim" value="{{ old('Nim', $penguruses->Nim) }}" readonly>
                </div>
                <div class="col-12">
                    <label for="Nama" class="form-label">Nama <span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="Nama" name="Nama" value="{{ old('Nama', $penguruses->Nama) }}" oninput="validateAlphabeticInput(this)">
                </div>
                <div class="col-12">
                                <label for="Organisasi" class="form-label">Organisasi <span style="color: red;">*</span></label>
                                <select name="organisasi_id" class="form-control" id="organisasi_id">
                                    <option value="">-- Organisasi --</option>
                                    @foreach ($organisasis as $organisasiID => $nama)
                                    <option value="{{ $organisasiID }}" @selected(old('organisasi_id') == $organisasiID || $penguruses->organisasi_id == $organisasiID)>
                                    {{ $nama }}
                                    </option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-12">
                                <label for="Divisi" class="form-label">Divisi <span style="color: red;">*</span></label>
                                <select name="divisi_id" class="form-control" id="divisi_id">
                                    <option value="">-- Divisi --</option>
                                    @foreach ($divisis as $divisiID => $nama)
                                    <option value="{{ $divisiID }}" @selected(old('divisi_id') == $divisiID || $penguruses->divisi_id == $divisiID)>
                                    {{ $nama }}
                                    </option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-12">
                                <label for="Jabatan" class="form-label">Jabatan <span style="color: red;">*</span></label>
                                <select name="jabatan_id" class="form-control" id="jabatan_id">
                                    <option value="">-- Jabatan --</option>
                                    @foreach ($jabatans as $jabatanID => $nama)
                                    <option value="{{ $jabatanID }}" @selected(old('jabatan_id') == $jabatanID || $penguruses->jabatan_id == $jabatanID)>
                                    {{ $nama }}
                                    </option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-12">
                                <label for="Prodi" class="form-label">Program Studi <span style="color: red;">*</span></label>
                                <select name="prodi_id" class="form-control" id="prodi_id">
                                    <option value="">-- Program Studi --</option>
                                    @foreach ($programStudis as $programStudiID => $nama)
                                    <option value="{{ $programStudiID }}" @selected(old('prodi_id') == $programStudiID || $penguruses->program_studi_id == $programStudiID)>
                                    {{ $nama }}
                                    </option>
                                    @endforeach
                                </select>
                                </div>
                <div class="col-12">
                    <label for="Password" class="form-label">Password <span style="color:red">*</span></label>
                    <div class="input-group">
                    <input type="password" class="form-control" id="Password" name="Password"
                        value="{{ old('Password', $penguruses->Password) }}">
                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                        <i class="bi bi-eye"></i>
                    </button>
                    </div>
                </div>
                <div class="col-12">
                    <label for="PasswordConfirmation" class="form-label">Password Konfirmasi <span style="color:red">*</span></label>
                    <input type="password" class="form-control" id="PasswordConfirmation" name="PasswordConfirmation">
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form><!-- Vertical Form -->
        </div>
</main>
<!-- End - Main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<script>
    // Lihat password
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('Password');
        const fieldType = passwordField.getAttribute('type');

        if (fieldType === 'password') {
            passwordField.setAttribute('type', 'text');
        } else {
            passwordField.setAttribute('type', 'password');
        }
    });

            function validateNumericInput(input) {
                input.value = input.value.replace(/\D/g, ''); // Remove non-numeric characters
            }

            function validateAlphabeticInput(input) {
                input.value = input.value.replace(/[^A-Za-z ]/g, ''); // Remove non-alphabetic characters
            }
</script>
@endsection