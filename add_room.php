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
    	<h1 align="center">Add Room</h1>
		<form action="addroom.php" method="post" name="addtour" align="center" enctype="multipart/form-data" >
        	<table align="center">
        		<tr>
                	<td width="160" align="left" valign="top"><p>Hotel Name</p></td>
       	            <td>	<?php 	include('config.php');

									$SQLquery = "SELECT * FROM tblhotel";

									$QueryResult = $conn->query($SQLquery);
									echo "<select name=\"bHotel\" id=\"bHotel\" class=\"twitter\" 	>
											<option value = \"\"> Select Hotel </option>";
									if($QueryResult->num_rows == 0)
										{
											echo "<option value = \"\"> --</option>";
										}
									else
										{
											while(($row = $QueryResult->fetch_assoc()) != false)
											{
												$hotel_id = $row["hotel_id"];
												$hotel_name = $row["hotel_name"];
											
												echo "<option value = '".$hotel_id."'> " .$hotel_name. "</option>";
											}
										}
										
									echo "</select>";
									?></td>
                </tr>
        		
        		<tr>
                	<td width="160" align="left" valign="top"><p>Room Type</p></td>
       	            <td><input type="text" id="type" name="type" style="width:80%;" class="twitter" /></td>
                </tr>
            	<tr><input type="hidden" name="room_id" value="<?php echo mt_rand(10001,99999);?>" />
                	<td height="60"></td>
                	<td><div style="float:left;"><input type="submit" name="submit" class="button" onclick="return validate();" value="Submit"/></div><div style="text-align:center;"><input type="reset" name="reset" class="button" value="Clear"/></div></td>
                </tr>
            </table>
        </form>
	</div>
</div>
	  
</div>
<script>
function validate()
{
	if(document.getElementById('bHotel').value == '')
	{		
		alert("Please select a hotel.");
		return false;
	}
	
	if(document.getElementById('type').value == '')
	{		
		alert("Please enter a room type.");
		return false;
	}
	
}
</script>
	  

<!--include footer-->
<?php include 'footer.php';?> <?php } ?>
</body>
</html>