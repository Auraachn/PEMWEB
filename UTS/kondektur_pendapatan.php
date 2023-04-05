
<!DOCTYPE html>
<html>
  <head>
    <title>PENDAPATAN KONDEKTUR</title>
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
        <div id="kondektur">
        <h2 style="margin: 30px 0 30px 0; ">Pendapatan Kondektur</h2>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
        <form method="post" action="">
        <div class="form-group">
              <label>ID Kondektur</label>
              <input type="text" class="form-control" placeholder="id kondektur" name="id_kondektur" required="required">
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
            $id_kondektur = $_POST['id_kondektur'];
            $bulan = $_POST['bulan'];
            $query = "SELECT * FROM trans_upn WHERE id_kondektur = $id_kondektur AND MONTH(tanggal) = $bulan";
            $result = mysqli_query(connection(),$query);

            $total_gaji_kondektur = 0;

            while ($row = mysqli_fetch_array($result)) {
              $id_kondektur = $row['id_kondektur'];
              $jumlah_km = $row['jumlah_km'];

              $gaji_kondektur = $jumlah_km * 1500;

              $total_gaji_kondektur += $gaji_kondektur;
            }
            echo"<br><br><br> <br>";
            echo "<h2 style='margin: 30px 0 30px 0; '>Hasil Perhitungan pendapatan Kondektur dengan ID $id_kondektur pada Bulan " . date("F", mktime(0, 0, 0, $bulan, 10)) . "</h2>";
            echo "<div class ='form-control'> Total Gaji Kondektur: <b>Rp " . number_format($total_gaji_kondektur, 0, ',', '.') . "</b></div>";
          }

          ?>
        </main>
      </div>
    </div>
  </body>
</html>