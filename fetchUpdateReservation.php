<?php include('config.php'); 
	date_default_timezone_set('Asia/Kuching');
	$datenow = date('Y-m-d', time());?>


<style>
p, h1,h2,h3,h4,h5,h6{text-align:center; color: #7c795d; font-family: 'Trocchi', serif;}
h4{font-size:18px;}
h5{font-size:14px; margin-bottom:1px;}
	p{font-size:16px}

</style>
<?php

if(isset($_GET['bid']) AND isset($_GET['cpass']) AND isset($_GET['rid']))
{
	

?>
<br><h4>Update Chosen Reservation Request</h4><hr><br>
<form action="fetchUpdateReservation.php" method="post" name="updateReservationForm" id="updateReservationForm" >
<?php
    $bID = $_GET['bid'];
	$CFpass = $_GET['cpass'];
	$get_rID = $_GET['rid'];
	$get_requirement = $_GET['rrequirement'];
	
	$SQLquery = "SELECT * FROM tblroom WHERE room_id = '$get_rID'";
	 
	$QueryResult = $conn->query($SQLquery);
	
	if($QueryResult->num_rows == 0)
		{
			//echo "<option value = \"\"> --</option>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
			{
				$get_hotel_id = $row["hotel_id"];
			}
		}
	
	$SQLquery = "SELECT * FROM tblhotel WHERE hotel_id = '$get_hotel_id'";
	$QueryResult = $conn->query($SQLquery);
	
	if($QueryResult->num_rows == 0)
		{
			//echo "<option value = \"\"> --</option>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
			{
				$get_hotel_name = $row["hotel_name"];
			}
		}
	
		
?>
<p><strong>Hotel Chosen </strong>: <?php  echo $get_hotel_name; ?></p>

<p><strong>Room type </strong>:
<?php	
	$SQLquery = "SELECT * FROM tblroom WHERE hotel_id = '$get_hotel_id'";
	$QueryResult = $conn->query($SQLquery);
	echo "<select name=\"pRoom\" id=\"pRoom\" class=\"twitter\" style='display:inline-block; width:auto; text-align:center;'>";
											
	 if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">Tour is not found in database</p>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
				{	
					
						$roomID = $row["room_id"];
						$roomType = $row["room_type"];
						
						$selected = "";

						if($get_rID != '')
						{
							if($roomID == $get_rID)
							{
								$selected = "SELECTED";
							}	
						}
						
						?>					
						<option value="<?php echo $roomID;?>" <?php echo $selected;?>><?php echo $roomType;?></option>
				<?php
				
				}
						
		}
						
	echo "</select></p>";	
	?>
							
					
	
	<?php
	 $SQLquery = "SELECT * FROM tblbookingdetails,tblroom
				  WHERE tblbookingdetails.booking_id = '$bID' AND tblbookingdetails.confpass_reference = '$CFpass' AND tblroom.room_id = tblbookingdetails.room_id";
	 
	 $QueryResult =  $conn->query($SQLquery);
	 
	 if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">Tour is not found in database</p>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
				{									
					
						$requirement = $row["room_requirements"];
						$special_requirement = $row["special_requirements"];
						
						$selected = "";

						if($get_requirement != '')
						{
							if($requirement == $get_requirement)
							{
								$selected = "SELECTED";
							}	
						}
					
					
					?>
							<p><strong>Adults </strong>: <input type="number" value='<?php echo $row['adults']; ?>' class="twitter" name="numAdults" min="0" max="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
														     maxlength = "2" style='display: inline-block; width:auto; text-align:center;'>
								
							<strong>Children </strong>: <input type="number" value='<?php echo $row['children']; ?>' class="twitter" name="numChildren" min="0" max="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
														       maxlength = "2" style='display: inline-block; width:auto; text-align:center;'></p>
															   
							<p><strong>Room Requirement </strong>:  <select class="twitter" name="rRequirement" style='display: inline-block; text-align:center;'>
																		<option value="<?php echo $requirement;?>" <?php echo $selected;?>><?php echo $requirement;?></option>
																		<option value = "No Preferences">No Preferences</option>
																		<option value = "Non smoking">Non smoking</option>
																		<option value = "Smoking">Smoking</option>
																</select></p>	
															
							<p><strong>Special Requirements </strong>:
							<textarea name="specialReq" style="width:50%; height:200px; margin:auto;" class="twitter"><?php echo $special_requirement; ?></textarea></p>
							
							<p><strong>From</strong> <input type="date" class="twitter" name="stayFrom" style='display: inline-block; text-align:center;' min="<?php echo $datenow; ?>" max="<?php echo $row['end_date'];?>" id="from" value="<?php echo $row['start_date'];?>">
							<strong>until</strong> <input type="date"  class="twitter" style='display: inline-block; text-align:center;' name="stayTo" min="<?php echo $row['start_date'];?>" id="to" value="<?php echo $row['end_date'];?>"></p><br>
	
					<?php
					
				}
		}
		echo "<input type='hidden' name='hotelbid' value='".$bID."'/>";
		
?>

<hr>

