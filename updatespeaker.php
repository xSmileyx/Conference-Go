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

$speaker_id=$_POST['speaker_id'];
$speaker_firstname=$_POST['speaker_firstname'];
$speaker_lastname=$_POST['speaker_lastname'];
$speaker_details=$_POST['speaker_details'];
 $speaker_image = rand(1000,100000)."-".$_FILES['speaker_image']['name'];
 $file_loc = $_FILES['speaker_image']['tmp_name'];
 $folder="uploads/";

 
 move_uploaded_file($file_loc,$folder.$speaker_image);

$updatequery="UPDATE tblspeaker SET speaker_id='$speaker_id',speaker_firstname='$speaker_firstname', speaker_lastname='$speaker_lastname', speaker_details='$speaker_details' ,speaker_image='$speaker_image' WHERE speaker_id='$speaker_id' ";

$executeQuery=mysql_query($updatequery);

if($executeQuery){

echo "Update Successful";
echo '<a href="editspeakerlist.php">click here</a>';

}
else {
	echo "ERROR";
	echo '<a href="editspeakerlist.php">click here</a>';

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