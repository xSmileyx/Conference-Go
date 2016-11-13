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
	
	$pID = $_POST["answer"];
	$title = $_POST["title"];
	$msg = $_POST["message"];
	$emID = $_SESSION["user_id"];
	$date = date("Y/m/d");
	$stat = 0;
	
	$sql="INSERT INTO tblnotifications (p_id,notification_title,notification_message,em_id,date_received,status)
		  VALUES('$pID','$title','$msg','$emID','$date','$stat')";

	mysql_query($sql);

				

 echo 'Notification sent!';
echo '</br>';
 echo '<a href="dashboard.php">Click here to return to dashboard</a>';

}

else 
{
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