@extends('layouts.app')

@section('title', 'Data Barang')

@section('content')
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
        <div>
            <p class="text-uppercase small fw-bold text-primary mb-2">Ringkasan inventaris</p>
            <h1 class="page-title mb-2">Data Barang</h1>
            <p class="subtitle mb-0">Kelola persediaan toko ATK dengan mudah dan teratur.</p>
        </div>
        <a href="#form-tambah" class="btn btn-primary">
            <span class="me-1" aria-hidden="true">＋</span> Tambah barang
        </a>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="surface stat-card d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">Jenis barang</div>
                    <div class="stat-value">{{ $barangs->count() }}</div>
                </div>
                <span class="stat-icon" aria-hidden="true">▤</span>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="surface stat-card d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">Total stok</div>
                    <div class="stat-value">{{ number_format($barangs->sum('stok'), 0, ',', '.') }}</div>
                </div>
                <span class="stat-icon" aria-hidden="true">▦</span>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-4">
            <div class="surface stat-card d-flex justify-content-between align-items-start">
                <div>
                    <div class="stat-label">Nilai persediaan</div>
                    <div class="stat-value fs-4">Rp {{ number_format($barangs->sum(fn ($barang) => $barang->harga * $barang->stok), 0, ',', '.') }}</div>
                </div>
                <span class="stat-icon" aria-hidden="true">Rp</span>
            </div>
        </div>
    </div>

    <section class="surface overflow-hidden mb-4" aria-labelledby="daftar-barang">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 p-4 border-bottom">
            <div>
                <h2 id="daftar-barang" class="card-heading mb-1">Daftar barang</h2>
                <p class="small text-muted-custom mb-0">Semua barang yang tercatat dalam inventaris.</p>
            </div>
            <span class="small text-muted-custom">{{ $barangs->count() }} barang</span>
        </div>
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col" class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangs as $barang)
                        <tr>
                            <td><span class="code-badge">{{ $barang->kode_barang }}</span></td>
                            <td class="fw-semibold">{{ $barang->nama_barang }}</td>
                            <td>Rp {{ number_format($barang->harga, 0, ',', '.') }}</td>
                            <td><span class="stock-badge">{{ number_format($barang->stok, 0, ',', '.') }} unit</span></td>
                            <td>
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('barangs.edit', $barang) }}" class="btn btn-sm btn-light border">Edit</a>
                                    <form action="{{ route('barangs.destroy', $barang) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus {{ $barang->nama_barang }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center empty-state">
                                <div class="fw-semibold text-dark mb-1">Belum ada barang</div>
                                Tambahkan barang pertama melalui formulir di bawah ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <section class="surface p-4 p-lg-5" id="form-tambah" aria-labelledby="judul-tambah">
        <div class="mb-4">
            <p class="text-uppercase small fw-bold text-primary mb-2">Entri baru</p>
            <h2 id="judul-tambah" class="card-heading mb-1">Tambah barang</h2>
            <p class="small text-muted-custom mb-0">Lengkapi detail barang untuk memasukkannya ke inventaris.</p>
        </div>
        <form action="{{ route('barangs.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-3">
                    <label for="kode_barang" class="form-label">Kode barang</label>
                    <input id="kode_barang" name="kode_barang" type="text" class="form-control @error('kode_barang') is-invalid @enderror" value="{{ old('kode_barang') }}" placeholder="Contoh: B004" required>
                    @error('kode_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <label for="nama_barang" class="form-label">Nama barang</label>
                    <input id="nama_barang" name="nama_barang" type="text" class="form-control @error('nama_barang') is-invalid @enderror" value="{{ old('nama_barang') }}" placeholder="Nama barang" required>
                    @error('nama_barang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <label for="harga" class="form-label">Harga (Rp)</label>
                    <input id="harga" name="harga" type="number" min="0" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="0" required>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input id="stok" name="stok" type="number" min="0" class="form-control @error('stok') is-invalid @enderror" value="{{ old('stok') }}" placeholder="0" required>
                    @error('stok')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary px-4">Simpan barang</button>
                </div>
            </div>
        </form>
    </section>
@endsection
