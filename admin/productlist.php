<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';
?>
<?php include '../classes/danhmucsp.php';
?>
<?php include '../classes/product.php'
?>
<?php 
include_once '../helper/format.php'

?>
<?php 
 $sp= new product();
 $fm= new Format();
if(isset($_GET['idsp'])){
	$id = $_GET['idsp'];
	$delsp= $sp ->del_product($id);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh Sách Sản Phẩm</h2>
        <div class="block">  
		<?php 
		if (isset($delsp)) {
			echo $delsp;
		}
		
		?>
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên SP</th>
					<th>Danh mục</th>
					<th>Thương hiệu</th>
					<th>Giá</th>
					<th>Giảm giá</th>
					<th>Hình ảnh</th>
					<th>Mô Tả</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				 $sp= new product();
				 $fm= new Format();
				$productlist=$sp->show_product();
				if ($productlist) {
					$i=0;
					while ($result =$productlist->fetch_assoc()) {
						$i++; 
				
				?>
				<tr class="odd gradeX">
					<td><?php echo $result['idsp'] ?></td>
					<td style="width: 20%;"><?php echo $result['tensp'] ?></td>
					<td><?php echo $result['tendm'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
					<td><?php echo $result['price'] ?></td>
					<td><?php echo $result['giam_price'] ?></td>
					<td> <img src="uploads/<?php echo $result['image'] ?>" alt="" width="50px"></td>
					<td > <?php echo $fm->textShorten($result['mota'],50)  ?></td>
					<td > 
					<?php  
					if ($result['type']==0) {
						echo 'Nổi bậc';
					}
					else{
						echo 'Không nổi bậc';
					}
					?>
					</td>
					<td><a href="productedit.php?idsp=<?php echo $result['idsp'] ?>">Edit</a> || 
					<a href="?idsp=<?php echo $result['idsp'] ?>">Delete</a></td>
				</tr>
			<?php
				}
			}
			?>	
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
