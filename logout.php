<?php 
session_start();
include 'koneksi.php';

// register
if(isset($_SESSION['auth'])){
  unset($_SESSION['auth']);
  unset($_SESSION['auth_user']);
  $_SESSION['message'] = "Logged Out Successfully";
}
header('location: index.php');
?>