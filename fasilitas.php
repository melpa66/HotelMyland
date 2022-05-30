<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi UKK 2022 | Pemesanan Hotel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark text-light '>
      <div class="container">
        <h2> Myland Hotel </h2>
          <!-- Left navbar links -->
          <ul class="navbar-nav ml-auto pt-2 pb-2">
            <li class="nav-item">
              <a href="index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="kamar.php" class="nav-link">Kamar</a>
            </li>
            <li class="nav-item">
              <a href="fasilitas.php" class="nav-link">Fasilitas</a>
            </li>
          </ul>
      </div>
    </nav>
    <!-- /.navbar -->

      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Fasilitas Umum</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
          <div class="container">
            <div class="col-md-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img class="d-block w-100" src="assets/gambar/wp.jpeg" alt="First slide" height="450">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

          <div class="col-md-12">
            <div class="row">
              <?php
              $query = "SELECT * FROM fasilitas_umum ORDER BY id ASC";
              $result = mysqli_query($koneksi, $query);
              if (!$result) {
                die("Query Error: ".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
              }

              $no = 1;

              while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-4">
                  <div class="card card-outline">
                  <table>
                          <tr>
                            <td><b>Fasilitas </b> <?php echo $row['nama_fasilitas'];  ?></td>
                          </tr>
                        </table>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <img class="d-block w-100" src="admin/gambar/<?php echo $row['image']; ?>" height="200">
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <?php $no++; } ?>
              </div>
            </div>

          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
  </body>
  </html>