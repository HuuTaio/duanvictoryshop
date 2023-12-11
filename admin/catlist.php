<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
include '../classes/danhmucsp.php';  
?>
<?php 
    $danhmuc= new danhmucsp();
	if(isset($_GET['delid']) && $_GET['delid']!=NULL){
		$id = $_GET['delid'];
		$deldm= $danhmuc ->del_danhmuc($id);
	}
	
?>
       
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách sản phẩm</h2>
                <div class="block">   
				<?php 
                if (isset($deldm)) {
                    echo $deldm;
                }
                ?>
             
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Số Thứ Tự</th>
							<th>Tên Danh Mục</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$show_dm= $danhmuc -> show_danhmuc();
						if ($show_dm) {
							$i=0;
							while ($result = $show_dm -> fetch_assoc()) {
								$i++;
							
						
						
						?>
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['tendm'] ?></td>
							<td><a href="catedit.php?iddm=<?php echo $result['iddm'] ?>">Edit</a> || <a onclick="return confirm('Bạn có muốn xóa danh mục này?')" href="?delid=<?php echo $result['iddm'] ?>">Delete</a></td>
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

