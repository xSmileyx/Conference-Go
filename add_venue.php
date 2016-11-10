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
	<div id="addvenue">
    <h1 align="center">Add Venue</h1>
	<form action="addvenue.php" method="post">
		<table align="center">
        		<tr>
                	<td width="120" align="left" valign="top"><p>Venue name</p></td>
       	            <td><input type="text" name="venue_name" class="twitter" placeholder="Enter venue name" required /></td>
                </tr>	
            	<tr>
                	<td align="left" valign="top"><p>Venue's address</p></td>
       	            <td><input type="text" name="venue_address" class="twitter" placeholder="Enter Venue Address" required /></td>
                </tr>
                <tr>
                	<td align="left" valign="top"><p>Number of rooms</p></td>
       	            <td><input type="number" name="venue_nrooms" class="twitter" placeholder="No rooms" min="1" max="40" required  /></td>
                </tr>
            	<tr>
                	<td height="60"></td>
                	<td><div style="float:left;"><input type="reset" name="reset" class="button" value="Clear"/></div>
                    <div style="text-align:center;"><input type="submit" name="submit" class="button" value="Submit"/></div></td>
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