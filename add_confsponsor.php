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
		<script type="text/javascript">
			function validateform()
			{
				var sponsor = document.getElementById("sponsor");
				var strSponsor = sponsor.options[sponsor.selectedIndex].value;
				if(strSponsor==0)
				{
					alert('Please select a sponsor form the dropdown list');
					return false;
				}
				
				var conf = document.getElementById("conf_id");
				var strConf= conf.options[conf.selectedIndex].value;
				if(strConf==0)
				{
					alert('Please select a Conference form the dropdown list');
					return false;
				}
				if(confirm('Do you want to add this Conference Sponsor?'))
				{return true;}
				else 
					return false;
			}
		</script>
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
    	<form onsubmit="return validateform();" action="addconfsponsor.php" method="post" name="addconference">
        <table align="center">
        <tr>
            	<td align="left" valign="top"><p>Sponsor name</p></td>
               <td colspan="2">    
					<select name="sponsor_id" id='sponsor' class="twitter">
					<option value='0'>-Select-</option>
				<?php
					$query = "SELECT sponsor_id,sponsor_name from tblsponsor ";
					$result = mysql_query($query);
					
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['sponsor_id']."'>".$row['sponsor_name']."</option>";
					}
					echo "</select>";
				?>
				
                </td>
            </tr>
            <tr>
            	<td align="left" valign="top" ><p>Conference name</p></td>
                <td>	     
                 	<select name="conf_id" id='conf_id' class="twitter">
					<option value='0'>-Select-</option>
				 <?php
					$query = "SELECT conf_id,conf_name,conf_enddate from tblconference WHERE conf_enddate >= CURDATE() ";
					$result = mysql_query($query);
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['conf_id']."'>".$row['conf_name']."</option>";
					}
					echo "</select>";
				?>
				
                </td>
            </tr>
            <tr>
            <td align="left" valign="top" width="180"><p>Amount provided RM</p></td>
                <td><input type="number" name="amount_provided" class="twitter" placeholder="Amount in RM " min="0" required /></td>
            </tr>
            <tr>
					
					<td align="left" colspan="2"><input type="reset" name="reset" class="button" value="Clear"	/> 
                    <input type="submit" name="submit" class="button" value="Submit" style="float:right;" /></td>        
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