<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap-5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Riwayat Pemesanan</title>
</head>

<body>
    <?php

    $conn = include 'config/koneksi.php';

    if ($conn === false || gettype($conn) !== "object") {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $dataPerPage = 10;
    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($currentPage - 1) * $dataPerPage;

    // Ambil jumlah total data
    $result = $conn->query("SELECT COUNT(*) as total FROM pemesanan");
    if ($result === false) {
        die("ERROR: Could not execute query. " . $conn->error);
    }
    $totalData = $result->fetch_assoc()['total'];

    // Hitung jumlah halaman
    $totalPages = ceil($totalData / $dataPerPage);

    // Ambil data berdasarkan halaman yang diminta
    $result = $conn->query("SELECT * FROM pemesanan LIMIT $offset, $dataPerPage");
    if ($result === false) {
        die("ERROR: Could not execute query. " . $conn->error);
    }
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();

    ?>
    <div class="container">
        <div class="row d-flex justify-content-center align-content-center mt-5">
            <div class="col-md-12 d-flex flex-column justify-content-between" style="height: 800px;">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jumlah Peserta</th>
                            <th scope="col">Waktu Perjalanan</th>
                            <th scope="col">Layanan Paket</th>
                            <th scope="col">Harga Paket</th>
                            <th scope="col">Jumlah Tagihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($rows as $row) {
                            echo "<tr>";
                            echo "<th scope='row'>{$no}</th>";
                            echo "<td>{$row['nama']}</td>";
                            echo "<td>{$row['peserta']}</td>";
                            echo "<td>{$row['time']}</td>";
                            echo "<td>{$row['pelayanan']}</td>";
                            echo "<td>{$row['harga']}</td>";
                            echo "<td>{$row['tagihan']}</td>";
                            echo "</tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
                <nav>
                    <ul class="pagination ">
                        <?php
                        if ($currentPage > 1) {
                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Previous</a></li>';
                        }

                        for ($i = 1; $i <= $totalPages; $i++) {
                            $active = $i == $currentPage ? 'active' : '';
                            echo '<li class="page-item ' . $active . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                        }

                        if ($currentPage < $totalPages) {
                            echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Next</a></li>';
                        }
                        ?>
                    </ul>
                </nav>
            </div>
            <div class="col-md-12">
                <button class="btn btn-outline-primary"><a href="form_pemesanan.php">Kembali</button>
            </div>
        </div>
    </div>

</body>

</html>