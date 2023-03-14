<?php
include ('conn.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Example</title>
  </head>

  <body>
      <a>Pemrograman Web</a>
    </nav>

    <div>
      <div>
        <nav>
        </nav>

        <main>
          <?php 
            //mengecek apakah proses update dan delete sukses/gagal
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Mahasiswa berhasil di-update</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Mahasiswa gagal di-update</div>';
              }

            }
           ?>
          <h2 style="margin: 30px 0 30px 0;">CUSTOMER</h2>
          <div>
            <table border="2" align="center">
              <thead>
                <tr>
                  <th>No Customer</th>
                  <th>Nama Customer</th>
                  <th>Nama Kontak Pertama</th>
                  <th>Nama Kontak Kedua</th>
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
                  
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr align="center">
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
                  </tr>
                  <?php $no++; ?>
                 <?php endwhile ?>

                 
                 </div>
          <div>
          
            <table border="2" align="center" >
              <thead>
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
                  
                  $result1 = mysqli_query(connection(),$query1);
                 ?>
                <h2 style="margin: 30px 0 30px 0;">PRODUCT</h2>
                 <?php while($data = mysqli_fetch_array($result1)): ?>
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
                  </tr>
                  <?php $no++; ?>
                 <?php endwhile ?>
                 </div>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>