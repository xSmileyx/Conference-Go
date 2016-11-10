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

$caterer_id=$_POST['caterer_id'];
$caterer_name=$_POST['caterer_name'];
$caterer_phone=$_POST['caterer_phone'];
$caterer_email=$_POST['caterer_email'];

$updatequery="UPDATE tblcaterer SET caterer_id='$caterer_id',caterer_name='$caterer_name', caterer_phone='$caterer_phone', caterer_email='$caterer_email' 
WHERE caterer_id='$caterer_id' ";

$executeQuery=mysql_query($updatequery);

if($executeQuery){

echo "Update Successful";
echo '</br>';
echo '<a href="dashboardadmin.php">click here to return to dashboard</a>';

}
else {
	echo "ERROR";
	echo '<a href="editcatererlist.php">click here</a>';

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