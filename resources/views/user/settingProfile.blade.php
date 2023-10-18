@extends('admin.layouts.main')
@section('content')
    <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
            @include('partials.navbar')
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper position-relative">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y ">
                    <!-- Layout -->
                    <div class="">

                        <div class="container-xxl flex-grow-1 container-p-y">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="card mb-4">
                                        <h5 class="card-header">Profile Details</h5>
                                        <!-- Account -->
                                        <form action="{{ route('editProfileUser', $user->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('put')
                                            <div class="card-body">
                                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                    <img src="{{ asset('storage/' . $user->profil)  }}" alt="user-avatar"
                                                        class="d-block rounded-circle" height="100" width="100"
                                                        id="uploadedAvatar" />
                                                    <div class="button-wrapper">
                                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                            <span class="d-none d-sm-block">Upload photo</span>
                                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                                            
                                                            <input type="file" id="upload" name="profil" class="account-file-input"
                                                                hidden accept="image/png, image/jpeg" />
                                                        </label>
                                                        <p class="text-muted mb-0">Allowed JPG or PNG. Max size of 1MB / 1024KB</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-0" />
                                            <div class="card-body">
                                                    <div class="row">
                                                        <div class="mb-3 col-md-6">
                                                            <label for="username" class="form-label">Nama Lengkap</label>
                                                            <input type="text" name="nama"
                                                                class="form-control @error('nama') is-invalid @enderror"
                                                                value="{{ $user->nama }}"
                                                                placeholder="Masukan nama lengkap   " required>
                                                            @error('nama')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
    
                                                        <div class="mb-3 col-md-6">
                                                        @if (auth()->user()->role === 'super admin' || auth()->user()->role === 'admin')
                                                            <label for="npm" class="form-label">NIP</label>
                                                        @else
                                                            <label for="npm" class="form-label">NPM</label>
                                                        @endif
                                                        <input type="text" name="npm"
                                                            class="form-control npm @error('npm') is-invalid @enderror"
                                                            value="{{ $user->npm }}" placeholder="contoh : G1A021082"
                                                            required oninput="toUppercase(this)">
                                                        @error('npm')
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                        </div>
    
                                                        <div class="mb-3 col-md-6">
                                                            <label for="username" class="form-label">Email</label>
                                                            <input type="text" name="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                value="{{ $user->email}}" placeholder="Masukan Email anda"
                                                                required>
                                                            @error('email')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
    
                                                        <div class="mb-3 col-md-6">
                                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                            <select name="jenis_kelamin"
                                                                class="form-control  @error('jenis_kelamin') is-invalid @enderror"
                                                                required>
                                                                <option value="Laki-Laki"
                                                                    @if (old('jenis_kelamin') == 'Laki-Laki' || $user->jenis_kelamin === 'Laki-Laki') selected @endif>Laki-Laki
                                                                </option>
                                                                <option value="Perempuan"
                                                                    @if (old('jenis_kelamin') == 'Perempuan' || $user->jenis_kelamin === 'Perempuan') selected @endif>Perempuan
                                                                </option>
                                                            </select>
                                                            @error('jenis_kelamin')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>

                                                        <div class="mb-3 col-md-6">
                                                            <label for="username" class="form-label">Jurusan</label>
                                                            <select name="jurusan" disabled
                                                                class="form-control @error('jurusan') is-invalid @enderror">
                                                                <option value="">{{ $user->jurusan }}</option>                                                             
                                                            </select>
                                                            @error('jurusan')
                                                                <div class="invalid-feedback">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
    
                                                        <div class="mb-3 col-md-6">
                                                            <label for="role" class="form-label">Role</label>
                                                            <input type="text" class="form-control" id="role"
                                                                name="role" value="{{ $user->role }}" disabled />
                                                        </div>
                                                    </div>
                                                    <!-- /Account -->
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="mb-3 col-12 mb-0 d-flex justify-content-center">
                                                        <button type="submit" class="btn btn-danger deactivate-account">Ubah
                                                            Profil</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form></form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- / Content -->
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!-- Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
        @endsection