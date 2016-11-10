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
	<div id="addpasstype">
    <h1 align="center">Add Pass Type</h1>
		<form action="addpasstype.php" method="post">
        	<table align="center">
            <tr>
            	<td align="left" valign="middle"><p>Conference name</p></td>
                <td>	     
                 <?php
					$query = "SELECT conf_id,conf_name,conf_enddate from tblconference WHERE conf_enddate >= CURDATE() ";
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
                	<td align="left" valign="top"><p>Pass type</p></td>
                    <td><input type="text" name="pass_type" class="twitter" placeholder="Enter Pass type name" required/></td>
                </tr>
                
                <tr>
                	<td align="left" valign="top"><p>Pass description</p></td>
                    <td><input type="text" name="pass_desc" class="twitter" placeholder="Enter Pass type description" required /></td>
                </tr>
                
                <tr>
                	<td align="left" valign="top"><p>Pass price</p></td>
                    <td><input type="number" name="pass_price" class="twitter" placeholder="Enter Pass price" min="0" required /></td>
                </tr>
                
                <tr>
                	<td align="left" valign="top"><p>Amount of pass</p></td>
                    <td><input type="number" name="pass_amount" class="twitter" placeholder="Enter amount of passes" min="1" required /></td>
                </tr>
                
                <tr>
                	<td></td>
                	<td><div style="float:left;"><input type="reset" name="reset" class="button" value="Clear"/>
                    	</div><div style="text-align:center;"><input type="submit" name="submit" class="button" value="Submit"/><div></td>
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