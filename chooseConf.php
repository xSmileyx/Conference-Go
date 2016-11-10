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
<div id="addconfspeaker">
<h1 align="center">Choose conference to view participants</h1></br>
    	<form action="viewconfparticipants.php?page=1" method="post" name="addconferencespeaker">
        <table width="106%" align="right">
                <tr><p>Conference name</p>
                <td  width="250" align="left" valign="middle">	     
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
                    <td align="left"><input type="submit" name="submit" class="button" value="Submit"/></td>
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