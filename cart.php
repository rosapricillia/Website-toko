<?php 
require "koneksi.php";
include 'userfunctions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko LolyShop</title>
    <link rel="shortcut icon" type="image" href="./image/logo2.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- bootstrap links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- bootstrap links -->
    <!-- fonts links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <!-- fonts links -->
    <link rel="stylesheet" type="text/css" href="vendor/fontawesome-free/css/all.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
</head>
<body>
    <div class="home-section">
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

        <!-- cart -->
        <div class="container produk_data my-3">
            <div class="row card row-product">
                <div class="col">
                  <div class="table-responsive">
                    <table class="table my-3">
                      <thead class="table-secondary">
                        <tr>
                          <th scope="col">Delete</th>
                          <th scope="col">Produk</th>
                          <th scope="col">Gambar</th>
                          <th scope="col">Harga</th>
                          <th scope="col">Jumlah</th>
                          <th scope="col">Sub Total</th>
                        </tr>
                      </thead>
                      
                      <tbody class="align-middle">
                      <div id="mycart">
                        <?php 
                        $items = getCartItem();
                        $total = 0;
                        if(is_array($items) || is_object($items)){
                        foreach ($items as $citem) 
                        {
                          
                          ?>
                        <tr>
                          <th scope="row"><button class="btn btn-sm deleteItem" value="<?= $citem['ccart_id']?>"><i class="fa-solid fa-trash-can" style="color: red;"></i></button></th>
                          <td><?php echo $citem["produk_name"]; ?></td>
                          <td><img width="50" height="50" src="img/<?php echo $citem["produk_image"]; ?>"></td>
                          <td>Rp <?php echo number_format($citem["produk_price"]); ?></td>
                          <td>
                            <?php echo $citem["jumlah"]; ?>
                              <!-- ?php echo number_format($val["item_quantity"] * $val["item_price"], 2); ?>
                              <button class="button btn-dark btn-sm"><i class="fas fa-minus"></i></button>
                                  <span class="mx-2">1</span>
                                  <button class="button btn-dark btn-sm"><i class="fas fa-plus text-white"></i></button> -->
                          </td>
                          <td>Rp <?php echo number_format($citem["jumlah"] * $citem["produk_price"]); ?></td>
                        </tr>
                          <?php
                              $total = $total + ($citem["jumlah"] * $citem["produk_price"]); 
                        } 
                      } else{
                        echo "Unfortunately, an error occured.";
                      }      
                            ?>
                      </div>
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col" colspan="2">Total Cart Belanja</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="fw-bold" style="border-style: none;">Total Harga</td>
                          <td style="border-style: none;">Rp <?php echo number_format($total); ?></td>
                        </tr>
                        <tr>
                            <td style="border-style: none;"><a class="btn btn-dark btn-sm" href="order.php">Order</a></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>



<!-- footer -->
<footer id="footer" style="margin-top: 225px;">
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
<!-- footer -->

<a href="#" class="arrow"><i><img src="./image/up-arrow.png" alt="" width="50px"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="main.js"></script>
    <script src="costum.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</body>
</html>
