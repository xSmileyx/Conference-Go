<?php
include 'dbconnection.php';
$venue_id = $_POST['venue_id']; 
$query = "SELECT * FROM tblvenue WHERE venue_id = '$venue_id'"; 
$result = mysql_query($query);
$row = mysql_fetch_array($result);
?>
<?php
// close connection
mysql_close();
?>
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
  		<div id="box">
	<div id="editvenue">
		<form action="updatevenue.php" method="post">
        <table border=0 width=60% cellspacing=30px align="center">
                 <tr>
                	<td align="left" valign="top"><p>Vennue ID</p></td>
                    <td><input name="venue_id" value="<?php echo $row[0];?>" disabled/></td>
                </tr>
                <tr>
                	<td align="left" valign="top"><p>Venue name</p></td>
                    <td><input type="text" name="venue_name" value="<?php echo $row[1];?>" required /></td>
                </tr>
                                <tr>
                	<td align="left" valign="top"><p>Address</p></td>
                    <td><input type="text" name="venue_address" value="<?php echo $row[2];?>" required /></td>
                </tr>
                                <tr>
                	<td align="left" valign="top"><p>Number of rooms</p></td>
                    <td><input type="number" name="venue_nrooms" value="<?php echo $row[3];?>" required/></td>
                </tr>
                <tr>
					<td><input type="submit" value="Modify"/></td>
                    <td><input type='hidden' name='venue_id' value="<?php echo $row[0];?>"></td>
                    <td><input type="button" onClick="goBack()" value="Back"/></td>

                </tr>
        </table>
		</form>


     </div>
</div>
     
      </div>
      <!--include footer-->
<?php include 'footer.php';?> <?php } ?>
</body>
</html>