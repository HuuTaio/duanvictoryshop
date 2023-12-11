<?php 
    include 'view/header.php';
?>
<?php 

// if(isset($_GET['proid']) && $_GET['proid']!=NULL){
//     $id = $_GET['proid'];
// }
// else {
//     echo "<script>window.location ='catlist.php'</script>";
// }
$id = Session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
     
     $updatecustomer= $cs ->updatecustomer($_POST,$id); //lấy tất cả dữ liệu khi nhấn sumit $file chứa hình ảnh 
}
?>
<div><style>
      .main{
            margin: auto;
            width: 40%;
            text-align: center;
        }
        input {
  /*Ẩn boder trên, phải và trái*/
        border: hidden;
        
 /*Thiết lập kiểu cho border dưới*/
        border-bottom-style: groove;
        
        color:black;
        width: 200px;
        height: 30px;
   }
input::placeholder{
   color:white;
}
input:focus {
   outline: none;
}

       
</style></div>
        <div class="main">
            <div class="conten">
            <div class="section group">
                <h2>Update Profile</h2>

                <form action="" method="POST">
                <table class="tblone"  with="100px">
                    <tr>
                         
                            <?php 
                            
                          
                            if (isset( $updatecustomer)) {
                                echo '<td colspan="2">' .$updatecustomer   .'</td>';
                            }
                            ?>
                      
                    </tr>
                    <?php 
                    $id = Session::get('customer_id');
                    $get_customer=$cs ->show_customer($id);
                    if ($get_customer) {
                        while ($result = $get_customer->fetch_assoc()) {
                            
                    ?>
                <tr>
                    <td>Name :</td>
                    
                    <td> <input type="text" name="name"  value="<?php echo $result['name'] ?>"> </td>
                    
                </tr>
                <tr>
                    <td>Email :</td>
               
                    <td> <input type="text" name="email"  value="<?php echo $result['email'] ?>"> </td>
                  
                </tr>
                <tr>
                    <td>Password :</td>
                  
                    <td> <input type="text" name="pass"  value="<?php echo $result['pass'] ?>"> </td>
                </tr>
                <tr>
                    <td>Phone :</td>
                    
                    <td> <input type="text" name="Phone"  value="<?php echo $result['Phone'] ?>"> </td>
                </tr>
                  <tr>
                    <td>City :</td>
                
                    <   <td> <input type="text" name="City"  value="<?php echo $result['City'] ?>"> </td>
                </tr>
                <tr>
                    <td>Address :</td>
                    
                    <   <td> <input type="text" name="address"  value="<?php echo $result['address'] ?>"> </td>
                </tr>
                <tr>
                    <td colspan="3"> <input type="submit"  name="save" value="Save"> </td>
                </tr>
                <?php 
                
                
            }
        }
                ?>
                </table>
                </form>
            </div>

            </div>
        </div>

        
          
        <?php 
    include 'view/footer.php';
?>