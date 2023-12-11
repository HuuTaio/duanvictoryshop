<?php
include 'lib/session.php';
session::init();

?>
<?php 
// include_once "classes/adminlogin.php";
// include_once "classes/brand.php";
// include_once "classes/cart.php";
// include_once "classes/customer.php";
// include_once "classes/danhmucsp.php";
// include_once "classes/product.php";
// include_once "classes/user.php";
include_once 'lib/database.php';
include_once 'helper/format.php';
//    spl_autoload_register(function($className)){
//        include_once "classes/".$className.".php";
//    } 
    spl_autoload_register(function ($className) {
        include_once "classes/".$className.".php";
    }
);

   $db= new Database();
   $fm= new Format();
   $ct= new cart();
   $cs= new customer();
   $us= new user();
   $dm= new danhmucsp();
   $product= new product();

?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web bán giày</title>
    <link rel="stylesheet" href="./css//style.css">
    <link rel="stylesheet" href="./css/style_cart.css">
   
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="./css/style3.css">
    <link rel="stylesheet" href="./css/style4.css">
    <link rel="stylesheet" href="./css/giohang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://use.fontawesome.com/releases/v5.7.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <style>
        body{
            background-color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <a href="./index.php" class="logo">
                <p>VICTORY</p>

            </a>

            <nav>

                <input type="checkbox" id="togge-menu">
                <ul class="menu">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="product.php?iddm=52">Sản Phẩm</a></li>
                    <li><a href="#">Deal Sốc</a></li>
                    <li><a href="#">Liên hệ</a></li>
                <?php 
                  $logincheck= session::get('customer_login');
                  if ($logincheck == false){
                      echo ' ';
                      
                  }
                  else {
                    echo ' <li><a href="profile.php">Profile</a></li>';
                  }
                ?>

                <?php 
                $customer_id= Session::get('customer_id');
                  $check_oder= $ct -> check_oder( $customer_id);
                  if ($check_oder == true){
                    echo ' <li><a href="oderdetail.php">Order</a></li>';
                      
                  }
                  else {
                   echo ' ' ;
                  }
                ?>
                   

                    <li><a href="#">Dịch vụ</a></li>
                </ul>

                <!-- <div class="item">
                    <a href="">Trang chủ</a>
                </div>
                <div class="item">
                    <a href="">Sản phẩm</a>
                </div>
                <div class="item">
                    <a href="">Deal Sốc</a>
                </div>
                <div class="item">
                    <a href="">Liên hệ</a>
                </div>
                <div class="item">
                    <a href="">Dịch vụ</a>
                </div> -->
            </nav>
            <?php 
                if (isset($_GET['customer_id'])) {
                    $delcart= $ct ->del_all_data_cart();
                   Session::destroy();
                }   
            ?>
            <div class="acctions">
                <div class="item">
                <?php 
                
                $logincheck= session::get('customer_login');
                if ($logincheck == false) {
                    echo '<a href="login.php"><img src="img/user.png" alt=""></a>';
                }
                else{
                    echo '<a href="?customer_id='.Session::get('customer_id').'"><i class="fa fa-sign-out one" style="font-size:30px;"></i></a>';

                }
                ?>



                    
                </div>
                <div class="item">
                    <a href="cart.php"><img src="img/cart.png" alt=""></a>
                    <?php
                    $checkcart= $ct ->checkcart(); 
                    if ($checkcart) {
                        $sum= Session::get('sum');
                        $qty= Session::get('qty');
                        echo $qty;
                        // echo $sum.'đ';
                    }
                   else{
                       echo ' ';
                   }
                    
                    
                    ?>
                </div>

            </div>
            <label for="togge-menu" class="btn-menu">
                <i class="fas fa-bars"></i> </label>
        </header>