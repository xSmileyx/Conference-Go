<?php
include 'dbconnection.php';

$speaker_id = $_POST['speaker_id']; 
$query = "SELECT * FROM tblspeaker WHERE speaker_id = '$speaker_id'"; 
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
	<div id="editsponsor">
		<form action="updatespeaker.php" method="post" enctype="multipart/form-data">
        <table align="center">
                 <tr>
                	<td align="left" valign="top"><p>Speaker ID</p></td>
                    <td><input name="speaker_id" class="twitter" value="<?php echo $row[0];?>" disabled/></td>
                </tr>
                <tr>
                	<td align="left" valign="top"><p>Speaker first name</p></td>
                    <td><input type="text" name="speaker_firstname" class="twitter" value="<?php echo $row[1];?>" required /></td>
                </tr>
                <tr>
                	<td align="left" valign="top"><p>Speaker last name</p></td>
                    <td><input type="text" name="speaker_lastname" class="twitter" value="<?php echo $row[2];?>" /></td>
                </tr>                                <tr>
                	<td align="left" valign="top"><p>Speaker details</p></td>
                    <td><textarea name="speaker_details" class="twitter"><?php echo $row[3];?></textarea></td>
                </tr>
                <tr>
                	<td align="left" valign="top"><p>Speaker Image</p></td>
                    <td><input type="file" name="speaker_image" class="twitter" value="<?php echo $row[4];?>" /></td>
                </tr>
                <tr>
                    <td><input type='hidden' name='speaker_id' value="<?php echo $row[0];?>"></td>
                    <td><div style="float:left;"><input type="submit" class="button" value="Modify"/></div><div style="text-align:center;"><input type="button" onClick="goBack()" class="button" value="Back"/></div></td>

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