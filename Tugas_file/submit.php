
<?php
if (isset($_POST['submit'])) {
    // Mendapatkan data dari form
    $kode_buku = $_POST['kode_buku'];
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $halaman = $_POST['halaman'];
    $kategori = $_POST['kategori'];
    $cover = $_FILES['cover'];

    // Memindahkan file cover ke direktori uploads
    $uploads_dir = 'uploads/';
    $tmp_name = $cover['tmp_name'];
    $filename = $cover['name'];
    move_uploaded_file($tmp_name, $uploads_dir . $filename);

    // Menyimpan data dalam file buku.txt
    $data = "$kode_buku\t$judul_buku\t$pengarang\t$penerbit\t$tahun_terbit\t$halaman\t$kategori\t$filename\n";
    $result = file_put_contents('buku.txt', $data, FILE_APPEND);

    if ($result !== false) {
        // Data buku berhasil disimpan
        header("Location: data.php?statussubmit=submitsuccess");
        exit();
    } else {
        // Gagal menyimpan data buku
        header("Location: data.php?statussubmit=submiterror");
        exit();
    }
}
?>
