<?php
  include ('conn.php');

  $status = '';
  $result = '';
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_trans_upn'])) {
          //query SQL
          
          $id_trans_upn_upd = $_GET['id_trans_upn'];
          $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_trans_upn = $_POST['id_trans_upn'];
        $id_kondektur = $_POST['id_kondektur'];
        $id_bus = $_POST['id_bus'];
        $id_driver = $_POST['id_kondektur'];
        $jumlah_km = $_POST['jumlah_km'];
        $tanggal = $_POST['tanggal'];

      //query SQL
      $sql = "UPDATE trans_upn SET id_kondektur='$id_kondektur', id_bus='$id_bus', id_driver='$id_driver', jumlah_km='$jumlah_km', tanggal='$tanggal' WHERE id_trans_upn='$id_trans_upn'";

      //eksekusi query
      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }

      //redirect ke halaman lain
      header('Location: index.php?status='.$status);
  }


?>

<!DOCTYPE html>
<html>
  <head>
    <title>UPDATE PRODUCTS</title>
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
                <div class="form-control">
                    <a class="nav-link" href="<?php echo "driver_form.php"; ?>">Input Driver</a>
                </div>
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

          <h2 style="margin: 30px 0 30px 0;">Update Data Kondektur</h2>
          <form action="detail_update.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>

            <div class="form-group">
              <label>ID Trans UPN</label>
              <input type="text" class="form-control" placeholder="id trans upn" name="id_trans_upn" value="<?php echo $data['id_trans_upn'];  ?>" required="required" readonly>
            </div>

            <div class="form-group">
              <label>ID Kondektur</label>
              <input type="text" class="form-control" placeholder="id kondektur" name="id_kondektur" value="<?php echo $data['id_kondektur'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>ID Bus</label>
              <input type="text" class="form-control" placeholder="id bus" name="id_bus" value="<?php echo $data['id_bus'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>ID Driver</label>
              <input type="text" class="form-control" placeholder="id driver" name="id_driver" value="<?php echo $data['id_driver'];  ?>" required="required">
            </div>
            
            <div class="form-group">
              <label>Jumlah Kilometer</label>
              <input type="text" class="form-control" placeholder="jumlah kilometer" name="jumlah_km" value="<?php echo $data['jumlah_km'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>tanggal</label>
              <input type="date" class="form-control"  name="tanggal" value="<?php echo $data['tanggal'];  ?>" required="required">
            </div>

            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>