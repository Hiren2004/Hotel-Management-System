<?php 

include('../connection.php');

$id=$_GET['id'];

$sql=mysqli_query($con,"select * from user_hotel where id='$id' ");
$res=mysqli_fetch_assoc($sql);

$img=$res['image'];

unlink("../image/rooms/$img");

if(mysqli_query($con,"delete from user_hotel where id='$id' "))
{
header('location:dashboard.php?option=view_hotels');	
}

 ?>