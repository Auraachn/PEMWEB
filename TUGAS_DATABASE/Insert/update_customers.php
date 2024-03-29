<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['customerNumber'])) {
          //query SQL
          $customerNumber_upd = $_GET['customerNumber'];
          $query = "SELECT * FROM customers WHERE customerNumber = '$customerNumber_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $customerNumber = $_POST['customerNumber'];
      $customerName = $_POST['customerName'];
      $contactLastName = $_POST['contactLastName'];
      $contactFirstName = $_POST['contactFirstName'];
      $phone = $_POST['phone'];
      $addressLine1 = $_POST['addressLine1'];
      $addressLine2 = $_POST['addressLine2'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $postalCode = $_POST['postalCode'];
      $country = $_POST['country'];
      $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
      $creditLimit = $_POST['creditLimit'];

      //query SQL
      $sql = "UPDATE customers SET customerName='$customerName', contactLastName='$contactLastName', contactFirstName='$contactFirstName',
      phone='$phone', addressLine1='$addressLine1', addressLine2='$addressLine2', city='$city', state='$state', postalCode='$postalCode', country='$country', salesRepEmployeeNumber='$salesRepEmployeeNumber', creditLimit='$creditLimit'
      WHERE customerNumber='$customerNumber'";

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
    <title>UPDATE CUSTOMERS</title>
    <!-- load css boostrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
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
                <a class="nav-link" href="<?php echo "form_customers.php"; ?>">Input Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "form_products.php"; ?>">Input Products</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


          <h2 style="margin: 30px 0 30px 0;">Update Data Customers</h2>
          <form action="updateCustomers.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>No Customer</label>
              <input type="text" class="form-control" placeholder="no customer" name="customerNumber" value="<?php echo $data['customerNumber'];  ?>" required="required" readonly>
            </div>

            <div class="form-group">
              <label>Nama Customer</label>
              <input type="text" class="form-control" placeholder="nama customer" name="customerName" value="<?php echo $data['customerName'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Nama Awalan Kontak</label>
              <input type="text" class="form-control" placeholder="nama awalan kontak" name="contactLastName" value="<?php echo $data['contactLastName'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Nama Akhiran Kontak</label>
              <input type="text" class="form-control" placeholder="nama akhiran kontak" name="contactFirstName" value="<?php echo $data['contactFirstName'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>No Hp</label>
              <input type="text" class="form-control" placeholder="no hp" name="phone" value="<?php echo $data['phone'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" placeholder="alamat" name="addressLine1" value="<?php echo $data['addressLine1'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Alamat Tambahan</label>
              <input type="text" class="form-control" placeholder="alamat tambahan / jika tidak ada tulis '-'" name="addressLine2" value="<?php echo $data['addressLine2'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Kota</label>
              <input type="text" class="form-control" placeholder="kota" name="city" value="<?php echo $data['city'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>State</label>
              <input type="text" class="form-control" placeholder="state" name="state" value="<?php echo $data['state'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Kode Pos</label>
              <input type="text" class="form-control" placeholder="kode pos" name="postalCode" value="<?php echo $data['postalCode'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>No Rep Pegawai Sales</label>
              <input type="text" class="form-control" placeholder="no rep pegawai sales" name="salesRepEmployeeNumber" value="<?php echo $data['salesRepEmployeeNumber'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Limit Kartu Kredit</label>
              <input type="text" class="form-control" placeholder="limit kartu kredit" name="creditLimit" value="<?php echo $data['creditLimit'];  ?>" required="required">
            </div>
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>