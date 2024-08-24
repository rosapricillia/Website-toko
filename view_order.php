<?php 
require "koneksi.php";
include 'userfunctions.php';

if(isset($_GET['t'])){
    $tracking_no = $_GET['t'];
    $orderdata = checkTrackingNoValid($tracking_no);
    if(mysqli_num_rows($orderdata) < 0 ){
        ?>
            <h4>Something went wrong</h4>
        <?php
        die();
    }
} else{
    ?>
    <h4>Something went wrong</h4>
    <?php
    die();
}

$data = mysqli_fetch_array($orderdata);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Produk</title>
    <link rel="shortcut icon" type="image" href="./image/logo2.png">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> -->
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!-- fonts links -->
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="parsley/parsley.css"/>
    <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

</head>
<body>
    <div class="home-section1">
<!-- navbar -->
        <nav class="navbar navbar-expand-lg" id="navbar">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><img src="./img/logo2.png" alt="" width="180px"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fa-solid fa-bars" style="color: black;"></i></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href=" produk.php">Produk</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="galeri_foto.php">Galerry Foto</a>
                  </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                  </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>
                <?php 
                    if($_SESSION['role_as'] == 1){
                 ?>
                <li class="nav-item">
                    <a class="nav-link" href="update_produk.php">Update Product</a>
                  </li>
                <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Laporan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: white;">
                      <li><a class="dropdown-item" href="lap_inventory.php">Laporan Inventory</a></li>
                    </ul>
                  </li> -->
                </ul>
                <form class="d-flex" method="get" action="produk.php">
                  <input class="form-control me-2" type="text" placeholder="Nama Barang" aria-label="Search" name="keyword">
                  <button class="btn btn-outline-success" type="submit" id="search-btn">Search</button>
                </form>
                    <?php 
                    if(isset($_SESSION['auth'])){
                     ?>
                    <div class="header_dropdown">
                        <div class="admin_content">
                            <div class="admin_data">
                                    <i class="fa-solid fa-user"></i>
                            </div>
                        </div>
                    <div class="account_dropdown">
                        <div class="account_dropdown_body">
                            <div class="account_dropdown_item">
                                <a href="profile.php">
                                    <i class="fa fa-user"></i>Account
                                </a>
                            </div>
                            <div class="account_dropdown_item">
                                <a href="myOrders.php">
                                    <i class="fa fa-clipboard-list"></i>My Orders
                                </a>
                            </div>
                            <div class="account_dropdown_item">
                                <a href="dataOrders.php">
                                    <i class="fa fa-clipboard"></i>Data Orders
                                </a>
                            </div>
                            <div class="account_dropdown_item">
                                <a href="message.php">
                                    <i class="fas fa-comment"></i>Message
                                </a>
                            </div>
                            <div class="account_dropdown_footer">
                                <a href="logout.php">
                                    <i class="fa fa-sign-out-alt"></i>Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="admin_data">
                    <a href="cart.php">    
                    <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </div>
                    <!-- <i class="fa-solid fa-user"></i>
                    <i class="fa-solid fa-cart-shopping"></i> -->
                <?php 
                } else{
                ?>
                <div class="account_dropdown_masuk">
                    <a href="signup.php">Sign Up</a>
                </div>
                <div class="account_dropdown_masuk">
                    <a href="login.php">Login</a>
                </div>
                <?php } ?>
            <?php } elseif ($_SESSION['role_as'] == 0) {?>
                <li class="nav-item">
                  </li>
                <li class="nav-item dropdown">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: white;">
                    </ul>
                  </li>
                </ul>
                <form class="d-flex" method="get" action="produk.php">
                  <input class="form-control me-2" type="text" placeholder="Nama Barang" aria-label="Search" name="keyword">
                  <button class="btn btn-outline-success" type="submit" id="search-btn">Search</button>
                </form>
                    <?php 
                    if(isset($_SESSION['auth'])){
                     ?>
                    <div class="header_dropdown">
                        <div class="admin_content">
                            <div class="admin_data">
                                    <i class="fa-solid fa-user"></i>
                            </div>
                        </div>
                    <div class="account_dropdown">
                        <div class="account_dropdown_body">
                            <div class="account_dropdown_item">
                                <a href="profile.php">
                                    <i class="fa fa-user"></i>Account
                                </a>
                            </div>
                            <div class="account_dropdown_item">
                                <a href="myOrders.php">
                                    <i class="fa fa-clipboard-list"></i>My Orders
                                </a>
                            </div>
                            <div class="account_dropdown_footer">
                                <a href="logout.php">
                                    <i class="fa fa-sign-out-alt"></i>Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="admin_data">
                    <a href="cart.php">    
                    <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </div>
                    <!-- <i class="fa-solid fa-user"></i>
                    <i class="fa-solid fa-cart-shopping"></i> -->
                <?php 
                } else{
                ?>
                <div class="account_dropdown_masuk">
                    <a href="signup.php">Sign Up</a>
                </div>
                <div class="account_dropdown_masuk">
                    <a href="login.php">Login</a>
                </div>
                <?php } ?>
            <?php } else{?>
                    <li class="nav-item">
                  </li>
                <li class="nav-item dropdown">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: white;">
                    </ul>
                  </li>
                </ul>
                <form class="d-flex" method="get" action="produk.php">
                  <input class="form-control me-2" type="text" placeholder="Nama Barang" aria-label="Search" name="keyword">
                  <button class="btn btn-outline-success" type="submit" id="search-btn">Search</button>
                </form>
                    <?php 
                    if(isset($_SESSION['auth'])){
                     ?>
                    <div class="header_dropdown">
                        <div class="admin_content">
                            <div class="admin_data">
                                    <i class="fa-solid fa-user"></i>
                            </div>
                        </div>
                    <div class="account_dropdown">
                        <div class="account_dropdown_body">
                            <div class="account_dropdown_item">
                                <a href="profile.php">
                                    <i class="fa fa-user"></i>Account
                                </a>
                            </div>
                            <div class="account_dropdown_item">
                                <a href="myOrders.php">
                                    <i class="fa fa-clipboard-list"></i>My Orders
                                </a>
                            </div>
                            <div class="account_dropdown_footer">
                                <a href="logout.php">
                                    <i class="fa fa-sign-out-alt"></i>Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="admin_data">
                    <a href="cart.php">    
                    <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                </div>
                    <!-- <i class="fa-solid fa-user"></i>
                    <i class="fa-solid fa-cart-shopping"></i> -->
                <?php 
                } else{
                ?>
                <div class="account_dropdown_masuk">
                    <a href="signup.php">Sign Up</a>
                </div>
                <div class="account_dropdown_masuk">
                    <a href="login.php">Login</a>
                </div>
                <?php } ?>
          <?php  } ?>
               
              </div>
            </div>
          </nav>
        <!-- navbar -->

  <!-- My order -->
  <div class="container card" id="contact">
            <h3 style="margin-top: 25px;" class="text-center fw-bold">DETAIL MY ORDER</h3>
            <hr>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Nama</label>
                                    <div class="border p-1">
                                        <?= $data['nama'] ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">No Telpon</label>
                                    <div class="border p-1">
                                        <?= $data['no_telp'] ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Kode Pos</label>
                                    <div class="border p-1">
                                        <?= $data['kode_pos'] ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Alamat</label>
                                    <div class="border p-1">
                                        <?= $data['alamat'] ?>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Order No.</label>
                                    <div class="border p-1">
                                        <?= $data['tracking_no'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $loginId = $_SESSION['auth_user']['login_id'];
                                    $order_query = "SELECT o.orders_id as oid, o. tracking_no, o.login_id, oi.*, oi.jumlah as orderjml, p.* FROM orders o, order_item oi, update_produk p WHERE o.login_id='$loginId' AND oi.orders_id=o.orders_id AND p.produk_id=oi.produk_id AND o.tracking_no='$tracking_no'"; 
                                    $order_query_run = mysqli_query($connect, $order_query);
                                    if(mysqli_num_rows($order_query_run) > 0){
                                        foreach ($order_query_run as $item) {
                                            ?>
                                            <tr>
                                                <td class="align-middle">
                                                    <img src="img/<?= $item['produk_image'];?>" width="50" height="50" alt="<?= $item['nama'];?>">
                                                </td>
                                                <td class="align-middle">Rp <?= number_format($item['produk_price']);?></td>
                                                <td class="align-middle"><?= $item['orderjml'];?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                 ?>
                                </tbody>
                            </table>
                            <hr>
                            <h5>Total : <span class="float-end fw-bold">Rp <?= number_format($data['total']); ?></span></h5>
                            <hr>
                            <label class="fw-bold">Metode pembayaran</label>
                            <div class="border p-1 mb-3">
                                <?= $data['payment_mode']?>
                            </div>
                            <label class="fw-bold">Status</label>
                            <div class="border p-1 mb-3">
                                <?php
                                if($data['status'] == 0){
                                    echo "Sedang Proses";
                                }else if($data['status'] == 1){
                                    echo "Selesai";
                                }else if($data['status'] == 2){
                                    echo "Dibatalkan";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
        <!-- My order -->

        <!-- footer -->
        <footer id="footer" style="margin-top: 50px;">
        <hr>
        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong>Lolyshop</strong>.All Rights Reserved
            </div>
            <div class="credits">
                Designed By <a href="#">Rosa</a>
            </div>
        </div>
        </footer>
      </div>
        <!-- footer -->

<a href="#" class="arrow"><i><img src="./image/up-arrow.png" alt="" width="50px"></i></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/datatables.min.js"></script>
    <!-- <script type="text/javascript" src="js/datatables.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="parsley/dist/parsley.min.js"></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
    <!-- <script src="costum.js"></script> -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</div>
</body>
</html>