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


$venue_name=$_POST['venue_name'];
$venue_address=$_POST['venue_address'];
$venue_nrooms=$_POST['venue_nrooms'];

$insertInto="INSERT INTO tblvenue

VALUES('','$venue_name','$venue_address','$venue_nrooms')";

$result=mysql_query($insertInto);

if($result){
echo 'Venue has been added successfully';
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