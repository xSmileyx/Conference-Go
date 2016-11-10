<?php

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
		
	$pVenue = $_SESSION["pVenue"];
	$chosen_conference = $_SESSION["chosen_conference"];
	
	date_default_timezone_set("Asia/Kuala_Lumpur");//sets to local(Malaysian) time zone 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Participation Summary</title>
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
	float:left;
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
	float:right;
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
	float:center;
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
		echo "<fieldset>
	<legend>PARTICIPATION SUMMARY</legend>";
		$confName = $_POST["title"];
		$_SESSION["conf_name"] = $confName;

		$SQLquery = "SELECT * FROM tblconference WHERE conf_name LIKE '$confName'";

		$QueryResult = $conn->query($SQLquery);
		
		if($QueryResult->num_rows == 0)
			{
				echo "<script language='javascript'>alert('Conference not found.');</script>";
			}
		else
			{
				// output data of each row
				while(($row = $QueryResult->fetch_assoc()) != false)
					{
						$confID = $row["conf_id"];	
					}
			}
			
		$ref = $_POST["refNum"];
		$_SESSION["ref_num"] = $ref;

		echo "<b>Conference Title</b><br> $confName <br>
			  <b>Location</b><br> $pVenue <br>
			  <b>Participant</b><br> $logFirstName $logSurName <br> 
			  <b>Nationality</b><br> $logCountry<br>
		      <b>Reference Number</b><br> $ref <br>
			  ";
			  
/*---------------------------------------------------------------------------------------------------------------------------------------------------*/
		
		$passID = $_POST["pPassType"];
		$SQLquery = "SELECT * FROM tblpasstype WHERE pass_id LIKE '$passID'";
		$QueryResult = $conn->query($SQLquery);
		
		$_SESSION["pass_id"] = $passID;
		
		if($QueryResult->num_rows == 0)
			{
				echo "<script language='javascript'>alert('There is no such pass type.');</script>";
			}
		else
			{
				// output data of each row
				while(($row = $QueryResult->fetch_assoc()) != false)
					{
						$passType = $row["pass_type"];
						$passAmount = $row["pass_price"];
						
						$_SESSION["pass_type"] = $passType;
						$_SESSION["pass_amount"] = $passAmount;
						echo "<b>Passtype chosen</b><br> $passType <br>";
					}
			}
			  
		$itemName = "Conferece Pass (".$passType.") for a conference about ".$confName;
		$_SESSION["item_name"] = $itemName;
/*---------------------------------------------------------------------------------------------------------------------------------------------------*/
	
		$sponsorCheck = $_POST["fqrOne"];
		
		if(isset($sponsorCheck) && $sponsorCheck == "Yes")
			{
				$participantSponsorName = $_POST["fqtName"];
				$participantSponsorAmount = $_POST["fqnAmount"];
				
				
				$SQLquery = "SELECT * FROM tblsponsor WHERE sponsor_name LIKE '$participantSponsorName'";
				$QueryResult = $conn->query($SQLquery);
				
				if($QueryResult->num_rows == 0)
					{
						echo "<script language='javascript'>alert('This sponsor is not within the database.');</script>";
					}
				else
					{
						// output data of each row
						while(($row = $QueryResult->fetch_assoc()) != false)
							{
								$sponsorID = $row["sponsor_id"];
								
								$_SESSION["sponsor_name"] = $participantSponsorName;
								$_SESSION["sponsor_amount"] = $participantSponsorAmount;
								echo "<b>Sponsored by</b><br> $participantSponsorName <br> Amount: RM$participantSponsorAmount <br>";
							}
					}

			}
			
