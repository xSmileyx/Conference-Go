<?php
	ob_start();
	include('config.php');
	session_start();//start session
	$logUser = $_SESSION["log_user"];
	$logID = $_SESSION["log_id"];
	$logFirstName = $_SESSION["log_firstname"];
	$logSurName = $_SESSION["log_surname"];
	$logEmail = $_SESSION["log_email"];
	$logPhone = $_SESSION["log_phone"];
	$logCountry = $_SESSION["log_country"];
	
	//configuration script
	include ('config.php');
	
	if(!isset($_SESSION['log_user']) && !isset($_SESSION["log_id"]) && !isset($_SESSION["log_firstname"]) && !isset($_SESSION["log_surname"]))//checked if session variable is not destroyed/unset
		{
			header("location: Login.php");	//redirected to login page if session variable is not destroyed/unset	
			exit();
		}
		
	
	
?><!DOCTYPE html>
<!--
Template Name: Noctish
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Hotel/Tour Booking</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/ray.css" rel="stylesheet" type="text/css" media="all">


	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDig83sIOyi0hetUYaoD1_4IdmbIT2FGWc&libraries=places"></script>
	<script src="https://www.jscache.com/wejs?wtype=socialButtonIcon&amp;uniq=221&amp;locationId=298309&amp;color=green&amp;size=rect&amp;lang=en_US&amp;display_version=2"></script>	
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<!-- 	<script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
 -->	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body id="top">

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_right">
      <ul class="nospace inline pushright">
	  	  		<li><i class="fa fa-sign-in"></i> <a href="Logout.php">Log out</a></li>

      </ul>
    </div>
    <div class="fl_right">

    </div>
  </div>
