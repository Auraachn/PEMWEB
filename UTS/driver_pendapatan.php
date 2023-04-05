


<!DOCTYPE html>
<html>
  <head>
    <title>PENDAPATAN DRIVER</title>
    <!-- load css boostrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">UTS Pemrograman Web</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
               <li class="nav-item">
                <a class="nav-link active" href="<?php echo "index.php"; ?>">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "bus_form.php"; ?>">Input Bus</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "driver_form.php"; ?>">Input Driver</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "kondektur_form.php"; ?>">Input Kondektur</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "detail_form.php"; ?>">Input Detail</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div id="driver">
        <h2 style="margin: 30px 0 30px 0; ">Pendapatan driver</h2>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
        <form method="post" action="">
        <div class="form-group">
              <label>ID Driver</label>
              <input type="text" class="form-control" placeholder="id driver" name="id_driver" required="required">
        </div>

        <div class="form-group">
        <label for="bulan">Pilih Bulan:</label> <br>
        <select name="bulan" class="form-control" id="bulan">
          <option value="01">Januari</option>
          <option value="02">Februari</option>
          <option value="03">Maret</option>
          <option value="04">April</option>
          <option value="05">Mei</option>
          <option value="06">Juni</option>
          <option value="07">Juli</option>
          <option value="08">Agustus</option>
          <option value="09">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select>
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Hitung">
      </form>
          <?php
          include ('conn.php'); 

          if (isset($_POST['submit'])) {
            $id_driver = $_POST['id_driver'];
            $bulan = $_POST['bulan'];
            $query = "SELECT * FROM trans_upn WHERE id_driver = $id_driver AND MONTH(tanggal) = $bulan";
            $result = mysqli_query(connection(),$query);

            $total_gaji_driver = 0;

            while ($row = mysqli_fetch_array($result)) {
              $id_driver = $row['id_driver'];
              $jumlah_km = $row['jumlah_km'];

              $gaji_driver = $jumlah_km * 3000;

              $total_gaji_driver += $gaji_driver;
            }
            echo"<br><br><br> <br>";
            echo "<h2 style='margin: 30px 0 30px 0; '>Hasil Perhitungan pendapatan Driver dengan ID $id_driver pada Bulan " . date("F", mktime(0, 0, 0, $bulan, 10)) . "</h2>";
            echo "<div class ='form-control'> Total Gaji Driver: <b>Rp " . number_format($total_gaji_driver, 0, ',', '.') . "</b></div>";
          }

          ?>
        </main>
      </div>
    </div>
  </body>
</html>