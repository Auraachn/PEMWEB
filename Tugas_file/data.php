<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="index.php">Pemrograman Web Tugas File Buku</a>
    </nav>
        <div class="sidebar">
            <ul style="margin: 60px 0 0 0;">
                <li><a href="index.php">Halaman Form</a></li>
                <li><a href="data.php">Refresh Halaman</a></li>
            </ul>
        </div>
        <main role="main" class= "content" style="margin: 0 30px 30px 30px;">
            <?php
            if (isset($_GET['status'])) {
                $status = $_GET['status'];
                if ($status == "success") {
                    echo '<br><br><div class="alert alert-success" role="alert">Data berhasil di-update</div>';
                  }
                  elseif($status=='failed'){
                    echo '<br><br><div class="alert alert-danger" role="alert">Data gagal di-update</div>';
                  }
            }
            ?>
            <?php
            if (isset($_GET['statussubmit'])) {
                $status = $_GET['statussubmit'];
                if ($status == "submitsuccess") {
                    echo '<br><br><div class="alert alert-success" role="alert">Data berhasil ditambahkan</div>';
                  }
                  elseif($status=='submiterror'){
                    echo '<br><br><div class="alert alert-danger" role="alert">Data gagal ditambahkan</div>';
                  }
            }
            ?>
            <?php
            if (isset($_GET['statusdelete'])) {
                $status = $_GET['statusdelete'];
                if ($status == "success") {
                    echo '<br><br><div class="alert alert-success" role="alert">Data berhasil dihapus</div>';
                  }
                  elseif($status=='notsuccess'){
                    echo '<br><br><div class="alert alert-danger" role="alert">Data gagal dihapus</div>';
                  }
            }
            ?>
            <h2 style="margin: 50px 0 30px 0;">Data Buku</h2>
            <?php
            $bukuData = file('buku.txt');
            
            if (empty($bukuData)) {
                echo "<p>Tidak ada data yang tersedia.</p>";
            } else {
                echo '<table class="table table-striped table-sm" style="text-align: center">';
                echo '<tr>';
                echo '<th>Kode Buku</th>';
                echo '<th>Judul Buku</th>';
                echo '<th>Pengarang</th>';
                echo '<th>Penerbit</th>';
                echo '<th>Tahun Terbit</th>';
                echo '<th>Halaman</th>';
                echo '<th>Kategori</th>';
                echo '<th>Cover</th>';
                echo '<th>Action</th>';
                echo '</tr>';

                foreach ($bukuData as $data) {
                    $buku = explode("\t", $data);
                    if (count($buku) == 8) {
                        echo '<tr>';
                        echo "<td>".$buku[0]."</td>
                        <td>".$buku[1]."</td>
                        <td>".$buku[2]."</td>
                        <td>".$buku[3]."</td>
                        <td>".$buku[4]."</td>
                        <td>".$buku[5]."</td>
                        <td>".$buku[6]."</td>";
                        echo "<td><img src='uploads/".$buku[7]."' style='max-height: 200px; max-width: 120px; object-fit: contain;'></td>";
                        echo '<td>';
                        echo "<a href='update.php?kode_buku=".$buku[0]."' class='btn btn-outline-warning btn-sm'>Update</a> <br><br>";
                        echo "<a href='delete.php?kode_buku=".$buku[0]."' class='btn btn-outline-danger btn-sm'>Delete</a>";
                        echo '</td>';
                        echo '</tr>';
                    } else {
                        echo '<tr>';
                        echo "<td colspan='9'>Data tidak valid</td>";
                        echo '</tr>';
                    }
                }

                echo '</table>';
            }
            ?>
            <footer>
                <p>Created by Career Aura. © 2023</p>
            </footer>
        </main>
        
</body>
</html>


