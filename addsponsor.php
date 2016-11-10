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
     
 $sponsor_logo = rand(1000,100000)."-".$_FILES['sponsor_logo']['name'];
 $file_loc = $_FILES['sponsor_logo']['tmp_name'];
 $folder="uploads/";
 
 $sponsor_name = $_POST['sponsor_name'];
 $sponsor_email = $_POST['sponsor_email'];
 $sponsor_phone = $_POST['sponsor_phone'];
 
 move_uploaded_file($file_loc,$folder.$sponsor_logo);
 
 $sql="INSERT INTO tblsponsor(sponsor_id,sponsor_name,sponsor_email,sponsor_phone,sponsor_logo) 
		VALUES('','$sponsor_name','$sponsor_email','$sponsor_phone','$sponsor_logo')";
 mysql_query($sql); 
 echo 'Sponsor has been added successfully';
echo '</br>';
echo '<a href="dashboardadmin.php">Click here to return to dashboard</a>';
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