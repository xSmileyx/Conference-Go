<?php session_start();?> <!DOCTYPE html>
<html>
<head>
<title>Conference management</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

<script text="text/javascript">

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
	<div id="addcater">
    	<h1 align="center">Add Caterer</h1>
		<form action="addcaterer.php" method="post" name="addcaterer" align="center">
        	<table align="center">
        		<tr>
                	<td width="160" align="left" valign="top"><p>Caterer's name</p></td>
       	            <td><input type="text" name="caterer_name"  id="caterer_name" class="twitter" placeholder="Enter caterer name" required /></td>
                </tr>	
            	<tr>
                	<td align="left" valign="top"><p>Caterer's Phone number</p></td>
       	            <td><input type="tel" name="caterer_phone" id="caterer_phone" class="twitter" placeholder="Enter caterer phone" pattern="^[0-9]{7,15}$"  title="phone number must be between 7 and 15 numbers" required="required" /></td>
                </tr>
                <tr>
                	<td align="left" valign="top"><p>Caterer's Email</p></td>
       	            <td><input type="email" name="caterer_email" id="caterer_email" class="twitter" placeholder="Email" required="required"/></td>
                </tr>
            	<tr>
                	<td height="60"></td>
                	<td><div style="float:left;"><input type="reset" name="reset" class="button" value="Clear"/></div><div style="text-align:center;"><input type="submit" name="submit" class="button" value="Submit" onclick="return formvalidate();"/></div></td>
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