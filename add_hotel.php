<?php session_start();?> <!DOCTYPE html>
<html>
<head>
<title>Conference management</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
    	<h1 align="center">Add Hotel</h1>
		<form action="addhotel.php" method="post" name="addtour" align="center" enctype="multipart/form-data" >
        	<table align="center">
        		<tr>
                	<td width="160" align="left" valign="top"><p>Hotel Name</p></td>
       	            <td><input type="text" id="hotel_name" name="hotel_name" style="width:80%; " class="twitter" required /></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>Hotel Image</p></td>
       	            <td><input type="file" id="hotel_image" name="hotel_image" class="twitter" /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Hotel Address</p></td>
       	            <td><textarea  name="address" id="address"  style="width:80%; height:100px; " class="twitter" required></textarea></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Location Description</p></td>
       	            <td><textarea  name="description" id="description"  style="width:80%; height:150px; " class="twitter" required></textarea></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>Contact<p></td>
       	            <td><input type="number" id="contact"  name="contact" style="width:80%;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength = "16" class="twitter" /></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>Minimum Room Rate (RM)<p></td>
       	            <td><input type="number" id="roomRate"  step="0.1" name="roomRate" style="width:80%;" min="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxLength="7" class="twitter" required /></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>Feature /  Amenities<p></td>
       	            <td><textarea name="feature_amenities" id="feature_amenities"  style="width:80%; height:150px; "  class="twitter" required /></textarea></td>
                </tr>
            	<tr>
                	<td height="60"></td>
                	<td><div style="float:left;"><input type="submit" name="submit" class="button" onclick="validate()" value="Submit"/></div><div style="text-align:center;"><input type="reset" name="reset" class="button" value="Clear"/></div></td>
                </tr>
            </table>
        </form>
	</div>
</div>
	  

</div>
<script>
function validate()
{
	if(document.getElementById('hotel_name').value == '')
	{		
		alert("Please enter hotel name.");
		return false;
	}
	
	if(document.getElementById('contact').value == '')
	{		
		alert("Please enter the hotel contact number.");
		return false;
	}
	
	if(document.getElementById('roomRate').value == '')
	{		
		alert("Please enter the room rate.");
		return false;
	}

	
	if ($('#address').val() == '')
	{
		alert("Please put address.");
		return false;
	}
	
	if ($('#feature_amenities').val() == '')
	{
		alert("Please put the feature or amenities.");
		return false;
	}
	
	if ($('#description').val() == '')
	{
		alert("Please put description.");
		return false;
	}

	return confirm("Are you sure you want to add this hotel?")

	
	
}
</script>


<!--include footer-->
<?php include 'footer.php';?> <?php } ?>
</body>
</html>