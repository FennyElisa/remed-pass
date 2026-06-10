<?php 
include 'koneksi.php'; 

// Proses Hapus Data (Delete)
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($koneksi, "DELETE FROM alumni WHERE id='$id'");
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Alumni Sekolah</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Rekam Jejak Alumni</h1>
            <a href="tambah.php" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-semibold text-sm transition">
                + Tambah Alumni
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 border-b">Nama</th>
                        <th class="py-3 px-6 border-b">Tahun Lulus</th>
                        <th class="py-3 px-6 border-b">Jurusan</th>
                        <th class="py-3 px-6 border-b">Pekerjaan Sekarang</th>
                        <th class="py-3 px-6 border-b text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM alumni ORDER BY id DESC");
                    while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="py-3 px-6 font-medium text-gray-900"><?= $data['nama']; ?></td>
                        <td class="py-3 px-6"><?= $data['tahun_lulus']; ?></td>
                        <td class="py-3 px-6"><?= $data['jurusan']; ?></td>
                        <td class="py-3 px-6"><?= $data['pekerjaan_sekarang']; ?></td>
                        <td class="py-3 px-6 text-center flex justify-center gap-2">
                            <a href="edit.php?id=<?= $data['id']; ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs font-semibold">Edit</a>
                            <a href="index.php?hapus=<?= $data['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-semibold">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>