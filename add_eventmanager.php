<?php session_start();?> <!DOCTYPE html>
<html>
<head>
<title>Conference management</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

			<script type="text/javascript">
			function pcheck()
			{
				var pp1 = document.getElementById('p1').value;
				var pp2 = document.getElementById('p2').value;
				if (pp2!=pp1) 
				{
					alert('Password do not match. Please enter again');
				} 
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
	<div id="addcater">
    	<h1 align="center">Add Event manager</h1>
		<form action="addeventmanager.php" method="post" name="addeventmanager" align="center">
        	<table align="center">
        		<tr>
                	<td width="160" align="left" valign="top"><p>Username</p></td>
       	            <td><input type="text" name="em_username" class="twitter" required /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Password</p></td>
       	            <td><input type="text" name="em_password" class="twitter" id="p1" required /></td>
                </tr>
				<tr>
                	<td width="160" align="left" valign="top"><p>Retype Password</p></td>
       	            <td><input type="text" name="em_password2" class="twitter" id="p2" onblur="pcheck()" required /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>First name</p></td>
       	            <td><input type="text" name="em_firstname" class="twitter" required /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Last name</p></td>
       	            <td><input type="text" name="em_lastname" class="twitter" required /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Phone</p></td>
       	            <td><input type="tel" name="em_phone" class="twitter" required /></td>
                </tr>
        		<tr>
                	<td width="160" align="left" valign="top"><p>Email</p></td>
       	            <td><input type="email" name="em_email" class="twitter" required /></td>
                </tr>				

            	<tr>
                	<td height="60"></td>
                	<td><div style="float:left;"><input type="reset" name="reset" class="button" value="Clear"/></div><div style="text-align:center;"><input type="submit" name="submit" class="button" value="Submit"/></div></td>
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