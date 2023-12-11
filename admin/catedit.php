<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include '../classes/danhmucsp.php';
?>
<?php
 $danhmuc= new danhmucsp();
 
 if(isset($_GET['iddm']) && $_GET['iddm']!=NULL){
     $id = $_GET['iddm'];
 }
 else {
     echo "<script>window.location ='catlist.php'</script>";
 }
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tendm= $_POST['tendm']; 
    $updateDm= $danhmuc ->update_danhmuc($tendm,$id);
}

	
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục </h2>
                <?php 
                if (isset($updateDm)) {
                    echo $updateDm;
                }
                ?>
                <?php 
                $get_tendanhmuc = $danhmuc-> getdanhmucbyId($id);
                if ($get_tendanhmuc) {
                    while ($result= $get_tendanhmuc->fetch_assoc()) {
                     
                  
                ?>
               <div class="block copyblock"> 
                 <form action="" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['tendm'] ?>" name="tendm" placeholder="Hãy sữa danh mục sản phẩm" class="medium" />
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