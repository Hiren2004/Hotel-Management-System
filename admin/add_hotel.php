<?php 
if(isset($add))
{

	$hotel_name = $_POST['hotelname'];
	$details = $_POST['details'];
	$img=$_FILES['img']['name'];
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/rooms/".$_FILES['img']['name']);
	$sql = "INSERT INTO user_hotel(hotel_name, description, image) VALUES ('$hotel_name','$details','$img')";
	mysqli_query($con,$sql);
}
?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	
	<tr>	
		<th>Hotel Name</th>
		<td><input type="text" name="hotelname"  class="form-control" required/>
		</td>
	</tr>
	<tr>	
		<th>Details</th>
		<td><textarea name="details"  class="form-control" required></textarea>
		</td>
	</tr>
	<tr>	
		<th>Images</th>
		<td><input type="file" name="img"  class="form-control" required/>
		</td>
	</tr>
	
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Add Hotel" name="add"/>
		</td>
	</tr>
</table> 
</form>