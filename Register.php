<!DOCTYPE html>
<!--
Template Name: Noctish
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Register</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

</head>
<body id="top">

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_right">
      <ul class="nospace inline pushright">
        <li class="active"><i class="fa fa-user"></i> <a href="Register.php">Register</a></li>
        <li><i class="fa fa-sign-in"></i> <a href="Login.php">Login</a></li>
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
<div class="bgded" style="background-image:url('images/demo/backgrounds/01.png');"> 
  <div class="wrapper row2">
    <div id="breadcrumb" class="hoc clear"> 
    </div>
  </div>
</div>


<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content three_quarter first"> 
	<div class="scrollable">
     

<form action="" method="post" style="width:70%;" name="regParticipant" id="regForm">
			
			    <table align="center">
				
				<tr><td>Participant ID:
								<input type="text"  class="twitter" style="background-color:transparent; border:0;" id="pID" name="pID" value="<?php 
									
									//configuration script
									include("config.php");
									$rID = mt_rand(100001,999999);//this will generate 7 random numbers
								
									
									//selects all the table's variables to search if there's a match 
									$SQLquery = "SELECT * FROM tblparticipant WHERE p_id LIKE '$rID'";
									$QueryResult =  $conn->query($SQLquery);
								
									
									if($QueryResult->num_rows == 0)
										{
											echo "$rID";//prints the purchase code into the value in the text box if it did not find any matches
										}
									else
										{
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
												{
													$checkID = $row['p_id'];//initialize the matched purchase code into a variable
								
													if($checkID == $rID)//compares if it matches the randomly generated purchase code 
														{
															$rID = mt_rand(1000001,9999999);//generates again if it matched and will generate another if it still matches
															echo "$rID";//prints the purchase code into the value in the text box
														}
													
												}
										}
									
									
								?>" maxlength="7" size="7" READONLY> 
								<br>

							
								
					Username:<br>
					<input type="text" name="username" class="twitter" autocomplete=off maxlength="20" style="width:80%;;" required><br><br>
					Password:<br>
					<input type="password" name="psw" class="twitter" autocomplete=off maxlength="20" style="width:40%;;"  required><br><br>
					
					Confirm Password:<br>
					<input type="password" name="confirmpsw" class="twitter" autocomplete=off maxlength="20" style="width:40%;;" required><br><br>

					First name:<br>
					<input type="text" name="firstname"  class="twitter" autocomplete=off maxlength="20" style="width:80%;;" required><br><br>
					Surname:<br>
					<input type="text" name="lastname" class="twitter" autocomplete=off maxlength="30" style="width:80%;;" required><br><br>


					Email:<br>
					<input type="text" name="email" class="twitter" autocomplete=off maxlength="50" style="width:80%;;" required><br><br>
					Phone Number:<br>
					<input type="text" name="pNumber" class="twitter" autocomplete=off maxlength="15" style="width:80%;" required><br><br>

					Date of Birth:<br>
					<input type="date" name="bday" style="width:40%;" class="twitter"><br><br>
					Address:<br>
					<textarea name="address" class="twitter" autocomplete=off maxlength="50" style="width:80%; height:200px;" required></textarea><br><br>
					
					Country:<br>
					<select name="country" class="countries"  id="twitter">
					<option value="">Select Country</option>
					</select><br><br>

					State:<br>
					<select name="state" class="states"  id="twitter">
					<option value="">Select State</option>
					</select><br><br>
					
					City:<br>
					<select name="city" class="cities" id="twitter">
					<option value="">Select City</option>
					</select><br><br>
					
					Postcode:<br>
					<input type="text" name="postcode" class="twitter" id="postcode" maxlength="16" maxlength="10" style="width:80%;" autocomplete=off required><br><br>
					
					Occupation:<br>
					<input type="text" name="occupation" class="twitter" autocomplete=off maxlength="30" style="width:80%;" required><br><br>
					
					<input type = "checkbox" name="newsletter"> Newsletter<br><br>
					<!--<input onchange="this.setCustomValidity(validity.valueMissing ? 'Please indicate that you accept the Terms and Conditions' : '');" id="field_terms" type="checkbox" required name="terms"> I accept the <u>Terms and Conditions</u></p>
						-->
					

					<button onclick="location.href ='../test/Login.php';" class="button" >Back to login</button>
					<input type="submit" value="Submit" name="submit" class="button">
					<button type="reset" value="Reset" name="reset" class="button">Reset</button>

					
					  <br><br>
					  
			</td></tr>
			</table>
			
		</form> 

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
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <div class="center btmspace-80">
      <h2 class="heading">Conference management</h2>
      <p>Nullam at purus ornare scelerisque ante sit amet dignissim enim integer dictum tellus sed leo.</p>
    </div>
    <div class="one_quarter first">
      <h6 class="title">Tempor volutpat</h6>
      <address class="btmspace-30">
      Street Name &amp; Number<br>
      Town<br>
      Postcode/Zip
      </address>
      <ul class="nospace">
        <li class="btmspace-10"><span class="fa fa-phone"></span> +00 (123) 456 7890</li>
        <li><span class="fa fa-envelope-o"></span> info@domain.com</li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="title">Enim at ultrices</h6>
      <article>
        <h2 class="nospace font-x1"><a href="#">Leo pharetra nec</a></h2>
        <time class="font-xs" datetime="2045-04-06">Friday, 6<sup>th</sup> April 2045</time>
        <p>Dui odio tristique et commodo vitae bibendum ac orci suspendisse potenti aenean porta tortor ac.</p>
      </article>
    </div>
    <div class="one_quarter">
      <h6 class="title">Quisque mi nisl</h6>
      <ul class="nospace linklist">
        <li><a href="#">Hendrerit non viverra</a></li>
        <li><a href="#">Metus accumsan sed sit</a></li>
        <li><a href="#">Amet porta lacus aliquam</a></li>
        <li><a href="#">Sagittis arcu sit amet</a></li>
        <li><a href="#">Scelerisque pulvinar curabitur</a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="title">Lacinia interdum</h6>
      <p>Scelerisque praesent tempus nisl vehicula mi efficitur id posuere sem dictum etiam.</p>
      <p>Quam in sem volutpat sed sollicitudin odio aliquam in in augue nunc fusce interdum.</p>
    </div>
  </footer>
