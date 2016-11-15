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
			header("location: ../FYP-Participant/index.php");	//redirected to login page if session variable is not destroyed/unset	
			exit();
		}
	date_default_timezone_set("Asia/Kuala_Lumpur");//sets to local(Malaysian) time zone 
	
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
<title>Manage Participation/Booking</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css">

	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
<!-- 	<script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
 -->	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content three_quarter first"> 
      <div class="scrollable">
	<div id="body">
				<form action="../test2/cancelParticipation.php" method="post" name="pCancel" id="pCancel">
						<fieldset>
							  <legend>Manage Participation /  Booking</legend><?php
									
									echo "<h1><center>Participation With Bookings</center></h1>";
									//selects all user in the User table that have the status of the student and staff only because there's gonna be only one admin and he/she cannot delete himself/herself
									$SQLquery = "SELECT * from tblconf_participant WHERE p_id = '$logID'";
									$QueryResult =  $conn->query($SQLquery);
									
									if($QueryResult->num_rows == 0)
										{
											echo "<p style=\"text-align: center;\">No user records to display.</p>";//displays the message if there are no user registered
										}
									else
										{
											echo "<table id=\"table1\" style=\"text-align: center;\">";
											echo "<col width=\"10\"><col width=\"10\"><col width=\"10\"><col width=\"10\"><col width=\"10\"><col width=\"10\">";
											
											echo "<tr id=tHeader style=\" color:white; background: gray;\"><th >Conference Reference Number</th><th >Conference Name</th><th>Start Date</th><th>End Date</th><th>Purchase Date</th><th>Actions</th></tr>";	
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
												{
													$confID = $row["conf_id"];
													$pID = $row["p_id"];
													$refNum = $row["confpass_reference"];
													
											
												}

										}
										
											
									$SQLquery = "SELECT *
												 FROM tblconference,tblconf_participant
												 WHERE tblconference.conf_id = tblconf_participant.conf_id AND tblconf_participant.p_id = '$logID'";
							
									$QueryResult =  $conn->query($SQLquery);
									
									if($QueryResult->num_rows == 0)
										{
											echo "<p style=\"text-align: center;\">No records on conference participation to display.</p>";//displays the message if there are no user registered
										}
									else
										{
												
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
											{
												@$ref = $row["confpass_reference"];
												$passID = $row["pass_id"];
												$dateSD=date_create("".$row['conf_startdate']."");
												$dateED=date_create("".$row['conf_enddate']."");
												$datePD=date_create("".$row['purchase_date']."");
												$dateFSD = date_format($dateSD,"d/m/Y");
												$dateFED = date_format($dateED,"d/m/Y");
												$dateFPD = date_format($datePD,"d/m/Y");
												
												echo "<tr><td>".$ref. "<a data-id='" .$row['conf_id']. "' data-id2='" .$logID. "' data-id3='" .$ref. "' data-toggle=\"modal\" data-target=\"#myModal\" class=\"open-details\"><i class=\"fa fa-info-circle\" style='float:right; color:#373737' aria-hidden=\"true\"></i></a></td>
														  <td>".$row['conf_name']. "</td>
														  <td>".$dateFSD. "</td>
														  <td>".$dateFED. "</td>
														  <td>".$dateFPD. "</td>";

												?>
												<td>													
													<!--DELETE called from the LIST page--> <!--Prompt user for conformation before deletion-->
													<a href = "../test2/cancelParticipation.php?act=delconf&id=<?php echo @$ref; ?>&passid=<?php echo $passID; ?>&confid=<?php echo $row['conf_id']; ?>"><img
													src="img/delete.png" width="16" height="16" title="Delete record" onclick="return confirm('Are you sure that you want to cancel your participation? It will delete the hotel and tour booking corresponding to it.');"/></a>
												</td></tr>
												<?php
											}
											echo "</table><br>";
											
										}
						
									@$SQLquery = "SELECT *
												 FROM tblbookingdetails
												 WHERE tblbookingdetails.p_id = '$logID' AND tblbookingdetails.confpass_reference != ''
												 ORDER BY confpass_reference";
												 
									$QueryResult =  $conn->query($SQLquery);
												 
												 
									if($QueryResult->num_rows == 0)
										{
											echo "<p style=\"text-align: center;\">No hotel booking records to display.</p>";//displays the message if there are no user registered
										}
									else
										{
											echo "<br><table id=\"table1\" style=\"text-align: center;\">";
											echo "<col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"150\">";
											echo "<tr id=tHeader style=\" background: gray;\"><th>Hotel Reservation Request ID</th><th>Conference Reference Number</th><th>Arrival Date</th><th>Departure Date</th><th>Booking Date</th><th>Actions</th></tr>";
												
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
											{
												$dateSD=date_create("".$row['start_date']."");
												$dateED=date_create("".$row['end_date']."");
												$dateBD=date_create("".$row['booking_date']."");
												$dateFSD = date_format($dateSD,"d/m/Y");
												$dateFED = date_format($dateED,"d/m/Y");
												$dateFBD = date_format($dateBD,"d/m/Y");
												
												echo "<tr><td>" .$row['booking_id']. "<a data-id='" .$row['booking_id']. "' data-toggle=\"modal\" data-target=\"#myModal\" class=\"open-reservation-details\"><i class=\"fa fa-info-circle\" style='float:right; color:#373737' aria-hidden=\"true\"></i></a></td>
													      <td>" .$row['confpass_reference']. "</td>
														  <td>".$dateFSD. "</td>
														  <td>"  .$dateFED. "</td>
														  <td>" .$dateFBD. "</td>";		
											
											?>
												<td>
													<!--EDIT called from the LIST page-->
													<a data-id="<?php echo $row['booking_id']; ?> " data-id2="<?php echo $row['confpass_reference']?>" data-id3="<?php echo $row['room_id']?>" data-id4="<?php echo $row['room_requirments']?>" data-toggle="modal" data-target="#myModal" class="open-reservation-update">
													<img src="img/edit.png" width="16" height="16" title="Edit Hotel Booking" /></a>
														&nbsp; &nbsp;
													<!--DELETE called from the LIST page--> <!--Prompt user for conformation before deletion-->
													<a href = "../test2/cancelParticipation.php?act=delhotel&id=<?php echo $row['confpass_reference']; ?>"><img
													src="img/delete.png" width="16" height="16" title="Cancel Hotel Booking" onclick="return confirm('Are you sure that you want to cancel your hotel booking?');"/></a>
												</td></tr>
												</td>
											<?php
											
											}
											
											echo "</table><br>";
											
										}
										
											// $SQLquery =	"SELECT confpass_reference
												// FROM tblbookingdetails
												// ORDER BY confpass_reference DESC";
															// //checks if there's any error on adding the values
										// if ($conn->query($SQLquery) == TRUE)
											// {
												 // //echo "<script language='javascript'>alert('$foodName succesfully added to the menu!');</script>"; 
											// }
										// else 
											// {
												// echo "<font color=red><p>Unable to align the records.<br />
														// Error Code ". $conn->errno." : ". $conn->error." </font></p>";
											// }
										
										
										
										
									@$SQLquery = "SELECT *
												 FROM tbltourbookingdetails
												 WHERE tbltourbookingdetails.p_id = '$logID' AND tbltourbookingdetails.confpass_reference != ''
												 ORDER BY confpass_reference";
									$QueryResult =  $conn->query($SQLquery);
												 
												 
									if($QueryResult->num_rows == 0)
										{
											echo "<p style=\"text-align: center;\">No tour booking records to display.</p>";//displays the message if there are no user registered
										}
									else
										{
											echo "<br><table id=\"table1\" style=\"text-align: center;\">";
											echo "<tr id=tHeader style=\"background:gray;\"><th>Tour Booking ID</th><th>Conference Reference Number</th><th>Tour</th><th>Tour Start Day</th><th>Booking Date</th><th>Actions</th></tr>";
									
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
											{
												$dateSD=date_create("".$row['tour_startday']."");
												$dateBD=date_create("".$row['booking_date']."");
												$dateFSD = date_format($dateSD,"d/m/Y");
												$dateFBD = date_format($dateBD,"d/m/Y");
												
												echo "<tr><td>" .$row['tourbooking_id']. "</td>
												<td>" .$row['confpass_reference']. "</td>
												<td  width='50%'>
													  <strong>Tour Name</strong>: " .$row["tour_name"]. "<a data-id='" .$row['tour_id']. "' data-toggle=\"modal\" data-target=\"#myModal\" class=\"open-tour-details\"><i class=\"fa fa-info-circle\" style='float:right; color:#373737' aria-hidden=\"true\"></i></a>
													  <br />
													  <strong>Location</strong>: " .$row['tour_location']. "
													  <br/>
													  <strong>Start Time</strong>: " .$row['tour_starttime']."
													  <br/>
													  <strong>Duration</strong>: " .$row['tour_duration']. " hour(s)
												</td>
												<td>"  .$dateFSD. "</td>
												<td>" .$dateFBD. "</td>";

																							
											
											?>
												<td>
													<!--EDIT called from the LIST page-->
													<a data-id="<?php echo $row['tourbooking_id']; ?> " data-id2="<?php echo $row['confpass_reference']?>" data-id3="<?php echo $row['tour_id']?>" data-toggle="modal" data-target="#myModal" class="open-tour-update">
													<img src="img/edit.png" width="16" height="16" title="Edit Hotel Booking" /></a>
														&nbsp; &nbsp;
													
													<!--DELETE called from the LIST page--> <!--Prompt user for conformation before deletion-->
													<a href = "../test2/cancelParticipation.php?act=deltour&id=<?php echo  $row['confpass_reference'];?>&tid=<?php echo  $row['tourbooking_id'];?>"><img
													src="img/delete.png" width="16" height="16" title="Cancel Hotel Booking" onclick="return confirm('Are you sure that you want to cancel your tour booking?');"/></a>
												</td></tr>
												</td>
											<?php
											}
											
											echo "</table>";
											
										}
										
											$SQLquery =	"SELECT confpass_reference
												FROM tbltourbookingdetails
												ORDER BY confpass_reference DESC";
															//checks if there's any error on adding the values
										if ($conn->query($SQLquery) == TRUE)
											{
												 //echo "<script language='javascript'>alert('$foodName succesfully added to the menu!');</script>"; 
											}
										else 
											{
												echo "<font color=red><p>Unable to align the records.<br />";
												
											}
											
