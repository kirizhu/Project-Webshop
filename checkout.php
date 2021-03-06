<?php 
session_start();
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Webshop</title>
        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <script src="https://use.fontawesome.com/7343a86b55.js"></script>
</head>
<body>
 
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-author" href="index.php">Shop</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="allproducts.php">Products
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php 
          if(!isset($_SESSION['customer_email'])){
            echo "";
          
          
          }
          else {
            echo "<a class='nav-link'href='customer/my_account.php' >My Account</a>";
          }
          ?>
        <li class="nav-item">
        <?php 
        if(!isset($_SESSION['customer_email'])){
        
        echo "<a class='nav-link' href='checkout.php' >Login</a>";
        
        }
        else {
        echo "<a class='nav-link' href='logout.php' >Logout</a>";
        }
        ?>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="api.php"> JSON </a>
        </li>
          <form class="form-inline my-2 my-lg-0"method="GET" action="search.php" enctype="multipart/form-data" >
    <input class="form-control mr-sm-2" type="text" name="user_search"placeholder="Search" >
    <button class="btn btn-outline-inverse my-2 my-sm-0" name="search"type="submit">Search</button>
  </form>
        </ul>
      </div>
    </div>
  </nav> 
      <!-- Navigation END -->
<div class="container"> <!-- Main container -->
        <!-- Sidebar -->
        <?php cart(); ?>
        <div class="float-right"><small class="text-muted">
        <?php 
					if(isset($_SESSION['customer_email'])){ 
					echo "<b>Welcome:</b>" . $_SESSION['customer_email'] . "<b>Your</b>" ;
					}
					else {
					echo "<b>Welcome Guest:</b>";
					}
					?>    
        
       <a href="cart.php" >
          <i class="fa fa-shopping-cart" aria-hidden="true"></i>  <?php total_items(); ?>  
          <i class="fa fa-money" aria-hidden="true"></i> <?php total_price(); ?>:-</a>
          <?php 
					if(!isset($_SESSION['customer_email'])){
					
					echo "<a href='checkout.php' >Login</a>";
					
					}
					else {
					echo "<a href='logout.php' >Logout</a>";
					}
					
					
					
					?></small>
        
        </div>

<div id="wrap"class="row float-left">
        <div class="col-lg-3 d-none d-lg-block">
          <div class="list-group">
            <h4 class="my-4">Categories</h4> 
            <?php getCats(); ?>    <!-- hämtar categorierna samt författare dynamiskt -->


          </div>
        </div>
        <!-- Sidebar END -->
        <!-- jumbo carousel -->
        <div class="col-lg-9">
        
                  <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                      <div class="carousel-item active">
                        <img class="d-block img-fluid" src="img/t1.jpg" alt="First slide">
                      </div>
                      <div class="carousel-item">
                        <img class="d-block img-fluid" src="img/t2.jpg" alt="Second slide">
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
 <!-- jumbo carousel end-->
 
 <div class="row float-right">
 <?php 
 
 if(!isset($_SESSION['customer_email'])){ //tar dig från carten till loggin sida om du inte är inloggad annars tar den dig till betalfunktionen
     
     include("login.php");
 }
 else {
 
 include("payment.php");
 
 }
 
 ?>
  
</div>
          <!-- row end -->

        </div>
        <!-- col-lg-9 end-->

      </div>
      <!-- row end-->




</div><!-- Main container END-->
<nav id="footer" class="navbar fixed-bottom navbar-dark bg-dark">
    <p class="text-white">Copyright &copy 2017 </p>
  </nav>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>