<?php 
include 'koneksi.php'; 

if (isset($_POST['submit'])) {
    $nama               = $_POST['nama'];
    $tahun_lulus        = $_POST['tahun_lulus'];
    $jurusan            = $_POST['jurusan'];
    $pekerjaan_sekarang = $_POST['pekerjaan_sekarang'];

    $insert = mysqli_query($koneksi, "INSERT INTO alumni (nama, tahun_lulus, jurusan, pekerjaan_sekarang) VALUES ('$nama', '$tahun_lulus', '$jurusan', '$pekerjaan_sekarang')");
    
    if ($insert) {
        header("Location: index.php");
    } else {
        echo "<script>alert('Gagal menambah data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Alumni</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Tambah Data Alumni</h2>
        
        <form action="" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Tahun Lulus</label>
                <input type="number" name="tahun_lulus" placeholder="Contoh: 2024" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Jurusan</label>
                <input type="text" name="jurusan" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Pekerjaan Sekarang</label>
                <input type="text" name="pekerjaan_sekarang" placeholder="Isi 'Belum Bekerja' jika belum" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <a href="index.php" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md font-semibold text-sm">Kembali</a>
                <button type="submit" name="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold text-sm">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>