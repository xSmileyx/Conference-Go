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
	  <div>
<?php
include 'dbconnection.php';


$pass_type=$_POST['pass_type'];
$pass_desc=$_POST['pass_desc'];
$pass_price=$_POST['pass_price'];
$pass_amount=$_POST['pass_amount'];
$pass_availability = $_POST['pass_amount'];
$conf_id=$_POST['conf_id'];

$insertInto="INSERT INTO tblpasstype
VALUES('','$pass_type','$pass_desc','$pass_price','$pass_amount','$pass_availability','$conf_id')";

$result=mysql_query($insertInto);

if($result){
echo 'Pass type has been added successfully';
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
      </div>
     <!--include footer-->
<?php include 'footer.php';?> <?php } ?>
</body>
</html>