/*---------------------------------------------------------------------------------------------------------------------------------------------------*/
		
	
		$SQLquery = "SELECT * FROM tblsession";
		$QueryResult = $conn->query($SQLquery);
		echo "<br>";
		
		if($QueryResult->num_rows == 0)
			{
				echo "<script language='javascript'>alert('This sponsor is not within the database.');</script>";
			}
		else
			{
				echo "<table border=\"1\" id=\"tblFP\" >";
				echo "<col width=\"400\"><col width=\"400\"><col width=\"400\"><col width=\"400\">";
				echo "<th colspan=\"4\"><b>SCHEDULE</b></th>";									
				echo "<tr id=tHeader><td><b>Time</b></td><td><b>Topic</b></td><td><b>Date</b></td><td><b>Speaker</b></td>";
				
				//echo "What did you participate? <br> ";
				// output data of each row
				while(($row = $QueryResult->fetch_assoc()) != false)
					{
						echo "<table border=\"1\" id=\"tblFP\" >";
						echo "<col width=\"400\"><col width=\"400\"><col width=\"400\"><col width=\"400\">";
													
						$sessionID = $row["session_id"];
						$sessDesc = "desc".$sessionID;
						
						$sessDescA = $sessDesc. "a";
						$sessDescB = $sessDesc. "b";
						$sessDescC = $sessDesc. "c";
						$sessDescD = $sessDesc. "d";
						
						if(isset($_POST["$sessDescA"]))
							{
								$sessionDescA = $_POST["$sessDescA"];
								
								$hFieldName = "name".$sessionID; 
								$hFieldNameStart = "start".$sessionID; 
								$hFieldNameEnd = "end".$sessionID; 
								$hFieldNameDay = "day".$sessionID; 
								$hFieldNameSpeaker = "speaker".$sessionID; 
					
								$ssName = $_POST["$hFieldName"]; 
								$startTime = $_POST["$hFieldNameStart"];
								$endTime = $_POST["$hFieldNameEnd"];
								$Day = $_POST["$hFieldNameDay"];
								$Speaker = $_POST["$hFieldNameSpeaker"];
								
								//echo "- $sessionDescA about the topic: $ssName at  $startTime until $endTime on $Day spoken by $Speaker. <br>";
								$date = date('d M Y', strtotime($Day));
								
								// $_SESSION[""]
								// $_SESSION[""]
								// $_SESSION[""]
								// $_SESSION[""]
								
								
								
								echo "<tr><td>$startTime - $endTime</td><td>$ssName</td><td>$date</td><td>$Speaker</td>";
								
								
								//$ref = $ref. "1";
							}	
							
						if(isset($_POST["$sessDescB"]))
							{
								$sessionDescB = $_POST["$sessDescB"];
								
								$hFieldName = "name".$sessionID; 
								$hFieldNameStart = "start".$sessionID; 
								$hFieldNameEnd = "end".$sessionID; 
								$hFieldNameDay = "day".$sessionID; 
								$hFieldNameSpeaker = "speaker".$sessionID; 
					
								$ssName = $_POST["$hFieldName"]; 
								$startTime = $_POST["$hFieldNameStart"];
								$endTime = $_POST["$hFieldNameEnd"];
								$Day = $_POST["$hFieldNameDay"];
								$Speaker = $_POST["$hFieldNameSpeaker"];
								
								//echo "- $sessionDescB about the topic: $ssName at  $startTime until $endTime on $Day spoken by $Speaker. <br>";
								
								//$ref = $ref. "2";
								
								$date = date('d M Y', strtotime($Day));
								
								echo "<tr><td>$startTime - $endTime</td><td>$ssName</td><td>$date</td><td>$Speaker</td>";

							}			
							
						if(isset($_POST["$sessDescC"]))
							{
								$sessionDescC = $_POST["$sessDescC"];
								
								$hFieldName = "name".$sessionID; 
								$hFieldNameStart = "start".$sessionID; 
								$hFieldNameEnd = "end".$sessionID; 
								$hFieldNameDay = "day".$sessionID; 
								$hFieldNameSpeaker = "speaker".$sessionID; 
					
								$ssName = $_POST["$hFieldName"]; 
								$startTime = $_POST["$hFieldNameStart"];
								$endTime = $_POST["$hFieldNameEnd"];
								$Day = $_POST["$hFieldNameDay"];
								$Speaker = $_POST["$hFieldNameSpeaker"];
								
								//echo "- $sessionDescC about the topic: $ssName at  $startTime until $endTime on $Day spoken by $Speaker. <br>";
								$date = date('d M Y', strtotime($Day));
								
								echo "<tr><td>$startTime - $endTime</td><td>$ssName</td><td>$date</td><td>$Speaker</td>";
								//$ref = $ref. "3";

							}		
							
						if(isset($_POST["$sessDescD"]))
							{
								$sessionDescD = $_POST["$sessDescD"];
								
								$hFieldName = "name".$sessionID; 
								$hFieldNameStart = "start".$sessionID; 
								$hFieldNameEnd = "end".$sessionID; 
								$hFieldNameDay = "day".$sessionID; 
								$hFieldNameSpeaker = "speaker".$sessionID; 
					
								$ssName = $_POST["$hFieldName"]; 
								$startTime = $_POST["$hFieldNameStart"];
								$endTime = $_POST["$hFieldNameEnd"];
								$Day = $_POST["$hFieldNameDay"];
								$Speaker = $_POST["$hFieldNameSpeaker"];
								
								//echo "- $sessionDescD about the topic: $ssName at  $startTime until $endTime on $Day spoken by $Speaker. <br>";
								$date = date('d M Y', strtotime($Day));
								
								echo "<tr><td>$startTime - $endTime</td><td>$ssName</td><td>$date</td><td>$Speaker</td>";
								//$ref = $ref. "4";
								
							}
							
							
					}
					echo "</table>";
					
					$purchaseDate = date("Y-m-d");
					
					
					$SQLquery = "INSERT INTO tblconf_participant (conf_id, p_id, confpass_reference, pass_id, purchase_date)
								VALUES ('$confID','$logID', '$ref','$passID','$purchaseDate')";
								
					//checks if there's any error on adding the values
					if ($conn->query($SQLquery) == TRUE)
						{
							// echo "<script language='javascript'>alert('$foodName succesfully added to the menu!');</script>"; 
						}
					else 
						{
							// echo "<font color=red><p>Unable to create the records.<br />
									// Error Code ". $conn->errno." : ". $conn->error." </font></p>";
						}
						echo "</fieldset>";
				
			}
		echo "<div class=\"no-print\">";	
		echo "<br><button onclick=\"location.href ='../test2/chooseConfe.php';\" class=\"backButton\"><< Back to conference selection</button>";
		echo "<a class=\"pButton\" onClick=\"window.print()\" >Print Summary</a>";
		echo "<a class=\"pButton\" href ='../test2/qr.html';\" target='_blank' >QR Code</a>";
		echo "<a class=\"pButton\" href ='../test2/barcode.php';\" target='_blank' >Barcode</a>";
		echo "<button onclick=\"location.href ='../test2/HotelTour.php';\" class=\"myButton\">Proceed to Hotel / Tour Booking >></button>";
		echo "</div>";

	}
		
?>