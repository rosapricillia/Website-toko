<?php
session_start();
include 'koneksi.php'; 

function getCartItem(){
	global $connect;
	$loginId = $_SESSION['auth_user']['login_id'];
	$query = "SELECT c. cart_id as ccart_id, c.produk_id, c.jumlah, p.produk_id as pproduk_id, p.produk_name, p.produk_image, p.produk_price FROM cart c, update_produk p WHERE c.produk_id=p.produk_id AND c.login_id='$loginId' ORDER BY c.cart_id DESC";
	return $query_run = mysqli_query($connect, $query);
}

function getOrders(){
	global $connect;
	$loginId = $_SESSION['auth_user']['login_id'];
	$query ="SELECT * FROM orders WHERE login_id='$loginId' ORDER BY orders_id DESC";
	return $query_run = mysqli_query($connect, $query);
}

function checkTrackingNoValid($trackingNo){
	global $connect;
	$loginId = $_SESSION['auth_user']['login_id'];
	$query ="SELECT * FROM orders WHERE tracking_no='$trackingNo'";
	return  mysqli_query($connect, $query);
}
 ?>
