<?php include('config.php');?>



<style>
p, h1,h2,h3,h4,h5,h6{text-align:center; color: #7c795d; font-family: 'Trocchi', serif;}
h4{font-size:18px;}
h5{font-size:14px; margin:auto;}
	p{font-size:16px}
	i{float:center;}
	table, th, td, tr{border:1px solid; border-color: #C8C8C8 ; border-collapse:collapse; vertical-align:middle; text-align:center;  }

</style>

<?php 

if(isset($_GET['cid']) && isset($_GET['pid'])) {
    $pid = $_GET['pid']; //escape string
    $cid = $_GET['cid']; //escape string
    $refID = $_GET['refid']; //escape string
	
	
	echo "<table border='1px' >
			<tr id=tHeader>
				<th>Session Name</th>
				<th>Session Day</th>
				<th>Session Start Time</th>
				<th>Session End Time</th>
				<th>Speaker</th>
			</tr>";
	
	$SQLquery = "SELECT * 
				 FROM tblsession,tblsession_participant,tblspeaker,tblconference,tblvenue
				 WHERE tblsession_participant.session_id = tblsession.session_id
					   AND tblspeaker.speaker_id = tblsession.speaker_id
					   AND tblsession_participant.p_id= '$pid' 
					   AND tblsession_participant.conf_id = '$cid'
					   AND tblconference.conf_id = '$cid'
					   AND tblvenue.venue_id = tblconference.venue_id";				 
						
	$QueryResult =  $conn->query($SQLquery);
	 
	 
	if($QueryResult->num_rows == 0)
		{
			//echo "<p style=\"text-align: center;\">Tour is not found in database</p>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
				{
						$cName = $row["conf_name"];
						$cVenue = $row['venue_name'];
						echo "<tr>
						      <td>" .$row['session_name']. "</td>
							  <td>" .$row['session_day']. "</td>
							  <td>" .$row['session_starttime']. "</td>
							  <td>" .$row['session_endtime']. "</td>
							  <td>" .$row['speaker_firstname']. " " .$row["speaker_lastname"]. "</td></tr>";
								

				}
		}

	echo " </table>";
	echo "<h4><br>" .$cName." Conference<br></h4>";
	echo "<h5><i class=\"fa fa-map-marker\" aria-hidden=\"true\"> " .$cVenue . "</i> </h5>";

}?>