<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['productCode'])) {
          //query SQL
          $productCode_upd = $_GET['productCode'];
          $query = "SELECT * FROM products WHERE productCode = '$productCode_upd'";

          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $productCode = $_POST['productCode'];
      $productName = $_POST['productName'];
      $productLine = $_POST['productLine'];
      $productScale = $_POST['productScale'];
      $productVendor = $_POST['productVendor'];
      $productDescription = $_POST['productDescription'];
      $quantityInStock = $_POST['quantityInStock'];
      $buyPrice = $_POST['buyPrice'];
      $MSRP = $_POST['MSRP'];

      //query SQL
      $sql = "UPDATE products SET productName='$productName', productLine='$productLine', productScale='$productScale', productVendor='$productScale',
      productDescription='$productDescription', quantityInStock='$quantityInStock', buyPrice='$buyPrice', MSRP='$MSRP' WHERE productCode='$productCode'";

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


          <h2 style="margin: 30px 0 30px 0;">Update Data Products</h2>
          <form action="updateProducts.php" method="POST">
            <?php while($data = mysqli_fetch_array($result)): ?>
            <div class="form-group">
              <label>Kode Product</label>
              <input type="text" class="form-control" placeholder="kode product" name="productCode" value="<?php echo $data['productCode'];  ?>" required="required" readonly>
            </div>

            <div class="form-group">
              <label>Nama Product</label>
              <input type="text" class="form-control" placeholder="nama product" name="productName" value="<?php echo $data['productName'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Line Product</label>
              <input type="text" class="form-control" placeholder="line product" name="productLine" value="<?php echo $data['productLine'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Skala Product</label>
              <input type="text" class="form-control" placeholder="skala product" name="productScale" value="<?php echo $data['productScale'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Vendor</label>
              <input type="text" class="form-control" placeholder="vendor" name="productVendor" value="<?php echo $data['productVendor'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Deskripsi Product</label>
              <input type="text" class="form-control" placeholder="deskripsi product" name="productDescription" value="<?php echo $data['productDescription'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Jumlah Stock</label>
              <input type="text" class="form-control" placeholder="jumlah stok" name="quantityInStock" value="<?php echo $data['quantityInStock'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>Harga Belo</label>
              <input type="text" class="form-control" placeholder="harga beli" name="buyPrice" value="<?php echo $data['buyPrice'];  ?>" required="required">
            </div>

            <div class="form-group">
              <label>MSRP</label>
              <input type="text" class="form-control" placeholder="msrp" name="MSRP" value="<?php echo $data['MSRP'];  ?>" required="required">
            </div>
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>