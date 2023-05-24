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
    $current_cover = $_FILES['current_cover'];

    // Memindahkan file cover ke direktori uploads jika ada perubahan
    if ($cover['size'] > 0) {
        $uploads_dir = 'uploads/';
        $tmp_name = $cover['tmp_name'];
        $filename = $cover['name'];
        move_uploaded_file($tmp_name, $uploads_dir . $filename);
    } else {
        $filename = $_POST['current_cover'];
    }

    // Membaca data dari file buku.txt
    $bukuData = file('buku.txt');

    // Mengupdate data buku yang sesuai dengan kode buku
    $updated = false;
    foreach ($bukuData as &$data) {
        $buku = explode("\t", $data);
        if ($buku[0] == $kode_buku) {
            $data = "$kode_buku\t$judul_buku\t$pengarang\t$penerbit\t$tahun_terbit\t$halaman\t$kategori\t$filename";
            $updated = true;
            break;
        }
    }

    // Menyimpan data yang telah diupdate ke dalam file buku.txt
    file_put_contents('buku.txt', implode("", $bukuData));

    if ($updated) {
        header("Location: data.php?status=success");
    } else {
        header("Location: data.php?status=failed");
    }
}
?>
