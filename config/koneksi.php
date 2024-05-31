<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_pariwisata";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "Connected successfully";
}


// Mengembalikan objek koneksi
return $conn;
