<?php
	include 'dbconnection.php';
?>
<?php session_start();?> <!DOCTYPE html>
 
<html>
<head>
<title>Conference management system</title>
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

    <div class="content"> 
      
     
      <div class="scrollable">
      <h2><p>Delete conference speaker</p></h2>
      <p></p>
<form action="deleteconfspeaker.php" method="post" name="deletesonfspeaker">
        <table align="center">
			<tr>
            	<td align="left" valign="middle">Conference name</td>
                <td>	     
                 <?php
					$query = "SELECT conf_id,conf_name from tblconference ";
					$result = mysql_query($query);
					echo "<select name='conf_id'>";
					echo "<option value='0'>-Select-</option>";
					
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['conf_id']."'>".$row['conf_name']."</option>";
					}
					echo "</select>";
				?>
                </td>
                </tr>
			<tr>
            	<td align="left" valign="">Speaker name</td>
                <td>	     
                 <?php
					$query = "SELECT speaker_id,speaker_firstname,speaker_lastname from tblspeaker ";
					$result = mysql_query($query);
					echo "<select name='speaker_id'>";
					echo "<option value='0'>-Select-</option>";
					
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['speaker_id']."'>".$row['speaker_firstname']." ".$row['speaker_lastname']."</option>";
					}
					echo "</select>";
				?>
                </td>
            </tr>
</table>
<tr>
<td><input type="submit" name="submit" class="button" value="Submit"/></td>
</tr>
</form>

<?php
// close connection
mysql_close();
?>
      </div>
      <!--include footer-->
<?php include 'footer.php';?> <?php } ?>
</body>
</html>