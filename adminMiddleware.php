<?php 
include 'myfunctions.php';

if(isset($_SESSION['auth'])){
	if($_SESSION['role_as'] != 1){
		redirect("index.php", "tidak bisa login");
	}
} else{
	redirect("login.php", "login to continue");
}
?>
