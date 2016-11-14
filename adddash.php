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
 $dash_name=$_POST['dash_name'];
 
 $banner_image = rand(1000,100000)."-".$_FILES['banner_image']['name'];
 $file_loc = $_FILES['banner_image']['tmp_name'];
 $folder="uploads/";
 move_uploaded_file($file_loc,$folder.$banner_image); 
 
 $conf_image = rand(1000,100000)."-".$_FILES['conf_image']['name'];
 $file_loc = $_FILES['conf_image']['tmp_name'];
 $folder="uploads/";
 move_uploaded_file($file_loc,$folder.$conf_image);
 
 $conf_id=$_POST['conf_id'];
 
 $speaker1_id=$_POST['speaker1_id'];
 $speaker2_id=$_POST['speaker2_id'];
 $speaker3_id=$_POST['speaker3_id'];

 $venue_id=$_POST['venue_id'];

 $venue_image = rand(1000,100000)."-".$_FILES['venue_image']['name'];
 $file_loc = $_FILES['venue_image']['tmp_name'];
 $folder="uploads/";
 move_uploaded_file($file_loc,$folder.$venue_image); 
 
 $venue_id=$_POST['venue_id'];
 $venue_details=$_POST['venue_details'];
 
 
 $sql="INSERT INTO tbldashboard(dash_id,dash_name,conf_id,conf_image,banner_image,speaker1_id,speaker2_id,speaker3_id,venue_id,venue_image,venue_details) 
		VALUES('','$dash_name','$conf_id','$conf_image','$banner_image','$speaker1_id','$speaker2_id','$speaker3_id','$venue_id','$venue_image','$venue_details')";
mysql_query($sql); 
echo 'Conference page has been added successfully';
echo '</br>';
echo '</br>';
echo '<a href="dashboardadmin.php">Click here to return to dashboard</a>';

}
else {
	echo "ERROR in adding Conference page";
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