/*-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
											
									echo "<hr><h1><center>Standalone Bookings</center></h1>";		
									$SQLquery = "SELECT DISTINCT *
												 FROM tblbookingdetails
												 WHERE tblbookingdetails.p_id = '$logID' AND tblbookingdetails.confpass_reference IS NULL
												 GROUP BY tblbookingdetails.booking_date DESC";
												 
												 
									$QueryResult =  $conn->query($SQLquery);
												 
												 
									if($QueryResult->num_rows == 0)
										{
											echo "<p style=\"text-align: center;\">No standalone hotel reservation records to display.</p>";//displays the message if there are no user registered
										}
									else
										{
											echo "<table border=\"1\" style=\"text-align: center;\">";
											echo "<col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"150\">";
											echo "<tr id=tHeader style=\" background: gray;\"><th>Hotel Reservation Request ID</th><th>Arrival Date</th><th>Departure Date</th><th>Booking Date</th><th>Actions</th></tr>";
												
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
											{
												$dateSD=date_create("".$row['start_date']."");
												$dateED=date_create("".$row['end_date']."");
												$dateBD=date_create("".$row['booking_date']."");
												$dateFSD = date_format($dateSD,"d/m/Y");
												$dateFED = date_format($dateED,"d/m/Y");
												$dateFBD = date_format($dateBD,"d/m/Y");
												
												echo "<tr ><td>" .$row['booking_id']. "<a data-id='" .$row['booking_id']. "' data-toggle=\"modal\" data-target=\"#myModal\" class=\"open-reservation-details\"><i class=\"fa fa-info-circle\" style='float:right; color:#373737' aria-hidden=\"true\"></i></a></td>														
														   <td>".$dateFSD. "</td>
														   <td>"  .$dateFED. "</td>
														   <td>" .$dateFBD. "</td>";		
																																	?>
												<td>
													<!--EDIT called from the LIST page-->
													<a data-id="<?php echo $row['booking_id']; ?> " data-id2="" data-id3="<?php echo $row['room_id']?>" data-id4="<?php echo $row['room_requirments']?>" data-toggle="modal" data-target="#myModal" class="open-reservation-update">
													<img src="img/edit.png" width="16" height="16" title="Edit Hotel Booking" /></a>
														&nbsp; &nbsp;
														
													<!--DELETE called from the LIST page--> <!--Prompt user for conformation before deletion-->
													<a href = "../test2/cancelParticipation.php?act=delH&id=<?php echo $row['booking_id']; ?>"><img
													src="img/delete.png" width="16" height="16" title="Cancel Hotel Booking" onclick="return confirm('Are you sure that you want to cancel your standalone hotel booking?');"/></a>
												</td></tr>
												</td>
											<?php
											
											}
											
											echo "</table><br>";
											
										}
										
											$SQLquery =	"SELECT confpass_reference
												FROM tblbookingdetails";
															//checks if there's any error on adding the values
										if ($conn->query($SQLquery) == TRUE)
											{
												 //echo "<script language='javascript'>alert('$foodName succesfully added to the menu!');</script>"; 
											}
										else 
											{
												echo "<font color=red><p>Unable to align the records.<br />
														Error Code ". $conn->errno." : ". $conn->error." </font></p>";
											}
									
									$SQLquery = "SELECT DISTINCT *
												 FROM tbltourbookingdetails
												 WHERE tbltourbookingdetails.p_id = '$logID' AND tbltourbookingdetails.confpass_reference IS NULL";
									$QueryResult =  $conn->query($SQLquery);
												 
												 
									if($QueryResult->num_rows == 0)
										{
											echo "<p style=\"text-align: center;\">No standalone tour booking records to display.</p>";//displays the message if there are no user registered
										}
									else
										{
											echo "<br><table border=\"1\" style=\"text-align: center;\">";
											echo "<col width=\"150\"><col width=\"150\"><col width=\"200\"><col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"150\">";
											echo "<tr id=tHeader style=\"background:gray;\"><th>Tour Booking ID</th><th>Tour</th><th>Tour Start Day</th><th>Booking Date</th><th>Actions</th></tr>";
									
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
											{
												$dateSD=date_create("".$row['tour_startday']."");
												$dateBD=date_create("".$row['booking_date']."");
												$dateFSD = date_format($dateSD,"d/m/Y");
												$dateFBD = date_format($dateBD,"d/m/Y");
												
												echo "<tr><td>" .$row['tourbooking_id']. "</td>
												<td  width='50%'>
													  <strong>Tour Name</strong>: " .$row["tour_name"]. "<a data-id='" .$row['tour_id']. "' data-toggle=\"modal\" data-target=\"#myModal\" class=\"open-tour-details\"><i class=\"fa fa-info-circle\" style='float:right; color:#373737' aria-hidden=\"true\"></i></a>
													  <br />
													  <strong>Location</strong>: " .$row['tour_location']. "
													  <br/>
													  <strong>Start Time</strong>: " .$row['tour_starttime']."
													  <br/>
													  <strong>Duration</strong>: " .$row['tour_duration']. " hour(s)
												</td>
												<td>".$dateFSD. "</td>
												<td>" .$dateFBD. "</td>";
												
												?>
												<td>
													<!--EDIT called from the LIST page-->
													<a data-id="<?php echo $row['tourbooking_id']; ?> " data-id2="" data-id3="<?php echo $row['tour_id']?>" data-toggle="modal" data-target="#myModal" class="open-tour-update">
													<img src="img/edit.png" width="16" height="16" title="Edit Hotel Booking" /></a>
														&nbsp; &nbsp;
													
													<!--DELETE called from the LIST page--> <!--Prompt user for conformation before deletion-->
													<a href = "../test2/cancelParticipation.php?act=delT&id=<?php echo $row['tourbooking_id']; ?>"><img
													src="img/delete.png" width="16" height="16" title="Cancel Hotel Booking" onclick="return confirm('Are you sure that you want to cancel your standalone tour booking?');"/></a>
												</td></tr>
												</td>
											<?php
											
											}
											
											echo "</table>";
											
										}
										
											$SQLquery =	"SELECT confpass_reference
												FROM tbltourbookingdetails";
															//checks if there's any error on adding the values
										if ($conn->query($SQLquery) == TRUE)
											{
												 //echo "<script language='javascript'>alert('$foodName succesfully added to the menu!');</script>"; 
											}
										else 
											{
												echo "<font color=red><p>Unable to align the records.<br />";
												
											}
									
								?><br><br>
							<!--Please enter the Reference Number you want to delete:
							<input type="text" name="idRemove" id="idRemove" required> <br><input type="submit" class="backButton" onclick="return confirm('Are you sure you want to delete that?');" name="submit" value="Delete">-->
						</fieldset>
				</form>
			</div>
			
		


			
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
        </div><br><br>
        <!--<div class="modal-footer">
	
        </div>-->
      </div>
    </div>
  </div>
  
  
	  <script>
	  $(document).on("click", ".open-details", function () {
		 var cID = $(this).data('id');
		 var pID = $(this).data('id2');
		 var refID = $(this).data('id3');
		 
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
			xmlhttp.open("GET","fetchsessions.php?cid="+cID+"&pid="+pID+"&refid="+refID,true);
			xmlhttp.send();
	});
	  </script>			
	    <script>
	  $(document).on("click", ".open-tour-details", function () {
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
	  $(document).on("click", ".open-reservation-details", function () {
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
			xmlhttp.open("GET","fetchreservationdetails.php?rowid="+pID,true);
			xmlhttp.send();
	});
	  </script>		  

	    <script>
	  $(document).on("click", ".open-tour-update", function () {
		 var tbID = $(this).data('id');
		 var cPass = $(this).data('id2');
		 var tID = $(this).data('id3');
		 
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
			
		if(cPass == "")
		{
			xmlhttp.open("GET","fetchUpdateTour.php?tbid="+tbID+"&tid="+tID,true);
			xmlhttp.send();
		}
		else
		{
			xmlhttp.open("GET","fetchUpdateTour.php?tbid="+tbID+"&cpass="+cPass+"&tid="+tID,true);
			xmlhttp.send();
		}
	});
	  </script>		 

	    <script>
	  $(document).on("click", ".open-reservation-update", function () {
		 var bID = $(this).data('id');
		 var conPass = $(this).data('id2');
		 var rID = $(this).data('id3');
		 var rRequirement = $(this).data('id4');
		 
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
			
		if(conPass == "")
		{
			xmlhttp.open("GET","fetchUpdateReservation.php?bid="+bID+"&rid="+rID+"&rrequirement="+rRequirement,true);
			xmlhttp.send();
		}
		else
		{
			xmlhttp.open("GET","fetchUpdateReservation.php?bid="+bID+"&cpass="+conPass+"&rid="+rID+"&rrequirement="+rRequirement,true);
			xmlhttp.send();
		}
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
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
<?php
@$get_act = $_REQUEST['act'];
if($get_act == "delconf")
{
	@$get_conf_ref = $_GET['id'];
	@$get_pass_id = $_GET['passid'];
	@$get_conf_id = $_GET['confid'];
	
	$SQLquery = "SELECT * FROM tblconf_participant WHERE confpass_reference = '$get_conf_ref'";
			
			$QueryResult =  $conn->query($SQLquery);
			
				if($QueryResult->num_rows == 0)
					{
						echo "<script language='javascript'>alert('Reference Number not found!');</script>";
					}
				else
					{
						// output data of each row
						while(($row = $QueryResult->fetch_assoc()) != false)
							{

								$purchaseDate = $row["purchase_date"];
								
								$currentDate = date('Y-m-d');
								$expiryPeriod = strtotime("+5 days");
								$expiryDate = date('Y-m-d', strtotime($purchaseDate. ' + 5 days'));
								
								if($currentDate > $expiryDate)
									{
										echo "<script language='javascript'>alert('Reference Number : $get_conf_ref has reached it\'s refundable date! \\nExpired date : $expiryDate');</script>";
									}
								else
									{
									
										$SQLquery = "DELETE FROM tblconf_participant WHERE confpass_reference = '$get_conf_ref'";
										$conn->query($SQLquery);
										
										/*------------------------------------------------------------------------------------------------------------------*/
										
										$SQLquery = "UPDATE tblpasstype SET pass_availability = pass_availability + 1 WHERE pass_id = '$get_pass_id'";
										$conn->query($SQLquery);
										
										/*------------------------------------------------------------------------------------------------------------------*/

										$SQLquery = "DELETE FROM tblsession_participant WHERE p_id = '$logID' AND conf_id = '$get_conf_id'";

										if($conn->query($SQLquery) === TRUE)
										{
											echo "<script language='javascript'>alert('Reference Number: $get_conf_ref has been successfully deleted! \\nThe Event Manager will contact you for the disclosure of refund.');</script>";
											echo "<script>window.top.location ='../test2/cancelParticipation.php';</script>";   
										}
										else
										{
											echo $sql;
											echo "<br><font color = \"red\">Failed to delete a record.</font>" .mysql_error();
										} 
									}
							}
					}
}
if($get_act == "delhotel")
{
	@$get_conf_id = $_GET['id'];
	
		$SQLquery = "SELECT * FROM tblbookingdetails WHERE confpass_reference = '$get_conf_id'";
			
			$QueryResult =  $conn->query($SQLquery);
			
				if($QueryResult->num_rows == 0)
					{
						echo "<script language='javascript'>alert('Reference Number not found!');</script>";
					}
				else
					{
						// output data of each row
						while(($row = $QueryResult->fetch_assoc()) != false)
							{

								$bookingDate = $row["booking_date"];
								
								$currentDate = date('Y-m-d');
								$expiryPeriod = strtotime("+5 days");
								$expiryDate = date('Y-m-d', strtotime($bookingDate. ' + 5 days'));
								
								if($currentDate > $expiryDate)
									{
										echo "<script language='javascript'>alert('Reference Number : $get_conf_id has reached it\'s refundable date! \\nExpired date : $expiryDate');</script>";
									}
								else
									{
	
										$SQLquery = "DELETE FROM tblbookingdetails WHERE confpass_reference = '$get_conf_id'";

										if($conn->query($SQLquery) === TRUE)
										{
											//echo "<script language='javascript'>alert('Reference Number: $get_conf_id has been successfully deleted! The Event Manager will contact you for the disclosure of refund.');</script>";
											echo "<script>window.top.location ='../test2/cancelParticipation.php';</script>";   
										}
										else
										{
											echo $sql;
											echo "<br><font color = \"red\">Failed to delete a record.</font>" .mysql_error();
										}
									}
							}
					}
}					

