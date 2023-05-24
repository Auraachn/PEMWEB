<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas File</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Pemrograman Web Tugas File Buku</a>
    </nav>
    <div class="sidebar">
            <ul style="margin: 60px 0 0 0;">
                <li><a href="data.php">Lihat Data</a></li>
            </ul>
        </div>
    <main class="content" style="margin: 0 30px 30px 30px;" >
        <h2 style="margin: 50px 0 30px 0;">Form Data Buku</h2>
        <form action="submit.php" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="kode_buku">Kode Buku</label>
                <input type="text" class="form-control"  name="kode_buku" required>
            </div>

            <div class="form-group">
                <label for="judul_buku">Judul Buku</label>
                <input type="text" class="form-control"   class="form-control" name="judul_buku" required>
            </div>

            <div class="form-group">
                <label for="pengarang">Pengarang</label>
                <input type="text" class="form-control"  name="pengarang" required>
            </div>

            <div class="form-group">
                <label for="penerbit">Penerbit</label>
                <input type="text" class="form-control"  class="form-control"  name="penerbit" required>
            </div>       

            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit</label>
                <input type="text" class="form-control"  name="tahun_terbit" required>
            </div>

            <div class="form-group">
                <label for="halaman">Halaman</label>
                <input type="text" class="form-control"  name="halaman" required>
            </div>

            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" class="form-control"  name="kategori" required>
            </div>

            <div class="form-group">
                <label for="cover">Upload Foto Cover</label>
                <input type="file" class="form-control"  name="cover" required>
            </div>
                    
            <button type="submit" name="submit" style="margin: 10px 0 50px 0;" class="btn btn-primary">Simpan dalam file</button>
        </form>
        <footer>
            <p>Created by Career Aura. © 2023</p>
        </footer>
    </main>
</body>
</html>