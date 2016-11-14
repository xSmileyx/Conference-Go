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
		
	
	$confID = $_POST["pConference"];
	$_SESSION["chosen_conference_id"] = $confID;

	
?>

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
<title>Participation Form</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
<!-- 	<script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
 -->	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	
	<script type="text/javascript">
		function stopReloadKey(evt) 
			{
			  var evt = (evt) ? evt : ((event) ? event : null);
			  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
			  if (evt.keyCode == 13)  
				{
					return false;
				}
			}

		document.onkeypress = stopReloadKey;

		
		function toggle(bool) 
			{
				document.getElementById("fqtName").disabled = bool;
				document.getElementById("fqtName").value = '';
				
				document.getElementById("fqnAmount").disabled = bool;
				document.getElementById("fqnAmount").value = '';
			}
		</script>


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


<body id="top" onload ="document.getElementById('pac-input').focus()">

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

    <!--      <li><a href="dashboardParticipant.php">Home</a></li>
        <li><a href="chooseConfe.php">Participate</a></li>
		<li><a href="HotelTourAlone.php">Hotel / Tour Booking</a></li>
		<li><a href="cancelParticipation.php">Cancel Participation & Booking</a></li>
		<li><a href="Feedback.php">Provide Feedback</a>
		<li><a  href="Enquiries.php">Send Enquiries</a></li> -->
          
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
    

