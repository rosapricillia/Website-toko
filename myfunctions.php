<?php
	session_start();
	include 'koneksi.php';

	function redirect($url, $message){
		$_SESSION['message'] = $message;
		header('location: '.$url);
		exit(0);
	}

	function getAllOrders(){
		global $connect;
		$query = "SELECT o.*, l.login_name FROM orders o, login_table l WHERE status='0' AND o.login_id=l.login_id";
		return $query_run = mysqli_query($connect, $query);
	}

	function getOrderHistory(){
		global $connect;
		$query = "SELECT o.*, l.login_name FROM orders o, login_table l WHERE status != '0' AND o.login_id=l.login_id";
		return $query_run = mysqli_query($connect, $query);
	}
?>