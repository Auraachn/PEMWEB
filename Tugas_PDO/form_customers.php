<?php 
  include ('conn.php'); 

  $status = '';
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
    
    $query = $conn->prepare("INSERT INTO customers VALUES('$customerNumber', '$customerName', '$contactLastName', '$contactFirstName', '$phone', '$addressLine1', '$addressLine2', '$city', '$state', '$postalCode', '$country', '$salesRepEmployeeNumber', '$creditLimit')");
    
    $query->bindParam(':customerNumber',$customerNumber);
    $query->bindParam(':customerName',$customerName);
    $query->bindParam(':contactLastName',$contactLastName);
    $query->bindParam(':contactFirstName',$contactFirstName);
    $query->bindParam(':phone',$phone);
    $query->bindParam(':addressLine1',$addressLine1);
    $query->bindParam(':addressLine2',$addressLine2);
    $query->bindParam(':city',$city);
    $query->bindParam(':state',$state);
    $query->bindParam(':postalCode',$postalCode);
    $query->bindParam(':country',$country);
    $query->bindParam(':salesRepEmployeeNumber',$salesRepEmployeeNumber);
    $query->bindParam(':creditLimit',$creditLimit);

    if ($query->execute()) {
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
    <title>FORM CUSTOMER</title>
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
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Customers berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Customers gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Customer</h2>
          <form action="form_customers.php" method="POST">
            
            <div class="form-group">
              <label>No Customer</label>
              <input type="text" class="form-control" placeholder="No Customer" name="customerNumber" required="required">
            </div>

            <div class="form-group">
              <label>Nama Customer</label>
              <input type="text" class="form-control" placeholder="nama customer" name="customerName" required="required">
            </div>

            <div class="form-group">
              <label>Nama Akhiran Kontak </label>
              <input type="text" class="form-control" placeholder="nama awalan kontak" name="contactLastName" required="required">
            </div>

            <div class="form-group">
              <label>Nama Awalan Kontak</label>
              <input type="text" class="form-control" placeholder="nama akhiran kontak" name="contactFirstName" required="required">
            </div>

            <div class="form-group">
              <label>No Hp</label>
              <input type="text" class="form-control" placeholder="no hp" name="phone" required="required">
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <input type="text" class="form-control" placeholder="alamat" name="addressLine1" required="required">
            </div>

            <div class="form-group">
              <label>Alamat Tambahan</label>
              <input type="text" class="form-control" placeholder="alamat tambahan / jika tidak ada tulis '-'" name="addressLine2" required="required">
            </div>

            <div class="form-group">
              <label>Kota</label>
              <input type="text" class="form-control" placeholder="kota" name="city" required="required">
            </div>

            <div class="form-group">
              <label>State</label>
              <input type="text" class="form-control" placeholder="state" name="state" required="required">
            </div>

            <div class="form-group">
              <label>Kode Pos</label>
              <input type="text" class="form-control" placeholder="kode pos" name="postalCode" required="required">
            </div>

            <div class="form-group">
              <label>Negara</label>
              <input type="text" class="form-control" placeholder="negara" name="country" required="required">
            </div>

            <div class="form-group">
              <label>No Rep Pegawai Sales</label>
              <input type="text" class="form-control" placeholder="no rep pegawai sales" name="salesRepEmployeeNumber" required="required">
            </div>

            <div class="form-group">
              <label>Limit Kartu Kredit</label>
              <input type="text" class="form-control" placeholder="limit kartu kredit" name="creditLimit" required="required">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>