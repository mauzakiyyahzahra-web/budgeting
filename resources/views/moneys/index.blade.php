<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moneyvo</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffff;
            color: #5a4b51;
        }

        .card-cute {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(230, 180, 200, 0.2);
            transition: transform 0.2s;
        }

        .card-cute:hover {
            transform: translateY(-3px);
        }

        .bg-pemasukan {
            background-color: #d1f2eb;
            color: #117864;
        }

        .bg-pengeluaran {
            background-color: #fadbd8;
            color: #78281f;
        }

        .bg-saldo {
            background-color: #e8daef;
            color: #512e5f;
        }

        .btn-cute {
            border-radius: 12px;
            font-weight: 600;
        }

        .badge-cute {
            border-radius: 10px;
            padding: 6px 12px;
        }
    </style>
</head>

<body class="py-5">

    <div class="container">
        <!-- Header -->
        <div class="text-center mb-4">
            <h1 class="fw-bold" style="color: #ff758f;">Moneyvo</h1>
            <p class="text-muted">Catatan Keuangan Anak Kos</p>
        </div>

        <!-- alert Notifikasi -->
         @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show card-cute mb-4" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
        <!-- Cards Summary (Ringkasan Saldo) -->
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card card-cute bg-pemasukan p-3 text-center">
                    <small class="fw-bold">🌱 Total Pemasukan</small>
                    <h3 class="fw-bold mt-1 mb-0">Rp {{number_format($totalPemasukan, 0, ',', '.')}}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-cute bg-pengeluaran p-3 text-center">
                    <small class="fw-bold">🛍️ Total Pengeluaran</small>
                    <h3 class="fw-bold mt-1 mb-0">Rp {{number_format($totalPengeluaran, 0, ',', '.')}}</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-cute bg-saldo p-3 text-center">
                    <small class="fw-bold">💎 Sisa Duit (Saldo)</small>
                    <h3 class="fw-bold mt-1 mb-0">Rp {{number_format( $sisaDuit, 0, ',', '.')}}</h3>
                </div>
            </div>
        </div>

        <!-- Tombol Tambah Transaksi -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold m-0">Riwayat Transaksi</h4>
            <!-- Diubah menjadi link menuju route create -->
            <a href="/Moneys/create" class="btn btn-danger btn-cute px-3 py-2 text-decoration-none" style="background-color: #ff758f; border:none;">
                Tambah Transaksi
            </a>
        </div>

        <!-- Tabel Data Transaksi -->
        <div class="card card-cute bg-white p-3 shadow-md border border-secondary">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr class="text-secondary">
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Kategori</th>
                            <th>Tipe</th>
                            <th>Nominal</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($moneys as $item)
                        <tr>
                            <td>{{$item->date}}</td>
                            <td>
                                <strong>{{$item->title}}</strong>
                                <br><small class="text-muted">{{$item->description}}</small>
                            </td>
                            <td><span class="badge bg-light text-dark badge-cute">{{$item->category}}</span></td>
                            <td>
                                @if($item->type == 'pemasukan')
                                 <span class="badge bg-success badge-cute">Pemasukan</span>
                                @else
                                <span class="badge bg-danger badge-cute">Pengeluaran</span>
                                @endif
                            </td>
                            <td class="fw-bold {{$item->type == 'pemasukan' ? 'text-success' : 'text-danger'}}">
                                {{$item-> type == 'pemasukan' ? '+' : '-'}} Rp {{number_format($item->amount, 0, ',', '.')}}
                            </td>
                            <td class="text-center">
                                <!-- Tombol Edit diubah menjadi link menuju halaman edit -->
                                <a href="{{route('Moneys.edit', $item->id)}}" class="btn btn-sm btn-warning btn-cute text-white">Edit</a>

                                <!-- Delete  -->
                                <form action="{{route('Moneys.destory', $item ->id)}}" method="POST" class="d-inline" onsubmit="return confrim('yakin akan menghapus?')">
                                    @csrf 
                                    @method('DELETE')
                                     <button class="btn btn-sm btn-outline-danger btn-cute">Hapus</button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>