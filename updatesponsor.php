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

$sponsor_id=$_POST['sponsor_id'];
$sponsor_name=$_POST['sponsor_name'];
$sponsor_email=$_POST['sponsor_email'];
$sponsor_phone=$_POST['sponsor_phone'];

$sponsor_logo = rand(1000,100000)."-".$_FILES['sponsor_logo']['name'];
$file_loc = $_FILES['sponsor_logo']['tmp_name'];
$folder="uploads/";
 
 
 move_uploaded_file($file_loc,$folder.$sponsor_logo);

$updatequery="UPDATE tblsponsor SET sponsor_id='$sponsor_id',sponsor_name='$sponsor_name', sponsor_email='$sponsor_email', sponsor_phone='$sponsor_phone' ,sponsor_logo='$sponsor_logo' WHERE sponsor_id='$sponsor_id' ";

$executeQuery=mysql_query($updatequery);

if($executeQuery){

echo "Update Successful";
echo '<a href="editsponsorlist.php">click here</a>';

}
else {
	echo "ERROR";
	echo '<a href="editsponsorlist.php">click here</a>';

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