<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';
?>
<?php include '../classes/danhmucsp.php';
?>
<?php include '../classes/product.php'
?>

<?php 
        $sp= new product();
        if(isset($_GET['idsp']) && $_GET['idsp']!=NULL){
            $id = $_GET['idsp'];
        }
        else {
            echo "<script>window.location ='catlist.php'</script>";
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
           
            $updateProduct= $sp ->update_product($_POST, $_FILES,$id); //lấy tất cả dữ liệu khi nhấn sumit $file chứa hình ảnh 
        }
         

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Sửa Sản Phẩm</h2>
        <div class="block">   
        <?php 
                if (isset($updateProduct)) {
                    echo $updateProduct;
                }
                ?>   
                <?php 
                $get_sanpham_by_id= $sp->getsanphambyId($id);
            
                if ($get_sanpham_by_id) {
                    while ($result_sanpham= $get_sanpham_by_id->fetch_assoc()) {
                
                ?>         
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input type="text" name="tensp" value="<?php echo $result_sanpham['tensp'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh mục</label>
                    </td>
                    <td>
                        <select id="select" name="danhsachsp">
                            <option>Select Category</option>
                        <?php 
                            $danhmuc = new danhmucsp();
                            $listdanhmuc = $danhmuc ->show_danhmuc();

                            if ($listdanhmuc) {
                                while($result = $listdanhmuc->fetch_assoc())
                                {
                            
                        
                        ?>

                            <option 
                                    <?php 
                                    if ($result['iddm']== $result_sanpham['iddm'] ) {
                                        echo 'selected'; 
                                    }
                                    
                                    ?>
                            
                            value="<?php echo $result['iddm'] ?>"><?php echo $result['tendm'] ?></option>
                           <?php 
                           
                        }
                    }
                           
                           ?> 
                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Thương Hiệu</label>
                    </td>
                    <td>
                        <select id="select" name="brand">
                            <option>Select Brand</option>
                            <?php 
                            $brand = new brand();
                            $listbrand = $brand ->show_brand();

                            if ($listbrand) {
                                while($result = $listbrand->fetch_assoc())
                                {
                            
                        
                        ?>

                            <option
                            <?php 
                                    if ($result['brandid']== $result_sanpham['brandid'] ) {
                                        echo 'selected'; 
                                    }
                                    
                                    ?> 
                            value="<?php echo $result['brandid'] ?>"><?php echo $result['brandName'] ?></option>
                           <?php 
                           
                        }
                    }
                           
                           ?> 
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Mô tả</label>
                    </td>
                    <td>
                        <textarea name="mota" class="tinymce" ><?php echo $result_sanpham['mota'] ?></textarea>
                    </td>
                </tr>
				<tr> 
                    <td>    
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result_sanpham['price'] ?>" name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>    
                        <label>Giảm giá</label>
                    </td>
                    <td>
                        <input type="text" value="<?php echo $result_sanpham['giam_price'] ?>" name="giam_price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hình ảnh</label>
                    </td>
                    <td>
                    <img src="uploads/<?php echo $result_sanpham['image'] ?>" alt="" width="100px"> <br>
                        <input type="file"  name="image"/>
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Select Type</option>
                            <?php 
                            if($result_sanpham['type']==0){

                           
                            
                            
                            ?>
                            <option selected value="1">Nổi bậc</option>
                            <option value="0">Không nổi bậc</option>
                            <?php 
                             }else{
                                ?>
                                 <option value="1">Nổi bậc</option>
                                 <option selected value="0">Không nổi bậc</option>
                             <?php
                                }
                                
                             ?>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
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
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


