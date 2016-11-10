<?php
// Author: Rayner Paun
// Date Written:  25/07/2016
// Description : Updating a category
// Last Modification: 

	include('config.php');
	session_start();//start session
	$logUser = $_SESSION["log_user"];
	$logID = $_SESSION["log_id"];
	$logFirstName = $_SESSION["log_firstname"];
	$logSurName = $_SESSION["log_surname"];
	$logEmail = $_SESSION["log_email"];
	$logPhone = $_SESSION["log_phone"];
	$logCountry = $_SESSION["log_country"];

@$ref_code = $_GET['id'];
@$ref_hotel = $_GET['hotelID'];
?>

<script src="layout/scripts/jquery.min.js"></script>

<p style="text-align:center;"><font face="verdana" size="3" ><strong>Update Hotel Booking</strong></font></p><hr>
<?php

	if ($ref_code != "")
	{
		$SQLquery = "SELECT tblbookingdetails.booking_id, tblbookingdetails.p_id, tblbookingdetails.confpass_reference, tblbookingdetails.hotel_name, tblbookingdetails.start_date, tblbookingdetails.end_date, tblconf_participant.conf_id,tblconf_participant.p_id,tblconf_participant.confpass_reference,tblbookingdetails.booking_date,tblconference.conf_id,tblconference.conf_name
						 FROM tblbookingdetails,tblconf_participant,tblconference
						 WHERE tblbookingdetails.p_id = tblconf_participant.p_id AND tblbookingdetails.confpass_reference = '$ref_code' AND tblconf_participant.conf_id = tblconference.conf_id";
		$QueryResult =  $conn->query($SQLquery);	
		
		while(($row = $QueryResult->fetch_assoc()) != false)
		{
			// assign variables
			$bookID = $row['booking_id'];
			$confRef = $row['confpass_reference'];
			$confName = $row['conf_name'];
			$name = $row["hotel_name"];
			$startDate = $row['start_date'];
			$endDate = $row['end_date'];
			$bookDate = $row['booking_date'];	

		}
	}
	else if($ref_code == "")
	{
		$SQLquery = "SELECT * FROM tblbookingdetails WHERE booking_id = '$ref_hotel'";
		$QueryResult =  $conn->query($SQLquery);
		
		while(($row = $QueryResult->fetch_assoc()) != false)
		{
			// assign variables
			$bookID = $row['booking_id'];
			$name = $row["hotel_name"];
			$startDate = $row['start_date'];
			$endDate = $row['end_date'];
		}
		
	}

?>
<body style='overflow:hidden;'>
<form action="HotelBookingUpdate.php" method="post" >
	<table border="0" cellpadding="0" style="font-family: verdana; font-size: 12px;">

		<tr>
			<td><b>Hotel Name</b></td>
			<td style="text-transform:uppercase;"><?php echo $name; ?>&nbsp;&nbsp; 
				<input type="hidden" name="hotel_name" id="hotel_name" style="width:250px;" maxlength="10" VALUE="<?php echo $name;
				?>"></td>
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
		</tr>
		

		
		<tr>
			<td><b>Hotel Booking ID&nbsp;&nbsp;</b></td>
			<td style="text-transform:uppercase;"><?php echo $bookID; ?>&nbsp;&nbsp;
				<input type="hidden" name="booking_id" id="booking_id" style="width:250px;" maxlength="10" VALUE="<?php echo $bookID;
				?>"></td>
			<td>&nbsp;</td>
		</tr>

		<tr>
			<td>&nbsp;</td>
		</tr>		
		
<?php 	
	if ($ref_code != "")
	{
		echo "<tr>
			<td><b>Conference Name</b></td>
			<td style=\"text-transform:uppercase;\">";echo $confName;
			echo "<input type=\"hidden\" name=\"conf_name\" id=\"conf_name\" style=\"width:250px;\" maxlength=\"10\" VALUE=\"" ;echo $confName;
			echo "\"></td>
			<td>&nbsp;</td>
		</tr>
		

		
		<tr>
			<td>&nbsp;</td>
		</tr>		
		
		<tr>
			<td><b>Reference Number&nbsp;&nbsp;</b></td>
			<td>";echo $confRef;
			echo "<input type=\"hidden\" name=\"confpass_reference\" id=\"confpass_reference\" style=\"width:250px;\" maxlength=\"10\" VALUE=\"";echo $confRef;	
			echo "\"></td>
			<td>&nbsp;</td>
		</tr>		
		
		<tr>
			<td>&nbsp;</td>
		</tr>

	";}?>
 
		<tr>
			<td><b>Durations</b>
			<td><b>From&nbsp;</b><input type="date" class="twitter" name="start_date" id="start_date" style='display: inline-block;' value="<?php echo $startDate;?>" />
			<b>To</b>
			<input type="date" name="end_date" class="twitter" id="end_date" style='display: inline-block;' value="<?php echo $endDate;?>" /></td>
		</tr>
		<script>
			$(document).ready(function(){
				$('#start_date').change(function(){
					//alert(this.value);    
					
					$('#end_date').val(this.value);								
					//Date in full format alert(new Date(this.value));
					
					document.getElementById('end_date').setAttribute("min", this.value);
					
					
					var inputDate = new Date(this.value);
				
				});
			});	
		</script>	
		
		<tr>
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<td><input type="hidden" name="act" value="upd"></input>
			<td><input type="submit" name="submit" value=" Update Booking " style="font-family: verdana;
				font-size: 12px;"></input>
			<input type="button" name="cancel" value="  Cancel  " onclick="window.close();"/></input></td>
		</tr>
	</table>
</form>
</body>
<BR><BR>
<?php
 if(isset($_POST["submit"]))//checks if the submit button is selected
	{
		$from = $_POST["start_date"];
		$to = $_POST["end_date"];
		$id = $_POST["booking_id"];
		
		$SQLquery = "UPDATE tblbookingdetails 
					 SET start_date = '$from', end_date = '$to'
					 WHERE booking_id = '$id'";
		$QueryResult =  $conn->query($SQLquery);
		
		if($QueryResult)
			{
			  echo "<script>window.opener.location.reload(true);window.close();</script>";   
		    }
		else
		    {
				echo $SQLquery;
				echo "<br><font color = \"red\">Failed to update a hotel booking</font>" .$conn->error(). ".";
		    } 

	}
?>