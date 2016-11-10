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
	<div id="addcater">
    	<h1 align="center">Add Tour</h1>
		<form action="addtour.php" method="post" name="addtour" align="center" enctype="multipart/form-data" >
        	<table align="center">
        		<tr>
                	<td width="160" align="left" valign="top"><p>Tour name</p></td>
       	            <td><input type="text" name="tour_name" class="twitter" required /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Tour location</p></td>
       	            <td><input type="text" name="tour_location" class="twitter" id="p1" required /></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>Tour Price (RM)</p></td>
       	            <td><input type="number" name="tour_price" class="twitter" id="p2" onblur="pcheck()" required /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Tour duration</p></td>
       	            <td><input type="text" name="tour_duration" class="twitter" required /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Tour start time</p></td>
       	            <td><input type="time" name="tour_starttime" class="twitter" required /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Tour image</p></td>
       	            <td><input type="file" name="tour_image" class="twitter" /></td>
                </tr>
            	<tr>
                	<td height="60"></td>
                	<td><div style="float:left;"><input type="reset" name="reset" class="button" value="Clear"/></div><div style="text-align:center;"><input type="submit" name="submit" class="button" value="Submit"/></div></td>
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