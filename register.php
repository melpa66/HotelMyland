<?php 
 
include 'koneksi.php';
 
error_reporting(0);
 
session_start();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="css/register.css">
<title>Title</title>
</head>
<body>
<nav class='navbar navbar-expand-lg navbar-dark bg-dark text-light '>
<div class="container">
        <h3> Hotel Myland </h3>
    </div>
</nav>
<div class="card-register">
    
         <section class="container-fluid mb-4">
             <!-- justify-content-center untuk mengatur posisi form agar berada di tengah-tengah -->
             <section class="row justify-content-center">
                
                     <h2> REGISTER </h2>
                <form class="form" action="action_register.php" method="POST">
                         <label for="username"> Username
                         </label>
                         <input type="text" class="form-content" id="username" name="username" placeholder="Masukkan username">
                         <label for="password" style="margin-top:3%;"> Password
                         </label>
                         <input type="password" class="form-content" id="password" name="password" placeholder="Password">
                         <label style="margin-top:3%;"> Users </label>
                            <select type="role" name="role" class="form-content" id="role" placeholder="Users">
                                <option value="">--- Pilih Sebagai ---</option>
                                <option value="1">Admin</option>
                                <option value="2">Resepsionis</option>       
                                <option value="3">Guest</option>             
                            </select>
                     <input type="submit" name="submit" class="submit-btn" value= "Register" />
                     <div class="form-footer mt-2">
                         <p> Sudah punya akun? <a href="login.php">Login</a></p>
                     </div>
                 </form>
             </section>
         </section>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>