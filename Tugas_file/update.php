<?php
// Menerima kode buku yang akan diupdate
$kode_buku = $_GET['kode_buku'];

// Membaca data dari file buku.txt
$bukuData = file('buku.txt');

// Mengambil data buku yang sesuai dengan kode buku
foreach ($bukuData as $data) {
    $buku = explode("\t", $data);
    if ($buku[0] == $kode_buku) {
        $judul_buku = $buku[1];
        $pengarang = $buku[2];
        $penerbit = $buku[3];
        $tahun_terbit = $buku[4];
        $halaman = $buku[5];
        $kategori = $buku[6];
        $current_cover = $buku[7];
        break;
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Update Data Buku</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Pemrograman Web Tugas File Buku</a>
    </nav>
        <div class="sidebar">
            <ul style="margin: 50px 0 0 0;">
                <li><a href="index.php">Halaman Form</a></li>
            </ul>
            <ul style="margin: 0 0 0 0;">
                <li><a href="data.php">&#8592; Kembali ke Data</a></li>
            </ul>
        </div>
        <main class="content">
            <h2 style="margin: 50px 0 30px 0;">Update Data Buku</h2>
            <form action="update_proses.php" method="post" enctype="multipart/form-data">
                <label for="judul_buku">Kode Buku</label><br>
                <input type="text" class="form-control"  name="kode_buku" value="<?php echo $kode_buku; ?>" readonly><br>
                <label for="judul_buku">Judul Buku</label><br>
                <input type="text" class="form-control" id="judul_buku" name="judul_buku" value="<?php echo $judul_buku; ?>"><br>
                <label for="pengarang">Pengarang</label><br>
                <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?php echo $pengarang; ?>"><br>
                <label for="penerbit">Penerbit</label><br>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?php echo $penerbit; ?>"><br>
                <label for="tahun_terbit">Tahun Terbit</label><br>
                <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?php echo $tahun_terbit; ?>"><br>
                <label for="halaman">Halaman</label><br>
                <input type="text" class="form-control" id="halaman" name="halaman" value="<?php echo $halaman; ?>"><br>
                <label for="kategori">Kategori</label><br>
                <input type="text" class="form-control" id="kategori" name="kategori" value="<?php echo $kategori; ?>"><br>
                <label for="cover">Cover</label><br>
                <img src="uploads/<?php echo $current_cover; ?>" style="max-height: 200px; max-width: 120px;"><br><br>
                <input type="hidden" id="current_cover" name="current_cover" value="<?php echo $current_cover;?>">
                <input type="file" class="form-control"  id="cover" name="cover"><br><br>
                <button type="submit" name="submit" style="margin: 10px 0 50px 0;" class="btn btn-primary">Submit</button>
            </form>
        <footer>
            <p>Created by Career Aura. © 2023</p>
        </footer>
        </main>
</body>
</html>