if($get_act == "deltour")
{
	@$get_conf_id = $_GET['id'];
	@$get_tour_id = $_GET['tid'];
	$SQLquery = "SELECT * FROM tbltourbookingdetails WHERE confpass_reference = '$get_conf_id'";
			
			$QueryResult =  $conn->query($SQLquery);
			
				if($QueryResult->num_rows == 0)
					{
						echo "<script language='javascript'>alert('Reference Number not found!');</script>";
					}
				else
					{
						// output data of each row
						while(($row = $QueryResult->fetch_assoc()) != false)
							{

								$bookingDate = $row["booking_date"];
								
								$currentDate = date('Y-m-d');
								$expiryPeriod = strtotime("+5 days");
								$expiryDate = date('Y-m-d', strtotime($bookingDate. ' + 5 days'));
								
								if($currentDate > $expiryDate)
									{
										echo "<script language='javascript'>alert('Tour booking ID : $get_tour_id has reached it\'s refundable date! \\nExpired date : $expiryDate');</script>";
									}
								else
									{
										$SQLquery = "DELETE FROM tbltourbookingdetails WHERE tourbooking_id = '$get_tour_id'";

										if($conn->query($SQLquery) === TRUE)
										{
											//echo "<script language='javascript'>alert('Reference Number: $get_conf_id has been successfully deleted! The Event Manager will contact you for the disclosure of refund.');</script>";
											echo "<script>window.top.location ='../test2/cancelParticipation.php';</script>";   
										}
										else
										{
											echo $sql;
											echo "<br><font color = \"red\">Failed to delete a record.</font>" .mysql_error();
										} 
										
									}
							}
					}
}

