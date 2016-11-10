<?php session_start();?> <!DOCTYPE html>

<html>
<head>
<title>Conference management system</title>
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

    <div class="content"> 
      
     
      <div class="scrollable">
        <?php
include 'dbconnection.php';

$venue_id=$_POST['venue_id'];
// sql to delete a record
$deletequery = "DELETE FROM tblvenue WHERE venue_id='$venue_id'";

$executeQuery=mysql_query($deletequery);

if($executeQuery){

echo "Delete Successful";
echo '</br>';
echo '<a href="dashboardadmin.php">Click here to return to dashboard</a>';

}
else {
	echo "ERROR, this record cannot be deleted as it is related to other entities";
	echo '</br>';
	echo '<a href="dashboardadmin.php">Click here to return to dashboard</a>';
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