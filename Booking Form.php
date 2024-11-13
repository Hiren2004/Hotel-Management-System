<?php
include('Menu Bar.php');
include('connection.php');

$room_id = $_GET['id'];



$room_query = "select * from rooms where room_id = '$room_id'";


$room_data = mysqli_query($con, $room_query);
$room_data_row = mysqli_fetch_assoc($room_data);

$room_price = $room_data_row['price'];

$sql = "select * from user_hotel";
$sql_data = mysqli_query($con, $sql);

if ($eid == "") {
  header('location:Login.php');
}
$sql = mysqli_query($con, "select * from room_booking_details where email='$eid' ");
$result = mysqli_fetch_assoc($sql);
//print_r($result);
extract($_REQUEST);
error_reporting(1);
if (isset($savedata)) {
  $sql = mysqli_query($con, "select * from room_booking_details where email='$email' and room_type='$room_type' ");
  if (mysqli_num_rows($sql)) {
    $msg = "<h1 style='color:red'>You have already booked this room</h1>";
  } else {

    $sql = "insert into room_booking_details(name,email,phone,address,city,state,zip,contry,room_type,hotel_name,Occupancy,check_in_date,check_in_time,check_out_date,room_id,price,payment_status) 
  values('$name','$email','$phone','$address','$city','$state','$zip','$country',
  '$room_type','$hotel_type','$Occupancy','$cdate','$ctime','$codate','$room_id','$room_price','1')";
    if (mysqli_query($con, $sql)) {
      $msg = "<h1 style='color:blue'>You have Successfully booked this room</h1><h2><a href='order.php'>View </a></h2>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Grizzly</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="margin-top:50px;">
  <?php
  include('Menu Bar.php');
  ?>
  <div class="container-fluid text-center" id="primary"><!--Primary Id-->
    <h1>[ BOOKING Form ]</h1><br>
    <div class="container">
      <div class="row">
        <?php echo @$msg; ?>
        <!--Form Containe Start Here-->
        <form class="form-horizontal" method="post">
          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4> Name :</h4>
                </div>
                <div class="col-sm-8">
                  <input type="text" value="<?php echo $result['name']; ?>" class="form-control" name="name" placeholder="Enter Your Frist Name" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4>Email :</h4>
                </div>
                <div class="col-sm-8">
                  <input type="email" value="<?php echo $result['email']; ?>" class="form-control" name="email" placeholder="Enter Your Email-Id" required />
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4>Mobile :</h4>
                </div>
                <div class="col-sm-8">
                  <input type="number" value="<?php echo $result['mobile']; ?>" class="form-control" name="phone" min="1111111111" max="9999999999" maxlength="10" minlength="10" placeholder="Type Your Phone Number" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4>Address :</h4>
                </div>
                <div class="col-sm-8">
                  <textarea name="address" class="form-control" placeholder="Enter Your Address"><?php echo $result['address'];  ?></textarea>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4>Country</h4>
                </div>
                <div class="col-sm-8">
                  <input type="text" class="form-control" value="<?php echo $result['country']; ?>" name="country" placeholder="Enter Your Country Name" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4></h4>
                </div>
                <div class="col-sm-8">
                  <input type="hidden" name="state" class="form-control" placeholder="Enter Your State Name" required>
                </div>
              </div>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-4">
                  <h4></h4>
                </div>
                <div class="col-sm-8">
                  <input type="hidden" name="zip" class="form-control" placeholder="Enter Your Zip Code" required>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5">
                  <h4>Select Hotel</h4>
                </div>
                <div class="col-sm-7">
                  <select class="form-control" name="hotel_type" required>
                    <option disabled="" selected="">Select Hotel</option>
                    <?php while ($row = mysqli_fetch_assoc($sql_data)) { ?>

                      <option value="<?php echo $row['hotel_name']; ?>"><?php echo $row['hotel_name']; ?></option>

                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5">
                  <h4>Room Type:</h4>
                </div>
                <div class="col-sm-7">
                  <select class="form-control" name="room_type" required>
                    <option>Deluxe Room</option>
                    <option>Luxurious Suite</option>
                    <option>Standard Room</option>
                    <option>Suite Room</option>
                    <option>Twin Deluxe Room</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5">
                  <h4>check In Date :</h4>
                </div>
                <div class="col-sm-7">
                  <input type="date" name="cdate" class="form-control" required>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5">
                  <h4>Check In Time:</h4>
                </div>
                <div class="col-sm-7">
                  <input type="time" name="ctime" class="form-control" required>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <div class="control-label col-sm-5">
                  <h4>Check Out Date :</h4>
                </div>
                <div class="col-sm-7">
                  <input type="date" name="codate" class="form-control" required>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <div class="row">
                <label class="control-label col-sm-5">
                  <h4 id="top">Occupancy :</h4>
                </label>
                <div class="col-sm-7">
                  <div class="radio-inline"><input type="radio" value="single" name="Occupancy" required>Single</div>
                  <div class="radio-inline"><input type="radio" value="twin" name="Occupancy" required>Twin</div>
                  <div class="radio-inline"><input type="radio" value="dubble" name="Occupancy" required>Dubble</div>
                </div>
              </div>
            </div>
            <input type="submit" value="submit" name="savedata" class="btn btn-danger" required />
          </div>
        </form><br>
      </div>
      <br />
    </div>
  </div>
  </div>
  <?php
  include('Footer.php')
  ?>
</body>

</html>