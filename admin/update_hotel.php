<?php 
$id=$_GET['id'];
$sql=mysqli_query($con,"select * from user_hotel where id='$id'");
$res=mysqli_fetch_assoc($sql);

extract($_REQUEST);
if(isset($update))
{
mysqli_query($con,"update user_hotel set hotel_name='$rno',details='$details' where id='$id' ");
header('location:dashboard.php?option=view_hotels');
}

?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	
	<tr>	
		<th>Hotel name</th>
		<td><input type="text"  name="rno" value="<?php echo $res['hotel_name']; ?>"  class="form-control"/>
		</td>
	</tr>
	<tr>	
		<th>Details</th>
		<td><textarea name="details"  class="form-control"><?php echo $res['description']; ?></textarea>
		</td>
	</tr>
	
	
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Update Hotel Details" name="update"/>
		</td>
	</tr>
</table> 
</form>