</div>

<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
  </div>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="http://lab.iamrohit.in/js/location.js"></script>

<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>


<?php

if(isset($_POST["submit"]))//checks if the submit button is selected

	{
		$regID = $_POST["pID"];
		$regUsername = $_POST["username"];
		$regPassword = $_POST["psw"];
		$regPasswordConfirm = $_POST["confirmpsw"];
		$regFirstName = $_POST["firstname"];
		$regSurName = $_POST["lastname"];
		$regEmail = $_POST["email"];
		$regPhoneNumber = $_POST["pNumber"];
		$regDOB = $_POST["bday"];
		$regAddress = $_POST["address"];
		$regCountry = $_POST["country"];
		$regState = $_POST["state"]; 
		$regCity = $_POST["city"];
		$regPostCode = $_POST["postcode"];
		$regOccupation = $_POST["occupation"];
		$regNewsletter = false;

		if(isset($_POST["newsletter"]))
			{
				$regNewsletter = true;
			}
		
		if (strpos($regEmail, '@') == 0)//checks if both input contains a @ symbol
			{	
				echo "<script language='javascript'>alert('Missing @ in your email, please enter the correct format.');</script>";
			}
		else if(strcmp($regPassword,$regPasswordConfirm) != 0)//compare if both inputs are the same
			{
				echo "<script language='javascript'>alert('Sorry, the re-entered password is not the same. Please key in the same password.');</script>";
			}
		else
			{
				//configuration script
				include ("config.php");
				
				//Create connection again after database has been created
				$conn = new mysqli($serverName, $userName, $password, $dbName);
			
				//separates the email to retrieve the email extension
				$tofind = "@";
				$exInput = strchr($regEmail,$tofind);
		
				
				$SQLquery = "SELECT * FROM tblparticipant WHERE p_username LIKE '$regUsername'";
				$QueryResult =  $conn->query($SQLquery);
				
				if($QueryResult->num_rows == 0)
					{
						//Adding values to each column respectively
						$SQLquery = "INSERT INTO tblparticipant (p_id, p_username, p_password, p_firstname, p_surname, p_email, p_phone, p_dob, p_address, p_country, p_city, p_state, p_postalcode, p_newsletter, p_occupation)
									 VALUES ('$regID ', '$regUsername', '$regPassword', '$regFirstName', '$regSurName','$regEmail','$regPhoneNumber','$regDOB','$regAddress','$regCountry','$regCity', '$regState','$regPostCode','$regNewsletter','$regOccupation')";
									 
						//checks if there's any error on adding the values
						if ($conn->query($SQLquery) === TRUE)
							{
								 echo "<script language='javascript'>alert('You have succesfully registered!!');</script>"; 
							}
						else 
							{
								echo "<font color=red><p>Unable to create the records.<br />
														 Error Code ". $conn->errno." : ". $conn->error." </font></p>";
							}
					}
				else
					{

						echo "<script language='javascript'>alert('User with the same username already registered into the system!');</script>";//display error message
					}
			}
	}
		
?>
</html>