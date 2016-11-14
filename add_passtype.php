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
	var conf = document.getElementById("conf_id");
	var strConf= conf.options[conf.selectedIndex].value;
	if(strConf==0)						
	{
		alert('Please select a Conference form the dropdown list');
		return false;
	}
		
	var pass_type = document.getElementById("pass_type").value;
	if (pass_type == "")
	{
		alert('Please enter Pass type');
		return false;
	}
	
	var pass_desc= document.getElementById("pass_desc").value;
	if (pass_desc == "")
	{
		alert('Please enter Pass description');
		return false;
	}
	
	var pass_price= document.getElementById("pass_price").value;
	if (pass_price == "")
	{
		alert('Please enter Pass price');
		return false;
	}
	if (pass_price < 0)
	{
		alert('Pass price cannot be less than zero');
		return false;
	}
	
	var pass_amount= document.getElementById("pass_amount").value;
	if (pass_amount == "")
	{
		alert('Please enter Pass amount');
		return false;
	}
	if (pass_amount < 1)
	{
		alert('Amount of passes must be at least 1');
		return false;
	}
	
	
	if(confirm('Do you want to add this type of pass to selected conference ?'))
	{
		return true;
	}
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
	<div id="addpasstype">
    <h1 align="center">Add Pass Type</h1>
		<form onsubmit="return validateform();" action="addpasstype.php" method="post">
        	<table align="center">
            <tr>
            	<td align="left" valign="middle"><p>Conference name</p></td>
                <td>	     
                 	<select name='conf_id' id="conf_id" class="twitter">
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
                	<td align="left" valign="top"><p>Pass type</p></td>
                    <td><input type="text" name="pass_type" id="pass_type" class="twitter" placeholder="Enter Pass type name" required/></td>
                </tr>
                
                <tr>
                	<td align="left" valign="top"><p>Pass description</p></td>
                    <td><input type="text" name="pass_desc" id="pass_desc" class="twitter" placeholder="Enter Pass type description" required /></td>
                </tr>
                
                <tr>
                	<td align="left" valign="top"><p>Pass price</p></td>
                    <td><input type="number" name="pass_price" id="pass_price" class="twitter" placeholder="Enter Pass price" min="0" required /></td>
                </tr>
                
                <tr>
                	<td align="left" valign="top"><p>Amount of passes</p></td>
                    <td><input type="number" name="pass_amount" id="pass_amount" class="twitter" placeholder="Enter amount of passes" min="1" required /></td>
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