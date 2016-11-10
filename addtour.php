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
     
 $tour_image = rand(1000,100000)."-".$_FILES['tour_image']['name'];
 $file_loc = $_FILES['tour_image']['tmp_name'];
 $folder="uploads/";
 
$tour_name=$_POST['tour_name'];
$tour_location=$_POST['tour_location'];
$tour_price=$_POST['tour_price'];
$tour_duration=$_POST['tour_duration'];
$tour_starttime=$_POST['tour_starttime'];

 move_uploaded_file($file_loc,$folder.$tour_image);
 
$sql="INSERT INTO tbltour (tour_id,tour_name,tour_location,tour_price,tour_duration,tour_starttime,tour_image)

VALUES('','$tour_name','$tour_location','$tour_price','$tour_duration','$tour_starttime','$tour_image')";

mysql_query($sql);

echo 'Tour has been added successfully';
echo '</br>';
echo '<a href="dashboardadmin.php">Click here to return to dashboard</a>';

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