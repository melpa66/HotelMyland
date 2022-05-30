<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pemesanan Hotel</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body>
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
            <li class="nav-item">
              <a href="login.php" class="nav-link">Login</a>
            </li>
          </ul>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
  
      <!-- Content Header (Page header) -->
      <div class="content-header">
      </div>
      <!-- /.content-header -->
      <div class="content">
        <div class="container">
          <div class="col-md-12">
            <?php 
            if(isset($_GET['pesan'])){
              if($_GET['pesan']=="gagal"){?>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Peringatan !!!</h5>
                  Mohon maaf anda tidak bisa mengakses halaman ini
                </div>
              <?php }} ?>
            </div>
          </div>
        </div>      

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
                        <img class="d-block w-100" src="assets/gambar/wp.jpeg" height="450">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <form action="proses_pesan.php" method="POST">
              <div class="col-md-12">
                <div class="card-body">
                  <div class="row">
                    <label class="col-sm-2 col-form-label">Tanggal Cek In</label>
                    <div class="col-sm-2">                  
                      <input type="date" name="tanggal_check_in" class="form-control" placeholder=".col-3">
                    </div>
                    <label class="col-sm-2 col-form-label">Tanggal Cek Out</label>
                    <div class="col-sm-2">                  
                      <input type="date" name="tanggal_check_out" class="form-control" placeholder=".col-4">
                    </div>
                    <label class="col-sm-2 col-form-label">Jumlah Kamar</label>
                    <div class="col-sm-1">                  
                      <input type="text" name="jumlah_kamar" class="form-control" placeholder="Jumlah Kamar">
                    </div>
                    <div class="col-sm-1">
                      <button type="button" class="form-control btn btn-primary" data-toggle="modal" data-target="#pesan">Pesan</button>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="pesan">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Form Pemesanan</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                        <label>ID Reservasi</label>
                        <input type="text" name="id_reservasi" class="form-control" placeholder="ID Reservasi" readonly>
                      </div>
                    <div class="form-group">
                        <label>Tanggal Reservasi</label>
                        <input type="date" name="tanggal_reservasi" class="form-control" placeholder="Tanggal Reservasi" required>
                      </div>
                      <div class="form-group">
                        <label>Kode Kamar</label>
                        <input type="text" name="kode_kamar" class="form-control" placeholder="Masukan Kode Kamar" required>
                      </div>
                      <div class="form-group">
                        <label>Nama Tamu</label>
                        <input type="text" name="nama_tamu" class="form-control" placeholder="Masukan Nama Tamu" required>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Masukan Email" required>
                      </div>
                      <div class="form-group">
                        <label>No. Handphone</label>
                        <input type="text" name="handphone" class="form-control" placeholder="Masukan No. Handphone" required>
                      </div>
                      
                      <div class="form-group">
                        <label>Tipe Kamar</label>
                        <select name="tipe" class="form-control">
                          <option value="">--- Pilih Kamar ---</option>
                          <?php
                          include 'koneksi.php';
                          $data = mysqli_query($koneksi, "select * from kamar");
                          while ($d = mysqli_fetch_array($data)) { 
                            ?>
                            <option value="<?php echo $d['tipe']; ?>"><?php echo $d['tipe'];?></option> 
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Konfirmasi Pesanan</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
            </form>
            <div class="card">
              <div class="col-md-12">
                <div class="card-body">
                  <h2 class="text-center">Tentang Kami</h2><br>
                  <p class="text-center">Hotel Myland lokasinya berada di tengah kota Batu yang masih asri dan nyaman dengan view kota Batu.
Hotel Myland menjadi pilihan kami untuk penginapan yang tepat. Hal ini dapat dilihat dari bentuk bangunan kamar yang berbeda menyesuaikan dengan temanya. Kami berusaha sebaik mungkin memberikan pelayanan yang terbaik dengan fasilitas penunjang yang lengkap dan bersih.</p>
                </div>
              </div>
            </div>          
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
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