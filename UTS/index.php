<?php
include ('conn.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>MAIN</title>
    <style>
        .red {
          
          background-color: lightcoral ; opacity: 70%;
        }
        .green{
          background-color: lightgreen; opacity: 70%
        }
        .yellow{
          background-color: rgba(255,255,102); opacity: 70%
        }
        .dot {
          height: 25px;
          width: 25px;
          background-color: #bbb;
          border-radius: 50%;
          display: inline-block;
        }

    </style>
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
            <ul class="nav flex-column" style="margin-top:40px;">
               <li class="nav-item">
                <br>
                <a class="nav-link active" href="<?php echo "index.php"; ?>">TRANS UPN</a>
                <ul class="nav flex-column">
                  <li class="nav-item"><a class="nav-link" style="margin-left: 20px" href="#Bus">Data Bus</a></li>
                  <li class="nav-item"><a class="nav-link" style="margin-left: 20px" href="#Driver">Data Driver</a></li>
                  <li class="nav-item"><a class="nav-link" style="margin-left: 20px" href="#Kondektur">Data Kondektur</a></li>
                  <li class="nav-item"><a class="nav-link" style="margin-left: 20px" href="#Trans_UPN">Data Detail Trans UPN</a></li>
                </ul>
              </li>
              <ul class="nav flex-column" style="margin-left: 20px">
              <br>
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
              <br>
              <ul>
                <li>
                <a class="nav-link" href="<?php echo "driver_pendapatan.php"; ?>">Pendapatan Driver (bulan)</a>
                </li>
                <li>
                <a class="nav-link" href="<?php echo "kondektur_pendapatan.php"; ?>">Pendapatan kondektur (bulan)</a>
                </li>
              </ul>
              <br><br>
              <div class="form-control" >
              <p class="nav-link" style="margin-right: 20px">Aura Choirun Nisa <br> (211081010173)</p>
            </div>
            </ul>
          </div>
          
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data gagal di-update</div>';
              }

            }
           ?>

        <main>
          <h2 style="margin: 30px 0 0 0; ">Data Bus</h2>
          <div class = "item3">
                <form method = "get">
                    <label for="status" style="margin: 30px 30px 30px 30px;">Filter data Bus berdasarkan status : </label>
                    <select class="select_filter form-control" id="status_id" name="status" required>
                        <option value="all">-- Pilih status --</option>
                        <option value="1" <?php if (isset($_GET['status']) && $_GET['status'] == 1) {
                            echo " selected";
                        } ?>>
                            Beroperasi / Aktif</option>
                        <option value="2" <?php if (isset($_GET['status']) && $_GET['status'] == 2) {
                            echo " selected";
                        } ?>>
                            Cadangan</option>
                        <option value="0" <?php if (isset($_GET['status']) && $_GET['status'] == 0) {
                            echo " selected";
                        } ?>>
                            Dalam Perbaikan / Rusak</option>
                    </select>
                    <br>
                    <input  type="submit" class="btn btn-primary" value="Filter">
                    </form>
          <div class="table-responsive">
            <br>
            <table class="table table-striped table-sm">
              <thead align="center">
                <tr>
                  <th>ID Bus</th> 
                  <th>Plat</th> 
                  <th>Status</th>
                  <th>Jumlah Kilometer</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  if (isset($_GET['status'])) {
                    $status = $_GET['status'];
                    // $query = "SELECT * FROM bus WHERE status = $status";
                    $query = "select bus.id_bus,bus.plat,bus.status,trans_upn.jumlah_km from bus join trans_upn on bus.id_bus = trans_upn.id_trans_upn WHERE status = '$status'";
                } else {
                    // $query = "SELECT * FROM bus";
                    $query = "select bus.id_bus,bus.plat,bus.status,trans_upn.jumlah_km from bus join trans_upn on bus.id_bus = trans_upn.id_trans_upn";
                }
                $result = mysqli_query(connection(), $query);
                ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr align="center" >
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['plat'];  ?></td>
                    <td class="<?php echo $data['status'] == '1' ? 'green' : ($data['status'] == '2' ? 'yellow' : 'red'); ?>"><?php echo $data['status'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td>
                     <a href="<?php echo "bus_update.php?id_bus=".$data['id_bus']; ?>" class="btn btn-outline-warning btn-sm">Update</a>
                      &nbsp;&nbsp;
                     <a href="<?php echo "bus_delete.php?id_bus=".$data['id_bus']; ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
                </tbody>
                 </table>
                 </div>
                 </div>
                 <div id="Driver">
                 <h2 style="margin: 30px 0 30px 0; ">Data Driver</h2>
                 <div class="table-responsive">
                 <table class="table table-striped table-sm">
                 <thead align="center">
                <tr>
                  <th>ID Driver</th>
                  <th>Nama</th>
                  <th>No SIM</th>
                  <th>Alamat</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  $query = "SELECT * FROM driver";
                  
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr align="center" class="table table-striped table-sm">
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td><?php echo $data['no_sim'];  ?></td>
                    <td><?php echo $data['alamat'];  ?></td>
                    <td>
                     <a href="<?php echo "driver_update.php?id_driver=".$data['id_driver']; ?>" class="btn btn-outline-warning btn-sm">Update</a>
                      &nbsp;&nbsp;
                     <a href="<?php echo "driver_delete.php?id_driver=".$data['id_driver']; ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                  <?php $no++; ?>
                 <?php endwhile ?>
                </tbody>
                 </table>
                 </div>
                 </div>
                 
          <div id="Kondektur">
          <h2 style="margin: 30px 0 30px 0; ">Data Kondektur</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead align="center">
                <tr>
                  <th>ID Kondektur</th>
                  <th>Nama</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  $query1 = "SELECT * FROM kondektur";
                  
                  $result1 = mysqli_query(connection(),$query1);
                 ?>
                
                 <?php while($data = mysqli_fetch_array($result1)): ?>
                  <tr align="center">
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['nama'];  ?></td>
                    <td>
                      <a href="<?php echo "kondektur_update.php?id_kondektur=".$data['id_kondektur']; ?>" class="btn btn-outline-warning btn-sm">Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "kondektur_delete.php?id_kondektur=".$data['id_kondektur']; ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                  <?php $no++; ?>
                 <?php endwhile ?>
                 </div>
              </tbody>
            </table>
          </div>
          </div>

          <div id="Trans_UPN">
          <h2 style="margin: 30px 0 30px 0; ">Data Trans UPN</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead align="center">
                <tr>
                  <th>ID Trans UPN</th>
                  <th>ID Kondektur</th>
                  <th>ID Bus</th>
                  <th>ID Driver</th>
                  <th>Jumlah KM (Jarak)</th>
                  <th>Tanggal</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  $query2 = "SELECT * FROM trans_upn";
                  
                  $result2 = mysqli_query(connection(),$query2);
                 ?>
                
                 <?php while($data = mysqli_fetch_array($result2)): ?>
                  <tr align="center">
                    <td><?php echo $data['id_trans_upn'];  ?></td>
                    <td><?php echo $data['id_kondektur'];  ?></td>
                    <td><?php echo $data['id_bus'];  ?></td>
                    <td><?php echo $data['id_driver'];  ?></td>
                    <td><?php echo $data['jumlah_km'];  ?></td>
                    <td ><?php echo $data['tanggal'];  ?></td>
                    <td>
                      <a href="<?php echo "detail_update.php?id_trans_upn=".$data['id_trans_upn']; ?>" class="btn btn-outline-warning btn-sm">Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "detail_delete.php?id_trans_upn=".$data['id_trans_upn']; ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                  <?php $no++; ?>
                 <?php endwhile ?>
                 </div>
              </tbody>
            </table>
          </div>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>