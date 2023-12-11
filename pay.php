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
        .main1{
            height: 800px;
        }
        form{
            width: 90%;
            margin: auto;
          
        }
     
        .hd{
            display: flex;
            width: 90%;
            justify-content:space-between;
            margin: auto;
            
        }
        .hd img{
           
            margin-left: 0;
 
        }
        .box-left{
            width: 65%;
            border: 1px solid black;
            margin-right:100px;
           
        }
        .box-right{
            width: 35%;
            border: 1px solid black;
           

        }
        .oder a{
            text-align: center;
            text-decoration: none;
            color:black;
            font-size: 20px;
            
        }
        .oder a:hover{
           
            color:hotpink;
           
        }
        .oder{
            text-align: center;
           width:100px;
           height:40px;
           margin: auto;
           border: 1px solid #999;
           background: #fcfcfc;
           border-radius: 10px;
        }

    </style>
</div>
<h3>Thanh toán</h3>
    <form action="" method="POST">
        <div class="main1">
            <div class="conten1">
            <div class="section group1">
            <div class="hd">
                
                <div class="box-left1">
                    <div class="cartpage1">
                        
                        <?php 
                        if (isset($update_quanlity)) {
                            echo $update_quanlity;
                        }
                        if (isset($delproduct_cart)) {
                            echo $delproduct_cart;
                        }
                        ?>
                            <table class="tblone1">
                                <style>
                                
                                </style>
                                <tr>
                                <th width="2%">ID</th>
                                    <th width="20%">Product Name</th>
                                    <th width="22%" >Image</th>
                                    <th width="20%">Price</th>     
                                    <th width="10%">Quantity</th>
                                    <th width="20%">Total Price</th>
                                    
                                    <!-- <th width="10%">Action</th> -->
                                </tr>
                                <?php 
                                $getproduct_cart= $ct -> getproduct_cart();
                                if ($getproduct_cart) {
                                    $subtotal=0;
                                    $qty=0;
                                    $i=0;
                                while ($result=$getproduct_cart->fetch_assoc()) {
                                    
                                $i++;
                                
                                
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $result['tensp'] ?></td>
                                    <td><img src="admin/uploads/<?php echo $result['image'] ?>" width="100px" alt=""/></td>
                                    <td><?php echo $result['price'] ?></td>
                                    <td>
                                    
                                    <?php echo $result['quanlity'] ?>
                        
                                    
                                    </td>
                                    <td>
                                        <?php 
                                        $total= $result['price'] * $result['quanlity'];
                                        echo $total .' VNĐ';
                                        ?>
                                    </td>
                                    <!-- <td><a href="?cartId=<?php echo $result['cartId'] ?>">Xóa</a></td> -->
                                </tr>
                                
                            <?php 
                                $subtotal +=$total;
                                $qty = $qty + $result['quanlity'];
                            }
                        }
                            ?>
                                
                            </table>
                            <table >
                                <tr>
                                    <th>Sub Total : </th>
                                    <td>
                                        <?php 
                                    
                                    
                                        echo $subtotal.' VNĐ' ;
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
                </div>
                <div class="box-right1">
                        <table class="tblone"  with="100px">
                                <?php 
                                $id = Session::get('customer_id');
                                $get_customer=$cs ->show_customer($id);
                                if ($get_customer) {
                                    while ($result = $get_customer->fetch_assoc()) {
                                        
                                ?>
                            <tr>
                                <td>Name</td>
                                <td>:</td>
                                <td><?php echo $result['name'] ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><?php echo $result['email'] ?></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>:</td>
                                <td><?php echo $result['pass'] ?></td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td>:</td>
                                <td><?php echo $result['Phone'] ?></td>
                            </tr>
                            <tr>
                                <td>City</td>
                                <td>:</td>
                                <td><?php echo $result['City'] ?></td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>:</td>
                                <td><?php echo $result['address'] ?></td>
                            </tr>
                            <tr>
                                <td colspan="3"> <a href="editprofile.php">Update Profile</a> </td>
                            </tr>
                            <?php 
                            
                            
                        }
                    }
                            ?>
                            </table>
                </div>
        
              
            </div>
           
            </div>
           
        </div>
        <div class="oder">
        <a href="?oderid=oder">Oder</a>
        </div>
        </form>

          
  