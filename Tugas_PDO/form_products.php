<?php 
  include ('conn.php'); 

  $status = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    //Products
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $productLine = $_POST['productLine'];
    $productScale = $_POST['productScale'];
    $productVendor = $_POST['productVendor'];
    $productDescription = $_POST['productDescription'];
    $quantityInStock = $_POST['quantityInStock'];
    $buyPrice = $_POST['buyPrice'];
    $MSRP = $_POST['MSRP'];
    
    $query = $conn->prepare("INSERT INTO products VALUES ('$productCode', '$productName', '$productLine', '$productScale', '$productVendor', '$productDescription', '$quantityInStock', '$buyPrice', '$buyPrice')");

    $query->bindParam(':productCode',$productCode);
    $query->bindParam(':productName',$productName);
    $query->bindParam(':productLine',$productLine);
    $query->bindParam(':productScale',$productScale);
    $query->bindParam(':productVendor',$productVendor);
    $query->bindParam(':productDescription',$productDescription);
    $query->bindParam(':quantityInStock',$quantityInStock);
    $query->bindParam(':buyPrice',$buyPrice);
    $query->bindParam(':MSRP',$MSRP);

    //eksekusi query
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
    <title>Form Pegawai</title>
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
                echo '<br><br><div class="alert alert-success" role="alert">Data Products berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Products gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Produk</h2>
          <form action="form_products.php" method="POST">
            
            <div class="form-group">
              <label>Kode Produk</label>
              <input type="text" class="form-control" placeholder="kode produk " name="productCode" required="required">
            </div>

            <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" class="form-control" placeholder="nama produk" name="productName" required="required">
            </div>

            <div class="form-group">
              <label>Line Produk</label>
              <input type="text" class="form-control" placeholder="line produk" name="productLine" required="required">
            </div>

            <div class="form-group">
              <label>Skala Produk</label>
              <input type="text" class="form-control" placeholder="skala produk" name="productScale" required="required">
            </div>

            <div class="form-group">
              <label>Vendor</label>
              <input type="text" class="form-control" placeholder="vendor" name="productVendor" required="required">
            </div>

            <div class="form-group">
              <label>Deskripsi Produk</label>
              <input type="text" class="form-control" placeholder="deskripsi produk" name="productDescription" required="required">
            </div>

            <div class="form-group">
              <label>Jumlah Stok</label>
              <input type="text" class="form-control" placeholder="jumlah stok" name="quantityInStock" required="required">
            </div>

            <div class="form-group">
              <label>Harga Beli</label>
              <input type="text" class="form-control" placeholder="harga beli" name="buyPrice" required="required">
            </div>

            <div class="form-group">
              <label>MSRP</label>
              <input type="text" class="form-control" placeholder="msrp" name="MSRP" required="required">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>