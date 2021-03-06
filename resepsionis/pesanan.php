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
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
  <div class="wrapper">

  <nav class='navbar navbar-expand-lg navbar-dark bg-dark text-light '>
      <div class="container">
        <h2> Myland Hotel </h2>
          <!-- Left navbar links -->
          <ul class="navbar-nav ml-auto pt-2 pb-2">
          <li class="nav-item">
              <a href="index.php" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
              <a href="pesanan.php" class="nav-link">Pesanan</a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">Logout</a>
            </li>
          </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->

      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Data Reservasi</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">

          <div class="col-md-14">
            <div class="card card-outline card-info">
              <div class="card-body">
            
                <table class="table table-bordered">
                <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                  <div class="form-group">
                    <label for="sel1">Cari:</label>
                    <?php
                    $keyword="";
                    if (isset($_POST['keyword'])) {
                        $keyword=$_POST['keyword'];
                    }
                    ?>
                    <input type="text" name="keyword" value="<?php echo $keyword;?>" />
                    <button type="submit" class="btn btn-info" >
                    <i class="fa fa-search"></i>
                    </button>
                  </div>
                      
                </form>
                  <thead>
                    <tr>
                      <th style="width: 10px">ID</th>
                      <th>Tanggal Reservasi</th>
                      <th>Tanggal Check In</th>
                      <th>Tanggal Check Out</th>
                      <th>Kode Kamar</th>
                      <th>Nama Tamu</th>
                      <th>Email</th>
                      <th>Handphone</th>
                      <th>Tipe Kamar</th>
                      <th>Jumlah Kamar</th>
                      <th>Status</th>
                      <th>Aksi</th>
                      <th>Cetak</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include '../koneksi.php';
                    if (isset($_POST['keyword'])) {
                      $keyword=trim($_POST['keyword']);
                      $sql="select * from pesanan where nama_tamu like '%".$keyword."%' or tanggal_check_in like '%".$keyword."%' or tanggal_check_out like '%".$keyword."%' order by nama_tamu desc";
                    }else {
                      $sql="select * from pesanan order by nama_tamu desc";
                    }
                    $no = 1;
                    $data = mysqli_query($koneksi, $sql);
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['tanggal_reservasi']; ?></td>
                        <td><?php echo $d['tanggal_check_in']; ?></td>
                        <td><?php echo $d['tanggal_check_out']; ?></td>
                        <td><?php echo $d['kode_kamar']; ?></td>
                        <td><?php echo $d['nama_tamu']; ?></td>
                        <td><?php echo $d['email']; ?></td>
                        <td><?php echo $d['handphone']; ?></td>
                        <td><?php echo $d['tipe_kamar']; ?></td>
                        <td><?php echo $d['jumlah_kamar']; ?></td>
                        <td>
                          <?php
                          if ($d['status'] == 1) { ?>
                            <span class="badge bg-warning">Check In</span>
                          <?php } else { ?>
                            <span class="badge bg-success">Check Out</span>
                          <?php } ?>
                        </td>
                        <td>
                          <form action="aksi_konfirmasi.php" method="POST">
                            <input type="hidden" name="id_reservasi" value="<?php echo $d['id_reservasi']; ?>">
                            <input type="hidden" name="status" value="2">
                            <button class="btn btn-sm btn-primary">Confirm Check Out</button>
                          </form><br>
                          <form action="aksi_konfirmasi.php" method="POST">
                            <input type="hidden" name="id_reservasi" value="<?php echo $d['id_reservasi']; ?>">
                            <input type="hidden" name="status" value="1">
                            <button class="btn btn-sm btn-primary">Comfirm Check In</button>
                          </form><br>
                        </td>
                        <td>
                           <a href="cetak.php?id_reservasi=<?php echo $d['id_reservasi']; ?>">
                            <button class="btn btn-sm btn-success">Cetak</button></a>
                        </td>
                      </tr>
                      
                       <?php
                    }
                    ?>

                  </tbody>
                  
                </table>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>