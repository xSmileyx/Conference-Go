<?php include('config.php'); ?>
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
<title>Hotel/Tour Booking</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/ray.css" rel="stylesheet" type="text/css" media="all">

	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDig83sIOyi0hetUYaoD1_4IdmbIT2FGWc&libraries=places"></script>
	<script src="https://www.jscache.com/wejs?wtype=socialButtonIcon&amp;uniq=221&amp;locationId=298309&amp;color=green&amp;size=rect&amp;lang=en_US&amp;display_version=2"></script>	
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
</head>
<body id="top">

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_right">
      <ul class="nospace inline pushright">
        <li><i class="fa fa-user"></i> <a href="Register.php">Register</a></li>
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
	<form action="nonprocessHotelTour.php" method="post" name="pForm" id="participation" >
				<fieldset>
				<legend></legend>
			      <legend>Hotel Reservation / Request Form</legend><br>
			      
						Do you require accommodation?<br>
						<div class="some-class">
								<input type="radio" name="fqrTwo" id="accoYes" value="Yes" autocomplete=off /><label>Yes</label>
								<input type="radio" name="fqrTwo" id="accoNo" value="No" autocomplete=off /><label>No</label>
						</div>
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
								<input type="text" id="pID" name="reqID" value="<?php $rID = mt_rand(100001,999999);//this will generate 6 random numbers
								echo $rID;?>" maxlength="7" size="7" READONLY> 
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
							</script>
							
							Room Requirement: <select name="rRequirement">
													<option value = "No Preferences">No Preferences</option>
													<option value = "Non smoking">Non smoking</option>
													<option value = "Smoking">Smoking</option>
											  </select><br><br>
											  
							Adults: <input type="number" name="numAdults" min="0" max="10"><br><br>
								
							Children: <input type="number" name="numChildren" min="0" max="10"><br><br>
							
							Name: <input type="text" name="nonName"><br><br>
							
							Email: <input type="text" name="nonEmail"><font color=red>(to be emailed for further information)</font><br><br>
							
							Phone Number: <input type="text" name="nonPhone"><font color=red>(to be contacted for further information)</font><br><br>
							
							Special Requirements: <textarea name="nonSpecialReq" style="width:100%; height:200px;"></textarea><br><br>
						</div>
							
							<br>
							
							<div id="helper">

								For record purposes, please fill in these form:<br><br>
								
								Hotel Booking ID:
								<input type="text" id="pID" name="manualBookID" value="<?php $rID = mt_rand(100001,999999);//this will generate 6 random numbers
								echo $rID;?>" maxlength="7" size="7" READONLY> 
								<br><br>
							
								Name: <input type="text" name="nonNameManual"><br><br>
							
								Email: <input type="text" name="nonEmailManual"> <font color=red>(to be emailed for further information)</font><br><br>
							
								Phone Number: <input type="text" name="nonPhoneManual"><font color=red> (to be contacted for further information)</font><br><br>
							
								Booked Hotel Name: <input type="text" name="bookedHotel"><br><br>
								
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
								
								Amount Paid (RM): <input type="number" name="bookAmtPaid" id="bookAmtPaid" min="0" step="0.01" maxwidth="" autocomplete=off><br><br>
								
								<iframe src="http://www.cleartrip.com/hotels"  allowTransparency='true' align="middle" width="800px" height="800px" frameborder="1" scrolling="yes"></iframe>
							
						
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
							<br><br>	
						<hr>
						
					
						
					<div id="tourBookings">
							Tour Booking ID:
								<input type="text" id="pID" name="tourBookingID" value="<?php $rID = mt_rand(100001,999999);//this will generate 6 random numbers
								echo $rID;?>" maxlength="7" size="7" READONLY> 
								<br><br>
								
								
								
							Name: <input type="text" name="nonNameTour"><br><br>
						
							Email: <input type="text" name="nonEmailTour"><font color=red>(to be emailed for further information)</font><br><br>
						
							Phone Number: <input type="text" name="nonPhoneTour"><font color=red> (to be contacted for further information)</font><br><br>
							
							<?php
									//selects all user in the User table that have the status of the student and staff only because there's gonna be only one admin and he/she cannot delete himself/herself
									$SQLquery = "SELECT * from tbltour";
									$QueryResult =  $conn->query($SQLquery);
									
									if($QueryResult->num_rows == 0)
										{
											//echo "<p style=\"text-align: center;\">No user records to display.</p>";//displays the message if there are no user registered
										}
									else
										{
											$numrow = $QueryResult->num_rows;
											
											//creates a form and a table to display the users
											echo "<table border=\"1\"  >";
											echo "<col width=\"280\" ><col width=\"280\"><col width=\"120\"><col width=\"100\"><col width=\"120\">";
											echo "<tr id=tHeader><td >Tour Name</td><td>Tour Location</td><td>Price per pax (RM)</td><td>Duration</td><td>Start Time</td>";				
											

											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
												{

													echo "<tr><td>".$row['tour_name']. "</td><td>"  .$row['tour_location']. "</td><td>" .$row['tour_price']. "</td><td>" .$row['tour_duration']. "</td><td>" .$row['tour_starttime']. "</td>";		
												}
												
												
											echo "</table>";
										}
							?><br>
							
							
							
							Select tour:
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
		
			<input type="submit" name="Submit" value="Proceed to Booking Summary >>" class="myButton" onclick="return confirm('Are you sure?');">
</fieldset>
	</form>
</div>
	  <div id="comments">
        
      </div>
    </div><br>
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
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>