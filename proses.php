<?php 
include 'koneksi.php';
include 'myfunctions.php';

// register
if(isset($_POST['register'])){
   $login_name = mysqli_real_escape_string($connect, $_POST['login_name']);
   $login_email = mysqli_real_escape_string($connect, $_POST['login_email']);
   $login_pw = mysqli_real_escape_string($connect, $_POST['login_pw']);
   $cpassword = mysqli_real_escape_string($connect, $_POST['cpassword']);
   $login_mobile = mysqli_real_escape_string($connect, $_POST['login_mobile']);
   
   // check email
   $check_email_query = "SELECT login_email FROM login_table WHERE login_email='$login_email'";
   $check_email_query_run = mysqli_query($connect, $check_email_query);

   if(mysqli_num_rows($check_email_query_run) > 0){
      $_SESSION['message'] = "Email already registered";
      header('Location: signup.php');
   } else{
     if($login_pw == $cpassword){
        // insert user
        $insert_query = "INSERT INTO login_table(login_name, login_email, login_pw, login_mobile) VALUES ('$login_name', '$login_email', '$login_pw', '$login_mobile')";
        $insert_query_run = mysqli_query($connect, $insert_query);

        if($insert_query_run){
          $_SESSION['message'] = "Registered Successfully";
          header('Location: login.php');
        } else{
          $_SESSION['message'] = "Something went wrong";
          header('Location: signup.php');
        }
     } else{
        $_SESSION['message'] = "Passwords do not match";
        header('Location: signup.php');
     }

   }

} else if (isset($_POST['login'])) {
  $login_email = mysqli_real_escape_string($connect, $_POST['login_email']);
  $login_pw = mysqli_real_escape_string($connect, $_POST['login_pw']);

  $login_query = "SELECT * FROM login_table WHERE login_email='$login_email' AND login_pw='$login_pw'";
  $login_query_run = mysqli_query($connect, $login_query);

  if(mysqli_num_rows($login_query_run) > 0 ){
    $_SESSION['auth'] = true;

    $userdata = mysqli_fetch_array($login_query_run);
    $loginid = $userdata['login_id'];
    $username = $userdata['login_name'];
    $useremail = $userdata['login_email'];
    $role_as = $userdata['role_as'];

    $_SESSION['auth_user'] = [
      'login_id' => $loginid,
      'login_name' => $username,
      'login_email' => $useremail
    ];

    $_SESSION['role_as'] = $role_as;
    if ($role_as == 1) {
      header('location: index.php');
    } else{
      header('location: login.php');
    }

    $_SESSION['massage'] = "logged In Successfully";
    header('location: index.php');
  } else{
    $_SESSION['message'] = "Invalid Credentials";
    header('location: login.php');
  }
}


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
   $sql = "UPDATE update_produk SET id_kategori ='$id_kategori', produk_name='$produk_name', produk_price='$produk_price', produk_stok='$produk_stok', produk_deskripsi='$produk_deskripsi', produk_image='$image_produk' WHERE produk_id ='{$_POST['edit_id']}'";
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

// profile
if(isset($_POST['ubah_user'])){

$id = $_SESSION['auth_user'];
$login_email = $_POST['login_email'];
$login_name = $_POST['login_name'];
$login_mobile = $_POST['login_mobile'];

$query = "UPDATE login_table SET login_name = '$login_name', login_email = '$login_email', login_mobile = '$login_mobile'  WHERE login_id = '$id[login_id]'
";
$result = mysqli_query($connect, $query);
header("Location: profile.php");
}

if(isset($_SESSION['auth'])){
  if(isset($_POST['placeOrderBtn'])){
    $nama = mysqli_real_escape_string($connect, $_POST['nama']);
    $no_telp = mysqli_real_escape_string($connect, $_POST['no_telp']);
    $kode_pos = mysqli_real_escape_string($connect, $_POST['kode_pos']);
    $alamat = mysqli_real_escape_string($connect, $_POST['alamat']);
    $payment_mode = mysqli_real_escape_string($connect, $_POST['payment_mode']);
    $payment_id = mysqli_real_escape_string($connect, $_POST['payment_id']);
    
    $loginId = $_SESSION['auth_user']['login_id'];
    $query = "SELECT c. cart_id as ccart_id, c.produk_id, c.jumlah, p.produk_id as pproduk_id, p.produk_name, p.produk_image, p.produk_price FROM cart c, update_produk p WHERE c.produk_id=p.produk_id AND c.login_id='$loginId' ORDER BY c.cart_id DESC";
    $query_run = mysqli_query($connect, $query);

    $total = 0;
    foreach ($query_run as $citem) {
     $total += $citem["jumlah"] * $citem["produk_price"];
    }

    $tracking_no = "lolyshop".rand(1111, 9999).substr($no_telp, 2);
    $insert_query = "INSERT INTO orders(tracking_no, login_id, nama, no_telp, kode_pos, payment_id, total, alamat, payment_mode) VALUES ('$tracking_no', '$loginId', '$nama', '$no_telp', '$kode_pos', '$payment_id', '$total', '$alamat', '$payment_mode')";
    $insert_query_run = mysqli_query($connect, $insert_query);

    if($insert_query_run){
      $orders_id = mysqli_insert_id($connect);
      foreach ($query_run as $citem) {
        $produk_id = $citem['produk_id'];
        $jumlah = $citem['jumlah'];
        $produk_price = $citem['produk_price'];
        $insert_item_query = "INSERT INTO order_item(orders_id, produk_id, jumlah, produk_price) VALUES ('$orders_id', '$produk_id', '$jumlah', '$produk_price')";
        $insert_item_query_run = mysqli_query($connect, $insert_item_query);

        $produk_query = "SELECT * FROM update_produk WHERE produk_id = '$produk_id' LIMIT 1";
        $produk_query_run = mysqli_query($connect, $produk_query);

        $produk_data = mysqli_fetch_array($produk_query_run);
        $current_stok = $produk_data['produk_stok'];

        $new_stok = $current_stok - $jumlah;

        $updatestok_query = "UPDATE update_produk SET produk_stok='$new_stok' WHERE produk_id='$produk_id'";
        $updatestok_query_run = mysqli_query($connect, $updatestok_query);

      }

      $deleteCartQuery ="DELETE FROM cart WHERE login_id='$loginId'";
      $deleteCartQuery_run = mysqli_query($connect, $deleteCartQuery);

      $_SESSION['message'] = "Pemesanan akan diproses";
      header('location: myOrders.php');
      die();
    }
  }
}
  else{
    header('location: index.php');
  }

  if(isset($_POST['update_order_btn'])){
  $track_no = $_POST['tracking_no'];
  $order_status = $_POST['order_status'];

  $updateOrder_query = "UPDATE orders SET status='$order_status' WHERE tracking_no='$track_no'";
  $updateOrder_query_run = mysqli_query($connect, $updateOrder_query);
  redirect("viewOrder.php?t=$track_no", "Order Status Updated");
}else{
    header('location: index.php');
  }
 ?>
