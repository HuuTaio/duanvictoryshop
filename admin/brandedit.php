<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include '../classes/brand.php';
?>
<?php
 $brand= new brand();
 
 if(isset($_GET['brandid']) && $_GET['brandid']!=NULL){
     $id = $_GET['brandid'];
 }
 else {
     echo "<script>window.location ='brandlist.php'</script>";
 }
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brandName= $_POST['brandName']; 
    $updatebrand= $brand->update_brand($brandName,$id);
}

	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục </h2>
                <?php 
                if (isset($updatebrand)) {
                    echo $updatebrand;
                }
                ?>
                <?php 
                $get_tenbrand = $brand-> getdanhmucbyId($id);
                if ($get_tenbrand) {
                    while ($result=  $get_tenbrand->fetch_assoc()) {
                     
                  
                ?>
               <div class="block copyblock"> 
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brandName'] ?>" name="brandName" placeholder="Hãy sữa thương hiệu sản phẩm" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Edit" name="hienthi"/>
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php 
                      }
                    }
                    
                    ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>