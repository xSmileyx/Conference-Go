<?php
include 'dbconnection.php';
$caterer_id = $_POST['caterer_id']; 
$query = "SELECT * FROM tblcaterer WHERE caterer_id = '$caterer_id'"; 
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
	<div id="editcaterer">
		<form action="updatecaterer.php" method="post">
        <table border=0 width=60% cellspacing=30px align="center">
                 <tr>
                	<td align="left" valign="top"><p>Caterer ID</p></td>
                    <td><input name="caterer_id" value="<?php echo $row[0];?>" disabled/></td>
                </tr>
                <tr>
                	<td align="left" valign="top"><p>Caterer name</p></td>
                    <td><input type="text" name="caterer_name" class="twitter" value="<?php echo $row[1];?>" required /></td>
                </tr>
                                <tr>
                	<td align="left" valign="top"><p>Caterer phone</p></td>
                    <td><input type="tel" name="caterer_phone" class="twitter" value="<?php echo $row[2];?>" required /></td>
                </tr>
                                <tr>
                	<td align="left" valign="top"><p>Caterer email</p></td>
                    <td><input type="email" name="caterer_email" class="twitter" value="<?php echo $row[3];?>" /></td>
                </tr>
                <tr>
					<td><input type="submit" class="button" value="Modify"/></td>
                    <td><input type='hidden' name='caterer_id' value="<?php echo $row[0];?>"></td>
                  

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