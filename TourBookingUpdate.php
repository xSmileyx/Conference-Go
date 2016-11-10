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
@$ref_tour = $_GET['tourID'];
@$get_tour_name = $_REQUEST["tour_name"];
@$get_tour_loc = $_REQUEST["tour_location"];
@$get_tour_id = $_REQUEST["tourbooking_id"];
@$get_tour_duration = $_REQUEST["tour_duration"];
@$get_tour_starttime = $_REQUEST["tour_starttime"];
@$get_conf_name = $_REQUEST["conf_name"];
@$get_conf_ref = $_REQUEST["confpass_reference"];
?>

<script src="layout/scripts/jquery.min.js"></script>
<script type="text/javascript" src="jscss/lib.js"></script>
<script type="text/javascript" src="jscss/facebox.js"></script>
<script type="text/javascript" src="jscss/val.js"></script>
<script type="text/javascript" src="jscss/dtp.js"></script>
<link rel="stylesheet" type="text/css" href="jscss/slimbox_ex.css" media="screen" />
<link rel="stylesheet" type="text/css" href="jscss/data.css" media="screen" />

<p style="text-align:center;"><font face="verdana" size="3" ><strong>Update Tour Booking</strong></font></p><hr>
<?php
	if ($ref_code != "")
	{
		$SQLquery = "SELECT tbltourbookingdetails.tourbooking_id, tbltourbookingdetails.p_id, tbltourbookingdetails.confpass_reference,tbltourbookingdetails.tour_name, tbltourbookingdetails.tour_starttime, tbltourbookingdetails.tour_duration,tbltourbookingdetails.tour_location, tblconf_participant.conf_id,tblconf_participant.p_id,tblconf_participant.confpass_reference,tblconference.conf_id,tblconference.conf_name
						 FROM tbltourbookingdetails,tblconf_participant,tblconference
						 WHERE tbltourbookingdetails.p_id = tblconf_participant.p_id AND tbltourbookingdetails.confpass_reference = '$ref_code' AND tblconf_participant.conf_id = tblconference.conf_id";
		$QueryResult =  $conn->query($SQLquery);	
		
		while(($row = $QueryResult->fetch_assoc()) != false)
		{
			// assign variables
			$bookID = $row['tourbooking_id'];
			$confRef = $row['confpass_reference'];
			$confName = $row['conf_name'];
			$tourName = $row['tour_name'];
			$startTime = $row['tour_starttime'];
			$tourLocation = $row['tour_location'];
			$tourDuration = $row['tour_duration'];
		}
	}
	else if($ref_code == "")
	{
		$SQLquery = "SELECT * FROM tbltourbookingdetails WHERE tourbooking_id = '$ref_tour'";
		$QueryResult =  $conn->query($SQLquery);
		
		while(($row = $QueryResult->fetch_assoc()) != false)
		{
			// assign variables
			$bookID = $row['tourbooking_id'];
			$tourName = $row['tour_name'];
			$startTime = $row['tour_starttime'];
			$tourLocation = $row['tour_location'];
			$tourDuration = $row['tour_duration'];
		}
		
	}		
