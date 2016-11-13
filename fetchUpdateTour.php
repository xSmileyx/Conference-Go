<?php include('config.php'); ?>


<style>
p, h1,h2,h3,h4,h5,h6{text-align:center; color: #7c795d; font-family: 'Trocchi', serif;}
h4{font-size:18px;}
h5{font-size:14px; margin-bottom:1px;}
	p{font-size:16px}

</style>
<?php

if(isset($_GET['tbid']) AND isset($_GET['cpass']) AND isset($_GET['tid']))
{
?>
<br><h4>Update Chosen Tour</h4><hr><br>
<form action="fetchUpdateTour.php" method="post" name="updateTourForm" id="updateTourForm" >
<?php
    $tbID = $_GET['tbid'];
	$CFpass = $_GET['cpass'];
	$tID = $_GET['tid'];
	
	 $SQLquery = "SELECT * FROM tbltourbookingdetails 
				  WHERE tourbooking_id = '$tbID' AND confpass_reference = '$CFpass'";
	 
	 $QueryResult =  $conn->query($SQLquery);
	 
	 if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">Tour is not found in database</p>";
		}
	else
		{
			echo "<table border=\"1\" style=\"text-align: center;\">";
			echo "<col width=\"150\"><col width=\"150\"><col width=\"200\"><col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"150\">";
			echo "<tr id=tHeader style=\"background:gray;\"><th>Tour Booking ID</th><th>Tour</th><th>Tour Start Day</th><th>Booking Date</th></tr>";

			while(($row = $QueryResult->fetch_assoc()) != false)
				{
					echo "<tr><td>" .$row['tourbooking_id']. "</td>
							  <td  width='50%'>
								  <strong>Tour Name</strong>: " .$row["tour_name"]. "
								  <br />
								  <strong>Location</strong>: " .$row['tour_location']. "
								  <br/>
								  <strong>Start Time</strong>: " .$row['tour_starttime']."
								  <br/>
								  <strong>Duration</strong>: " .$row['tour_duration']. " hour(s)
							  </td>";
					echo "<td bgcolor='#FFFFFF' style='vertical-align:top;'>
									<br/>
									<input type=\"date\" id='date' class=\"twitter\" name='tourDate' style='display: inline-block; text-align:center; width:100%;' value=" .$row['tour_startday']."><br>  
									<input type='hidden' name='tourbid' value='".$tbID."'/>
												<td>" .$row['booking_date']. "</td>";
				}
		}
		echo "</table>";
		
?>
<hr>
<input type="submit" name="Submit" style="width:auto; float:right;" value="Update" class="button" onclick="return confirm('Are you sure?');">
<?php
}
else if(isset($_GET['tbid']) AND !isset($_GET['cpass']) AND isset($_GET['tid']))
{
?>	
<br><h4>Update Chosen Standalone Tour</h4><hr><br>
<form action="fetchUpdateTour.php" method="post" name="updateTourForm" id="updateTourForm" >
<?php
    $tbID = $_GET['tbid'];

	$SQLquery = "SELECT * FROM tbltourbookingdetails 
				  WHERE tourbooking_id = '$tbID' AND confpass_reference IS NULL";
	 
	 $QueryResult =  $conn->query($SQLquery);
	 
	 if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">Tour is not found in database</p>";
		}
	else
		{
			echo "<table border=\"1\" style=\"text-align: center;\">";
			echo "<col width=\"150\"><col width=\"150\"><col width=\"200\"><col width=\"150\"><col width=\"150\"><col width=\"150\"><col width=\"150\">";
			echo "<tr id=tHeader style=\"background:gray;\"><th>Tour Booking ID</th><th>Tour</th><th>Tour Start Day</th><th>Booking Date</th></tr>";

			while(($row = $QueryResult->fetch_assoc()) != false)
				{
					echo "<tr><td>" .$row['tourbooking_id']. "</td>
							  <td  width='50%'>
								  <strong>Tour Name</strong>: " .$row["tour_name"]. "
								  <br />
								  <strong>Location</strong>: " .$row['tour_location']. "
								  <br/>
								  <strong>Start Time</strong>: " .$row['tour_starttime']."
								  <br/>
								  <strong>Duration</strong>: " .$row['tour_duration']. " hour(s)
							  </td>";
					echo "<td bgcolor='#FFFFFF' style='vertical-align:top;'>
									<br/>
									<input type=\"date\" id='date' class=\"twitter\" name='tourDate' style='display: inline-block; text-align:center; width:100%;' value=" .$row['tour_startday']."><br>  
									<input type='hidden' name='tourbid' value='".$tbID."'/>
												<td>" .$row['booking_date']. "</td>";
				}
		}
		echo "</table>";
		?>
		<hr>
<input type="submit" name="Submit" style="width:auto; float:right;" value="Update" class="button" onclick="return confirm('Are you sure?');">
<?php

}?>

<?php
 if(isset($_POST["Submit"]))//checks if the submit button is selected
	{
		$date = $_POST["tourDate"];
		$tourBID = $_POST['tourbid'];

		$SQLquery = "UPDATE tbltourbookingdetails
					 SET tour_startday = '$date'
					 WHERE tourbooking_id = '$tourBID'";
		
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
