<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Pemesanan Pariwisata </title>
</head>

<body>
    <?php
    // Include koneksi database
    $conn = include 'config/koneksi.php';

    if ($conn === false || gettype($conn) !== "object") {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Memproses data saat form disubmit
    if (isset($_POST['submit'])) {
        // Mengambil data dari form
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $time = $_POST['time'];
        $peserta = $_POST['peserta'];
        $pelayanan = isset($_POST['pelayanan']) ? implode(', ', $_POST['pelayanan']) : ''; // Menggabungkan pelayanan jika ada
        $harga = $_POST['harga'];
        $tagihan = $_POST['tagihan'];

        // Validasi input (optional, sesuaikan dengan kebutuhan)
        if (empty($nama) || empty($telp) || empty($time) || empty($peserta) || empty($harga) || empty($tagihan)) {
            die("ERROR: Semua field harus diisi.");
        }

        // Menggunakan prepared statement untuk mencegah SQL injection
        $stmt = $conn->prepare("INSERT INTO pemesanan (nama, telp, time, peserta, pelayanan, harga, tagihan) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $nama, $telp, $time, $peserta, $pelayanan, $harga, $tagihan);

        // Menjalankan query dan memeriksa apakah berhasil
        if ($stmt->execute()) {
            $dataSaved = true;
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $conn->close();

    if ($dataSaved) {
    ?>
        <div class="container">
            <div class="row justify-content-center align-items-center " style="height: 100vh;">
                <div class=" col-md-8">
                    <div class=" card">
                        <div class=" card-header">
                            <h4 class="p-2 text-center">Rangkuman Reservasi Paket Wisata</h4>
                        </div>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Nama</td>
                                    <td><?= $nama ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Peserta</td>
                                    <td><?= $peserta ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu Perjalanan</td>
                                    <td><?= $time ?></td>
                                </tr>
                                <tr>
                                    <td>Layanan Paket</td>
                                    <td><?= $pelayanan ?></td>
                                </tr>
                                <tr>
                                    <td>Harga Paket</td>
                                    <td>Rp. <?= $harga ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Tagihan</td>
                                    <td>Rp. <?= $tagihan ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="card-footer">
                            <p class="text-center p-2 fw-bold">Pesan Lagi</p>
                            <div class="d-flex justify-content-center gap-3">
                                <a href="form_pemesanan.php" class="btn btn-outline-primary px-3">Iya</a>
                                <a href="index.php" class="btn btn-outline-danger">Tidak</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>

</body>

</html>