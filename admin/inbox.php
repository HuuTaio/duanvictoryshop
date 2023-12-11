<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 

$filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../classes/cart.php');
 include_once ($filepath.'/../helper/format.php');
?>
<?php 
 $ct= new cart();
if(isset($_GET['shiftid']) ){
    $id = $_GET['shiftid'];
	$time =$_GET['time'];
	$price =$_GET['price'];
	$shifted= $ct-> shifted($id,$time,$price);
}
// if(isset($_GET['shiftid']) ){
//     $id = $_GET['shiftid'];
// 	$time =$_GET['time'];
// 	$price =$_GET['price'];
// 	$del_shifted= $ct-> del_shifted($id,$time,$price);
// }

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block"> 
					<?php 
					if (isset($shifted)) {
						echo $shifted;
					}
					
					?>
					<?php 
					if (isset($del_shifted)) {
						echo $del_shifted;
					}
					
					?>     
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>  No.</th>
							<th>Order Time</th>
							<th style="width: 15%;">Product</th>
							<th>Image</th>
							<th>Quantity</th>
							<th>Price</th>
							<th>CustomerID</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$ct = new cart();
						$fm= new Format();
						$get_inbox_cart= $ct-> get_inbox_cart();
						if ($get_inbox_cart) {
							$i=0;
							while ($result=$get_inbox_cart->fetch_assoc()) {
							$i++;
						?>
					
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $fm -> formatDate($result['date_oder'])  ?></td>
							<td><?php echo $result['tensp'] ?></td>
							<td><img src="uploads/<?php echo $result['image'] ?>" alt="" width="45px" height="50px"></td>

							<td><?php echo $result['quanlity'] ?></td>
							<td><?php echo $result['price'] ?></td>
							<td><?php echo $result['customer_id'] ?></td>
							<td> <a href="customer.php?customerid=<?php $result['customer_id'] ?>">View Customer</a> </td>
							
							<td>
								<?php 
								if ($result['status']==0) {
									
								
								
								?>
									<a href="?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>
									&time=<?php echo $result['date_oder'] ?>
									">Vận chuyển </a> 
								<?php 
								} else if ($result['status']==1) {
								?>
								<a href="?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>
									&time=<?php echo $result['date_oder'] ?>
									"> Đang vận chuyển </a> 
								<?php 
								} else {

								
								?>
								<a href="?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>
									&time=<?php echo $result['date_oder'] ?>
									">Hoàn thành </a> 
								<?php 
								}
							}
								?>
							</td>
						</tr>
						<?php 
						
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
