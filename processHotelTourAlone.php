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

	
	// if(($_SESSION["sponsor_name"] != NULL) && ($_SESSION["sponsor_amount"] != NULL))
		// {
			// $sponsored = $_SESSION["sponsor_name"];
			// $sponsorAmt = $_SESSION["sponsor_amount"];
		// }
	
	date_default_timezone_set("Asia/Kuala_Lumpur");//sets to local(Malaysian) time zone 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hotel/Tour Booking Summary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />

<style>

.backButton {
	-moz-box-shadow: 0px 0px 0px 0px #cf866c;
	-webkit-box-shadow: 0px 0px 0px 0px #cf866c;
	box-shadow: 0px 0px 0px 0px #cf866c;
	background-color:#d0451b;
	-moz-border-radius:28px;
	-webkit-border-radius:28px;
	border-radius:28px;
	border:1px solid #942911;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Georgia;
	font-size:15px;
	font-weight:bold;
	padding:11px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #854629;
	
}
.backButton:hover {
	background-color:#bc3315;
}
.backButton:active {
	position:relative;
	top:1px;
}


.prButton {
	-moz-box-shadow: 0px 0px 0px 0px #276873;
	-webkit-box-shadow: 0px 0px 0px 0px #276873;
	box-shadow: 0px 0px 0px 0px #276873;
	background-color:green;
	-moz-border-radius:28px;
	-webkit-border-radius:28px;
	border-radius:28px;
	border:1px solid #29668f;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Georgia;
	font-size:15px;
	font-weight:bold;
	padding:11px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #3d768a;
}
.prButton:hover {
	background-color:#408c99;
}
.prButton:active {
	position:relative;
	top:1px;
}


.myButton {
	-moz-box-shadow: 0px 0px 0px 0px #276873;
	-webkit-box-shadow: 0px 0px 0px 0px #276873;
	box-shadow: 0px 0px 0px 0px #276873;
	background-color:#599bb3;
	-moz-border-radius:28px;
	-webkit-border-radius:28px;
	border-radius:28px;
	border:1px solid #29668f;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Georgia;
	font-size:15px;
	font-weight:bold;
	padding:11px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #3d768a;
	
}
.myButton:hover {
	background-color:#408c99;
}
.myButton:active {
	position:relative;
	top:1px;
}

.pButton {
	-moz-box-shadow: 0px 0px 0px 0px #276873;
	-webkit-box-shadow: 0px 0px 0px 0px #276873;
	box-shadow: 0px 0px 0px 0px #276873;
	background-color:white;
	-moz-border-radius:28px;
	-webkit-border-radius:28px;
	border-radius:28px;
	border:1px solid black;
	display:inline-block;
	cursor:pointer;
	color:black;
	font-family:Georgia;
	font-size:15px;
	font-weight:bold;
	padding:11px 31px;
	text-decoration:none;
	text-shadow:0px 1px 0px #3d768a;
}
.pButton:hover {
	background-color:grey;
}
.pButton:active {
	position:relative;
	top:1px;
}

fieldset { border: 1px solid black);
  width: 800px;
  margin:auto;
border:none;  }

legend {
  padding: 0.2em 0.5em;
  border:1px solid green;
  color:black;
  font-size:150%;
  text-align:center;
  }
  
body {
	background: #ffffff;
	margin: 0;
	padding: 20px;
	line-height: 1.4em;
	font-family: tahoma, arial, sans-serif;
	font-size: 100%;
	text-align:center;
}

table {
	width: 80%;
	margin: 0;
	background: #FFFFFF;
	border: 1px solid #333333;
	border-collapse: collapse;
	table-layout: fixed; width: 100%;
	
}

td, th {
	border-bottom: 1px solid #333333;
	padding: 6px 16px;
	text-align:center;
}

th {
	background: #EEEEEE;
}



</style>  
  
