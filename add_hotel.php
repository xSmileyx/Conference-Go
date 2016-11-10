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
    	<h1 align="center">Add Hotel</h1>
		<form action="addhotel.php" method="post" name="addtour" align="center" enctype="multipart/form-data" >
        	<table align="center">
        		<tr>
                	<td width="160" align="left" valign="top"><p>Hotel Name</p></td>
       	            <td><input type="text" name="hotel_name" style="width:80%; " class="twitter" required /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Hotel Address</p></td>
       	            <td><textarea  name="address" style="width:80%; height:100px; " class="twitter" required></textarea></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>City</p></td>
       	            <td><input type="text" name="city" style="width:80%; "class="twitter"  required /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>State</p></td>
       	            <td><input type="text" name="state" style="width:80%;" class="twitter" /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Zipcode</p></td>
       	            <td><input type="number"  name="zipcode"   class="twitter" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength = "6" required /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Location Description</p></td>
       	            <td><textarea  name="description" style="width:80%; height:150px; " class="twitter" required></textarea></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>Contact<p></td>
       	            <td><input type="number" name="contact" style="width:80%;" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  maxlength = "16" class="twitter" /></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>Minimum Room Rate<p></td>
       	            <td><input type="number" step="0.1" name="roomRate" style="width:80%;"  class="twitter" required /></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>Feature /  Amenities<p></td>
       	            <td><textarea name="feature_amenities" style="width:80%; height:150px; "  class="twitter" required /></textarea></td>
                </tr>
            	<tr>
                	<td height="60"></td>
                	<td><div style="float:left;"><input type="submit" name="submit" class="button" value="Submit"/></div><div style="text-align:center;"><input type="reset" name="reset" class="button" value="Clear"/></div></td>
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