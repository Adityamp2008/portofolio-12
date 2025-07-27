@extends('layouts.app')
@section('title', 'Informasi')
@section('content')

<div class="container">
    <div class="card shadow-sm border-light-subtle">
        <div class="card-body p-4 p-lg-5">

            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center pb-3 mb-4 border-bottom">
                <h2 class="h4 fw-bold mb-0">Pengaturan Informasi</h2>
                <button form="form-informasi" type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle me-2"></i>Simpan Perubahan
                </button>
            </div>

            <div class="row g-4 g-lg-5">

                <!-- Form Informasi -->
                <div class="col-md-7">
                    <form id="form-informasi" action="{{ route('informasi.update', $informasi->id ?? 0) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nama_lengkap" class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap"
                                   value="{{ old('nama_lengkap', $informasi->nama_lengkap ?? '') }}">
                        </div>

                        <div class="mb-4">
                            <label for="nama_panggilan" class="form-label fw-semibold">Nama Panggilan</label>
                            <input type="text" name="nama_panggilan" class="form-control" id="nama_panggilan"
                                   value="{{ old('nama_panggilan', $informasi->nama_panggilan ?? '') }}">
                        </div>

                        <div class="mb-4">
                            <label for="pekerjaan" class="form-label fw-semibold">Pekerjaan</label>
                            <input type="text" name="pekerjaan" class="form-control" id="pekerjaan"
                                   value="{{ old('pekerjaan', $informasi->pekerjaan ?? '') }}">
                        </div>

                        <div class="mb-4">
                            <label for="badge" class="form-label fw-semibold">Badge</label>
                            <input type="text" name="badge" class="form-control" id="badge"
                                   value="{{ old('badge', $informasi->badge ?? '') }}">
                        </div>

                        <div class="mb-4">
                            <label for="lokasi" class="form-label fw-semibold">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" id="lokasi"
                                   value="{{ old('lokasi', $informasi->lokasi ?? '') }}">
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label fw-semibold">Status</label>
                            <input type="text" name="status" class="form-control" id="status"
                                   value="{{ old('status', $informasi->status ?? '') }}">
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label fw-semibold">Email</label>
                            <input type="text" name="email" class="form-control" id="email"
                                   value="{{ old('email', $informasi->email ?? '') }}">
                        </div>

                        <div class="mb-4">
                            <label for="status" class="form-label fw-semibold">Nomor hp</label>
                            <input type="text" name="no_hp" class="form-control" id="no_hp"
                                   value="{{ old('no_hp', $informasi->no_hp ?? '') }}">
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="5">{{ old('deskripsi', $informasi->deskripsi ?? '') }}</textarea>
                        </div>
                    </form>
                </div>

                <!-- Upload Foto -->
                <div class="col-md-5">
    <label class="form-label fw-semibold">Foto Profil</label>
    <div class="text-center p-3 border rounded-3 bg-body-tertiary">

        {{-- Preview Foto --}}
                <img 
                    src="{{ !empty($informasi?->foto) ? asset('image/' . $informasi->foto) : 'https://via.placeholder.com/200' }}" 
                    class="rounded-circle mx-auto d-block shadow-sm"
                    style="width: 100%; max-width: 200px; height: auto; aspect-ratio: 1 / 1; object-fit: cover;" 
                    alt="Foto Profil">

        {{-- Input Upload --}}
        <input type="file" name="foto" id="foto" class="form-control mt-2" form="form-informasi">
        <p class="text-body-secondary small mt-2 mb-0">Format: 1:1  jpg/jpeg/png • Maks: 2MB</p>
    </div>
</div>


            </div>

        </div>
    </div>
</div>

@endsection
