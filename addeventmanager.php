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


$em_username=$_POST['em_username'];
$em_password=$_POST['em_password'];
$em_firstname=$_POST['em_firstname'];
$em_lastname=$_POST['em_lastname'];
$em_phone=$_POST['em_phone'];
$em_email=$_POST['em_email'];

$insertInto="INSERT INTO tbleventmanager

VALUES('','$em_username','$em_password','$em_firstname','$em_lastname','$em_phone','$em_email')";

$result=mysql_query($insertInto);

if($result){
echo 'Event manager has been added successfully';
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