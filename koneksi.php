<?php
$host       = "localhost"; 
$user       = "root";      
$password   = "root";          
$database   = "alumni"; // Kuncinya di sini: ubah dari 'sistem_alumni' menjadi 'alumni'

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>