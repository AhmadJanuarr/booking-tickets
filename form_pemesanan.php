<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Proses Pemesanan</title>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class=" col-md-8 ">
                <div class=" card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Pemesanan Paket Pariwisata</h5>
                        <button type="button" class="btn btn-outline-info "> <a href="riwayat_pemesanan.php" class="text-dark">Riwayat Pemesanan</a></button>
                    </div>
                    <form action="./save_pemesanan.php" id="formPemesanan" class="needs-validation" method="POST" novalidate>
                        <div class="row p-3">
                            <label for="nama-pemesanan" class="col-sm-3 col-form-label">Nama Pemesanan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama-pemesanan" name="nama" required>
                                <div class="invalid-feedback">
                                    Masukan Nama Anda
                                </div>
                                <div class="valid-feedback">Nama Sudah Terisi</div>
                            </div>

                        </div>
                        <div class="row p-3">
                            <label for="telp" class="col-sm-3 col-form-label">Nomor Telp/Hp</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="telp" name="telp" required>
                            </div>
                            <div class="invalid-feedback">
                                Masukan Nomor Telp/Hp Anda
                            </div>
                        </div>
                        <div class="row p-3">
                            <label for="time" class="col-sm-3 col-form-label">Waktu Pelaksanaan Perjalanan</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="time" name="time" required>
                            </div>
                            <div class="invalid-feedback">
                                Masukan Waktu Pelaksanaan Perjalanan
                            </div>
                        </div>
                        <div class="row p-3">
                            <label for="peserta" class="col-sm-3 col-form-label">Jumlah Peserta</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="peserta" name="peserta" required>
                                <div class="invalid-feedback">
                                    Masukan Jumlah Peserta
                                </div>
                            </div>
                        </div>
                        <fieldset class="row p-3">
                            <legend class="col-form-label col-sm-3 pt-0">Pelayanan Paket Perjalanan</legend>
                            <div class="col-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck1" name="pelayanan[]" value="Penginapan" data-harga="1000000">
                                    <label class="form-check-label" for="gridCheck1">
                                        Penginapan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck2" name="pelayanan[]" value="Transportasi" data-harga="1200000">
                                    <label class="form-check-label" for="gridCheck2">
                                        Transportasi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck3" name="pelayanan[]" value="Makanan" data-harga="500000">
                                    <label class="form-check-label" for="gridCheck3">
                                        Makanan
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-2 ">
                                <label>Keterangan<span class="text-danger">*</span></label>
                            </div>
                            <div class="col-sm-5 ">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="pe-3">Penginapan</td>
                                            <td>Rp. 1.000.000</td>
                                        </tr>
                                        <tr>
                                            <td>Transportasi</td>
                                            <td>Rp. 1.200.000</td>
                                        </tr>
                                        <tr>
                                            <td>Penginapan</td>
                                            <td>Rp. 500.000</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                        <div class="row p-3">
                            <label for="harga" class="col-sm-3 col-form-label">Harga Paket Perjalanan</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="harga" name="harga">
                            </div>
                        </div>
                        <div class="row p-3">
                            <label for="tagihan" class="col-sm-3 col-form-label">Jumlah Tagihan</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="tagihan" name="tagihan">

                            </div>
                        </div>
                        <table>
                            <tbody>
                                <tr></tr>
                            </tbody>
                        </table>
                        <div class="row p-3">
                            <div class="col-md-2 d-flex gap-2">
                                <button type="submit" value="submit" name="submit" class="btn btn-outline-primary text-black" data-bs-target="#exampleModal">Simpan</button>
                                <button type="reset" class="btn btn-outline-danger"><a href="index.php">Batal</a></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="assets/script.js"></script>
</body>

</html>