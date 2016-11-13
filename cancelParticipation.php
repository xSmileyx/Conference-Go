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
<title>Cancel Participation/Booking</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css">
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
    <div class="content three_quarter first"> 
      <div class="scrollable">
	<div id="body">
				<form action="../test2/cancelParticipation.php" method="post" name="pCancel" id="pCancel">
						<fieldset>
							  <legend>Cancel Participation /  Booking</legend><?php
									
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
										
											
									$SQLquery = "SELECT tblconference.conf_id, tblconference.conf_name, tblconference.conf_startdate, tblconference.conf_enddate, tblconf_participant.conf_id, tblconf_participant.confpass_reference,tblconf_participant.p_id,tblconf_participant.purchase_date
												 FROM tblconference,tblconf_participant
												 WHERE tblconference.conf_id = tblconf_participant.conf_id AND tblconf_participant.p_id = '$logID'
												 ORDER BY tblconf_participant.purchase_date DESC";
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
												$ref = $row["confpass_reference"];
												echo "<tr><td>".$row["confpass_reference"]. "</td>
														  <td>".$row['conf_name']. "</td>
														  <td>".$row['conf_startdate']. "</td>
														  <td>".$row['conf_enddate']. "</td>
														  <td>".$row['purchase_date']. "</td>";

												?>
												<td>													
													<!--DELETE called from the LIST page--> <!--Prompt user for conformation before deletion-->
													<a href = "../test2/cancelParticipation.php?act=delconf&id=<?php echo $ref; ?>"><img
													src="img/delete.png" width="16" height="16" title="Delete record" onclick="return confirm('Are you sure that you want to cancel your participation?');"/></a>
												</td></tr>
												<?php
											}
											echo "</table><br>";
											
										}
						
									$SQLquery = "SELECT tblbookingdetails.booking_id, tblbookingdetails.p_id, tblbookingdetails.confpass_reference, tblbookingdetails.hotel_name, tblbookingdetails.start_date, tblbookingdetails.end_date, tblconf_participant.p_id,tblconf_participant.confpass_reference,tblbookingdetails.booking_date
												 FROM tblbookingdetails,tblconf_participant
												 WHERE tblbookingdetails.p_id = '$logID' AND tblbookingdetails.confpass_reference = tblconf_participant.confpass_reference ";
									$QueryResult =  $conn->query($SQLquery);
												 
												 
									if($QueryResult->num_rows == 0)
										{
											echo "<p style=\"text-align: center;\">No hotel booking records to display.</p>";//displays the message if there are no user registered
										}
									else
										{
											echo "<br><table id=\"table1\" style=\"text-align: center;\">";
											echo "<col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"150\">";
											echo "<tr id=tHeader style=\" background: gray;\"><th>Hotel Booking ID</th><th>Conference Reference Number</th><th>Hotel Name</th><th>Stay From</th><th>Stay Until</th><th>Booking Date</th><th>Actions</th></tr>";
												
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
											{
												echo "<tr><td>" .$row['booking_id']. "</td><td>" .$row['confpass_reference']. "</td><td>".$row["hotel_name"]. "</td><td>".$row['start_date']. "</td><td>"  .$row['end_date']. "</td><td>" .$row['booking_date']. "</td>";		
											
											?>
												<td>
													<!--EDIT called from the LIST page-->
													<a onclick =" window.open('HotelBookingUpdate.php?act=upd&id=<?php echo $row['confpass_reference']; ?>', '_blank', 'top=250,left=500,width=550,height=300');" >
													<img src="img/edit.png" width="16" height="16" title="Edit Hotel Booking" /></a>
														&nbsp; &nbsp;
													<!--DELETE called from the LIST page--> <!--Prompt user for conformation before deletion-->
													<a href = "../test2/cancelParticipation.php?act=delhotel&id=<?php echo $ref; ?>"><img
													src="img/delete.png" width="16" height="16" title="Cancel Hotel Booking" onclick="return confirm('Are you sure that you want to cancel your hotel booking?');"/></a>
												</td></tr>
												</td>
											<?php
											
											}
											
											echo "</table><br>";
											
										}
										
											$SQLquery =	"SELECT confpass_reference
												FROM tblbookingdetails
												ORDER BY confpass_reference DESC";
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
										
										
										
										
									$SQLquery = "SELECT tbltourbookingdetails.tourbooking_id, tbltourbookingdetails.p_id, tbltourbookingdetails.confpass_reference, tbltourbookingdetails.tour_name, tbltourbookingdetails.tour_location, tbltourbookingdetails.tour_duration, tbltourbookingdetails.tour_starttime,  tblconf_participant.p_id,tblconf_participant.confpass_reference,tbltourbookingdetails.booking_date
												 FROM tbltourbookingdetails,tblconf_participant
												 WHERE tbltourbookingdetails.p_id = '$logID' AND tbltourbookingdetails.confpass_reference = tblconf_participant.confpass_reference";
									$QueryResult =  $conn->query($SQLquery);
												 
												 
									if($QueryResult->num_rows == 0)
										{
											echo "<p style=\"text-align: center;\">No tour booking records to display.</p>";//displays the message if there are no user registered
										}
									else
										{
											echo "<br><table id=\"table1\" style=\"text-align: center;\">";
											echo "<col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"300\"><col width=\"150\"><col width=\"150\"><col width=\"150\">";
											echo "<tr id=tHeader style=\"background:gray;\"><th>Tour Booking ID</th><th>Conference Reference Number</th><th>Tour Name</th><th>Tour Location</th><th>Tour Duration(hours)</th><th>Tour Start Time</th><th>Booking Date</th><th>Actions</th></tr>";
									
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
											{
												echo "<tr><td>" .$row['tourbooking_id']. "</td><td>" .$row['confpass_reference']. "</td><td>".$row["tour_name"]. "</td><td>".$row['tour_location']. "</td><td>"  .$row['tour_duration']. "</td><td>"  .$row['tour_starttime']. "</td><td>" .$row['booking_date']. "</td>";		
											
											?>
												<td>
													<!--EDIT called from the LIST page-->
													<a onclick =" window.open('TourBookingUpdate.php?act=upd&id=<?php echo $row['confpass_reference']; ?>', '_blank', 'top=250,left=500,width=550,height=350');" >
													<img src="img/edit.png" width="16" height="16" title="Edit Hotel Booking" /></a>
														&nbsp; &nbsp;
													
													<!--DELETE called from the LIST page--> <!--Prompt user for conformation before deletion-->
													<a href = "../test2/cancelParticipation.php?act=deltour&id=<?php echo $ref; ?>"><img
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
											
									echo "<hr><h1><center>Standalone Bookings</center></h1>";		
									$SQLquery = "SELECT DISTINCT tblbookingdetails.booking_id, tblbookingdetails.p_id, tblbookingdetails.hotel_name, tblbookingdetails.start_date, tblbookingdetails.end_date, tblconf_participant.p_id,tblbookingdetails.booking_date
												 FROM tblbookingdetails,tblconf_participant
												 WHERE tblbookingdetails.p_id = '$logID' AND tblbookingdetails.confpass_reference IS NULL";
									$QueryResult =  $conn->query($SQLquery);
												 
												 
									if($QueryResult->num_rows == 0)
										{
											echo "<p style=\"text-align: center;\">No standalone hotel booking records to display.</p>";//displays the message if there are no user registered
										}
									else
										{
											echo "<table border=\"1\" style=\"text-align: center;\">";
											echo "<col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"150\">";
											echo "<tr id=tHeader style=\" background: gray;\"><th>Hotel Booking ID</th><th>Hotel Name</th><th>Stay From</th><th>Stay Until</th><th>Booking Date</th><th>Actions</th></tr>";
												
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
											{
												echo "<tr><td>" .$row['booking_id']. "</td><td>".$row["hotel_name"]. "</td><td>".$row['start_date']. "</td><td>"  .$row['end_date']. "</td><td>" .$row['booking_date']. "</td>";		
																																	?>
												<td>
													<!--EDIT called from the LIST page-->
													<a onclick =" window.open('HotelBookingUpdate.php?act=upd&hotelID=<?php echo $row['booking_id']; ?>', '_blank', 'top=250,left=500,width=550,height=200');" >
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
												FROM tblbookingdetails
												ORDER BY confpass_reference DESC";
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
									
									$SQLquery = "SELECT DISTINCT tbltourbookingdetails.tourbooking_id, tbltourbookingdetails.p_id, tbltourbookingdetails.confpass_reference, tbltourbookingdetails.tour_name, tbltourbookingdetails.tour_location, tbltourbookingdetails.tour_duration, tbltourbookingdetails.tour_starttime,  tblconf_participant.p_id,tbltourbookingdetails.booking_date
												 FROM tbltourbookingdetails,tblconf_participant
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
											echo "<tr id=tHeader style=\"background:gray;\"><th>Tour Booking ID</th><th>Tour Name</th><th>Tour Location</th><th>Tour Duration(hours)</th><th>Tour Start Time</th><th>Booking Date</th><th>Actions</th></tr>";
									
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
											{
												echo "<tr><td>" .$row['tourbooking_id']. "</td><td>".$row["tour_name"]. "</td><td>".$row['tour_location']. "</td><td>"  .$row['tour_duration']. "</td><td>"  .$row['tour_starttime']. "</td><td>" .$row['booking_date']. "</td>";		
											
																						?>
												<td>
													<!--EDIT called from the LIST page-->
													<a onclick =" window.open('TourBookingUpdate.php?act=upd&tourID=<?php echo $row['tourbooking_id']; ?>', '_blank', 'top=250,left=500,width=500,height=270');" >
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
									
								?><br><br>
							<!--Please enter the Reference Number you want to delete:
							<input type="text" name="idRemove" id="idRemove" required> <br><input type="submit" class="backButton" onclick="return confirm('Are you sure you want to delete that?');" name="submit" value="Delete">-->
						</fieldset>
				</form>
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
<?php
@$get_act = $_REQUEST['act'];
if($get_act == "delconf")
{
	@$get_conf_id = $_GET['id'];

	$SQLquery = "DELETE FROM tblconf_participant WHERE confpass_reference = '$get_conf_id'";

	if($conn->query($SQLquery) === TRUE)
	{
 		echo "<script language='javascript'>alert('Reference Number: $get_conf_id has been successfully deleted! The Event Manager will contact you for the disclosure of refund.');</script>";
		echo "<script>window.top.location ='../test2/cancelParticipation.php';</script>";   
	}
	else
	{
		echo $sql;
		echo "<br><font color = \"red\">Failed to delete a record.</font>" .mysql_error();
	} 
}
if($get_act == "delhotel")
{
	@$get_conf_id = $_GET['id'];

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
if($get_act == "deltour")
{
	@$get_conf_id = $_GET['id'];

	$SQLquery = "DELETE FROM tbltourbookingdetails WHERE confpass_reference = '$get_conf_id'";

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