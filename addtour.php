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
      
 $tour_image = rand(1000,100000)."-".$_FILES['tour_image']['name'];
 $file_loc = $_FILES['tour_image']['tmp_name'];
 $folder="uploads/";
 
$tour_name=$_POST['tour_name'];
$tour_location=$_POST['tour_location'];
$tour_price=$_POST['tour_price'];
$tour_starttime=$_POST['tour_starttime'];

 move_uploaded_file($file_loc,$folder.$tour_image);
 
 $includes=$_POST['includes'];
 	$slash_includes = addslashes($includes);
	
 $excludes=$_POST['excludes'];
 	$slash_excludes = addslashes($excludes);
	
 $remark=$_POST['remark'];
 	$slash_remark = addslashes($remark);
	
 $description=$_POST['description'];
 	$slash_description = addslashes($description);
	
 $validity=$_POST['validity'];
 
   if($_POST['duration_format'] == 'hour')
  {
	  $tdHour = $_POST['tour_duration_hour'];
	  $sql="INSERT INTO tbltour (tour_id,tour_name,tour_location,tour_price,tour_duration,tour_starttime,tour_image,includes,excludes,remarks,description,validity)

	  VALUES('','$tour_name','$tour_location','$tour_price','$tdHour hour(s)','$tour_starttime','$tour_image','$slash_includes','$slash_excludes','$slash_remark','$slash_description','$validity')";

	  
	  if(mysql_query($sql) === TRUE)
		{
			//echo "<script language='javascript'>alert('Reference Number: $get_conf_id has been successfully deleted! The Event Manager will contact you for the disclosure of refund.');</script>";
			echo 'Tour has been added successfully';
			echo '</br>';
			echo '<a href="dashboardadmin.php">Click here to return to dashboard</a>';  
		}
		else
		{
			echo $sql;
			echo "<br><font color = \"red\">Failed to add a record.</font>" .mysql_error();
		} 
  }
  if($_POST['duration_format'] == 'day')
  {
	  $tdDay = $_POST['tour_duration_day'];
	  $sql="INSERT INTO tbltour (tour_id,tour_name,tour_location,tour_price,tour_duration,tour_starttime,tour_image,includes,excludes,remarks,description,validity)

	  VALUES('','$tour_name','$tour_location','$tour_price','$tdDay day(s)','$tour_starttime','$tour_image','$slash_includes','$slash_excludes','$slash_remark','$slash_description','$validity')";

	  if(mysql_query($sql) === TRUE)
		{
			//echo "<script language='javascript'>alert('Reference Number: $get_conf_id has been successfully deleted! The Event Manager will contact you for the disclosure of refund.');</script>";
			echo 'Tour has been added successfully';
			echo '</br>';
			echo '<a href="dashboardadmin.php">Click here to return to dashboard</a>';  
		}
		else
		{
			echo $sql;
			echo "<br><font color = \"red\">Failed to add a record.</font>" .mysql_error();
		} 
  }



// echo 'Tour has been added successfully';
// echo '</br>';
// echo '<a href="dashboardadmin.php">Click here to return to dashboard</a>';

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