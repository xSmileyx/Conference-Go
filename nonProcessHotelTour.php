<?php
	//configuration script
	include ('config.php');

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

		if($_POST["stayFrom"] != "" && $_POST["stayTo"] != "" && $_POST["numAdults"] != "" && $_POST["numChildren"] != " " )
			{
				$reqID = $_POST["reqID"];
				$preferredHotel = $_POST["pHotel"];
				$stayFrom = $_POST["stayFrom"];
				$stayTo = $_POST["stayTo"];
				$roomReq = $_POST["rRequirement"];
				$numAdults = $_POST["numAdults"];
				$numChildren = $_POST["numChildren"];
				$nonName = $_POST["nonName"];
				$nonEmail = $_POST["nonEmail"];
				$nonPhone = $_POST["nonPhone"];
				
				if (isset($_POST["nonSpecialReq"]))
					{
						$nonSpecialReq = $_POST["nonSpecialReq"];
					}
					
				$sdate = date('d M Y', strtotime($stayFrom));
				$edate = date('d M Y', strtotime($stayTo));
				
				echo "<fieldset> <legend>HOTEL RESERVATION REQUEST SUMMARY</legend>";
				echo "Name of requester: " .$nonName;
				echo "<br>Email of requester: " .$nonEmail ;
				echo "<br>Phone number of requester: " .$nonPhone;
				echo "<br>Your hotel reservation request ID is ". $reqID;
				echo "<br>Your preferred hotel is ". $preferredHotel;
				echo "<br>Your hotel stay request is from ". $sdate. " until " .$edate;
			
				echo "<br>Number of adults staying: ". $numAdults;
				echo "<br>Number of Children staying ". $numChildren;
				echo "<br><br><div class=\"no-print\"><font color = green>Request sent via email to the Event Manager (evManager@msn.com)!</font></div>";
				echo "</fieldset><br><hr><br>";
			}
			
		if($_POST["bookedHotel"] != "" && $_POST["stayFromManual"] != "" && $_POST["stayToManual"] != "" && $_POST["bookAmtPaid"] != "")
			{
				$bookID = $_POST["manualBookID"];
				$bookedHotelName = $_POST["bookedHotel"];
				$bookStayFrom = $_POST["stayFromManual"];
				$bookedStayTo = $_POST["stayToManual"];
				$bookedName = $_POST["nonNameManual"];
				$bookedEmail = $_POST["nonEmailManual"];
				$bookedPhone = $_POST["nonPhoneManual"];
				$bookedAmount = $_POST["bookAmtPaid"];
				
				$sdate = date('d M Y', strtotime($bookStayFrom));
				$edate = date('d M Y', strtotime($bookedStayTo));
				
				
				echo "<fieldset> <legend>YOUR HOTEL BOOKING SUMMARY</legend>";
				echo "Booked hotel name: " .$bookedHotelName;
				echo "<br>Name: " .$bookedName;
				echo "<br>Email: " .$bookedEmail;
				echo "<br>Phone Number: " .$bookedPhone;
				echo "<br>Your hotel booking ID is ". $bookID;
				echo "<br>Amount that you have paid for the hotel booking is RM". $bookedAmount;
				echo "<br>Your hotel stay is from ". $sdate. " until " .$edate;
				echo "</fieldset><br><hr><br>";	

				
			}
			
/*---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/			
	
		if($_POST["pTour"] != '0')
			{
				$tourID = $_POST["pTour"];
				$BookingID = $_POST["tourBookingID"];
				$tournonName = $_POST["nonNameTour"];
				$tournonEmail = $_POST["nonEmailTour"];
				$tournonPhone =  $_POST["nonPhoneTour"];
				
				$SQLquery = "SELECT * FROM tbltour WHERE tour_id = '$tourID'";
				$QueryResult = $conn->query($SQLquery);
				
				if($QueryResult->num_rows == 0)
					{
						echo "<script language='javascript'>alert('This tour is not within the database.');</script>";
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
								
							}
					}
					
					
				echo "<fieldset><legend>YOUR TOUR BOOKING SUMMARY</legend>";
				echo "Name: " .$tournonName;
				echo "<br>Email: " .$tournonEmail;
				echo "<br>Phone Number: " .$tournonPhone;
				echo "<br>The tour, " .$tourName. " is located at " .$tourLocation;
				echo "<br>The tour will be around " .$tourDuration. " hours long";
				echo "<br>The tour starts at " .$tourStartTime;
				echo "<br>It will be RM" .$tourPrice. " per person.";
				echo "</fieldset><br><hr><br>";
			}
			
			echo "<div class=\"no-print\">";
		
		echo "<button onclick=\"location.href ='../test/nonHotelTour.php';\" class=\"backButton\" style=\"display:inline-block;\" value=\"back\">Back to Hotel / Tour Booking</button>";
			
						echo "<br><br><form class=\"paypal\" action=\"nonPayments.php\" method=\"post\" id=\"paypal_form\" target=\"_blank\">
							<input type=\"hidden\" name=\"cmd\" value=\"_xclick\" />
							<input type=\"hidden\" name=\"lc\" value=\"UK\" />
							<input type=\"hidden\" name=\"currency_code\" value=\"USD\" />
							<input type=\"hidden\" name=\"bn\" value=\"PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest\" />
							<input type=\"hidden\" name=\"first_name\" value=\"$tournonName\"  />
							<input type=\"hidden\" name=\"payer_email\" value=\"$tournonEmail\"  />
							<input type=\"hidden\" name=\"item_number\" value=\"Booking Reference ID: $BookingID\" / >
	
					<input type=\"submit\" name=\"submit\" class=\"prButton\" value=\"Proceed with payment\"/></form> <br>";
					
				
			
			
	}
?>
</body>
<br><input type="button" class="pButton" onClick="window.print()" value="Print"></div>