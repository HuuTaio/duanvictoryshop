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
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
           
            $insertProduct= $sp ->insert_product($_POST, $_FILES); //lấy tất cả dữ liệu khi nhấn sumit $file chứa hình ảnh 
        }
         

?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm Sản Phẩm</h2>
        <div class="block">   
        <?php 
                if (isset($insertProduct)) {
                    echo $insertProduct;
                }
                ?>            
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên sản phẩm</label>
                    </td>
                    <td>
                        <input type="text" name="tensp" placeholder="Enter Product Name..." class="medium" />
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

                            <option value="<?php echo $result['iddm'] ?>"><?php echo $result['tendm'] ?></option>
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

                            <option value="<?php echo $result['brandid'] ?>"><?php echo $result['brandName'] ?></option>
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
                        <textarea name="mota" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>    
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>    
                        <label>Giảm giá</label>
                    </td>
                    <td>
                        <input type="text" name="giam_price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Hình ảnh</label>
                    </td>
                    <td>
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
                            <option value="1">Nổi bậc</option>
                            <option value="0">Không nổi bậc</option>
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


