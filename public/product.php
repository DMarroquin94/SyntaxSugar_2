<?php require_once("includes/connection.php");

$product;
if(isset($_GET['carId']))
{
$carId = $_GET['carId'];
$cQuery = "SELECT DISTINCT pic.source,  c.* FROM Car c, Car_pictures pic WHERE c.id = $carId and c.id = pic.carId group by c.id";
$carQuery = mysqli_query($conn, $cQuery);
if(!$carQuery){
  die("Database query failed: ".mysqli_error($conn));
}
else{
  $row = $carQuery->fetch_row();
  $product = [];
  $product['pic']=$row[0];
  $product['id'] = $row[1];
  $product['name'] = $row[2];
  $product['year']=$row[3];
  $product['model']=$row[4];
  $product['price']=$row[5];
  $product['drive']=$row[6];
  $product['desc']=$row[7];
}
}
else{
  echo 'No car id set';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>Dakotas Cars</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Virtual Reality Gaming Console">
  <meta name="author" content="Group Project- CNguyen, DMarroquin, ELatina,JWestern">


  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-modal-bs3patch.css" rel="stylesheet">
  <link href="css/bootstrap-modal.css" rel="stylesheet">
  <link href="../css/custom.css" rel="stylesheet"> 
   <link href="css/style.css" rel="stylesheet">  

</head>

<body id="shop-page">
 <header id="header_nav" class="navbar-default" role="navigation">
  
<div class="container-fluid">
  <!-- Brand and toggle get grouped for better modile display -->
  <div class"navbar-header">
   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        <!-- </button> -->
        <a class="navbar-brand" href="#"> Cars</a>
      </div>
     <!-- <img id="logo" class="img-responsive" src="images/transparent_logo.png" /> -->
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="top-nav">
  
  
    
      <ul id"nav-bar navbar-collapse collapse">
          <li><a href="index.html"><span class="glyphicon glyphicon-picture"></span> Home</a></li>
          <li><a href="shop.html"><span class="glyphicon glyphicon-list-alt"></span> Request</a></li>
          <li><a href="gallery.html"><span class="glyphicon glyphicon-picture"></span> Gallery</a></li>
          <li><a href="shop.html"><span class="glyphicon glyphicon-user"></span> Shop</a></li>
          <li><a tabindex="-1" href="index.html"><span class="glyphicon glyphicon-hdd"></span>Contact</a></li>
      </ul> 
    </div>
  </div>
  </header>

  <div id="wrap">

    <div id="side-navbar" class="col-sm-3 col-md-2 sidebar col-no-pad visible-md visible-lg">
      <h6 class="page-header">Main Links</h6>
          <ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 1</a></li>
          </ul>

        </div>
      <div class="container">
        <h3 class="page-header"><?= $product['name'] ?></h3>
        <div id="product" class="row">
          
          <div class="col-sm-4 col-md-6">
            <img class="img-responsive" src="images/shop/<?= $product['pic']; ?>" />
          </div>
          <div class="col-sm-8 col-md-6">
            <h4 class="sub-header"><?= $product['price'] ?></h4>
            <h5><?= $product['year'] ?></h5>
            <h5><?= $product['model'] ?></h5>
          </div>
        </div>
      <!--   <span class="center-block center"><img id="ajax-loader" class="visible" src="images/ajax-loader.gif"/></span> -->
      </div>
  </div>

  <footer id="footer" class="container">
    <div class="col-sm-4">
      <ul style="list-style-type:none;">
        <li>
          &copy; MacroReality Virtual Gaming 2014
        </li>
        <li><span class="glyphicon glyphicon-chevron-right"></span> (415) 626-1644</li>
        <li><span class="glyphicon glyphicon-envelope"></span> MacroRealityInc@macroreality.com</li>
        <li><span class="glyphicon glyphicon-briefcase"></span> <a href="#">Careers</a></li>
      </ul>
    </div>
    <div class="col-sm-4">
      <ul style="list-style-type:none; font-size:12px;">
        <li><h3><em>Address</em>:</h3></li>
        <li>260 Linden St</li>
        <li>San Francisco, CA 94102</li>
      </ul></div>
      <div class="col-sm-4"></div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-modal.js"></script>
    <script type="text/javascript" src="js/bootstrap-modalmanager.js"></script>
    <script src="js/jquery.unveil.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
  </body>
  </html>