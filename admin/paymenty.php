<script>
	function delRoom(id)
	{
		if(confirm("You want to delete this Hotels ?"))
		{
		window.location.href='delete_hotels.php?id='+id;	
		}
	}
</script>
<table class="table table-bordered table-striped table-hover">
	<h1>Room Details</h1><hr>
	<tr>
	<td colspan="8"><a href="dashboard.php?option=hotel" class="btn btn-primary">Add New Hotels</a></td>
	</tr>
	<tr style="height:40">
		<th>Sr No</th>
		<th>Image</th>
		<th>Name</th>
		<th>Description</th>
		<th>Update</th>
		<th>Delete</th>
	</tr>
<?php 
$i=1;
$sql=mysqli_query($con,"select * from payment");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['id'];	
$img=$res['image'];
$path="../image/rooms/$img";
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><img src="<?php echo $path;?>" width="50" height="50"/></td>
		<td><?php echo $res['hotel_name']; ?></td>
		<td><?php echo $res['description']; ?></td>
		<td><a href="dashboard.php?option=update_hotel&id=<?php echo $id; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>

		
		<td><a href="#" onclick="delRoom('<?php echo $id; ?>')"><span class="glyphicon glyphicon-remove" style='color:red'></span></a></td>
	</tr>	
<?php 	
}
?>	
	
</table>