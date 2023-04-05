<?php 
  include ('conn.php'); 

  $status = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_kondektur'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];
    
    $query = "INSERT INTO trans_upn VALUES('$id_trans_upn','$id_kondektur', '$id_bus', '$id_driver', '$jumlah_km', '$tanggal')"; 

    $result = mysqli_query(connection(),$query);
    if ($result) {
        $status = 'ok';
    }
    else{
        $status = 'err';
    }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>FORM KONDEKTUR</title>
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
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Trans UPN berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Trans UPN gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Detail</h2>
          <form action="detail_form.php" method="POST">
            
            <div class="form-group">
              <label>ID Trans UPN</label>
              <input type="text" class="form-control" placeholder="id trans upn" name="id_trans_upn" required="required">
            </div>

            <div class="form-group">
              <label>ID Kondektur</label>
              <input type="text" class="form-control" placeholder="id_kondektur" name="id_kondektur" required="required">
            </div>
            
            <div class="form-group">
              <label>ID Bus</label>
              <input type="text" class="form-control" placeholder="id bus" name="id_bus" required="required">
            </div>

            <div class="form-group">
              <label>ID Driver</label>
              <input type="text" class="form-control" placeholder="id driver" name="id_driver" required="required">
            </div>
            
            <div class="form-group">
              <label>Jumlah Kilometer</label>
              <input type="text" class="form-control" placeholder="jumlah kilometer" name="jumlah_km" required="required">
            </div>

            <div class="form-group">
              <label>tanggal</label>
              <input type="date" class="form-control"  name="tanggal" required="required">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>