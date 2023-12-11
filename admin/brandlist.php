<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
include '../classes/brand.php';  
?>
<?php 
    $brand= new brand();
	if(isset($_GET['delid']) && $_GET['delid']!=NULL){
		$id = $_GET['delid'];
		$delbrand= $brand ->del_brand($id);
	}
	
?>
       
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách sản phẩm</h2>
                <div class="block">   
				<?php 
                if (isset($delbrand)) {
                    echo $delbrand;
                }
                ?>
             
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Số Thứ Tự</th>
							<th>Tên Thương hiệu</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$show_brand= $brand -> show_brand();
						if ($brand) {
							$i=0;
							while ($result = $show_brand -> fetch_assoc()) {
								$i++;
							
						
						
						?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['brandName'] ?></td>
							<td><a href="brandedit.php?brandid=<?php echo $result['brandid'] ?>">Edit</a> || <a onclick="return confirm('Bạn có muốn xóa thương hiệu này?')" href="?delid=<?php echo $result['brandid'] ?>">Delete</a></td>
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

