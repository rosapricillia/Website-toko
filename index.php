<?php
session_start();
include 'koneksi.php';
$listproduk = mysqli_query($connect, "SELECT * FROM update_produk LIMIT 12");
$produk1 = mysqli_query($connect, "SELECT * FROM update_produk LIMIT 3");
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

        <!-- home content -->
        <section class="home">
            <div class="content">
                <h3>Biggest WPL Sale
                    <br> <span>Rp 69,000</span>
                </h3>
                <p>WPL Deodorant Nature for Whittening , aman untuk Bumil & Busui</p>
                <a class="btn" id="shopnow" href="produk.php">Shop Now</a>
                <!-- <button id="shopnow">Shop Now</button> -->
            </div>
            <div class="img">
                <img src="./img/wpldedorant.jpeg" alt="" width="auto">
            </div>
        </section>
        <!-- home content -->
    </div>

    <!-- top cards -->
    <div class="container" id="top-cards">
        <div class="row">
            <?php while($data1 = mysqli_fetch_array($produk1)){
            ?>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card" style="background-color: #a9a9a926;">
                    <img src="img/<?php echo $data1['produk_image']; ?>" alt="">
                    <div class="card-img-overlay">
                        <h5 class="card-titel"><?php echo $data1['produk_name']; ?></h5>
                        <p><?php echo $data1['produk_deskripsi']; ?></p>
                        <p><strong>Rp <?php echo number_format($data1['produk_price']); ?></strong></p>
                        <a href="detail_produk.php?produk_id=<?php echo $data1['produk_id']; ?>" id="viewmorebtn">Order Now</a>
                        <!-- <button>Order Now</button> -->
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- top cards -->
    

    <!-- banner -->
    <div class="banner">
        <div class="content">
            <h1>Get Up To 50% Off</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, animi?</p>
            <a href="produk.php" id="bannerbtn">SHOP NOW</a>
            <!-- <div id="bannerbtn"><button>SHOP NOW</button></div> -->
        </div>
    </div>
    <!-- banner -->

    <!-- product cards -->
    <div class="container" id="product-cards">
        <h1 class="text-center">PRODUCT</h1>
        <div class="row" style="margin-top: 30px;">
            <?php while($data = mysqli_fetch_array($listproduk)){
            ?>
            <div class="col-md-3 py-3 py-md-0 mb-3">
                <a href="detail_produk.php?produk_id=<?php echo $data['produk_id']; ?>" style="color: black; text-decoration: none;">
                <div class="card h-100">
                    <img src="img/<?php echo $data['produk_image']; ?>" alt="">
                    <div class="card-body">
                        <h3><?php echo $data['produk_name']; ?></h3>
                        <p><?php echo $data['produk_deskripsi']; ?></p>
                        <h5>Rp <?php echo number_format($data['produk_price']); ?> 
                        </h5>
                    </div>
                </div>
                </a>
            </div>
            <?php } ?>
        </div>
        <a href="produk.php" id="viewmorebtn">View More</a>
    </div>
    <!-- product cards -->

    <!-- Testimonial -->
    <div class="container" style="margin-top: 100px;">
        <hr>
    </div>
    <div class="container mt-5">
        <h2 class="text-center">Testimonial Customer</h2>
        <p class="text-center text-muted">Temukan Pengalaman Belanja Anda Berikutnya di Lolyshop.</p>
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <img src="img/customer_1.jpg" class="rounded-circle mb-3" alt="Dian Hardyanti" width="100" height="100">
                <blockquote class="blockquote">
                    <p>"Lolyshop selalu menyediakan produk kosmetik terbaru dengan harga yang terjangkau. Pelayanannya ramah dan sangat membantu!"</p>
                    <footer class="blockquote-footer">Aginta Tarigan</footer>
                </blockquote>
            </div>
            <div class="col-md-4 text-center">
                <img src="img/customer_2.jpg" class="rounded-circle mb-3" alt="Bertha Sirait" width="100" height="100">
                <blockquote class="blockquote">
                    <p>"Produk-produk di Lolyshop sangat berkualitas. Saya selalu puas dengan hasil belanja saya di sini. Pasti akan kembali lagi!"</p>
                    <footer class="blockquote-footer">fara Diba</footer>
                </blockquote>
            </div>
            <div class="col-md-4 text-center">
                <img src="img/customer_3.jpg" class="rounded-circle mb-3" alt="Siti Mahmudah" width="100" height="100">
                <blockquote class="blockquote">
                    <p>"Terima kasih Lolyshop atas produk dan pelayanannya yang luar biasa. Pengiriman cepat dan produk asli. Sangat direkomendasikan!"</p>
                    <footer class="blockquote-footer">Rina Faryska Effendy</footer>
                </blockquote>
            </div>
        </div>
        <hr>
    </div>
    <!-- Testimonial --> 

    <!-- product -->
    <div class="container" style="margin-top: 50px;">
        <h4 style="font-weight: bold;">PRODUCT</h4>
        <p>Produk adalah suatu yang bersifat kompleks, yang dapat diraba
    maupun tidak dapat diraba, yang di dalamnya termasuk kemasan,
    harga, prestise toko dan pelayanan jasa toko yang
    diterima oleh costumer untuk memuaskan keinginan dan kebutuhan.
    Kemudian produk sendiri diklasifikasikan menjadi 2, yaitu jasa dan
    barang. Produk jasa hanya dapat dirasakan (intangible), sedangkan
    produk barang bisa dilihat dan dirasakan (tangible).
    </p>

        <hr>
    </div>
        <!-- product -->


<!-- offer -->
    <div class="container" id="offer">
        <div class="row text-center">
            <div class="col-md-4 py-3 py-md-0">
                <i class="fa-solid fa-cart-shopping"></i>
                <h5>Free Shipping</h5>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <i class="fa-solid fa-truck"></i>
                <h5>Fast Delivery</h5>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <i class="fa-solid fa-thumbs-up"></i>
                <h5>Good</h5>
            </div>
        </div>
    </div>
<!-- offer -->






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
<!-- footer -->

<a href="#" class="arrow"><i><img src="./image/up-arrow.png" alt="" width="50px"></i></a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="main.js"></script>

</body>
</html>