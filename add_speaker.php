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
	<div id="addspeaker">
      <h1 align="center">Add Speaker</h1>
		<form action="addspeaker.php" method="post" enctype="multipart/form-data">
        	<table align="center">
            	<tr>
                	<td align="left" valign="top"><p>First name</p></td>
                    <td><input type="text" name="speaker_firstname" class="twitter" placeholder="Enter firstname" required/></td>
                </tr>
                
                <tr>
                	<td align="left" valign="top"><p>Last name</p></td>
                    <td><input type="text" name="speaker_lastname" class="twitter" placeholder="Enter lastname" /></td>
                </tr>
                <tr>
                	<td align="left" valign="top"><p>Details</p></td>
                    <td><textarea name="speaker_details" class="twitter"></textarea></td>
                 
                </tr>
                
                <tr>
                	<td align="left" valign="top"><p>Speaker image</p></td>
                    <td><input type="file" name="speaker_image" class="twitter"  /></td>
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