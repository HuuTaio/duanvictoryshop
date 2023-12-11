<?php 
    include 'view/header.php';
?>
<div > <style>
.main1{
    width: 70%;
    margin: auto;
    height: 600px;
}
.conten1{
    width: 70%;
    margin: auto;
   
}
.shopping{
    float: right;
}


</style></div>
<?php 
//   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
//            $cartId =$_POST['cartId'];
// 		   $quanlity= $_POST['quanlity'];
// 	$update_quanlity= $ct ->update_quanlity($cartId, $quanlity); //lấy tất cả dữ liệu khi nhấn sumit $file chứa hình ảnh 
// }
$logincheck= session::get('customer_login');
 if ($logincheck==false) {
        header('location:login.php');
 }

 if(isset($_GET['confirmid']) ){
    $id = $_GET['confirmid'];
	$time =$_GET['time'];
	$price =$_GET['price'];
	$shifted_confirm= $ct-> shifted_confirm($id,$time,$price);
}

?>
<div class="main1">
    <div class="content1">
    	<div class="cartoption1">		
			<div class="cartpage1">
			    	<h2 style="width: 500px;">Your Detail Oder Cart</h2>
				
						<table class="tblone1">
							<tr><th width="5%">ID</th>
								<th width="10%">Product Name</th>
								<th width="10%">Image</th>
								<th width="10%">Price</th> 
								
								<th width="15%">Quantity</th>
                                <th width="10%">Date</th>
                                <th width="10%">Status</th>
								
								
								<th width="10%">Action</th>
							</tr>
							<?php 
                            $customer_id= Session::get('customer_id');
							$get_cart_oder= $ct -> 	get_cart_oder($customer_id);
							if ($get_cart_oder) {
								$qty=0;
                                $i=0;
							while ($result=$get_cart_oder->fetch_assoc()) {
								$i++;
							
							
							
							?>
							<style>
								#ttt{
									 text-align: center;
								}
							</style>
							<tr>
                                <td><?php echo $i ?></td>
								<td><?php echo $result['tensp'] ?></td>
								<td><img src="admin/uploads/<?php echo $result['image'] ?>" width="100px" alt=""/></td>
								<td id="ttt" ><?php echo $result['price'] ?></td>
								<td id="ttt">
									<form action="" method="post">
									
                                    <?php echo $result['quanlity'] ?>
								
									</form>
								</td>
								<!-- <td>
									<?php 
									$total= $result['price'] * $result['quanlity'];
									echo $total;
									?>
								</td> -->
                                <td> <?php echo $fm->formatDate($result['date_oder']) ?> </td>
                                <td id="ttt">
                                <?php 
                                
                                    if ($result['status']=='0') {
                                        echo 'Đang xử lí';

                                    }
                                    else if($result['status']==1){
                                        ?>
                                        <a href="?confirmid=<?php echo $customer_id ?> &price=<?php echo $result['price'] ?>
									&time=<?php echo $result['date_oder'] ?>
									">Nhận Hàng </a> 

                                        <?php
                                     }else{
                                         echo'Đã nhận hàng';
                                     }
                                     
                                     ?> 
                                    

                                


                                </td>

                                 <?php 
                                 if ($result['status']=='0') {
                                   
                                      
                                 ?>  
                                 <td id="ttt"> <?php echo 'N/A' ?> </td>
                                 
                                 <?php 
                                   }
                                 else {
                                 ?> 
                                  								
                                <?php 
                                }
                                ?>
							</tr>
							
						<?php 
							
						}
					}
						?>
							<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="img/shop.png" alt="" /></a>
						</div>
					
					</div>
						</table>
						
					</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
    
 </div>
