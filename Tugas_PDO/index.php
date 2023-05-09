<?php
include ('conn.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>MAIN</title>
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
                <a class="nav-link active" href="<?php echo "index.php"; ?>">ClassicalModels</a>
                <ul class="nav flex-column">
                  <li class="nav-item"><a class="nav-link" style="margin-left: 20px" href="#Customers">Customers</a></li>
                  <li class="nav-item"><a class="nav-link" style="margin-left: 20px" href="#Products">Products</a></li>
                </ul>
              </li>
              <br>
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
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Perusahaan berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Perusahaan gagal di-update</div>';
              }
            }
           ?>
        <main>
          <div id="Customers">
          <h2 style="margin: 30px 0 30px 0; ">CUSTOMER</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead align="center">
                <tr>
                  <th>No Customer</th>
                  <th>Nama Customer</th>
                  <th>Nama Awalan Kontak</th>
                  <th>Nama Akhiran Kontak</th>
                  <th>No Telepon</th>
                  <th>Alamat</th>
                  <th>Alamat tambahan</th>
                  <th>Kota</th>
                  <th>State</th>
                  <th>Kode Pos</th>
                  <th>Negara</th>
                  <th>No Sales</th>
                  <th>Limit Kartu Kredit</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  $query = "SELECT * FROM customers";
                  
                  $result =  $conn->query($query);
                 ?>

                 <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                  <tr align="center" class="table table-striped table-sm">
                    <td><?php echo $data['customerNumber'];  ?></td>
                    <td><?php echo $data['customerName'];  ?></td>
                    <td><?php echo $data['contactLastName'];  ?></td>
                    <td><?php echo $data['contactFirstName'];  ?></td>
                    <td><?php echo $data['phone'];  ?></td>
                    <td><?php echo $data['addressLine1'];  ?></td>
                    <td><?php echo $data['addressLine2'];  ?></td>
                    <td><?php echo $data['city'];  ?></td>
                    <td><?php echo $data['state'];  ?></td>
                    <td><?php echo $data['postalCode'];  ?></td>
                    <td><?php echo $data['country'];  ?></td>
                    <td><?php echo $data['salesRepEmployeeNumber'];  ?></td>
                    <td><?php echo $data['creditLimit'];  ?></td>
                    <td>
                     <a href="<?php echo "update_customers.php?customerNumber=".$data['customerNumber']; ?>" class="btn btn-outline-warning btn-sm">Update</a>
                      &nbsp;&nbsp;
                     <a href="<?php echo "delete_customers.php?customerNumber=".$data['customerNumber']; ?>" class="btn btn-outline-danger btn-sm">Delete</a>
                    </td>
                  </tr>
                  <?php $no++; ?>
                 <?php endwhile ?>
                </tbody>
                 </table>
                 </div>
                 </div>
                 
          <div id="Products">
          <h2 style="margin: 30px 0 30px 0; ">Product</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead align="center">
                <tr>
                  <th>Kode Produk</th>
                  <th>Nama Prduk</th>
                  <th>Jenis Produk</th>
                  <th>Ukuran Skala Produk</th>
                  <th>Vendor Produk</th>
                  <th>Deskripsi Produk</th>
                  <th>Jumlah Stock</th>
                  <th>Harga Beli</th>
                  <th>MSRP</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  $query1 = "SELECT * FROM products";
                  
                  $result1 =  $conn->query($query1);

                 ?>
                
                 <?php while($data = $result1->fetch(PDO::FETCH_ASSOC) ): ?>
                  <tr align="center">
                    <td><?php echo $data['productCode'];  ?></td>
                    <td><?php echo $data['productName'];  ?></td>
                    <td><?php echo $data['productLine'];  ?></td>
                    <td><?php echo $data['productScale'];  ?></td>
                    <td><?php echo $data['productVendor'];  ?></td>
                    <td align="justify"><?php echo $data['productDescription'];  ?></td>
                    <td><?php echo $data['quantityInStock'];  ?></td>
                    <td><?php echo $data['buyPrice'];  ?></td>
                    <td><?php echo $data['MSRP'];  ?></td>
                    <td>
                      <a href="<?php echo "update_products.php?productCode=".$data['productCode']; ?>" class="btn btn-outline-warning btn-sm">Update</a>
                      &nbsp;&nbsp;
                      <a href="<?php echo "delete_products.php?productCode=".$data['productCode']; ?>" class="btn btn-outline-danger btn-sm">Delete</a>
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