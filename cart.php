

<div > <style>
 
.cartpage {
    border: 1px solid #ddd;
    overflow: hidden;
    padding: 10px;
}

.cartpage h2 {
    border-bottom: 1px solid #ddd;
    font-size: 30px;
    margin-bottom: 20px;
    width: 141px;
}

.tblone {
    border: 1px solid #fff;
    margin-bottom: 12px;
    width: 100%;
}

.tblone th {
    background: #666 none repeat scroll 0 0;
    color: #fff;
    font-size: 20px;
    padding: 5px 8px;
    text-align: center;
}

.tblone td {
    padding: 10px;
    text-align: center;
}

table.tblone tr:nth-child(2n+1) {
    background: #fff;
    height: 30px;
}

table.tblone tr:nth-child(2n) {
    background: #fdf0f1;
    height: 30px;
}

table.tblone input[type="number"] {
    border: 1px solid #ddd;
    padding: 2px;
    width: 60px;
}

table.tblone input[type="submit"] {
    background: #333 none repeat scroll 0 0;
    border: 1px solid #000;
    border-radius: 3px;
    color: #fff;
    cursor: pointer;
    font-size: 14px;
    padding: 1px 5px;
}

table.tblone a {
    color: #fe5800;
    font-weight: bold;
    text-decoration: none;
}

table.tblone a:hover {
    color: #000;
}

table.tblone img {
    height: 20px;
    width: 30px;
}

.shopping {
    margin-top: 30px;
}

.shopleft,
.shopleft {
    float: left;
    text-align: center;
    width: 610px;
}

.shopleft img {
    outline: none
}

.shopleft a,
.shopright a {
    outline: none
}

.shopright img {
    width: 270px;
    outline: none
}
</style></div>
<?php
include 'lib/session.php';
session::init();

?>
<?php 

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
    <style>
		    .container {
            width: 100%;
            margin: 0 auto;
        }
		.menu li a:hover {
            color: hotpink;
        }  
        .btn-menu {
            display: none;
        }
        
        .acctions input {
            display: none;
        }
        
        #icon i {
            display: none;
            font-size: 30px;
        }
        
        #check {
            display: none;
        }
		#footer {
            width: 100%;
            height: 500px;
            background: rgb(0, 0, 0, 0.79);
            margin-top: 50px;
            padding: 0px 63px;
            padding-top: 57px;
            display: flex;
            justify-content: space-around;
        }
        
        #footer .box {
            width: 250px;
            color: #fff;
        }
        
        #footer .box .quick-menu {
            margin-top: 40px;
        }
        
        #footer .box .quick-menu .item {
            margin-bottom: 12px;
        }
        
        #footer .box .quick-menu,
        .item a {
            color: black;
            text-decoration: none;
        }
        
        #footer .box .quick-menu,
        .item a:hover {
            color: #ddd;
        }
        
        #footer .box form input {
            width: 294px;
            height: 42px;
            background: transparent;
            padding-left: 20px;
            color: #fff;
            margin-top: 30px;
        }
        
        #footer .box form button {
            background: #362f2f;
            box-shadow: 5px 5px 4px rgba(0, 0, 0.25);
            width: 163px;
            height: 38px;
            margin-top: 29px;
            color: #fff;
        }
        
        #togge-menu {
            display: none;
        }
        .zalo {
            position: fixed;
            bottom: 20px;
            right: 25px;
            z-index: 9999999;
            cursor: pointer;
        }
		.zalo img {
            width: 50px;
        }
		.logo {
            text-decoration: none;
            font-size: 25px;
            margin-left: 20px;
            color: hotpink;
            font-weight: bold
        }
		header {
            width: 90%;
            padding: 0 30px;
            margin: 33px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
		nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
		nav ul {
            display: flex;
        }
		.acctions {
            display: flex;
        }
        
        .acctions .item {
            margin: 0 20px;
        }
        
        nav ul li {
            display: flex;
            margin-left: 20px;
            list-style: none;
            transition: 0.4s;
            padding: 5px;
        }
        
        nav ul li a {
            color: rgb(51, 51, 51);
            text-decoration: none;
            font-size: 22px;
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
                    <li><a href="product.php">Giày Nike</a></li>
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
                    echo '<a href="?customer_id='.Session::get('customer_id').'">Logout</a>';
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
<?php 
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
           $cartId =$_POST['cartId'];
		   $quanlity= $_POST['quanlity'];
	$update_quanlity= $ct ->update_quanlity($cartId, $quanlity); //lấy tất cả dữ liệu khi nhấn sumit $file chứa hình ảnh 
}
if(isset($_GET['cartId'])){
	$cartId = $_GET['cartId'];
	$delproduct_cart= $ct ->delproduct_cart($cartId);
}
?>
<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Giỏ Hàng</h2>
					<?php 
					if (isset($update_quanlity)) {
						echo $update_quanlity;
					}
					if (isset($delproduct_cart)) {
						echo $delproduct_cart;
					}
					?>
						<table class="tblone">
							<tr>
								<th>Product Name</th>
								<th>Image</th>
								<th>Price</th> 
								
								<th>Quantity</th>
								<th>Total Price</th>

								<th>Action</th>
							</tr>
							<?php 
							$getproduct_cart= $ct -> getproduct_cart();
							if ($getproduct_cart) {
								$subtotal=0;
								$qty=0;
							while ($result=$getproduct_cart->fetch_assoc()) {
								
							
							
							
							?>
							<tr>
								<td><?php echo $result['tensp'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" width="200px" alt=""/></td>
								<td><?php echo $result['price'] ?></td>
								<td>
									<form action="" method="post">
										<!-- <input type="hidden" name="cartId" min="1" value="<?php echo $result['cartId'] ?>"/>
										<input type="number" name="" min="1" name="quanlity" value="<?php echo $result['quanlity'] ?>"/> -->
                                        <?php echo $result['quanlity'] ?>
										<!-- <input type="submit" name="submit" value="Update"/> -->
									</form>
								</td>
								<td>
									<?php 
									$total= $result['price'] * $result['quanlity'];
									echo $total;
									?>
								</td>
								<td><a href="?cartId=<?php echo $result['cartId'] ?>">Xóa</a></td>
							</tr>
							
						<?php 
							$subtotal +=$total;
							$qty = $qty + $result['quanlity'];
						}
					}
						?>
							
						</table>
						<table style="float: right;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>
									<?php 
								
								
									echo $subtotal;
									session::set('sum',$subtotal);
									session::set('qty',$qty);
									?>
								</td>
							</tr>
							<!-- <tr>
								<th>VAT : </th>
								<td>TK. 31500</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>TK. 241500 </td>
							</tr> -->
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.html"> <img src="img/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="pay.php"> <img src="img/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php 
    include 'view/footer.php';
?>