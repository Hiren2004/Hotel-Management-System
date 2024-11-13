<?php
require("../PayUmoney-master/index.php");

fetchPaymentData();
?>

<script>
	function delRoom(id)
	{
		if(confirm("You want to delete this Hotels ?"))
		{
		window.location.href='delete_payment.php?id='+id;	
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<h1>Payment Details</h1><hr>
	<tr>
	
	</tr>
	<tr style="height:40">
		<th>Sr No</th>
		<th>ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>Payment</th>
		<th>Status</th>
	</tr>
<?php 
$i=1;
$sql=mysqli_query($con,"select * from payment");
while($res=mysqli_fetch_assoc($sql))
{
// $id=$res['id'];	
// $img=$res['image'];
// $path="../image/rooms/$img";
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		
		<td><?php echo $res['transaction_id']; ?></td>
		
		<td><?php echo $res['name']; ?></td>
		<td><?php echo $res['email']; ?></td>
		<td><?php echo $res['payment']; ?></td>
	

		<!-- <td><a href="dashboard.php?option=update_hotel&id=<?php echo $res['transaction_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td> -->

		
		<td><?php echo $res['status']; ?></td>
	</tr>	

	<?php 	
}
?>	
	
</table>
<a href="https://dashboard.razorpay.com/app/payments" target="_blank">Click To See Razorpay Dashboard</a>