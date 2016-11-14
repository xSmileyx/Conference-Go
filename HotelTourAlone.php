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


	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDig83sIOyi0hetUYaoD1_4IdmbIT2FGWc&libraries=places"></script>
	<script src="https://www.jscache.com/wejs?wtype=socialButtonIcon&amp;uniq=221&amp;locationId=298309&amp;color=green&amp;size=rect&amp;lang=en_US&amp;display_version=2"></script>	
	<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
	
	
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
<!-- 	<script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
 -->	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<style>


.dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.dropdown:hover .dropbtn {
    background-color: red;
}

.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

::-webkit-scrollbar { 
    display: none; 
}


.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1; cursor: pointer;}

.dropdown:hover .dropdown-content {
	cursor: hand;
    display: block;
}
</style>

<body id="top">

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_right">
      <ul class="nospace inline pushright">
		 <li class="dropdown"><i class="fa fa-envelope"></i> Inbox
				<div class="dropdown-content" style='overflow-y:scroll; height:200px;'>
				<?php
					$SQLquery = "SELECT * FROM tblnotifications WHERE p_id = '$logID'";
					$QueryResult = $conn->query($SQLquery);
					
					if($QueryResult->num_rows == 0)
						{
							echo "<a>No messages at the moment</a>";
							
						}
					else
						{
							while(($row = $QueryResult->fetch_assoc()) != false)
							{
								$title = $row["notification_title"];
							
								echo "<a data-id=\"".$row['n_id']."\" data-toggle=\"modal\" data-target=\"#myMsgModal\" class=\"open-message\">" .$title. "</a>";
							}
							
						}
		?>
				 
				</div>
			  </li>
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
       <h1><a href="../test2/dashboardParticipant.php">Conference management system</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
   

            <li><a href="dashboardParticipant.php">Home</a></li>
        <li><a href="chooseConfe.php">Participate</a></li>
		<li><a href="HotelTourAlone.php">Hotel / Tour Booking</a></li>
		<li><a href="cancelParticipation.php">Manage Participation & Bookings</a></li>
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
  <main class="hoc container clear" style="width:600px; margin-right:40%;"> 
    <!-- main body -->

	<form action="processHotelTourAlone.php" method="post" name="pForm" id="participation" >
				<fieldset style='width:200%;'>
				<legend></legend>
			      <legend>Hotel Reservation / Request Form</legend><br>
			      
					Do you require accommodation?<br>
					<div class="some-class" >
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
						
							<strong>Hotel Reservation Request ID </strong>: 
								<input type="text" id="pID" name="reqID" style='display: inline-block;' value="<?php 
									
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
											  
							<strong>From</strong> <input type="date" class="twitter" name="stayFrom" style='display: inline-block; text-align:center;' id="from">
							<strong>until</strong> <input type="date"  class="twitter" style='display: inline-block; text-align:center;' name="stayTo" id="to"><br><br>
							
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
							document.getElementById('to').value = new Date().toDateInputValue();	
							document.getElementById('to').setAttribute("min", new Date().toDateInputValue());
							
							</script>
							
							<strong>Hotel</strong> : 
								<?php 

									$SQLquery = "SELECT * FROM tblhotel";

									$QueryResult = $conn->query($SQLquery);
									echo "<select name=\"bHotel\" id=\"bHotel\" class=\"twitter\" style='display:inline-block; width:auto; text-align:center;' onChange=\"getRooms(this.value);\"	>
											<option value = \"\"> Select Hotel </option>";
									if($QueryResult->num_rows == 0)
										{
											echo "<option value = \"\"> --</option>";
										}
									else
										{
											while(($row = $QueryResult->fetch_assoc()) != false)
											{
												$hotel_id = $row["hotel_id"];
												$hotel_name = $row["hotel_name"];
											
												echo "<option value = '".$hotel_id."'> " .$hotel_name. "</option>";
											}
										}
										
									echo "</select>
									<a data-toggle=\"modal\" data-target=\"#myModal\" class=\"open-hotel-details\"><i class=\"fa fa-info-circle\" style=' color:#373737' aria-hidden=\"true\"></i></a>";
									?>
								<hr style="width: 1px; height: 20px; ">
							<strong>Preferred Room Type</strong>:
									<select name="pRoom" id="rooms-list" class="twitter" style='display:inline-block; width:auto; text-align:center;'>
										<option value=""> -- </option>
									</select>
									
							<script>
								function getRooms(val) {
									$.ajax({
									type: "POST",
									url: "fetchrooms.php",
									data:'hotelID='+val,
									success: function(data){
										$("#rooms-list").html(data);
									}
									});
								}
								</script>
							
											
							<strong>Adults </strong>: <input type="number" class="twitter" name="numAdults" min="0" max="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
														     maxlength = "2" style='display: inline-block; width:auto; text-align:center;'>
								
							<strong>Children </strong>: <input type="number" class="twitter" name="numChildren" min="0" max="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
														       maxlength = "2" style='display: inline-block; width:auto; text-align:center;'><br><br>
	
							
							<strong>Room Requirement </strong>: <select class="twitter" name="rRequirement" style='display: inline-block; text-align:center;'>
																		<option value = "No Preferences">No Preferences</option>
																		<option value = "Non smoking">Non smoking</option>
																		<option value = "Smoking">Smoking</option>
																</select><br><br>
							
							<strong>Name </strong>: <?php echo $logFirstName; echo " ". $logSurName; ?><br><br>
							
							<strong>Country </strong>: <?php echo $logCountry;?><br><br>
							
							<strong>Email </strong>: <?php echo $logEmail; ?> <font color=red>(to be emailed for further information)</font><br><br>
							
							<strong>Phone Number </strong>: <?php echo $logPhone; ?> <font color=red>(to be contacted for further information)</font><br><br>
							
							<strong>Special Requirements </strong>: <textarea name="specialReq" style="width:100%; height:200px;" class="twitter"></textarea><br><br>
						</div>
							
							<br>
							<!-- 
							<div id="helper">

								For record purposes, please fill in these form:<br><br>
								
							Hotel Booking ID:
								<input type="text" id="pID" name="manualBookID" value="<?php 
									
									// //configuration script
									// include("config.php");
									// $rID = mt_rand(100001,999999);//this will generate 6 random numbers
								
									
									// //selects all the table's variables to search if there's a match 
									// $SQLquery = "SELECT * FROM tblbookingdetails WHERE booking_id LIKE '$rID'";
									// $QueryResult =  $conn->query($SQLquery);
								
									
									// if($QueryResult->num_rows == 0)
										// {
											// echo "$rID";//prints the reference into the value in the text box if it did not find any matches
										// }
									// else
										// {
											// // output data of each row
											// while(($row = $QueryResult->fetch_assoc()) != false)
												// {
													// $checkID = $row['booking_id'];//initialize the matched purchase code into a variable
								
													// if($checkID == $rID)//compares if it matches the randomly generated reference ID 
														// {
															// $rID = mt_rand(100001,999999);//generates again if it matched and will generate another if it still matches
															// echo "$rID";//prints the reference ID into the value in the text box
														// }
													
												// }
										// }
									
									
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
								
								<iframe src="http://www.cleartrip.com/hotels"  allowTransparency='true' align="middle" width="800px" height="800px" frameborder="1" scrolling="yes"></iframe>
 						
						
							</div> -->
							
			<!-- 				Do you want to book manually?<br>
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
						</script> -->
						
							
							
							
						</div>
						
						<script type="text/javascript">
							// function clicked(e)
								// {
									// if(confirm('Are you sure?')) {alert('You have succesfully participated the event! Your participant ID: 4758642');}
									// else {e.preventDefault();}
								// }
						</script>
						
				
