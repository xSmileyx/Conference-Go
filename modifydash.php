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
 <div id="box">

	<div id="modifydash">
    <h1 align="center">Modify dashboard</h1>
    </br>
    	<form action="dashmodify.php" method="post" name="dashmodify">
        <table align="center">
        	<tr>
            	    <td align="left" valign="top"><p>Banner image</p></td>
                    <td><input type="file" name="banner_image" class="twitter"  /></td>
            </tr>
			
			<tr>
            	<td align="left" valign="middle"><p>Event name</p></td>
                <td colspan="2"><input type="text" name="event_name" class="twitter" placeholder="Enter event name" required /></td>
            </tr>
			<tr>
            	<td align="left" valign="top"><p>Event description</p></td>
            	<td colspan="2"><textarea name="event_desc" rows="5" cols="30"></textarea></td>   
            </tr> 
			
			<tr>
                <td align="left" valign="top"><p>Event image</p></td>
                <td><input type="file" name="event_image" class="twitter"  /></td>
            </tr>
			
			<tr>
            	<td align="left" valign="middle"><p>Key Speaker 1</p></td>
                <td colspan="2"><input type="text" name="key_spname1" class="twitter" placeholder="Enter key speaker name" required /></td>
            </tr>
        	<tr>
            	    <td align="left" valign="top"><p>Key speaker 1 image</p></td>
                    <td><input type="file" name="key_sp1" class="twitter"  /></td>
            </tr>			
			<tr>
            	<td align="left" valign="middle"><p>Key Speaker 2</p></td>
                <td colspan="2"><input type="text" name="key_spname2" class="twitter" placeholder="Enter key speaker name" required /></td>
            </tr>	
			<tr>
            	<td align="left" valign="top"><p>Key speaker 2 image</p></td>
                <td><input type="file" name="key_sp2" class="twitter"  /></td>
            </tr>
			<tr>
            	<td align="left" valign="middle"><p>Key Speaker 3</p></td>
                <td colspan="2"><input type="text" name="key_spname3" class="twitter" placeholder="Enter key speaker name" required /></td>
            </tr>
        	<tr>
            	<td align="left" valign="top"><p>Key speaker 3 image</p></td>
                <td><input type="file" name="key_sp3" class="twitter"  /></td>
            </tr>	
			<tr>
            	<td align="left" valign="middle"><p>Venue name</p></td>
                <td colspan="2"><input type="text" name="venue_name" class="twitter" placeholder="Enter event name" required /></td>
            </tr>
			<tr>
            	<td align="left" valign="top"><p>Details</p></td>
            	<td colspan="2"><textarea name="details" rows="5" cols="30"></textarea></td>   
            </tr> 			
			<tr>
            	<td align="left" valign="top"><p>Venue image</p></td>
                <td><input type="file" name="venue_image" class="twitter"  /></td>
            </tr>
              
            <tr align="left">
                	<td><input type="submit" name="submit" class="button" value="Submit"/></td>
					<td align="right"><input type="reset" name="reset" class="button" value="Clear"/></td>
			</tr>        
        </table>
        </form>
    </div>
</div>
      </div>
<?php include'footer.php'?>
<?php } ?>
</body>
</html>