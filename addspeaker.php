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
     
 $speaker_image = rand(1000,100000)."-".$_FILES['speaker_image']['name'];
 $file_loc = $_FILES['speaker_image']['tmp_name'];
 $folder="uploads/";
 
 $speaker_firstname = $_POST['speaker_firstname'];
 $speaker_lastname = $_POST['speaker_lastname'];
 $speaker_details = $_POST['speaker_details'];
 
 move_uploaded_file($file_loc,$folder.$speaker_image);
 
 $sql="INSERT INTO tblspeaker(speaker_id,speaker_firstname,speaker_lastname,speaker_details,speaker_image) 
		VALUES('','$speaker_firstname','$speaker_lastname','$speaker_details','$speaker_image')";
 mysql_query($sql); 
 echo 'Speaker has been added successfully';
echo '</br>';
echo '</br>';
echo '<a href="add_speaker.php">Click here to return to add another speaker</a>';
echo '</br>';
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