</div>

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
       <h1><a href="../test/dashboardParticipant.php">Conference management system</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
   

            <li><a href="dashboardParticipant.php">Home</a></li>
        <li><a href="chooseConfe.php">Participate</a></li>
		<li><a href="HotelTourAlone.php">Hotel / Tour Booking</a></li>
		<li><a href="cancelParticipation.php">Cancel Participation & Booking</a></li>
		<li><a href="Feedback.php">Provide Feedback</a>
		<li><a  href="Enquiries.php">Send Enquiries</a></li>
          
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

	<form action="processHotelTourAlone.php" method="post" name="pForm" id="participation" >
				<fieldset>
				<legend></legend>
			      <legend>Hotel Reservation / Request Form</legend><br>
			      
					Do you require accommodation?<br>
					<div class="some-class">
							<input type="radio" name="fqrTwo" id="accoYes" value="Yes" autocomplete=off /><label>Yes</label>
							<input type="radio" name="fqrTwo" id="accoNo" value="No" autocomplete=off /><label>No</label>
					</div>
							<br><br>	
						<hr>
						
						<script type="text/javascript">
								$('input[type="radio"]').click(function(){
									if($(this).attr("id")=="accoNo"){
										$("#hotelBookings").hide('slow');
									}
									if($(this).attr("id")=="accoYes"){
										$("#hotelBookings").show('slow');

									}        
								});
							$('input[type="radio"]').trigger('click');
						</script>
						
						<div id="hotelBookings">
						<div id="request">
						
							Hotel Reversation Request ID:
								<input type="text" id="pID" name="reqID" value="<?php 
									
									//configuration script
									include("config.php");
									$rID = mt_rand(100001,999999);//this will generate 6 random numbers
								
									
									//selects all the table's variables to search if there's a match 
									$SQLquery = "SELECT * FROM tblbookingdetails WHERE booking_id LIKE '$rID'";
									$QueryResult =  $conn->query($SQLquery);
								
									
									if($QueryResult->num_rows == 0)
										{
											echo "$rID";//prints the reference into the value in the text box if it did not find any matches
										}
									else
										{
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
												{
													$checkID = $row['booking_id'];//initialize the matched purchase code into a variable
								
													if($checkID == $rID)//compares if it matches the randomly generated reference ID 
														{
															$rID = mt_rand(100001,999999);//generates again if it matched and will generate another if it still matches
															echo "$rID";//prints the reference ID into the value in the text box
														}
													
												}
										}
									
									
								?>" maxlength="7" size="7" READONLY> 
								<br><br>
							Preferred Hotel : <select name="pHotel">
													<option value = "Hilton Hotel Kuching">Hilton Hotel Kuching</option>
													<option value = "Pullman Hotel Kuching">Pullman Hotel Kuching</option>
													<option value = "Riverside Majestic Hotel Kuching">Riverside Majestic Hotel Kuching</option>
													<option value = "Grand Margherita Hotel Kuching">Grand Margherita Hotel Kuching</option>
													<option value = "Tune Hotel Waterfront Kuching">Tune Hotel Waterfront Kuching</option>
											  </select><br><br>
							
							From <input type="date" name="stayFrom" style='display: inline-block;' id="from">
							to <input type="date"  style='display: inline-block;' name="stayTo" id="to"><br><br>
							
							<script>
								$(document).ready(function(){
									$('#from').change(function(){
										//alert(this.value);    
										
										$('#to').val(this.value);								
										//Date in full format alert(new Date(this.value));
										
										document.getElementById('to').setAttribute("min", this.value);
										
										
										var inputDate = new Date(this.value);
									
									});
								});	
								
								
							Date.prototype.toDateInputValue = (function() {
								var local = new Date(this);
								local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
								return local.toJSON().slice(0,10);
							});
								
								
							document.getElementById('from').value = new Date().toDateInputValue();	
							document.getElementById('from').setAttribute("min", new Date().toDateInputValue());
							// $(document).ready(function(){
									// $('#to').onsubmit(function(e){
										
										// var startDate = $('#from').val().replace('-','/');
										// var endDate = $('#to').val().replace('-','/');

										// if(startDate > endDate){
										   // alert('It\'s high noon...');
										   // e.preventDefault();
										// }
									
									// });
								// });	
							</script>
							
							
							Room Requirement: <select name="rRequirement">
													<option value = "No Preferences">No Preferences</option>
													<option value = "Non smoking">Non smoking</option>
													<option value = "Smoking">Smoking</option>
											  </select><br><br>
											  
							Adults: <input type="number" class="twitter" name="numAdults" min="0" max="10"><br><br>
								
							Children: <input type="number" class="twitter" name="numChildren" min="0" max="10"><br><br>
							
							Name: <?php echo $logFirstName; echo " ". $logSurName; ?><br><br>
							
							Email: <?php echo $logEmail; ?> <font color=red>(to be emailed for further information)</font><br><br>
							
							Phone Number: <?php echo $logPhone; ?> <font color=red>(to be contacted for further information)</font><br><br>
							
							Special Requirements: <textarea name="specialReq" style="width:100%; height:200px;" class="twitter"></textarea><br><br>
						</div>
							
							<br>
							
							<div id="helper">

								For record purposes, please fill in these form:<br><br>
								
							Hotel Booking ID:
								<input type="text" id="pID" name="manualBookID" value="<?php 
									
									//configuration script
									include("config.php");
									$rID = mt_rand(100001,999999);//this will generate 6 random numbers
								
									
									//selects all the table's variables to search if there's a match 
									$SQLquery = "SELECT * FROM tblbookingdetails WHERE booking_id LIKE '$rID'";
									$QueryResult =  $conn->query($SQLquery);
								
									
									if($QueryResult->num_rows == 0)
										{
											echo "$rID";//prints the reference into the value in the text box if it did not find any matches
										}
									else
										{
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
												{
													$checkID = $row['booking_id'];//initialize the matched purchase code into a variable
								
													if($checkID == $rID)//compares if it matches the randomly generated reference ID 
														{
															$rID = mt_rand(100001,999999);//generates again if it matched and will generate another if it still matches
															echo "$rID";//prints the reference ID into the value in the text box
														}
													
												}
										}
									
									
								?>" maxlength="7" size="7" READONLY> <br>
								
								Booked Hotel Name: <input type="text" class="twitter" name="bookedHotel"><br>
								
							From <input type="date" name="stayFromManual" style='display: inline-block;' id="fromManual">
							to <input type="date"  style='display: inline-block;' name="stayToManual" id="toManual"><br><br>
							
							<script>
								$(document).ready(function(){
									$('#fromManual').change(function(){
										//alert(this.value);    
										
										$('#toManual').val(this.value);								
										//Date in full format alert(new Date(this.value));
										
										document.getElementById('toManual').setAttribute("min", this.value);
										
										
										var inputDate = new Date(this.value);
									
									});
								});	
							</script>								
								Amount Paid (RM): <input type="number" class="twitter" name="bookAmtPaid" id="bookAmtPaid" min="0" step="0.01" maxwidth="" autocomplete=off><br><br>
								
