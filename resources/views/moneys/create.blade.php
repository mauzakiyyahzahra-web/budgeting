<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi - Moneyvo</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffff;
            color: #5a4b51;
        }

        .btn-cute {
            border-radius: 12px;
            font-weight: 600;
        }
    </style>
</head>

<body class="py-5">
    <div class="container" style="max-width: 600px;">
        <div class="card card-cute p-4 bg-white">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold m-0" style="color: #ff758f;">✨ Tambah Transaksi Baru</h4>
                <a href="/" class="btn btn-sm btn-secondary btn-cute">Kembali</a>
            </div>

            <form action="/Moneys/store" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <input type="text" name="title" class="form-control" placeholder="Contoh: Makan Nasi Padang" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nominal (Rp)</label>
                    <input type="number" name="amount" class="form-control" placeholder="20000" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipe Transaksi</label>
                    <select name="type" class="form-select">
                        <option value="pengeluaran">Pengeluaran 🔴</option>
                        <option value="pemasukan">Pemasukan 🟢</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <input type="text" name="category" class="form-control" placeholder="Contoh: Makanan / Uang Saku" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="date" class="form-control" value="{{ date('Y-m-d') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Catatan Tambahan (Opsional)</label>
                    <textarea name="description" class="form-control" rows="2" placeholder="Catatan kecil..."></textarea>
                </div>
                <button type="submit" class="btn btn-danger btn-cute w-100 py-2" style="background-color: #ff758f; border:none;">Tambah Sekarang ✨</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>