<hr>
<!--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
			
		
			      <legend>Tour Reservation Selection</legend><br>
				  
				  Do you want to book a tour?<br>
						<div class="some-class">
							<input type="radio" name="rTour" id="tourYes" value="Yes" autocomplete=off /><label>Yes</label>
							<input type="radio" name="rTour" id="tourNo" value="No" autocomplete=off /><label>No</label>
						</div>	
						<br><br>	
					
					<div id="tourBookings">
							
							<strong>Name </strong>: <?php echo $logFirstName; echo " ". $logSurName; ?><br><br>
							
							<strong>Country </strong>: <?php echo $logCountry; ?><br><br>
							
							<strong>Email </strong>: <?php echo $logEmail; ?> <font color=red>(to be emailed for further information)</font><br><br>
							
							<strong>Phone Number </strong>: <?php echo $logPhone; ?> <font color=red>(to be contacted for further information)</font><br><br>	
								

		

								
							
	  <table border='1px'  >
           
            <tr id=tHeader>
            <th style="text-align:center;">Tour Listing</th>
            <th>Price (RM)</th>
            <th>Commencement Date</th>
			<th> Action</th>
			</tr>

			
			<form  method="post" name="pForm" id="participation">
            <?php
					
					$date = date('Y-m-d');
			
					$commencement = date('Y-m-d', strtotime($date. ' + 1 days'));
	
					$sql = "SELECT * FROM tbltour";
					$QueryResult = $conn->query($sql);
						
					while(($row = $QueryResult->fetch_assoc()) != false)
					{
						
						$sql = "SELECT * FROM tbltour";
						$QueryResult = $conn->query($sql);
						
						while(($row = $QueryResult->fetch_assoc()) != false)
						{
							//$rID = mt_rand(100001,999999);
			
							$tourID = $row["tour_id"];
							$name = $row["tour_name"];
							$location = $row["tour_location"];
							$startTime = $row["tour_starttime"];
							$duration = $row["tour_duration"];
							$price = $row["tour_price"];						
							
							//echo "<tr><td style='vertical-align:middle;'>$rID</td><input type='hidden' name='tourBookingID[]' value='$rID'/>";
							echo "<td bgcolor='#FFFFFF' width='70%' style='text-align:center;' >
									<strong>Tour Name</strong>: $name<a data-id='" .$tourID. "' data-toggle=\"modal\" data-target=\"#myModal\" class=\"open-details\"><i class=\"fa fa-info-circle\" style='float:right; color:#373737' aria-hidden=\"true\"></i></a>
									<br />
									<strong>Location</strong>: $location
									<br/>
									<strong>Start Time</strong>: $startTime
									<br/>
									<strong>Duration</strong>: $duration hour(s)
							</td>";
							echo "<td bgcolor='#FFFFFF' style='vertical-align:top;'>
									<br/>
									$price<br>  
							</td>";
							echo "<td bgcolor='#FFFFFF' style='vertical-align:top;'>
									<br/>
									<input type=\"date\" id='date" .$tourID. "' class=\"twitter\" name='tourDate" .$tourID. "' style='display: inline-block; text-align:center; width:100%;' disabled><br>  
							</td>";
							echo "<td bgcolor='#FFFFFF' width='10%' style='vertical-align:top;'><br/><input type=\"checkbox\" id=\"chosenTour[]\" name=\"chosenTour[]\" value=\"$tourID\" style='margin-left:auto; margin-right:auto;' onchange=\"if(this.checked){document.getElementById('date" .$tourID. "').disabled = false; document.getElementById('date" .$tourID. "').value = '".$commencement."';	}else{document.getElementById('date" .$tourID. "').disabled = true; document.getElementById('date" .$tourID. "').value = '';}\"/> </tr>";
							
							echo "<script>
								
								
								
							Date.prototype.toDateInputValue = (function() {
								var local = new Date(this);
								local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
								return local.toJSON().slice(0,10);
							});
								
								
							
							document.getElementById('date" .$tourID. "').setAttribute(\"min\", '".$commencement."');
							document.getElementById('date" .$tourID. "').setAttribute(\"max\", '".$row['validity']."');</script>";
						}
					}
					echo "	</table>";
				
	   		?><br>
							
						
						
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
		

							<input type="submit" name="Submit" value="Proceed to Participation / Booking Summary >>" class="button" style="float:right;" onclick="return confirm('Are you sure?');">
</fieldset>
	</form>

	 <!-- Modal -->
  <div class="modal hide" data-easein="fadeInDown" data-easeout="fadeOutDown" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="myModal" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
        </div>
        <div class="modal-body">
		  <div id="details"></div>
        </div>		
        <!--<div class="modal-footer">
		<hr>
        </div>-->
		<br><br><br>
      </div>
    </div>
  </div>
  
  
	  <script>
	  $(document).on("click", ".open-details", function () {
		 var pID = $(this).data('id');
		 
			 if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("details").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET","fetchtourdetails.php?rowid="+pID,true);
			xmlhttp.send();
	});
	  </script>	
	  
	  	  <script>
	  $(document).on("click", ".open-hotel-details", function () {
		 var e = document.getElementById("bHotel");
			var pID = e.options[e.selectedIndex].value;
		 
			 if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("details").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET","fetchhotel.php?rowid="+pID,true);
			xmlhttp.send();
	});
	  </script>	

 <!-- Modal -->
  <div class="modal hide" data-easein="fadeInDown" data-easeout="fadeOutDown" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="myMsgModal" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content"  style=' overflow-y:scroll; width:500px; height:250px;'>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
        </div>
        <div class="modal-body">
		  <div id="msgdetails"></div>
        </div>

        <!--<div class="modal-footer">
        </div>-->
      </div>
    </div>
  </div>
  
   <script>
	  $(document).on("click", ".open-message", function () {
		 var nID = $(this).data('id');
		 
			 if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("msgdetails").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET","fetchmessage.php?nid="+nID,true);
			xmlhttp.send();
	});
	  </script>	  
	  
	  
   
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
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>