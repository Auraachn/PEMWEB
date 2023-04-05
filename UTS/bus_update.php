<?php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_bus'])) {
          //query SQL
          $id_bus_upd = $_GET['id_bus'];
          $query = "SELECT * FROM bus WHERE id_bus = '$id_bus_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_bus = $_POST['id_bus'];
      $plat = $_POST['plat'];
      $status = $_POST['status'];
      //query SQL
      $sql = "UPDATE bus SET plat='$plat', status='$status' WHERE id_bus='$id_bus'";

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
    <title>UPDATE BUS</title>
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

          <h2 style="margin: 30px 0 30px 0;">Update Data Bus</h2>
          <form action="bus_update.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>

            <div class="form-group">
              <label>id_bus</label>
              <input type="text" class="form-control" placeholder="id_bus" name="id_bus" value="<?php echo $data['id_bus'];  ?>" required="required" readonly>
            </div>

            <div class="form-group">
              <label>Plat Nomor Bus</label>
              <input type="text" class="form-control" placeholder="plat nomor" name="plat" value="<?php echo $data['plat'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Status Bus</label> <br>
              <label>0 = rusak / 1 = aktif / 2 = cadangan </label>
              <input type="number" class="form-control" placeholder="status" name="status" value="<?php echo $data['status'];  ?>" required="required">
            </div>

            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>