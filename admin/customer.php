<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 

$filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../classes/customer.php');
 include_once ($filepath.'/../helper/format.php');
?>
<?php 
    include '../classes/danhmucsp.php';
?>
<?php
 
 $cs = new customer();
 if(isset($_GET['customerid']) && $_GET['customerid']!=NULL){
    $id = $_GET['customerid'];
}
else {
    // echo "<script>window.location ='inbox.php'</script>";
}
  
//  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     $tendm= $_POST['tendm']; 
//     $updateDm= $danhmuc ->update_danhmuc($tendm,$id);
// }

	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer </h2>
             
                
               <div class="block copyblock"> 
               <?php   
                $cs = new customer();
               
                // $getcustomer = $cs -> show_customer($id);
    
                // if ($getcustomer) {
                //     while ($result =  $getcustomer->fetch_assoc()) { // Trả về dữ liệu dạng mảng với key là tên của column
                     
                  
                ?>
                 <form action="" method="POST">
                    <table class="form">	
                     				
                        <tr>
                            <td>Name</td>
                            <td>:</td>
                            <td>
                                <input type="text" value="<?php echo 'Name :	VIETANH' ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" value="<?php echo 'Email :	3@gmail.com' ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td>PassWord</td>
                            <td>:</td>
                            <td>
                                <input type="text" value="<?php echo 'Password :	123' ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td>:</td>
                            <td>
                                <input type="text" value="<?php echo 'Phone :	0129391239129' ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>:</td>
                            <td>
                                <input type="text" value="<?php echo 'City :	Hcm' ?>"  />
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td>
                                <input type="text" value="<?php echo 'Address :	cm2/9' ?>"  />
                            </td>
                        </tr>
						
                    </table>
                    </form>
                    <?php 
                    //   }
                    // }
                    
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>