?>
<body style='overflow:hidden;'>
<form name="updateTour" action="TourBookingUpdate.php" method="post">
	<table border="0" cellpadding="0" style="font-family: verdana; font-size: 12px;">
	
		<tr>
			<td><b>Tour Booking ID&nbsp;&nbsp;</b></td>
			<td style="text-transform:uppercase;"><?php 
		
			if($get_tour_id != "")
			{
				echo $get_tour_id;
			}
			else
			{
				echo $bookID;
			}
			
			?>&nbsp;&nbsp; 
				<input type="hidden" name="tourbooking_id" id="tourbooking_id" style="width:250px;" maxlength="10" VALUE="<?php 
				if($get_tour_id != "")
					{
						echo $get_tour_id;
					}
				else
					{
						echo $bookID;
					}?>"></td>
			<td>&nbsp;</td>
		</tr>

		<tr>
			<td>&nbsp;</td>
		</tr>
	
	<tr>
    	<td><b>Tour Name</b></td>
		<td>
		<select name="tour_name" onchange = "autoSubmit();">
		<option value = ""> - - - SELECT - - - </option>
        <?php 
			$SQLquery = "SELECT * FROM tbltour";
			$QueryResult = $conn->query($SQLquery);
			while(($rowcode = $QueryResult->fetch_assoc()) != false)
			{
				$sel = "";
				$name = $rowcode['tour_name'];
				$duration = $rowcode['tour_duration'];
				$start = $rowcode['tour_starttime'];
				

				if($get_tour_name != '')
				{
					if($name == $get_tour_name)
					{
						$sel = "SELECTED";
					}	
				}
				else 
				{
					if($name == $tourName)
					{
						$sel = "SELECTED";
					}	
				}				
		?>
		<option value="<?php echo $name;?>" <?php echo $sel;?>><?php echo $name;?></option>
		<?php
		} 
		
		?>   <!--<input type="hidden" name="tour_location" id="tour_location" style="width:250px;" maxlength="10" value="" />-->
		</select>&nbsp;&nbsp;
		</td> 
    </tr>
		
		<tr>
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<td><b>Tour Location</b></td>
			<td style="text-transform:uppercase;">
			<?php 
			if($get_tour_loc != "")
			{
				$SQLquery = "SELECT * FROM tbltour where tour_name = '$get_tour_name'";
				
				$QueryResult = $conn->query($SQLquery);
				while(($rowcode = $QueryResult->fetch_assoc()) != false)
				{
					$location = $rowcode['tour_location'];
				}

				echo $location;
			}
			else
			{
				echo $tourLocation;
			}
			
			?>&nbsp;&nbsp; 
				<input type="hidden" name="tour_location" id="tour_location" style="width:250px;" maxlength="10" VALUE="<?php 
				if($get_tour_loc != "")
				{
					$SQLquery = "SELECT * FROM tbltour where tour_name = '$get_tour_name'";
					
					$QueryResult = $conn->query($SQLquery);
					while(($rowcode = $QueryResult->fetch_assoc()) != false)
					{
						$location = $rowcode['tour_location'];
					}

					echo $location;
				}
				else
				{
					echo $tourLocation;
				}?>"></td>
			<td>&nbsp;</td>
		</tr>

		<tr>
			<td>&nbsp;</td>
		</tr>	

		<tr>
			<td><b>Tour Duration</b></td>
			<td style="text-transform:uppercase;"><?php 
			
			if($get_tour_duration != "")
			{
				$SQLquery = "SELECT * FROM tbltour where tour_name = '$get_tour_name'";
				
				$QueryResult = $conn->query($SQLquery);
				while(($rowcode = $QueryResult->fetch_assoc()) != false)
				{
					$duration = $rowcode['tour_duration'];
				}

				echo $duration;
			}
			else
			{
				echo $tourDuration;
			}?> hours&nbsp;&nbsp; 
				<input type="hidden" name="tour_duration" id="tour_duration" style="width:250px;" maxlength="10" VALUE="<?php
					if($get_tour_duration != "")
				{
					$SQLquery = "SELECT * FROM tbltour where tour_name = '$get_tour_name'";
					
					$QueryResult = $conn->query($SQLquery);
					while(($rowcode = $QueryResult->fetch_assoc()) != false)
					{
						$duration = $rowcode['tour_duration'];
					}

					echo $duration;
				}
				else
				{
					echo $tourDuration;
				}?>"></td>
			<td>&nbsp;</td>
		</tr>	
		
		<tr>
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<td><b>Tour Start Time</b></td>
			<td style="text-transform:uppercase;"><?php 
			if($get_tour_starttime != "")
			{
				$SQLquery = "SELECT * FROM tbltour where tour_name = '$get_tour_name'";
				
				$QueryResult = $conn->query($SQLquery);
				while(($rowcode = $QueryResult->fetch_assoc()) != false)
				{
					$starttime = $rowcode['tour_starttime'];
				}

				echo $starttime;
			}
			else
			{
				echo $startTime;
			}?> &nbsp;&nbsp; 
				<input type="hidden" name="tour_starttime" id="tour_starttime" style="width:250px;" maxlength="10" VALUE="<?php 
							if($get_tour_starttime != "")
			{
				$SQLquery = "SELECT * FROM tbltour where tour_name = '$get_tour_name'";
				
				$QueryResult = $conn->query($SQLquery);
				while(($rowcode = $QueryResult->fetch_assoc()) != false)
				{
					$starttime = $rowcode['tour_starttime'];
				}

				echo $starttime;
			}
			else
			{
				echo $startTime;
			}?>"></td>
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
			<td style=\"text-transform:uppercase;\">";
		
			if($get_conf_name != "")
			{
				echo $get_conf_name;
			}
			else
			{
				echo $confName;
			}
			echo "<input type=\"hidden\" name=\"conf_name\" id=\"conf_name\" style=\"width:250px;\" maxlength=\"10\" VALUE=\"" ;
				if($get_conf_name != "")
			{
				echo $get_conf_name;
			}
			else
			{
				echo $confName;
			} echo "\"></td>
			<td>&nbsp;</td>
		</tr>
		

		
		<tr>
			<td>&nbsp;</td>
		</tr>		
		
		<tr>
			<td><b>Reference Number&nbsp;&nbsp;</b></td>
			<td>";
			if($get_conf_ref != "")
			{
				echo $get_conf_ref;
			}
			else
			{
				echo $confRef;
			}
	
			echo "<input type=\"hidden\" name=\"confpass_reference\" id=\"confpass_reference\" style=\"width:250px;\" maxlength=\"10\" VALUE=\"";
			if($get_conf_ref != "")
			{
				echo $get_conf_ref;
			}
			else
			{
				echo $confRef;
			}
			echo "\"></td>
			<td>&nbsp;</td>
		</tr>		
		
		<tr>
			<td>&nbsp;</td>
		</tr>

	";}?>
		<tr>
			<td><input type="hidden" name="act" value="upd"></input>
			
			<td><input type="submit" name="Submit" value=" Update Booking " style="font-family: verdana;
				font-size: 12px;"></input>
			<input type="button" name="cancel" value="  Cancel  " onclick="window.close();"/></input></td>
		</tr>
	</table>
</form>
<script>
function autoSubmit()
{
	document.forms['updateTour'].action= "<?php echo $_SERVER['PHP_SELF']. "?id=" .$ref_code; ?>";
	document.forms['updateTour'].submit();
}
</script>
</body>

<BR><BR>

<?php
 if(isset($_POST["Submit"]))//checks if the submit button is selected
	{
		$tid = $_POST["tourbooking_id"];
		$name = $_POST["tour_name"];
		$location = $_POST["tour_location"];
		$duration = $_POST["tour_duration"];
		$start = $_POST["tour_starttime"];
	
		$SQLquery = "UPDATE tbltourbookingdetails
					 SET tour_name = '$name', tour_location = '$location',tour_duration = '$duration', tour_starttime = '$start'
					 WHERE tourbooking_id = '$tid'";
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