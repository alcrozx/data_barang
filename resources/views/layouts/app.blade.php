<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Inventaris ATK') | {{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #172b4d;
            --muted: #738198;
            --primary: #315ee8;
            --canvas: #f5f7fb;
            --line: #e8edf5;
        }
        body {
            background: var(--canvas);
            color: var(--ink);
            font-family: Inter, "Segoe UI", Arial, sans-serif;
        }
        .navbar {
            min-height: 72px;
        }
        .brand-mark {
            align-items: center;
            background: linear-gradient(145deg, #315ee8, #6084ff);
            border-radius: 12px;
            color: #fff;
            display: inline-flex;
            font-size: 1.05rem;
            font-weight: 800;
            height: 40px;
            justify-content: center;
            margin-right: .7rem;
            width: 40px;
        }
        .brand-name {
            color: var(--ink);
            font-size: 1rem;
            font-weight: 750;
            letter-spacing: -.02em;
        }
        .page-shell {
            max-width: 1180px;
        }
        .page-title {
            font-size: clamp(1.65rem, 3vw, 2.2rem);
            font-weight: 750;
            letter-spacing: -.045em;
        }
        .subtitle, .text-muted-custom {
            color: var(--muted);
        }
        .surface {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: 16px;
            box-shadow: 0 8px 28px rgba(29, 48, 83, .045);
        }
        .stat-card {
            min-height: 126px;
            padding: 1.25rem 1.35rem;
        }
        .stat-label {
            color: var(--muted);
            font-size: .82rem;
            font-weight: 650;
            letter-spacing: .035em;
            text-transform: uppercase;
        }
        .stat-value {
            color: var(--ink);
            font-size: 1.7rem;
            font-weight: 750;
            letter-spacing: -.04em;
            margin-top: .45rem;
        }
        .stat-icon {
            align-items: center;
            background: #edf2ff;
            border-radius: 12px;
            color: var(--primary);
            display: inline-flex;
            font-size: 1.1rem;
            height: 42px;
            justify-content: center;
            width: 42px;
        }
        .btn-primary {
            --bs-btn-bg: var(--primary);
            --bs-btn-border-color: var(--primary);
            --bs-btn-hover-bg: #254bd0;
            --bs-btn-hover-border-color: #254bd0;
            border-radius: 9px;
            font-weight: 650;
            padding: .62rem 1rem;
        }
        .btn-light, .btn-outline-secondary {
            border-radius: 9px;
            font-weight: 600;
        }
        .card-heading {
            font-size: 1.05rem;
            font-weight: 700;
        }
        .table {
            --bs-table-bg: transparent;
            margin-bottom: 0;
        }
        .table thead th {
            background: #f8f9fc;
            border-bottom: 1px solid var(--line);
            color: var(--muted);
            font-size: .76rem;
            font-weight: 700;
            letter-spacing: .055em;
            padding: .9rem 1rem;
            text-transform: uppercase;
            white-space: nowrap;
        }
        .table tbody td {
            border-color: #eef1f6;
            padding: 1rem;
            vertical-align: middle;
        }
        .table tbody tr:last-child td {
            border-bottom: 0;
        }
        .code-badge {
            background: #f0f3f8;
            border-radius: 7px;
            color: #475671;
            display: inline-block;
            font-size: .82rem;
            font-weight: 700;
            padding: .35rem .55rem;
        }
        .stock-badge {
            background: #eaf7ef;
            border-radius: 999px;
            color: #21804a;
            font-size: .82rem;
            font-weight: 700;
            padding: .35rem .65rem;
        }
        .form-label {
            color: #3e4c63;
            font-size: .88rem;
            font-weight: 650;
        }
        .form-control {
            border-color: #dfe5ef;
            border-radius: 9px;
            min-height: 44px;
            padding: .6rem .8rem;
        }
        .form-control:focus {
            border-color: #9bb0ff;
            box-shadow: 0 0 0 .22rem rgba(49, 94, 232, .12);
        }
        .form-control.is-invalid {
            background-image: none;
        }
        .empty-state {
            color: var(--muted);
            padding: 3rem 1rem !important;
        }
        @media (max-width: 575.98px) {
            .table thead th, .table tbody td {
                padding-left: .75rem;
                padding-right: .75rem;
            }
            .page-content {
                padding-top: 1.5rem !important;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar bg-white border-bottom">
        <div class="container page-shell">
            <a class="navbar-brand d-flex align-items-center mb-0" href="{{ route('barangs.index') }}">
                <span class="brand-mark">A</span>
                <span class="brand-name">Ruang ATK</span>
            </a>
            <span class="badge rounded-pill text-bg-light border px-3 py-2">Sistem Inventaris</span>
        </div>
    </nav>

    <main class="container page-shell page-content py-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        @yield('content')

        <footer class="border-top mt-5 pt-4 pb-2 text-center small text-muted-custom">
            Ruang ATK <span aria-hidden="true">·</span> Aplikasi pengelolaan data barang
        </footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