<div id="body"  >
		<form action="processParticipate.php" method="post" name="pForm" id="participation"   >
		<fieldset style="width:100%;">
			     <h1>Participation Form</h1><hr>
						Welcome, <?php echo "<font style='font-weight:bold;'>".$logFirstName; echo " ". $logSurName. "</font>";?>!
						<br><br>
						
						<input type="hidden" name="title" value="<?php $SQLquery = "SELECT * FROM tblconference WHERE conf_id LIKE '$confID'";

								$QueryResult = $conn->query($SQLquery);
								
								if($QueryResult->num_rows == 0)
									{
										echo "<option value = \"\"> --</option>";
									}
								else
									{
										while(($row = $QueryResult->fetch_assoc()) != false)
										{
											echo $row['conf_name'];
										}
									}											?>">
						<font style='font-weight:bold;'>Reference Number:</font>
								<input type="text" id="pID" name="refNum" value="<?php 
									
									//configuration script
									include("config.php");
									$rID = mt_rand(100001,999999);//this will generate 6 random numbers
								
									
									//selects all the table's variables to search if there's a match 
									$SQLquery = "SELECT confpass_reference FROM tblconf_participant WHERE confpass_reference LIKE '$rID'";
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
													$checkID = $row['confpass_reference'];//initialize the matched purchase code into a variable
								
													if($checkID == $rID)//compares if it matches the randomly generated reference ID 
														{
															$rID = mt_rand(100001,999999);//generates again if it matched and will generate another if it still matches
															echo "$rID";//prints the reference ID into the value in the text box
														}
													
												}
										}
									
									
								?>" maxlength="7" size="7" READONLY> 
								<br>
						<font style='font-weight:bold;'>Venue:</font>
							<?php 

								$SQLquery = "SELECT * FROM tblconference WHERE conf_id LIKE '$confID'";

								$QueryResult = $conn->query($SQLquery);
								
								if($QueryResult->num_rows == 0)
									{
										echo "<option value = \"\"> --</option>";
									}
								else
									{
										while(($row = $QueryResult->fetch_assoc()) != false)
										{
											$conferenceVenueID = $row['venue_id'];						
											$SQLquery = "SELECT * FROM tblvenue WHERE venue_id LIKE '$conferenceVenueID'";
											
											$QueryResult = $conn->query($SQLquery);
											
											if($QueryResult->num_rows == 0)
												{
													//echo "<option value = \"\"> --</option>";
												}
											else
												{
													while(($row = $QueryResult->fetch_assoc()) != false)
														{
															$VenueName = $row['venue_name'];
															echo $VenueName;
															
															$_SESSION["pVenue"] = $VenueName;
														}
												}
										}
									}

							?><br><br>
							<form id='aa' name='aa'>
							
							<!--Google Map<input type="checkbox" name="sLocation" id="searchLocation" value="sl" autocomplete=off><br>-->
							
							<input id="pac-input" class="controls" type="text" onblur="auto();" style="height:30px;" placeholder="Search Box" value="<?php 

								$SQLquery = "SELECT * FROM tblconference WHERE conf_id LIKE '$confID'";

								$QueryResult = $conn->query($SQLquery);
								//echo "<select name=\"pConference\" id=\"pConference\">";//creates a select option dropdown box
								
								if($QueryResult->num_rows == 0)
									{
										echo "<option value = \"\"> --</option>";
									}
								else
									{
										while(($row = $QueryResult->fetch_assoc()) != false)
										{
											$conferenceVenueID = $row['venue_id'];						
											$SQLquery = "SELECT * FROM tblvenue WHERE venue_id LIKE '$conferenceVenueID'";
											
											$QueryResult = $conn->query($SQLquery);
											
											if($QueryResult->num_rows == 0)
												{
													echo "<option value = \"\"> --</option>";
												}
											else
												{
													while(($row = $QueryResult->fetch_assoc()) != false)
														{
															$VenueName = $row['venue_name'];
															echo $VenueName;
														}
												}
										}
									}

							?>" autocomplete=off>

							
							</form>
							<script>
							
							function auto()
								{	
									document.forms['aa'].action = "<?php echo $_SERVER['PHP_SELF']; ?>";
									document.forms['aa'].method = "post";
									document.forms['aa'].submit();
								}
							
							</script>
							<div id="map"></div>
							
	
							
							<script>
							function initAutocomplete() 
							{
								var map = new google.maps.Map(document.getElementById('map'), {
								  center: {lat: -33.8688, lng: 151.2195},
								  zoom: 16,
								  mapTypeId: google.maps.MapTypeId.ROADMAP
								});
								var infoWindow = new google.maps.InfoWindow({map: map});

								
								// Try HTML5 geolocation.
								if (navigator.geolocation) {
								  navigator.geolocation.getCurrentPosition(function(position) {
									var pos = {
									  lat: position.coords.latitude,
									  lng: position.coords.longitude
									};

									infoWindow.setPosition(pos);
									infoWindow.setContent('Location found!');
									map.setCenter(pos);
								  }, function() {
									handleLocationError(true, infoWindow, map.getCenter());
								  });
								} else {
								  // Browser doesn't support Geolocation
								  handleLocationError(false, infoWindow, map.getCenter());
								}
							  


								// Create the search box and link it to the UI element.
								var input = document.getElementById('pac-input');
								var val = document.getElementById('pac-input').value;
								var searchBox = new google.maps.places.SearchBox(input);
								map.controls[google.maps.ControlPosition.TOP_CENTER].push(input);
								
								// Bias the SearchBox results towards current map's viewport.
								map.addListener('bounds_changed', function() {
								  searchBox.setBounds(map.getBounds());
								});

								var markers = [];
								// Listen for the event fired when the user selects a prediction and retrieve
								// more details for that place.
								searchBox.addListener('places_changed', function() {
								  var places = searchBox.getPlaces();

								  if (places.length == 0) {
									return;
								  }

								  // Clear out the old markers.
								  markers.forEach(function(marker) {
									marker.setMap(null);
								  });
								  markers = [];

								  // For each place, get the icon, name and location.
								  var bounds = new google.maps.LatLngBounds();
								  places.forEach(function(place) {
									var icon = {
									  url: place.icon,
									  size: new google.maps.Size(71, 71),
									  origin: new google.maps.Point(0, 0),
									  anchor: new google.maps.Point(17, 34),
									  scaledSize: new google.maps.Size(25, 25)
									  
									};

									// Create a marker for each place.
									markers.push(new google.maps.Marker({
									  map: map,
									  icon: icon,
									  title: place.name,
									  position: place.geometry.location
									}));

									if (place.geometry.viewport) {
									  // Only geocodes have viewport.
									  bounds.union(place.geometry.viewport);
									} else {
									  bounds.extend(place.geometry.location);
									}
								  });
								  map.fitBounds(bounds);
								   map.setZoom(15);
								});
							}
							</script>
					
	
						<br>
							<font style='font-weight:bold;'>Description: </font>
							<?php 
							
							$SQLquery = "SELECT * FROM tblconference WHERE conf_id LIKE '$confID'";
							
							$QueryResult = $conn->query($SQLquery);
							
							if($QueryResult->num_rows == 0)
								{
									echo "There's no description!";
								}
							else
								{
									while(($row = $QueryResult->fetch_assoc()) != false)
									{
										$conferenceDesc = $row['conf_desc'];
				
										echo $conferenceDesc;
									}
								}
							
							

							?>
						<br>
							<font style='font-weight:bold;'>Date:</font>
							<?php 
							
							$SQLquery = "SELECT * FROM tblconference WHERE conf_id LIKE '$confID'";
							
							$QueryResult = $conn->query($SQLquery);
							
							if($QueryResult->num_rows == 0)
								{
									echo "There's no date!";
								}
							else
								{
									while(($row = $QueryResult->fetch_assoc()) != false)
									{	
										$conferenceStartDate = date('d M Y', strtotime($row['conf_startdate']));
										$conferenceEndDate = date('d M Y', strtotime($row['conf_enddate']));
										
										$startDate = $row['conf_startdate'];
										$endDate = $row['conf_enddate'];
										
										$_SESSION['cStartDate'] = $startDate;
										$_SESSION['cEndDate'] = $endDate;
										
										$start = strtoupper($conferenceStartDate);
										$end = strtoupper($conferenceEndDate);
										echo "<strong>" .$start. "</strong> until <strong>" .$end. "</strong>";
									}
								}
							
							?>	
						<br><br>
							<?php 
							
							$SQLquery = "SELECT * FROM tblconference WHERE conf_id LIKE '$confID'";
							
							$QueryResult = $conn->query($SQLquery);
							
							if($QueryResult->num_rows == 0)
								{
									echo "There's no passtype!";
								}
							else
								{
									while(($row = $QueryResult->fetch_assoc()) != false)
									{	
										//$confID = $row['conf_id'];
										
										$SQLquery = "SELECT * FROM tblpasstype WHERE conf_id LIKE '$confID'";
										$QueryResult = $conn->query($SQLquery);
										
										if($QueryResult->num_rows == 0)
											{
												echo "There's no passtype!<br>";
											}
										else
											{
												echo "<table border=\"1\" style='text-align:center;' >";
												echo "<col width=\"100\"><col width=\"100\"><col width=\"100\">";
													
												echo "<tr id=tHeader ><th>Pass Type</th><th> Price(USD)</th><th> Availability</th>";
												while(($row = $QueryResult->fetch_assoc()) != false)
												{	
													$passType = $row["pass_type"];
													$passPrice = $row["pass_price"];
													$passAvailability = $row["pass_availability"];
													echo "<tr><td>" . $passType. "</td><td>" . $passPrice. "</td><td>" . $passAvailability. "</td></tr>";
												}
												
												echo "</table>";
											}
										
									}
								}
							
							?>
						
						<font style='font-weight:bold;'>Choose a passtype:</font>
							<?php 
			
							$SQLquery = "SELECT * FROM tblconference WHERE conf_id LIKE '$confID'";
							
							$QueryResult = $conn->query($SQLquery);
							
							if($QueryResult->num_rows == 0)
								{
									echo "There's no passtype!";
								}
							else
								{
									while(($row = $QueryResult->fetch_assoc()) != false)
									{	
										//$confID = $row['conf_id'];
										$SQLquery = "SELECT * FROM tblpasstype WHERE conf_id = '$confID'";

										$QueryResult = $conn->query($SQLquery);
										echo "<select name=\"pPassType\" id=\"pPassType\" class=\"twitter\">";//creates a select option dropdown box
										
										if($QueryResult->num_rows == 0)
											{
												echo "<option value = \"\"> --</option>";
											}
										else
											{
												while(($row = $QueryResult->fetch_assoc()) != false)
												{
													$passtypeID = $row["pass_id"];
													$passtypeName = $row["pass_type"];
													echo "<option value = '".$passtypeID."'> " .$passtypeName. "</option>";//sets the values as the foods' name
												}
											}
									}
								}
									
								echo "</select>   ";
							?>
						
						<br><br>
						<font style='font-weight:bold;'>Are you receiving any financial assistance from the organizers / sponsors of the conference?<br></font>
							<div class="some-class">
								<input type="radio" name="fqrOne"  onclick="toggle(false)" value="Yes" autocomplete=off /><label>Yes</label>
								<input type="radio" name="fqrOne" onclick="toggle(true)" value="No" autocomplete=off checked /><label>No</label>
							</div>	
							<br><br>
							

						 
						<font style='font-weight:bold;'>If yes, specify the name of the organization and the amount.<br></font>
							<font style='font-weight:bold;'>Name: </font><input type="text" name="fqtName" id="fqtName" class="twitter" autocomplete=off maxlength="50" style="width:50%;" disabled><br>
						<font style='font-weight:bold;'>Amount (RM): </font><input type="number" name="fqnAmount" id="fqnAmount" class="twitter" min="0" step="0.01" maxwidth="" autocomplete=off disabled><br><br>
							
						<!--Description of Conference Participation (tick wherever necessary):<br>
							<input type="checkbox" name="fqcbDesc1" id="fqcbDesc1" value="Presenting a paper" autocomplete=off>Presenting a paper<br>
							<input type="checkbox" name="fqcbDesc2" id="fqcbDesc2" value="Presenting a keynote or invited address"  autocomplete=off>Presenting a keynote or invited address<br>
							<input type="checkbox" name="fqcbDesc3" id="fqcbDesc3" value="Chairing a session"  autocomplete=off>Chairing a session<br>
							<input type="checkbox" name="fqcbDesc4" id="fqcbDesc4" value="Participating in a symposium"  autocomplete=off>Participating in a symposium<br><br>-->
						
						

	
						<font style='font-weight:bold;'>Select session:<br></font>
						<br>
						Full conference <input type="checkbox" name="fullday" id="fullday"  onClick="full(this)" style="display: inline-block;" autocomplete=off>
						<script>
						function full(source) 
						{
							checkboxes = document.getElementsByClassName('myCheckBox');
							
							for(var i=0, n=checkboxes.length;i<n;i++) 
								{
									checkboxes[i].checked = source.checked;
								}
						}
						</script>
						
						<input type="radio" name="spOne"  onclick="toggleSP(true)" value="Yes" autocomplete=off /><label>I'm a speaker</label>
						<input type="radio" name="spOne" onclick="toggleSP(false)" value="No" autocomplete=off checked /><label>I'm not a speaker</label>
						
						<script>
								function toggleSP(bool) 
									{
										$(document).ready(function() 
										{
											$('input:checkbox[value="Participating in a symposium"]').attr('disabled', bool);
											
											if(bool != false)
											{
												$('input:checkbox[value="Participating in a symposium"]').attr('checked', false);
											}
											else 
											{
												$('input:checkbox[value="Participating in a symposium"]').attr('checked', true);
												
											}
										});
									}
						</script>
							<?php 
							
							$SQLquery = "SELECT * FROM tblconference WHERE conf_id LIKE '$confID'";
							
							$QueryResult = $conn->query($SQLquery);
							
							if($QueryResult->num_rows == 0)
								{
									echo "There's no sessions!";
								}
							else
								{
									while(($row = $QueryResult->fetch_assoc()) != false)
									{	
										//$confID = $row['conf_id'];
										
										$SQLquery = "SELECT tblsession.conf_id, tblsession.session_id, tblsession.session_day, tblsession.session_starttime, 
													 tblsession.session_endtime, tblsession.session_name, tblsession.speaker_id, tblspeaker.speaker_id, 
													 tblspeaker.speaker_firstname,tblspeaker.speaker_lastname FROM tblsession,tblspeaker 
													 WHERE tblsession.conf_id LIKE '$confID' AND tblsession.speaker_id = tblspeaker.speaker_id";
										$QueryResult = $conn->query($SQLquery);
										
										if($QueryResult->num_rows == 0)
											{
												echo "There's no sessions!";
											}
										else
											{
												
												echo "<table border=\"1\" >";
												echo "<col width=\"200\"><col width=\"10\"><col width=\"10\"><col width=\"10\"><col width=\"10\"><col width=\"10\">";
													
												echo "<tr style='text-align:center;'><th>Select type of participation</th><th>Session Name</th><th> Start Time</th><th> End Time </th><th> Date </th><th> Speaker </th>";
												while(($row = $QueryResult->fetch_assoc()) != false)
													{	
														$sessID = $row["session_id"];
														$sessDay = $row["session_day"];
														$sessStart = $row["session_starttime"];
														$sessEnd = $row["session_endtime"];
														$sessName = $row["session_name"];
														$speakerID = $row["speaker_id"];
														$speakerFname = $row["speaker_firstname"];
														$speakerLname = $row["speaker_lastname"];
														
														echo "<tr >
														<td id ='descSession'>
														<input type=\"checkbox\" style='display: inline-block;' name='desc".$sessID."a'  class='myCheckBox' value='Presenting a paper' autocomplete=off>Presenting a paper<br>
														<input type=\"checkbox\" style='display: inline-block;' name='desc".$sessID."b'  class='myCheckBox' value='Presenting a keynote or invited address'  autocomplete=off>Presenting a keynote or invited address<br>
														<input type=\"checkbox\" style='display: inline-block;' name='desc".$sessID."c'  class='myCheckBox' value='Chairing a session'  autocomplete=off>Chairing a session<br>
														<input type=\"checkbox\" style='display: inline-block;' name='desc".$sessID."d'  class='myCheckBox' value='Participating in a symposium'  autocomplete=off>Participating in a symposium<br>
														</td>
														<td style='text-align:center; vertical-align:middle;'>" . $sessName. "</td>
														<td style='text-align:center; vertical-align:middle;'>". $sessStart. "</td>
														<td style='text-align:center; vertical-align:middle;'>" . $sessEnd. "</td>
														<td style='text-align:center; vertical-align:middle;'>" .$sessDay. "</td>
														<td style='text-align:center; vertical-align:middle;'>" .$speakerFname. " "  .$speakerLname. "</td></tr>";	
														
														echo " <input type=\"hidden\" name='".$sessID."' value='".$sessID."'>";
														echo " <input type=\"hidden\" name='name".$sessID."' value='".$sessName."'>";
														echo " <input type=\"hidden\" name='start".$sessID."' value='". $sessStart."'>";
														echo " <input type=\"hidden\" name='end".$sessID."' value='". $sessEnd."'>";
														echo " <input type=\"hidden\" name='day".$sessID."' value='". $sessDay."'>";
														echo " <input type=\"hidden\" name='speaker".$sessID."' value='". $speakerFname." ".$speakerLname. "'>";

													}
													
		
	
											}
									}
								}
								

						echo "</table>";
					
							?><br>
							
															
						Payment Method:
							<select name="pMethod" id="pMethod" autocomplete=off class="twitter">
								<option value=""selected>--</option>
								<option value="Paypal">Paypal</option>
								<option value="Visa/Mastercard">Visa/Mastercard</option>
							</select>
							<br>
											
						<input type="submit" name="Submit" value="Participate >>" class="button" style="float:right;  border: 1px solid black;" id="deez" onclick="return valthis()">
						<button type="reset"  class="button"  style="float:right; background-color:white; color:black;  border: 1px solid black;" value="Reset">Clear</button>
						<button onclick="history.go(-1);" style=" border: 1px solid black;" class="button" value="back"><< Back to Conference Selection</button>

						
						<script type="text/javascript">
							function valthis() {
							var checkBoxes = document.getElementsByClassName( 'myCheckBox' );
							var isChecked = false;
								for (var i = 0; i < checkBoxes.length; i++) {
									if ( checkBoxes[i].checked ) {
										isChecked = true;
									};
								};
								if ( isChecked ) {
									return confirm("Are you sure?");
									} else {
										alert( 'Please check at least one type of participation!' );
										return false;
									}   
							}
						</script>

				
				</fieldset>
				</form>
	
		</div>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDig83sIOyi0hetUYaoD1_4IdmbIT2FGWc&libraries=places&callback=initAutocomplete" async defer></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDig83sIOyi0hetUYaoD1_4IdmbIT2FGWc&libraries=places"></script>
<script src="https://www.jscache.com/wejs?wtype=socialButtonIcon&amp;uniq=221&amp;locationId=298309&amp;color=green&amp;size=rect&amp;lang=en_US&amp;display_version=2"></script>	
<script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
<script src="layout/scripts/jquery.min.js"></script>
<script src="jscss/qrcode.js"></script>
<script src="jscss/node.js"></script>
<script src="jscss/qrcode.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>