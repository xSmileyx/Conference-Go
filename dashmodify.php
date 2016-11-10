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
     
 $banner_image = rand(1000,100000)."-".$_FILES['banner_image']['name'];
 $file_loc = $_FILES['banner_image']['tmp_name'];
 $folder="uploads/";
 move_uploaded_file($file_loc,$folder.$banner_image); 
 
 $event_image = rand(1000,100000)."-".$_FILES['event_image']['name'];
 $file_loc = $_FILES['event_image']['tmp_name'];
 $folder="uploads/";
 move_uploaded_file($file_loc,$folder.$event_image);

 $event_name=$_POST['event_name'];
 $event_desc=$_POST['event_desc'];

 $key_sp1 = rand(1000,100000)."-".$_FILES['key_sp1']['name'];
 $file_loc = $_FILES['key_sp1']['tmp_name'];
 $folder="uploads/";
 move_uploaded_file($file_loc,$folder.$key_sp1);
 
 $key_spname1=$_POST['key_spname1'];

 $key_sp2 = rand(1000,100000)."-".$_FILES['key_sp2']['name'];
 $file_loc = $_FILES['key_sp2']['tmp_name'];
 $folder="uploads/";
 move_uploaded_file($file_loc,$folder.$key_sp2);
 $key_spname2=$_POST['key_spname2'];

 $key_sp3 = rand(1000,100000)."-".$_FILES['key_sp3']['name'];
 $file_loc = $_FILES['key_sp3']['tmp_name'];
 $key_spname3=$_POST['key_spname3'];
 $folder="uploads/";
 move_uploaded_file($file_loc,$folder.$key_sp3);

 $venue_image = rand(1000,100000)."-".$_FILES['venue_image']['name'];
 $file_loc = $_FILES['venue_image']['tmp_name'];
 $folder="uploads/";
 move_uploaded_file($file_loc,$folder.$venue_image); 
 
 $venue_name=$_POST['venue_name'];
 $details=$_POST['details'];
 
 
 $sql="INSERT INTO tbldash(dash_id,banner_image,event_name,event_desc,event_image,key_spname1,key_sp1,key_spname2,key_sp2,key_spname3,key_sp3,venue_name,details,venue_image) 
		VALUES('','$banner_image','$event_name','$event_desc','$event_image','$key_spname1','$key_sp1','$key_spname2','$key_sp2','$key_spname3','$key_sp3','$venue_name','$details','$venue_image')";
 mysql_query($sql); 
 echo 'Event page has been added successfully';
echo '</br>';
echo '<a href="dashboardadmin.php">Click here to return to dashboard</a>';
}
else {
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