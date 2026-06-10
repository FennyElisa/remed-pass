<?php 
include 'koneksi.php'; 

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM alumni WHERE id='$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $nama               = $_POST['nama'];
    $tahun_lulus        = $_POST['tahun_lulus'];
    $jurusan            = $_POST['jurusan'];
    $pekerjaan_sekarang = $_POST['pekerjaan_sekarang'];

    $update = mysqli_query($koneksi, "UPDATE alumni SET nama='$nama', tahun_lulus='$tahun_lulus', jurusan='$jurusan', pekerjaan_sekarang='$pekerjaan_sekarang' WHERE id='$id'");
    
    if ($update) {
        header("Location: index.php");
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Alumni</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold text-gray-800 mb-6">Edit Data Alumni</h2>
        
        <form action="" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" value="<?= $data['nama']; ?>" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Tahun Lulus</label>
                <input type="number" name="tahun_lulus" value="<?= $data['tahun_lulus']; ?>" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Jurusan</label>
                <input type="text" name="jurusan" value="<?= $data['jurusan']; ?>" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Pekerjaan Sekarang</label>
                <input type="text" name="pekerjaan_sekarang" value="<?= $data['pekerjaan_sekarang']; ?>" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm">
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <a href="index.php" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md font-semibold text-sm">Batal</a>
                <button type="submit" name="update" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md font-semibold text-sm">Perbarui</button>
            </div>
        </form>
    </div>
</body>
</html>