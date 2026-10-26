@extends('layouts.app')

@section('title', 'Tambah Barang')

@section('content')
    <div class="mb-4">
        <p class="text-uppercase small fw-bold text-primary mb-2">Entri baru</p>
        <h1 class="page-title mb-2">Tambah barang</h1>
        <p class="subtitle mb-0">Masukkan informasi barang yang akan ditambahkan ke inventaris.</p>
    </div>

    <section class="surface p-4 p-lg-5">
        <form action="{{ route('barangs.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-12 col-md-6">
                    <label for="kode_barang" class="form-label">Kode barang</label>
                    <input id="kode_barang" name="kode_barang" type="text" class="form-control @error('kode_barang') is-invalid @enderror" value="{{ old('kode_barang') }}" placeholder="Contoh: B004" required>
                    @error('kode_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label for="nama_barang" class="form-label">Nama barang</label>
                    <input id="nama_barang" name="nama_barang" type="text" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang') }}" placeholder="Nama barang" required>
                    @error('nama_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label for="harga" class="form-label">Harga (Rp)</label>
                    <input id="harga" name="harga" type="number" min="0" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="0" required>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label for="stok" class="form-label">Stok</label>
                    <input id="stok" name="stok" type="number" min="0" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}" placeholder="0" required>
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 d-flex flex-column flex-sm-row justify-content-end gap-2 mt-4">
                    <a href="{{ route('barangs.index') }}" class="btn btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary px-4">Simpan barang</button>
                </div>
            </div>
        </form>
    </section>
@endsection
