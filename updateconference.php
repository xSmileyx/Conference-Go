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
$conf_name=$_POST['conf_name'];
$conf_startdate=$_POST['conf_startdate'];
$conf_enddate=$_POST['conf_enddate'];
$conf_numpass=$_POST['conf_numpass'];
$caterer_id=$_POST['caterer_id'];
$venue_id=$_POST['venue_id'];
$em_id=$_POST['em_id'];
$conf_desc=$_POST['conf_desc'];

$updatequery="UPDATE tblconference SET 
conf_id='$conf_id',
conf_name='$conf_name',
conf_startdate='$conf_startdate',
conf_enddate='$conf_enddate',
conf_numpass='$conf_numpass',
caterer_id='$caterer_id',
venue_id='$venue_id',
em_id='$em_id',
conf_desc='$conf_desc'
WHERE conf_id='$conf_id' ";

$result=mysql_query($updatequery);

if($result){
echo 'Conference has been updated successfully';
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