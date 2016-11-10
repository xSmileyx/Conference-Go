<?php ob_start(); ?><!DOCTYPE html>
<!--
Template Name: Noctish
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Admin Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

</head>
<body id="top">

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_right">
      <ul class="nospace inline pushright">
        <!--<li><i class="fa fa-user"></i> <a href="Register.php">Register</a></li>-->
        <li class="active"><i class="fa fa-sign-in"></i> <a href="Login.php">Login</a></li>
      </ul>
    </div>
	    <div class="fl_left">
      <ul class="nospace inline pushright">
        <li><i class="fa fa-user"></i> <a href="adminLogin.php">Admin Mode</a></li>
      </ul>
    </div>
    <div class="fl_right">

    </div>
  </div>
</div>
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="../test/dashboardGeneral.html">Conference management system</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">


      
      </ul>
    </nav>
  </header>
</div>

<!-- Top Background Image Wrapper -->
  <div class="wrapper row2" style="padding:0">
  <div class="bgded"> 
    <div id="breadcrumb" class="hoc clear"> 
    </div>
  </div>
</div>


<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content three_quarter first"> 
      <div class="scrollable">
	  
	  <table align="center">
        		<tr>
                	<td>
						<section class="main">
							<form action="adminLogin.php" class="form-2" method="post" class="lForm" name="logform" id="logform" onsubmit="return verification();">
							<img id="qrious" style="float:right;">
								<h1><span class="log-in">Log in (Admin)</span></h1>
								<p class="float">
									Username
									<input type="text" name="user" id="username" class="twitter" autocomplete=off required>
								</p>
								
								<p class="float">
								
									Password
									<input type="password" name="password" class="twitter" id="password" autocomplete=off required>
								</p>							
								
								<p class="clearfix">    
									<input type="submit" name="try" class="button" id="try" value="Log in">
									

								<script>
								var un = document.getElementById("username");
								var pw = document.getElementById("password");

								un.addEventListener("invalid", function (event) 
									{
										if(un.validity.valueMissing) 
											{
												un.setCustomValidity("Please enter your username.");
											} 
										else 
											{
												un.setCustomValidity("");
											}
									});
					
								pw.addEventListener("invalid", function (event) 
									{
										if(pw.validity.valueMissing) 
											{
												pw.setCustomValidity("Please enter your password.");
											} 
										else 
											{
												pw.setCustomValidity("");
											}
									});
			
									
								</script>
					</td>
				</tr>
			</table>				
				</form>​​
			</section>
	
</div>
	 <div id="comments">
        
      </div>
    </div>
    
 <div class="clear"></div>
  </main>
</div>
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <div class="center btmspace-80">
      <h2 class="heading">Final Year Project</h2>
	  <div class="one_quarter first">
      <h6 class="title">Samu Pillai Sadeiyen</h6>
    </div>
    <div class="one_quarter">
      <h6 class="title">Rayner Paun</h6>
    </div>
    <div class="one_quarter">
      <h6 class="title">Ch'ng Chuan Way</h6>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="title">Samuel Hii Tuan Ong</h6>
    </div>
    </div>
    
  </footer>
</div>

<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
   
  </div>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->

<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
<?php
if(isset($_POST["try"]))//checks if the submit button is selected
	{
		ob_start(); 
		
		//configuration script
		include("config.php");
		session_start();//starts the session
   
		//initializing the variables
		$logUsername = $_POST["user"];
		$logPassword = $_POST["password"];
		//$logDate = $_POST["logDate"];
		
		$expire = time() + 60*60; //set the cookie's expiry(time limit for the user to be active) for one hour(60 seconds * 60 minutes)
		
		
		$SQLquery = "SELECT * FROM tbleventmanager WHERE em_username LIKE '$logUsername' AND em_password LIKE '$logPassword'";
		$QueryResult =  $conn->query($SQLquery);
		
		if($QueryResult->num_rows > 0)
			{
				// output data of each row
				while(($row = $QueryResult->fetch_assoc()) != false)
					{
						
						$user = $row['em_firstname'];
						$id = $row['em_id'];
						
						$_SESSION["user_id"] = $id;
						$_SESSION["user_name"] = $user;
						
						
						setcookie($user, $id);//sets the time limit for the user's email and password to be active
						header("location: ../test2/dashboardadmin.php");
						
					}
				
			}
		else
			{
				echo "<script>alert('No such user within the records.');</script>";//display error message if no user is found within the records
				echo "<script>return false;</script>";//display error message if no user is found within the records
			}

		//closing connection
		$conn->close();
		
	}
?>
</html>
