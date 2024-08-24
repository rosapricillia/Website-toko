<?php session_start(); ?>
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
                if(isset($_SESSION['auth'])){
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
                <?php }} ?>
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

        <!-- contact -->
        <div class="container" id="contact">
            <h1 class="text-center">CONTACT US</h1>
            <div class="row" style="margin-top: 50px;">
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card">
                        <i class="fas fa-phone"> Phone</i>
                        <h6>085296036613</h6>
                    </div>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card">
                        <i class="fa-solid fa-envelope"> Email</i>
                        <h6>Lolyshop@gmail.com</h6>
                    </div>
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <div class="card">
                        <i class="fa-solid fa-location-dot"> Address</i>
                        <h6>Kec. Medan Johor, Kota Medan, Sumatera Utara, Indonesia</h6>
                    </div>
                </div>
            </div>
            <form method="post" action="proses.php">
            <div class="row" style="margin-top: 30px;">
                <div class="col-md-4 py-3 py-md-0">
                    <input type="text" class="form-control form-control" name="name" placeholder="Name">
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <input type="email" class="form-control form-control" name="email" placeholder="Email">
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <input type="number" class="form-control form-control" name="phone" placeholder="Phone">
                </div>
               <div class="form-group" style="margin-top: 30px;">
                <textarea class="form-control" id="message" rows="5" name="message" placeholder="Message"></textarea>
            </div>
            <div id="messagebtn" class="text-center"><button type="submit" name="messagebtn" >Message</button></div>
            </div>
        </form>
        </div>
        <!-- contact -->
        
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="main.js"></script>

</body>
</html>