<input type="submit" name="Submit" style="width:auto; float:right;" value="Update" class="button" onclick="return confirm('Are you sure?');">
<?php
}
else if(isset($_GET['bid']) AND !isset($_GET['cpass']) AND isset($_GET['rid']))
{
?>
<br><h4>Update Chosen Standalone Reservation Request</h4><hr><br>
<form action="fetchUpdateReservation.php" method="post" name="updateReservationForm" id="updateReservationForm" >
<?php
	$bID = $_GET['bid'];
	$get_rID = $_GET['rid'];
	$get_requirement = $_GET['rrequirement'];
	$SQLquery = "SELECT * FROM tblroom WHERE room_id = '$get_rID'";
	 
	$QueryResult = $conn->query($SQLquery);
	
	if($QueryResult->num_rows == 0)
		{
			//echo "<option value = \"\"> --</option>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
			{
				$get_hotel_id = $row["hotel_id"];
			}
		}
	
	$SQLquery = "SELECT * FROM tblhotel WHERE hotel_id = '$get_hotel_id'";
	$QueryResult = $conn->query($SQLquery);
	
	if($QueryResult->num_rows == 0)
		{
			//echo "<option value = \"\"> --</option>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
			{
				$get_hotel_name = $row["hotel_name"];
			}
		}
	
		
?>
<p><strong>Hotel Chosen </strong>: <?php  echo $get_hotel_name; ?></p>

<p><strong>Room type </strong>:
<?php	
	$SQLquery = "SELECT * FROM tblroom WHERE hotel_id = '$get_hotel_id'";
	$QueryResult = $conn->query($SQLquery);
	echo "<select name=\"pRoom\" id=\"pRoom\" class=\"twitter\" style='display:inline-block; width:auto; text-align:center;'>";
											
	 if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">Tour is not found in database</p>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
				{	
					
						$roomID = $row["room_id"];
						$roomType = $row["room_type"];
						
						$selected = "";

						if($get_rID != '')
						{
							if($roomID == $get_rID)
							{
								$selected = "SELECTED";
							}	
						}
						
						?>					
						<option value="<?php echo $roomID;?>" <?php echo $selected;?>><?php echo $roomType;?></option>
				<?php
				
				}
						
		}
						
	echo "</select></p>";	
	?>
							
					
	
	<?php
	 $SQLquery = "SELECT * FROM tblbookingdetails,tblroom
				  WHERE tblbookingdetails.booking_id = '$bID' AND tblroom.room_id = tblbookingdetails.room_id";
	 
	 $QueryResult =  $conn->query($SQLquery);
	 
	 if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">Tour is not found in database</p>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
				{									
					
						$requirement = $row["room_requirements"];
						$special_requirement = $row["special_requirements"];
						
						$selected = "";

						if($get_requirement != '')
						{
							if($requirement == $get_requirement)
							{
								$selected = "SELECTED";
							}	
						}
					
					
					?>
							<p><strong>Adults </strong>: <input type="number" value='<?php echo $row['adults']; ?>' class="twitter" name="numAdults" min="0" max="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
														     maxlength = "2" style='display: inline-block; width:auto; text-align:center;'>
								
							<strong>Children </strong>: <input type="number" value='<?php echo $row['children']; ?>' class="twitter" name="numChildren" min="0" max="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
														       maxlength = "2" style='display: inline-block; width:auto; text-align:center;'></p>
															   
							<p><strong>Room Requirement </strong>:  <select class="twitter" name="rRequirement" style='display: inline-block; text-align:center;'>
																		<option value="<?php echo $requirement;?>" <?php echo $selected;?>><?php echo $requirement;?></option>
																		<option value = "No Preferences">No Preferences</option>
																		<option value = "Non smoking">Non smoking</option>
																		<option value = "Smoking">Smoking</option>
																</select></p>	
															
							<p><strong>Special Requirements </strong>:
							<textarea name="specialReq" style="width:50%; height:200px; margin:auto;" class="twitter"><?php echo $special_requirement; ?></textarea></p><br>

							<p><strong>From</strong> <input type="date" class="twitter" name="stayFrom" style='display: inline-block; text-align:center;' min="<?php echo $datenow; ?>" max="<?php echo $row['end_date'];?>"  id="from" value="<?php echo $row['start_date'];?>">
							<strong>until</strong> <input type="date"  class="twitter"  name="stayTo" style='display: inline-block; text-align:center;' min="<?php echo $row['start_date'];?>" id="to" value="<?php echo $row['end_date'];?>"></p><br>

					<?php
					
				}
		}
		
		echo "<input type='hidden' name='hotelbid' value='".$bID."'/>";
		
?>


<hr>
<input type="submit" name="Submit" style="width:auto; float:right;" value="Update" class="button" onclick="return confirm('Are you sure?');">
<?php
}
?>
<?php
 if(isset($_POST["Submit"]))//checks if the submit button is selected
	{
		$hotelBID = $_POST['hotelbid'];
		$room = $_POST["pRoom"];
		$adult = $_POST['numAdults'];
		$children_num = $_POST['numChildren'];
		$requirements = $_POST['rRequirement'];
		$sRequirements = $_POST['specialReq'];
		$sFrom = $_POST['stayFrom'];
		$sTo = $_POST['stayTo'];

		$SQLquery = "UPDATE tblbookingdetails
					 SET room_id = '$room', adults = '$adult', children =  '$children_num',  room_requirements = '$requirements ' ,
       					 special_requirements = '$sRequirements', start_date = '$sFrom', end_date = '$sTo'
					 WHERE booking_id = '$hotelBID'";
		
		$QueryResult =  $conn->query($SQLquery);
		
			if($QueryResult)
			{
			  header("location: cancelParticipation.php"); 
		    }
		else
		    {
				echo $SQLquery;
				echo "<br><font color = \"red\">Failed to update a hotel booking</font>" .$conn->error(). ".";
		    } 
		

	}

?>