<!-- 								<iframe src="http://www.cleartrip.com/hotels"  allowTransparency='true' align="middle" width="800px" height="800px" frameborder="1" scrolling="yes"></iframe>
 -->							
						
							</div>
							
							Do you want to book manually?<br>
							<div class="some-class">
								<input type="radio" name="helpTwo" id="helpYes" value="Yes" autocomplete=off /><label>Yes</label>
								<input type="radio" name="helpTwo" id="helpNo" value="No" autocomplete=off checked /><label>No</label>
							</div>
							<br><br>	
							

							<script type="text/javascript">
								$('input[type="radio"]').click(function(){
									if($(this).attr("id")=="helpNo"){
										$("#helper").hide('slow');
										$("#request").show('slow');
									}
									if($(this).attr("id")=="helpYes"){
										$("#helper").show('slow');
										$("#request").hide('slow');
										

									}        
								});
							$('input[type="radio"]').trigger('click');
						</script>
						
							
							
							
						</div>
						
						<script type="text/javascript">
							// function clicked(e)
								// {
									// if(confirm('Are you sure?')) {alert('You have succesfully participated the event! Your participant ID: 4758642');}
									// else {e.preventDefault();}
								// }
						</script>
						
				

<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
			
		
			      <legend>Tour Reservation Selection</legend><br>
				  
				  Do you want to book a tour?<br>
						<div class="some-class">
							<input type="radio" name="rTour" id="tourYes" value="Yes" autocomplete=off /><label>Yes</label>
							<input type="radio" name="rTour" id="tourNo" value="No" autocomplete=off /><label>No</label>
						</div>	
						<br><br>	
					<hr>
					
					
						
					<div id="tourBookings">
							Tour Booking ID:
								<input type="text" id="pID" name="tourBookingID" value="<?php 
									
									//configuration script
									include("config.php");
									$rID = mt_rand(100001,999999);
									
									$SQLquery = "SELECT * FROM tbltourbookingdetails WHERE tourbooking_id LIKE '$rID'";
									$QueryResult =  $conn->query($SQLquery);
								
									
									if($QueryResult->num_rows == 0)
										{
											echo "$rID";
										}
									else
										{
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
												{
													$checkID = $row['booking_id'];
								
													if($checkID == $rID)
														{
															$rID = mt_rand(100001,999999);
															echo "$rID";
														}
													
												}
										}
									
									
								?>" maxlength="7" size="7" READONLY> <br>
							
							Name: <?php echo $logFirstName; echo " ". $logSurName; ?><br><br>
							
							Email: <?php echo $logEmail; ?> <font color=red>(to be emailed for further information)</font><br><br>
							
							Phone Number: <?php echo $logPhone; ?> <font color=red>(to be contacted for further information)</font><br><br>	
								
								
							<div id="container">
								<ul>
									<li><li><img src="../test2/img/big1.png" width="704" height="453" /></li>
										<li><img src="../test2/img/big2.png" width="704" height="453" /></li>
								  </ul>
								  <span class="button prevButton"></span>
								  <span class="button nextButton"></span>
							</div>

							<script>
							$(window).load(function(){
									var pages = $('#container li'), current=0;
									var currentPage,nextPage;
									var timeoutID;
									var buttonClicked=0;

									var handler1=function(){
										buttonClicked=1;
										$('#container .button').unbind('click');
										currentPage= pages.eq(current);
										if($(this).hasClass('prevButton'))
										{
											if (current <= 0)
												current=pages.length-1;
											else
												current=current-1;
											nextPage = pages.eq(current);	

											nextPage.css("marginLeft",-604);
											nextPage.show();
											nextPage.animate({ marginLeft: 0 }, 800,function(){
												currentPage.hide();
											});
											currentPage.animate({ marginLeft: 604 }, 800,function(){
												$('#container .button').bind('click',handler1);
											});
										}
										else
										{

											if (current >= pages.length-1)
												current=0;
											else
												current=current+1;
											nextPage = pages.eq(current);	

											nextPage.css("marginLeft",504);
											nextPage.show();
											nextPage.animate({ marginLeft: 0 }, 800,function(){
											});
											currentPage.animate({ marginLeft: -504 }, 800,function(){
												currentPage.hide();
												$('#container .button').bind('click',handler1);
											});
										}		
									}

									var handler2=function(){
										if (buttonClicked==0)
										{
										$('#container .button').unbind('click');
										currentPage= pages.eq(current);
										if (current >= pages.length-1)
											current=0;
										else
											current=current+1;
										nextPage = pages.eq(current);	
										nextPage.css("marginLeft",504);
										nextPage.show();
										nextPage.animate({ marginLeft: 0 }, 800,function(){
										});
										currentPage.animate({ marginLeft: -504 }, 800,function(){
											currentPage.hide();
											$('#container .button').bind('click',handler1);
										});
										timeoutID=setTimeout(function(){
											handler2();	
										}, 4000);
										}
									}

									$('#container .button').click(function(){
										clearTimeout(timeoutID);
										handler1();
									});

									timeoutID=setTimeout(function(){
										handler2();	
										}, 2000);
									
							});

							</script>
	
								
							<?php
									// //selects all user in the User table that have the status of the student and staff only because there's gonna be only one admin and he/she cannot delete himself/herself
									// $SQLquery = "SELECT * from tbltour";
									// $QueryResult =  $conn->query($SQLquery);
									
									// if($QueryResult->num_rows == 0)
										// {
											// //echo "<p style=\"text-align: center;\">No user records to display.</p>";//displays the message if there are no user registered
										// }
									// else
										// {
											// $numrow = $QueryResult->num_rows;
											
											// //creates a form and a table to display the users
											// echo "<table border=\"1\"  >";
											// //echo "<col width=\"120\" ><col width=\"280\"><col width=\"120\"><col width=\"100\"><col width=\"120\">";
											// echo "<tr id=tHeader><th>Tour Name</th><th>Tour Location</th><th>Price per pax (RM)</th><th>Duration</th><th>Start Time</th>";				
											

											// // output data of each row
											// while(($row = $QueryResult->fetch_assoc()) != false)
												// {

													// echo "<tr><td>".$row['tour_name']. "</td><td>"  .$row['tour_location']. "</td><td>" .$row['tour_price']. "</td><td>" .$row['tour_duration']. "</td><td>" .$row['tour_starttime']. "</td>";		
												// }
												
												
											// echo "</table>";
										// }
							// ?><br>
							
							
							
							Select a tour:
								<?php 
								

									$SQLquery = "SELECT * FROM tbltour";

									$QueryResult = $conn->query($SQLquery);
									echo "<select name=\"pTour\" id=\"pTour\">";//creates a select option dropdown box
									
									if($QueryResult->num_rows == 0)
										{
											echo "<option value = \"\"> --</option>";
										}
									else
										{
											echo "<option value = '0'>  -- 	</option>";
											while(($row = $QueryResult->fetch_assoc()) != false)
											{
												$tourName = $row["tour_name"];
												$tourID = $row["tour_id"];
											
												echo "<option value = '".$tourID."'> " .$tourName. "</option>";
											}
										}
										
									echo "</select>   ";
								?>
						
					</div>
						
						<script type="text/javascript">
								$('input[type="radio"]').click(function(){
									if($(this).attr("id")=="tourNo"){
										$("#tourBookings").hide('slow');
									}
									if($(this).attr("id")=="tourYes"){
										$("#tourBookings").show('slow');

									}        
								});
							$('input[type="radio"]').trigger('click');
						</script>
		

							<input type="submit" name="Submit" value="Proceed to Participation / Booking Summary >>" class="myButton" onclick="return confirm('Are you sure?');">
</fieldset>
	</form>


	  
   
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

<script src="https://www.jscache.com/wejs?wtype=socialButtonIcon&amp;uniq=221&amp;locationId=298309&amp;color=green&amp;size=rect&amp;lang=en_US&amp;display_version=2"></script>	
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<!-- <script type="text/javascript" src="scripts/jquery-1.3.2.min.js"></script>
 --><script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>