</head>
<body>
<?php
if(isset($_POST["Submit"]))//checks if the submit button is selected
	{
			  
			  
		// if($sponsored != NULL & $sponsorAmt != NULL)
			// {			
			  // echo "<b>Sponsored by</b><br> $sponsored <br> Amount sponsored: $sponsorAmt<br>";
			// }			  
/*---------------------------------------------------------------------------------------------------------------------------------------------------*/
		

/*---------------------------------------------------------------------------------------------------------------------------------------------------*/
	

			
/*---------------------------------------------------------------------------------------------------------------------------------------------------*/

		if($_POST["stayFrom"] != "" && $_POST["stayTo"] != "" && $_POST["numAdults"] != "" && $_POST["numChildren"] != " " )
			{
				$reqID = $_POST["reqID"];
				$preferredRoom = $_POST["pRoom"];
				$stayFrom = $_POST["stayFrom"];
				$stayTo = $_POST["stayTo"];
				$roomReq = $_POST["rRequirement"];
				$numAdults = $_POST["numAdults"];
				$numChildren = $_POST["numChildren"];
				
				// $logFirstName = $_SESSION["log_firstname"];
				// $logSurName = $_SESSION["log_surname"];
				// $logEmail = $_SESSION["log_email"];
				// $logPhone = $_SESSION["log_phone"];
				
				$sdate = date('d M Y', strtotime($stayFrom));
				$edate = date('d M Y', strtotime($stayTo));
				
				echo "<fieldset> <legend>HOTEL RESERVATION REQUEST SUMMARY</legend>";
				echo "Name of requester: " .$logFirstName. " " .$logSurName;
				echo "<br>Email of requester: " .$logEmail ;
				echo "<br>Phone number of requester: " .$logPhone;
				echo "<br>Your hotel reservation request ID is ". $reqID;
				echo "<br>Your preferred room is ". $preferredRoom;
				echo "<br>Your hotel stay request is from ". $sdate. " until " .$edate;
			
				echo "<br>Number of adults staying: ". $numAdults;
				echo "<br>Number of Children staying ". $numChildren;
				
		$body = "Hello there, ".$logFirstName. " " .$logSurName. "! You have successfully created a standalone booking(s).<br>Here are the details: <br>";
				
		$body .=  "<br>Hotel Reservation Request (Request ID : " .$reqID. ")
				  <br><b>Name of requester</b> : " .$logFirstName. " " .$logSurName.
				 "<br><b>Email of requester</b> : " .$logEmail. 
				 "<br><b>Phone number of requester</b> : " .$logPhone.
				 "<br><b>Number of adults staying</b> : " .$numAdults.
				 "<br><b>Number of Children staying</b> : " .$numChildren.
				 "<br><b>Preferred  Room</b> : ". $roomName.
				 "<br><b>Arrival Date</b> : ". $sdate.
				 "<br><b>Departure Date</b> : " .$edate;
				
				
				if($_POST["specialReq"] != "")
					{
						$specialReq = $_POST["specialReq"];
						$_SESSION["specialReq"] = $specialReq;
						
						echo "<br>Special Requirements: " .$specialReq;
						$body .= "<br><b>Special Requirements</b> : " .$specialReq;
					}
					
				$hotelBody = $body;
				$_SESSION["hBody"] = $hotelBody;
				
				
				echo "<br><br><div class=\"no-print\"><font color = green>Request sent via email to the Event Manager (evManager@msn.com)!</font></div>";
				echo "</fieldset><br><hr><br>";

				if($_POST["specialReq"] != "")
					{
						$bookedDate = date("Y-m-d");
						$SQLquery = "INSERT INTO tblbookingdetails (booking_id, p_id, p_firstname, p_surname, confpass_reference, room_id, start_date, end_date, adults,children,room_requirements,special_requirements, booking_date)
									 VALUES ('$reqID','$logID', '$logFirstName','$logSurName',NULL,'$preferredRoom','$stayFrom','$stayTo','$numAdults','$numChildren','$roomReq','$specialReq','$bookedDate')";
					}
				else
					{
							$bookedDate = date("Y-m-d");
							$SQLquery = "INSERT INTO tblbookingdetails (booking_id, p_id, p_firstname, p_surname, confpass_reference, room_id, start_date, end_date, adults,children,room_requirements,special_requirements, booking_date)
										 VALUES ('$reqID','$logID', '$logFirstName','$logSurName',NULL,'$preferredRoom','$stayFrom','$stayTo','$numAdults','$numChildren','$roomReq','','$bookedDate')";

					}
							 
				//checks if there's any error on adding the values
				if ($conn->query($SQLquery) == TRUE)
					{
						 //echo "<script language='javascript'>alert('$foodName succesfully added to the menu!');</script>"; 
					}
				else 
					{
						echo "<font color=red><p>Unable to create the records.<br />
								Error Code ". $conn->errno." : ". $conn->error." </font></p>";
					}
			}
			
		// if($_POST["bookedHotel"] != "" && $_POST["stayFromManual"] != "" && $_POST["stayToManual"] != "" && $_POST["bookAmtPaid"] != "")
			// {
				// $bookID = $_POST["manualBookID"];
				// $bookedHotelName = $_POST["bookedHotel"];
				// $bookStayFrom = $_POST["stayFromManual"];
				// $bookedStayTo = $_POST["stayToManual"];
				// $bookedAmount = $_POST["bookAmtPaid"];
				
				// $sdate = date('d M Y', strtotime($bookStayFrom));
				// $edate = date('d M Y', strtotime($bookedStayTo));
				
				
				// echo "<fieldset> <legend>YOUR HOTEL BOOKING SUMMARY</legend>";
				// echo "Booked hotel name: " .$bookedHotelName;
				// echo "<br>Your hotel booking ID is ". $bookID;
				// echo "<br>Amount that you have paid for the hotel booking is RM". $bookedAmount;
				// echo "<br>Your hotel stay is from ". $sdate. " until " .$edate;
				// echo "</fieldset><br><hr><br>";

				// $SQLquery = "SELECT * FROM tblconf_participant";
				// $QueryResult = $conn->query($SQLquery);
				
	
				// $bookedDateManual = date("Y-m-d");	
				// $SQLquery = "INSERT INTO tblbookingdetails (booking_id, p_id, p_firstname, p_surname, confpass_reference, hotel_name, start_date, end_date, amount_paid, booking_date)
					// VALUES ('$bookID','$logID', '$logFirstName','$logSurName',NULL,'$bookedHotelName','$bookStayFrom','$bookedStayTo','$bookedAmount','$bookedDateManual')";
							 
				// //checks if there's any error on adding the values
				// if ($conn->query($SQLquery) == TRUE)
					// {
						 // //echo "<script language='javascript'>alert('$foodName succesfully added to the menu!');</script>"; 
					// }
				// else 
					// {
						// echo "<font color=red><p>Unable to create the records.<br />
								// Error Code ". $conn->errno." : ". $conn->error." </font></p>";
					// }
				
			// }
			
/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/			
	
		
	if(!empty($_POST['chosenTour'])) 
	{
		
				echo "<fieldset><legend>YOUR TOUR BOOKING SUMMARY</legend>";
				$checked_count = count($_POST['chosenTour']);
				
				echo "You have selected following ".$checked_count." option(s): <br/>";
	
				
				
				foreach($_POST['chosenTour'] as $selected)
				{
					
					$tourBookingID = mt_rand(100001,999999);
									
									$SQLquery = "SELECT * FROM tbltourbookingdetails WHERE tourbooking_id LIKE '$tourBookingID'";
									$QueryResult =  $conn->query($SQLquery);
								
									
									if($QueryResult->num_rows == 0)
										{
											//echo "$rID";
										}
									else
										{
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
												{
													$checkID = $row['booking_id'];
								
													if($checkID == $tourBookingID)
														{
															$tourBookingID = mt_rand(100001,999999);
															//echo "$rID";
														}
													
												}
										}
					
					$tourID = $selected;
					$tourDateID = "date" .$selected;
					
					$commence = $_POST['tourDate' .$selected];
					$date=date_create($commence);
					$dateFormat = date_format($date,"jS F Y");
					
					$SQLquery = "SELECT * FROM tbltour WHERE tour_id = '$tourID'";
					$QueryResult = $conn->query($SQLquery);
					
					if($QueryResult->num_rows == 0)
						{
							echo "<script language='javascript'>alert('This tour is not within the database.'); window.history.back();</script>";
						}
					else
						{
							// output data of each row
							while(($row = $QueryResult->fetch_assoc()) != false)
								{
									$tourName = $row["tour_name"];
									$tourLocation = $row["tour_location"];
									$tourDuration = $row["tour_duration"];
									$tourStartTime = $row["tour_starttime"];
									$tourPrice = $row["tour_price"];
									
									echo "<strong>TOUR " .$selected. "</strong><br>";
									echo "Booking ID: " .$tourBookingID. "<br>";
									echo "The tour, " .$tourName. " is located at " .$tourLocation;
									echo "<br>The tour will be around " .$tourDuration. " long";
									echo "<br>The tour starts at " .$tourStartTime. " on the " .$dateFormat;
									echo "<br>It will be RM" .$tourPrice. " per person.";
									echo "<br><br></fieldset>";
									
									$tbody = "<br><br><b>TOUR " .$selected. "</b> (Booking ID : " .$tourBookingID. ") 
									 <br><b>Tour Name</b> : " .$tourName.  
									"<br><b>Tour Location</b> : " .$tourLocation.
									"<br><b>Tour Duration</b> : " .$tourDuration. 
									"<br><b>Tour Start time</b> : " .$tourStartTime. 
									"<br><b>Your Tour Start Date</b> : " .$dateFormat.
									"<br><b>Tour Price(RM)</b> : " .$tourPrice. " per person";
									
									$tourBody = $tbody;
									$_SESSION["tBodies"][] = $tourBody;
									
									
									$tourBookedDate = date("Y-m-d");		
									$SQLquery = "INSERT INTO tbltourbookingdetails (tourbooking_id, tour_id, p_id, p_firstname, p_surname, confpass_reference, tour_name, tour_location, tour_duration, tour_starttime, tour_startday, tour_price,booking_date)
												VALUES ('$tourBookingID','$tourID','$logID', '$logFirstName','$logSurName',NULL,'$tourName','$tourLocation','$tourDuration','$tourStartTime','$commence','$tourPrice','$tourBookedDate')";
										
									//checks if there's any error on adding the values
									if ($conn->query($SQLquery) == TRUE)
										{
											//echo "<script language='javascript'>alert('This tour is not within the database.'); window.history.back();</script>";
										}
									else 
										{
											echo "<font color=red><p>Unable to create the records.<br />
													Error Code ". $conn->errno." : ". $conn->error." </font></p>";
										}
													
								}
						}
						
			
				}
				
				
				
				
				
				
	}
	
	echo "<br><hr>";
			
			$itemName = "Hotel and Tour Booking (Standalone)";
			$_SESSION["item_name"] = $itemName;
			echo "<div class=\"no-print\">";
		
								echo "<button onclick=\"location.href ='../test2/HotelTourAlone.php';\" class=\"backButton\" style=\"display:inline-block;\" value=\"back\">Back to Hotel / Tour Booking</button>";

			
						echo "<br><br><form class=\"paypal\" action=\"payments.php\" method=\"post\" id=\"paypal_form\" target=\"_blank\">
							<input type=\"hidden\" name=\"cmd\" value=\"_xclick\" />
							<input type=\"hidden\" name=\"lc\" value=\"UK\" />
							<input type=\"hidden\" name=\"currency_code\" value=\"USD\" />
							<input type=\"hidden\" name=\"bn\" value=\"PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest\" />
							<input type=\"hidden\" name=\"first_name\" value=\"$logFirstName\"  />
							<input type=\"hidden\" name=\"last_name\" value=\"$logSurName\"  />
							<input type=\"hidden\" name=\"payer_email\" value=\"$logEmail\"  />
							<input type=\"hidden\" name=\"item_number\" value=\"#34\" / >
	
					<input type=\"submit\" name=\"submit\" class=\"prButton\" value=\"Proceed with payment\"/></form> <br>";
					
				
			
			
	}
?><form action="invoiceAlone.php" method="post" name="process">
</body>
<input type="submit" name="submit" class="myButton" value="Confirm"/></form></body>	<br><input type="button" class="pButton" onClick="window.print()" value="Print"></div>