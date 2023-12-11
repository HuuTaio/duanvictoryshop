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
// if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
//      $quanlity  =$_POST['quanlity'];    
//      $addToCart= $ct ->add_to_cart($quanlity,$id); //lấy tất cả dữ liệu khi nhấn sumit $file chứa hình ảnh 
// }
?>
<div>
    <style>
        .main1{
            margin: auto;
            width: 40%;
            text-align: center;
        }
       
    </style>
</div>
        <div class="main1">
            <div class="conten1">
            <div class="section group">
                <h2>Profile</h2>
                <table class="tblone1"  with="100px">
                    <?php 
                    $id = Session::get('customer_id');
                    $get_customer=$cs ->show_customer($id);
                    if ($get_customer) {
                        while ($result = $get_customer->fetch_assoc()) {
                            
                    ?>
                <tr>
                    <td>Name   :</td>
                    
                    <td><?php echo $result['name'] ?></td>
                </tr>
                <tr>
                    <td>Email  :</td>
                   
                    <td><?php echo $result['email'] ?></td>
                </tr>
                <tr>
                    <td>Password :</td>
                
                    <td><?php echo $result['pass'] ?></td>
                </tr>
                <tr>
                    <td>Phone :</td>
                  
                    <td><?php echo $result['Phone'] ?></td>
                </tr>
                  <tr>
                    <td>City :</td>
                
                    <td><?php echo $result['City'] ?></td>
                </tr>
                <tr>
                    <td>Address :</td>
                 
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

        
          
        <?php 
    include 'view/footer.php';
?>