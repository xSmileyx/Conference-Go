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
<div id="addconfsponsor">
<h1 align="center">Add conference sponsor</h1></br>
    	<form action="addconfsponsor.php" method="post" name="addconference">
        <table align="center">
        <tr>
            	<td align="left" valign="top"><p>Sponsor name</p></td>
               <td colspan="2">    
				<?php
					$query = "SELECT sponsor_id,sponsor_name from tblsponsor ";
					$result = mysql_query($query);
					
					echo "<input list='sponsor' name='sponsor_id'>";
					echo "<datalist id='sponsor'>";
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['sponsor_id']."'>".$row['sponsor_name']."</option>";
					}
					echo "</datalist>";
				?>
				
                </td>
            </tr>
            <tr>
            	<td align="left" valign="top" ><p>Conference name</p></td>
                <td colspan="2">	     
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
            <td align="left" valign="top" width="140"><p>Amount provided RM</p></td>
                <td colspan="2"><input type="number" name="amount_provided" class="twitter" placeholder="Amount in RM " required /></td>
            </tr>
            <tr>
					<td></td>
					<td  align="left"><input type="reset" name="reset" class="button" value="Clear"	/></td>  
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