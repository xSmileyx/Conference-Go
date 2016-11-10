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
<title>Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

</head>
<body id="top">

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_right">
      <ul class="nospace inline pushright">
        <li><i class="fa fa-user"></i> <a href="Register.php">Register</a></li>
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
        <li class="active"><a href="../test/dashboardGeneral.html">Home</a></li>

      
      </ul>
    </nav>
  </header>
</div>

<!-- Top Background Image Wrapper -->

  <div class="wrapper row2"  style="padding:0">
  <div class="bgded"> 
    <div id="breadcrumb" class="hoc clear"> 
	<!--
	<img src="images/demo/backgrounds/01.png" alt="Administrator">
	-->
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
							<form action="Login.php" class="form-2" method="post" class="lForm">
								<h1><span class="log-in">Log in</span></h1>
								<p class="float">
									Username
									<input type="text" name="user" id="username" class="twitter" autocomplete=off required>
								</p>
								
								<p class="float">
								
									Password
									<input type="password" name="password" class="twitter" id="password" autocomplete=off required>
								</p>
								<p class="clearfix">    
									<input type="submit" name="submit" class="button" value="Log in">
								</p>
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
    <div class="sidebar one_quarter"> 
      <h6>Main Menu</h6>
      <nav class="sdb_holder">
        <ul>
          <li><a href="nonHotelTour.php">Book a Tour / Hotel</a></li>
          <li><a href="nonFeedback.php">Provide Feedback</a></li>
          <li><a href="nonEnquiries.php">Send Enquiries</a></li>
  
        </ul>
      </nav>

      <div class="sdb_holder">
        
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
if(isset($_POST["submit"]))//checks if the submit button is selected
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
	
		//select the table to search for the user's input email and password
		$SQLquery = "SELECT * FROM tblparticipant WHERE p_username LIKE '$logUsername' AND p_password LIKE '$logPassword'";
		$QueryResult =  $conn->query($SQLquery);

		if($QueryResult->num_rows == 0)
			{
				
				echo "<script language='javascript'>alert('No such user within the records.');</script>";//display error message if no user is found within the records 
			}
		else
			{
				// output data of each row
				while(($row = $QueryResult->fetch_assoc()) != false)
					{
						//the user's email,password and status are initialized into variables if the user is found
						$user = $row['p_username'];
						$pass = $row['p_password'];
						$email = $row['p_email'];
						$id = $row['p_id'];
						$firstName = $row['p_firstname'];
						$surName = $row['p_surname'];
						$phone = $row['p_phone'];
						$country = $row['p_country'];
						
						//$status = $row['status'];

						$_SESSION["log_user"] = $user;//initialize the user for the session until the user logs out
						$_SESSION["log_id"] = $id;
						$_SESSION["log_firstname"] = $firstName;
						$_SESSION["log_surname"] = $surName;	
						$_SESSION["log_email"] = $email;
						$_SESSION["log_phone"] = $phone;
						$_SESSION["log_country"] = $country;
						
						setcookie($user, $pass, $id, $firstName, $surName,$email, $expire);//sets the time limit for the user's email and password to be active
						header("location: ../test2/dashboardParticipant.php");
						
					}
			}	
			
			
			

			
			
		//closing connection
		$conn->close();
	}
?>
</html>
