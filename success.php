<?php 
    include 'view/header.php';
?>
<?php 

if(isset($_GET['oderid']) && $_GET['oderid'] == 'oder'){
   $customer_id= Session::get('customer_id');
   $insertOder= $ct -> insertOder($customer_id);
   $delcart= $ct ->del_all_data_cart();
   header('location:success.php');
}

// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
//      $quanlity  =$_POST['quanlity'];    
//      $addToCart= $ct ->add_to_cart($quanlity,$id); //lấy tất cả dữ liệu khi nhấn sumit $file chứa hình ảnh 
// }


?>
<div>
    <style>
      .main2{
        height: 400px;
        text-align: center;
        margin-top: 100px;
      }

    </style>
</div> 
<div class="main2">
    <h2 style="color: red;">Đặt hàng thành công</h2>
    <?php 
     $customer_id= Session::get('customer_id');
    $get_amount = $ct  ->getAmoutPrice($customer_id);
    if ($get_amount) {
        $amout=0;
        while ($result= $get_amount->fetch_assoc()) {
            $price=$result['price'];
            $amout+= $price;
     
             
    
        }
        }
           
    ?>
    <!-- <h3>Tổng tiền đơn hàng của bạn là: <?php  echo $amout.'VNĐ'  ?> </h3> -->
    <h3>Chúng tôi sẽ liên hệ với bạn sớm nhất có thể. Hãy click vào đây để xem đơn hàng <a style="color: red;" href="oderdetail.php">Click Here</a> </h3>

</div> 

<?php 
include 'view/footer.php';
?>