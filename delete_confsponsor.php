<?php
	include 'dbconnection.php';
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
      <h2><p>Delete conference sponsor</p></h2>
      <p></p>
<form action="deleteconfsponsor.php" method="post" name="deletesonfsponsor">
        <table align="center">
			<tr>
            	<td align="left" valign="middle"><p>Conference name</p></td>
                <td >	     
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
            	<td align="left" valign="middle"><p>Sponsor name</p></td>
                <td>	     
                 <?php
					$query = "SELECT sponsor_id,sponsor_name from tblsponsor ";
					$result = mysql_query($query);
					echo "<select name='sponsor_id'>";
					echo "<option value='0'>-Select-</option>";
					
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['sponsor_id']."'>".$row['sponsor_name']."</option>";
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