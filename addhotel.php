<?php session_start();?> <!DOCTYPE html>

<html>
<head>
<title>Conference management</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top"> <?php if($_SESSION["user_name"]) { ?>

<!--include navigation bar-->
<?php include'nav.php';?>


<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content three_quarter first"> 
      <div class="scrollable">
        <?php
include 'dbconnection.php';

if(isset($_POST['submit']))
{    
      
	$hotel_name=$_POST['hotel_name'];
	$hotel_address=$_POST['address'];
	$hotel_city=$_POST['city'];
	$hotel_state=$_POST['state'];
	$hotel_zipcode=$_POST['zipcode'];
	$description=$_POST['description'];
	$contact=$_POST['contact'];
	$minRoomRate=$_POST['roomRate'];
	$featureAmenities=$_POST['feature_amenities'];

	$sql="INSERT INTO tblhotel (hotel_id,hotel_name,hotel_address,hotel_city,hotel_state,hotel_zipcode,hotel_location_desc,hotel_contact,room_rate,hotel_feature_amenities)

	VALUES('','$hotel_name','$hotel_address','$hotel_city','$hotel_state','$hotel_zipcode','$description','$contact','$minRoomRate','$remark','$featureAmenities')";

	mysql_query($sql);

	echo 'Hotel has been added successfully';
	echo '</br>';
	echo '<a href="dashboard.php">Click here to return to dashboard</a>';

}

else 
{
	echo "ERROR";
}


?>
<?php
// close connection
mysql_close();
?>
      </div>
<!--include footer-->
<?php include 'footer.php';?> <?php } ?>
</body>
</html>