if($get_act == "delH")
{
	@$get_id = $_GET['id'];
	
	$SQLquery = "DELETE FROM tblbookingdetails WHERE booking_id = '$get_id'";

	if($conn->query($SQLquery) === TRUE)
	{
		//echo "<script language='javascript'>alert('Reference Number: $get_conf_id has been successfully deleted! The Event Manager will contact you for the disclosure of refund.');</script>";
		echo "<script>window.top.location ='../test2/cancelParticipation.php';</script>";   
	}
	else
	{
		echo $sql;
		echo "<br><font color = \"red\">Failed to delete a record.</font>" .mysql_error();
	} 
}
					
if($get_act == "delT")
{
	@$get_id = $_GET['id'];

	$SQLquery = "DELETE FROM tbltourbookingdetails WHERE tourbooking_id = '$get_id'";

	if($conn->query($SQLquery) === TRUE)
	{
 		//echo "<script language='javascript'>alert('Reference Number: $get_conf_id has been successfully deleted! The Event Manager will contact you for the disclosure of refund.');</script>";
		echo "<script>window.top.location ='../test2/cancelParticipation.php';</script>";   
	}
	else
	{
		echo $sql;
		echo "<br><font color = \"red\">Failed to delete a record.</font>" .mysql_error();
	} 
}
	

	// if(isset($_POST["submit"]))//checks if the submit button is selected
		// {
			// //initialize the variable/user's input
			// $id = $_POST['idRemove'];
			
			// //selects the rows of the user that have the matched user ID that has been typed by the admin
			// $SQLquery = "SELECT * FROM tblconf_participant WHERE confpass_reference = '$id'";
			
			// $QueryResult =  $conn->query($SQLquery);
			
				// if($QueryResult->num_rows == 0)
					// {
						// //echo "<script language='javascript'>alert('Reference Number not found!');</script>";
					// }
			// else
				// {
					// // output data of each row
					// while(($row = $QueryResult->fetch_assoc()) != false)
						// {
							// $purchaseDate = $row["purchase_date"];
							
							// $dateToday= new DateTime("2016-06-02");
							// $expiryPeriod = strtotime("+5 days");
							// $expiryDate = date("Y-m-d", $expiryPeriod);
							
							// if($purchaseDate > $expiryDate)
								// {
									// echo "<script language='javascript'>alert('Reference Number: $id has reached it\'s refundable date!');</script>";
								// }
							// else
								// {
									// $SQLquery = "DELETE FROM tblconf_participant  WHERE confpass_reference LIKE '$id'";
						
									// //checks if there's any error on uppdating the values
									// if ($conn->query($SQLquery) === TRUE)
										// {
											// echo "<script language='javascript'>alert('Reference Number: $id has been successfully deleted! The Event Manager will contact you for the disclosure of refund.');</script>";
											// header("Refresh:0");//refreshes the page with the updated table
											// exit();
										// }
									// else 
										// {
											// echo "<font color=red><p>Unable to delete the records.<br />
													// Error Code ". $conn->errno." : ". $conn->error." </font></p>";
										// }
								// }
							
						// }
					

				// }
				
				
				// $SQLquery = "SELECT * FROM tblbookingdetails WHERE booking_id LIKE '$id'";
							 
				// $QueryResult =  $conn->query($SQLquery);
		
				// if($QueryResult->num_rows == 0)
					// {			 
						// //echo "<script language='javascript'>alert('Hotel Booking ID not found!');</script>";
					// }
				// else
					// {
						// // output data of each row
						// while(($row = $QueryResult->fetch_assoc()) != false)
							// {
								// $tourBookedDate = $row["booking_date"];
								
								// $dateToday= new DateTime("2016-06-02");
								// $expiryPeriod = strtotime("+5 days");
								// $expiryDate = date("Y-m-d", $expiryPeriod);
								
								// if($tourBookedDate > $expiryDate)
									// {
										// echo "<script language='javascript'>alert('Hotel Booking ID: $id has reached it\'s refundable date!');</script>";
									// }
								// else
									// {
										// $SQLquery = "DELETE FROM tblbookingdetails  WHERE booking_id LIKE '$id'";
							
										// //checks if there's any error on uppdating the values
										// if ($conn->query($SQLquery) === TRUE)
											// {
												// echo "<script language='javascript'>alert('Hotel Booking ID: $id has been successfully deleted! The Event Manager will contact you for the disclosure of refund.');</script>";
												// header("Refresh:0");//refreshes the page with the updated table
												// exit();
											// }
										// else 
											// {
												// echo "<font color=red><p>Unable to delete the records.<br />
														// Error Code ". $conn->errno." : ". $conn->error." </font></p>";
											// }
									// }
								
							// }
					// }
				
				// $SQLquery = "SELECT * FROM tbltourbookingdetails WHERE tourbooking_id LIKE '$id'";
										 
				// $QueryResult =  $conn->query($SQLquery);

				// if($QueryResult->num_rows == 0)
					// {
						// //echo "<script language='javascript'>alert('Tour Booking ID not found!');</script>";
					// }
				// else
					// {
						// // output data of each row
						// while(($row = $QueryResult->fetch_assoc()) != false)
							// {
								// $tourBookedDate = $row["booking_date"];
								
								// $dateToday= new DateTime("2016-06-02");
								// $expiryPeriod = strtotime("+5 days");
								// $expiryDate = date("Y-m-d", $expiryPeriod);
								
								// if($tourBookedDate > $expiryDate)
									// {
										// echo "<script language='javascript'>alert('Tour Booking ID: $id has reached it\'s refundable date!');</script>";
									// }
								// else
									// {
										

										// $SQLquery = "DELETE FROM tbltourbookingdetails  WHERE tourbooking_id LIKE '$id'";
							
										// //checks if there's any error on uppdating the values
										// if ($conn->query($SQLquery) === TRUE)
											// {
												// echo "<script language='javascript'>alert('Tour Booking ID: $id has been successfully deleted! The Event Manager will contact you for the disclosure of refund.');</script>";
												// header("Refresh:0");//refreshes the page with the updated table
												// exit();
											// }
										// else 
											// {
												// echo "<font color=red><p>Unable to delete the records.<br />
														// Error Code ". $conn->errno." : ". $conn->error." </font></p>";
											// }
									// }
								
							// }
					// }
		// }
?>
</html>