<?php 
include 'koneksi.php'; 
include 'adminMiddleware.php';
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


        <div class="container card" id="contact">
            <h1 class="text-center" style="margin-top: 25px;">UPDATE PRODUK</h1>
                <div align="right" style="margin-right: 20px;">
                  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#produkModal">Add Produk</button>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable3">
                    <thead>
                        <tr style="text-align:center">
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include'koneksi.php';
                        $no=1; 
                        $query = mysqli_query($connect, "SELECT * FROM produk_kategori INNER JOIN update_produk ON produk_kategori.id_kategori = update_produk.id_kategori");
                        while ($d = mysqli_fetch_array($query)) {
                        $produk_id = $d['produk_id'];
                        $id_kategori = $d['id_kategori'];
                         ?>
                        <tr>
                            <td style="text-align:center"><?=$no++?></td>
                            <td style="text-align: center"><img width="50" height="50" src="<?php echo "img/".$d['produk_image'];?>"></td>
                            <td><?=$d['produk_name']?></td>
                            <td style="text-align:center">Rp <?= number_format($d['produk_price'])?></td>
                            <td style="text-align:center"><?=$d['produk_stok']?></td>
                            <td style="text-align:center"><?=$d['kategori']?></td>
                            <td><div align="center">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detailproduk<?=$d['produk_id'];?>" data-id="<?php echo $produk_id; ?>"><i class="far fa-eye"></i></button>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editproduk<?php echo $d['produk_id'];?>" data-id="<?php echo $produk_id; ?>"><i class="fas fa-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteproduk<?php echo $d['produk_id'];?>" data-id="<?php echo $produk_id; ?>"><i class="fas fa-times"></i></button>
                              </div>
                            </td>
                        </tr>
                        
                        <!-- detail produk -->
                        <div class="modal fade" id="detailproduk<?=$d['produk_id'];?>" >
                         <div class="modal-dialog" role="document">
                          <div class="modal-content">
                           <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Produk</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                           <div class="modal-body">
                            <div style="text-align: center;">
                              <img width="100" height="100" src="<?php echo "img/".$d['produk_image'];?>">
                            </div>
                            <div class="mb-3">
                              <strong>Nama Produk :</strong><p><?= $d['produk_name'];?></p>
                            </div>
                            <div class="mb-3">
                              <strong>Harga :</strong><p>Rp <?=number_format($d['produk_price']);?></p>
                            </div>
                            <div class="mb-3">
                              <strong>Stok :</strong><p><?=$d['produk_stok'];?></p>
                            </div>
                            <div class="mb-3">
                              <strong>Kategori :</strong><p><?=$d['kategori'];?></p>
                            </div>
                            <div class="mb-3">
                              <strong>Deskripsi :</strong><p><?=$d['produk_deskripsi'];?></p>
                            </div>
                          </div>
                         </div>
                        </div>
                      </div>
                      

                        <!-- edit produk -->
                        <div class="modal fade" id="editproduk<?php echo $d['produk_id'];?>">
                         <div class="modal-dialog">
                          <div class="modal-content">
                           <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                           <div class="modal-body">
                            <form method="post" id="produk_edit" action="proses.php" enctype="multipart/form-data">
                              <input type="hidden" name="edit_id" value="<?php echo $produk_id; ?>">
                              <input type="hidden" name="kat_id" value="<?php echo $id_kategori; ?>">
                            <label for="nama" class="col-sm-4 col-form-label">Nama Produk</label>
                              <input class="form-control" type="text" name="produk_name" value="<?=$d['produk_name']?>">
                            <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                              <input type="text" class="form-control" name="produk_price" value="<?=$d['produk_price']?>">
                            <label for="kategori" class="col-sm-4 col-form-label">Kategori</label>
                                <select name="id_kategori" class="form-control">
                                <option value="<?=$d['id_kategori']?>"><?=$d['kategori']?></option>
                                  <?php
                                    include 'koneksi.php';
                                      $sql="select * from produk_kategori";

                                      $hasil=mysqli_query($connect,$sql);
                                      while ($data = mysqli_fetch_array($hasil)) {
                                     ?>
                                      <option value="<?php echo $data['id_kategori'];?>"><?php echo $data['kategori'];?></option>
                                    
                                    <?php 
                                    }
                                    ?>
                              </select>
                            <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                              <input type="number" class="form-control" name="produk_stok" value="<?=$d['produk_stok']?>">                                
                              <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
                                <textarea class="form-control" placeholder="Deskripsi" id="produk_deskripsi" name="produk_deskripsi" style="height: 100px"><?=$d['produk_deskripsi']?></textarea>
                            <label for="image" class="col-sm-4 col-form-label">Gambar Produk</label></br>
                                  <img width="100" height="100" src="img/<?php echo $d['produk_image'] ?>">
                                  <input type="file" name="image" id="image"><p></p>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" name="edit_produk">Update</button>
                            </div>
                            </form>
                           </div>
                          </div>
                         </div>
                        </div>

                        <!--Delete Modal -->
                        <div id="deleteproduk<?php echo $d['produk_id'];?>" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Produk</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <form method="post" id="produk_form" action="proses.php">
                                            <input type="hidden" name="delete_id" value="<?php echo $produk_id; ?>">
                                            <div class="alert alert-danger">Are you Sure you want Delete <strong>
                                                    <?php echo $d['produk_name']; ?>?</strong> </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
                                                <button type="submit" class="btn btn-danger" name="delete_produk">YES</button>
                                            </div>
                                          </form>
                                        </div>
                                    </div> 
                                  </div>
                                </div>

                        <?php
                        }
                         ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!-- produk modal-->
<div class="modal fade" id="produkModal" tabindex="-1" aria-labelledby="produkModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="produkModalLabel">Insert Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="produk_form" action="proses.php" enctype="multipart/form-data">
        <label for="sumber">Nama Produk</label>
          <input class="form-control" type="text" name="produk_name" required>
        <label for="tglk" class="col-sm-4 col-form-label">Harga</label>
          <input type="text" class="form-control" name="produk_price" required>
        <label for="jmlkeluar" class="col-sm-4 col-form-label">Kategori</label>
            <select name="id_kategori" class="form-control" equired data-parsley-pattern="/^[a-zA-Z\s]+$/" data-parsley-maxlength="150" data-parsley-trigger="keyup">
            <option>...</option>
            <?php
              include 'koneksi.php';
                $sql="select * from produk_kategori";

                $hasil=mysqli_query($connect,$sql);
                while ($data = mysqli_fetch_array($hasil)) {
               ?>
                <option value="<?php echo $data['id_kategori'];?>"><?php echo $data['kategori'];?></option>
              <?php 
              }
              ?>
          </select>
        <label for="tujuan" class="col-sm-4 col-form-label">Stok</label>
          <input type="number" class="form-control" name="produk_stok" required>                                
        <label for="deskripsi" class="col-sm-4 col-form-label">Deskripsi</label>
          <textarea class="form-control" placeholder="Deskripsi" id="produk_deskripsi" name="produk_deskripsi" style="height: 100px"></textarea>
        <label for="image" class="col-sm-4 col-form-label">Gambar Produk</label></br>
          <input type="file" name="image" id="image"><p></p>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="submit_produk">Submit</button>
      </div>
    </form>
   </div>
 </div>
</div>
</div>

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


</body>
</html>