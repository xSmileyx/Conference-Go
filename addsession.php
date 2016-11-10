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
$speaker_id=$_POST['speaker_id'];
$session_day=$_POST['session_day'];
$session_starttime=$_POST['session_starttime'];
$session_endtime=$_POST['session_endtime'];
$session_room=$_POST['session_room'];
$session_name=$_POST['session_name'];

$insertInto="INSERT INTO tblsession

VALUES('','$conf_id','$speaker_id','$session_day','$session_starttime','$session_endtime','$session_room','$session_name')";

$result=mysql_query($insertInto);

if($result){
echo 'Session has been added successfully';
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