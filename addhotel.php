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
	
	 $hotel_image = rand(1000,100000)."-".$_FILES['hotel_image']['name'];
	 $file_loc = $_FILES['hotel_image']['tmp_name'];
	 $folder="uploads/";
	 move_uploaded_file($file_loc,$folder.$hotel_image);
	
	$description=$_POST['description'];
	$contact=$_POST['contact'];
	$minRoomRate=$_POST['roomRate'];
	$featureAmenities=$_POST['feature_amenities'];

	$sql="INSERT INTO tblhotel (hotel_id,hotel_name,hotel_address,hotel_image,hotel_location_desc,hotel_contact,room_rate,hotel_feature_amenities)

	VALUES('','$hotel_name','$hotel_address','$hotel_image','$description','$contact','$minRoomRate','$featureAmenities')";

	 if(mysql_query($sql) === TRUE)
		{
			//echo "<script language='javascript'>alert('Reference Number: $get_conf_id has been successfully deleted! The Event Manager will contact you for the disclosure of refund.');</script>";
			echo 'Hotel has been added successfully';
			echo '</br>';
			echo '<a href="dashboardadmin.php">Click here to return to dashboard</a>';  
		}
		else
		{
			echo $sql;
			echo "<br><font color = \"red\">Failed to add a record.</font>" .mysql_error();
		} 

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