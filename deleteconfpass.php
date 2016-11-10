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

$conf_id=$_POST['conf_id'];
$pass_type=$_POST['pass_type'];

// sql to delete a record
$deletequery = "DELETE FROM tblpasstype WHERE conf_id='$conf_id' AND pass_type='$pass_type'";

$executeQuery=mysql_query($deletequery);

if($executeQuery){

echo "Delete Successful";
echo '</br>';
echo '<a href="dashboardadmin.php">Click here to return to dashboard</a>';
}
else {
echo "ERROR, this record is not found or cannot be deleted";
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