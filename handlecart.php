<?php 
session_start();
include 'koneksi.php';

if(isset($_SESSION['auth'])){
	if (isset($_POST['scope'])) {
		$scope = $_POST['scope'];
		switch ($scope) {
			case 'add':
				$produk_id = $_POST['produk_id'];
				$jumlah = $_POST['jumlah'];

				$login_id = $_SESSION['auth_user']['login_id'];

				$chk_existing_cart = "SELECT * FROM cart WHERE produk_id='$produk_id' AND login_id='$login_id'";
				$chk_existing_cart_run = mysqli_query($connect, $chk_existing_cart);

				if(mysqli_num_rows($chk_existing_cart_run) > 0 ){
					echo "existing";
				} else{

					$insert_query = "INSERT INTO cart (login_id, produk_id, jumlah) VALUES ('$login_id', '$produk_id', '$jumlah')";
					$insert_query_run = mysqli_query($connect, $insert_query);

					if($insert_query_run){
						echo 201;
					} else{
						echo 500;
					}
				}
				break;

			case 'delete':
				$cart_id = $_POST['cart_id'];

				$login_id = $_SESSION['auth_user']['login_id'];

				$chk_existing_cart = "SELECT * FROM cart WHERE cart_id='$cart_id' AND login_id='$login_id'";
				$chk_existing_cart_run = mysqli_query($connect, $chk_existing_cart);

				if(mysqli_num_rows($chk_existing_cart_run) > 0 ){

					$delete_query = "DELETE FROM cart WHERE cart_id = '$cart_id'";
					$delete_query_run = mysqli_query($connect, $delete_query);

					if($delete_query_run){
						echo 200;
					} else{
						echo "something went wrong";
					}
				} else{
					echo "something went wrong";
				}

				break;

			default:
				echo 500;
		}
	}
} else{
	echo 401;
}
?>