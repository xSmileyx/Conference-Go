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
	<div id="addsponsor">
    <h1 align="center">Add Sponsor</h1>
		<form action="addsponsor.php" method="post" enctype="multipart/form-data">
        	<table align="center">
            	<tr>
                	<td width="100" align="left" valign="top"><p>Sponsor name</p></td>
                    <td><input type="text" name="sponsor_name" class="twitter" placeholder="Enter name" required/></td>
                </tr>
                
                <tr>
                	<td align="left" valign="top"><p>Email</p></td>
                    <td><input type="email" name="sponsor_email" class="twitter" placeholder="Enter email" /></td>
                </tr>
                
                <tr>
                	<td align="left" valign="top"><p>Phone</p></td>
                    <td><input type="tel" name="sponsor_phone" class="twitter" placeholder="Phone number" required /></td>
                </tr>
                
                <tr>
                	<td align="left" valign="top"><p>Sponsor Logo</p></td>
                    <td><input type="file" name="sponsor_logo" class="twitter"  /></td>
                </tr>
                
                <tr>
                	<td height="60"></td>
                	<td><div style="float:left;"><input type="reset" name="reset" class="button" value="Clear"/></div>
                    <div style="text-align:center;"><input type="submit" name="submit" class="button" value="Submit"/></div></td>
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