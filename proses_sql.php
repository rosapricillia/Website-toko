<?php
include 'koneksi.php';
// insert produk
if(isset($_POST['submit_produk'])){
  $id_kategori = $_POST['id_kategori'];
	$produk_name = $_POST['produk_name'];
	$produk_price = $_POST['produk_price'];
	$produk_stok = $_POST['produk_stok'];
	$produk_deskripsi = $_POST['produk_deskripsi'];
	$direktori = "img/";
	$image_produk = $_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], $direktori.$image_produk);

	$pro_insert = mysqli_query($connect, "INSERT INTO update_produk(produk_id, id_kategori, produk_name, produk_price, produk_stok, produk_deskripsi, produk_image) VALUES('NULL', '$id_kategori', '$produk_name', '$produk_price', '$produk_stok', '$produk_deskripsi', '$image_produk')");
	if($pro_insert){
      echo "Produk Telah Masuk";
      header('Location: update_produk.php');
    } else{
      echo "error: ". mysqli_error();
    }
}

// delete produk
if(isset($_POST['delete_produk'])){
	$delete_id = $_POST['delete_id'];	
	$delete = mysqli_query($connect, "DELETE FROM update_produk WHERE produk_id ='$delete_id'");
	if($delete){
			echo "<script>alert('Komentar berhasil dihapus')</script> ";
			header('Location: update_produk.php');
		}else{
			echo "error: ". mysqli_error();
		}
}

// edit produk
if(isset($_POST['edit_produk'])){
  $id_kategori = $_POST['id_kategori'];
  $produk_name = $_POST['produk_name'];
  $produk_price = $_POST['produk_price'];
  $produk_stok = $_POST['produk_stok'];
  $produk_deskripsi = $_POST['produk_deskripsi'];
  // echo $id_kategori;

	$direktori = "img/";
	$image_produk = $_FILES['image']['name'];
	move_uploaded_file($_FILES['image']['tmp_name'], $direktori.$image_produk);
   $sql = "UPDATE update_produk SET id_kategori ='$id_kategori', produk_name='$produk_name', produk_price='$produk_price', produk_stok='$produk_stok', produk_deskripsi='$produk_deskripsi', WHERE produk_id ='{$_POST['edit_id']}' AND id_kategori ='{$_POST['kat_id']}'";
    $query= mysqli_query($connect, $sql);
    if($query){
      echo "Data berhasil diubah";
      header('Location: update_produk.php');
    } else{
      echo "Data gagal diubah: ". mysqli_error();
    }
  }



// contact
  if(isset($_POST['messagebtn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = mysqli_query($connect, "INSERT INTO contact(name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')");
    if($sql){
      echo "Message Telah Terkirim";
      header('Location: contact.php');
    } else{
      echo "error: ". mysqli_error();
    }
  }
?>