<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    include_once '../classes/danhmucsp.php';
?>
<?php 
    $danhmuc= new danhmucsp();
    
	if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            
        
		$tendm= $_POST['tendm'];
        $insertDm= $danhmuc ->insert_danhmuc($tendm);

	}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Thêm danh mục</h2>
                <?php 
                if (isset($insertDm)) {
                    echo $insertDm;
                }
                ?>
               <div class="block copyblock"> 
                   
                 <form action="catadd.php" method="POST">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="tendm" placeholder="Hãy thêm danh mục sản phẩm" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save"  />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>