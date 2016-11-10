<?php include('config.php');?>
<link href="layout/styles/ray.css" rel="stylesheet" type="text/css">

<style>
p, h1,h2,h3,h4,h5,h6{text-align:center; color: #7c795d; font-family: 'Trocchi', serif;}
h4{font-size:18px;}
h5{font-size:14px; margin-bottom:1px;}
	p{font-size:16px}

</style>

<?php 

if(isset($_GET['rowid'])) 
{
    $id = $_GET['rowid']; //escape string
	echo "<a class=\"pButton\" href ='../test2/reportPDF.php?cid=" .$id. "'  target='_blank' >PDF</a>";
	$SQLquery = "SELECT * from tblconference WHERE conf_id = '$id'";
	$QueryResult =  $conn->query($SQLquery);
	 
	if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">Conference is not found in database</p>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
				{
					$managerID = $row["em_id"];
					$catererID = $row["caterer_id"];
					$venueID = $row["venue_id"];
?>
					<h4><br><?php echo $row["conf_name"];?> Conference Report<br></h4><hr>

					<br><br>
					<h5><b><u>Duration</u></b></h5>
					<?php 
					$sdate=date_create($row["conf_startdate"]);
					$edate=date_create($row["conf_enddate"]);

					$date1 = new DateTime($row["conf_startdate"]);
					$date2 = new DateTime($row["conf_enddate"]);

					$diff = $date2->diff($date1)->format("%a");?>

					<p><?php echo $diff. " day(s) <br>"; echo date_format($sdate,"jS F Y"); ?> until <?php  echo date_format($edate,"jS F Y"); ?></p>


		<?php 	}
		}?>
		
					<br>
					<h5><b><u>Venue</u></b></h5>

	<?php
	
	$SQLquery = "SELECT * FROM tblvenue WHERE venue_id = '$venueID'";
	$QueryResult =  $conn->query($SQLquery);
	
	if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">Venue is not found in database</p>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
				{
					echo "<p>" .$row["venue_name"]. "</p>";
				}
		}
					
	?>	
<?php		
		
	$SQLquery = "SELECT * from tbleventmanager WHERE em_id = '$managerID'";
	$QueryResult =  $conn->query($SQLquery);
	
	if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">The Event Manager is not found in database</p>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
				{
?>
					<br>
					<h5><b><u>Event Manager</u></b></h5>
					<p><?php echo $row["em_firstname"]. " " .$row["em_lastname"];?><p>


<?php			}
		}
		
?>
					<br>
					<h5><b><u>Ticket Sales</u></b></h5>
<?php		
	$SQLquery = "SELECT * from tblpasstype WHERE tblpasstype.conf_id = '$id'";
	$QueryResult =  $conn->query($SQLquery);
	
	if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">Tickets are not found in database</p>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
				{
					$initial_amt = $row["pass_amount"];
					$remaining_amt = $row["pass_availability"];
					$diff_amt = $initial_amt - $remaining_amt;
					
					$earnings = $row["pass_price"] * $diff_amt;
				
					
?>
			
					
					<p><?php echo $row["pass_type"];?>: <?php echo $diff_amt. " out of  " .$initial_amt. " sold. ($" .$earnings. " profit)"; ?><p>
		
		
		
		
		
<?php 			}
		}
		
?>
					<br>
					<h5><b>Participant List</b></h5>
					
					<table border='1px'  style="width:600px; margin: 0px auto;">
					<tr id=tHeader>
					<th>Name</th>
					<th>Country</th>
					<th>Passtype</th>
					<th>Reference Number</th>
					</tr>
<?php
			$SQLquery = "SELECT *
						 FROM tblconf_participant,tblparticipant,tblpasstype
						 WHERE tblconf_participant.p_id = tblparticipant.p_id AND tblconf_participant.pass_id = tblpasstype.pass_id AND tblconf_participant.conf_id = '$id'"; 
			$QueryResult =  $conn->query($SQLquery);
			
			
			if($QueryResult->num_rows == 0)
				{
					echo "<p style=\"text-align: center;\">Participants are not found in database</p>";
				}
			else
				{
					while(($row = $QueryResult->fetch_assoc()) != false)
						{
							echo "<tr><td>" .$row["p_firstname"]. " " .$row["p_surname"]. "</td><td>" .$row["p_country"]. " </td><td>" .$row["pass_type"]. "</td><td>" .$row["confpass_reference"]. "</td></tr>";
						}
				}
?>
					</table>
					
					
					<br>
					<h5><b></b></h5>
					<table border='1px'  style="width:300px; margin: 0px auto;">
					<tr id=tHeader>
					<th>Country</th>
					<th>No. of Participants</th>
					</tr>

<?php			
			$SQLquery = "SELECT COUNT(p_country) AS amt, p_country
						 FROM  tblconf_participant,tblparticipant,tblpasstype 
						 WHERE tblconf_participant.p_id = tblparticipant.p_id AND tblconf_participant.pass_id = tblpasstype.pass_id  AND tblconf_participant.conf_id = '$id'
						 GROUP BY p_country
						 ORDER BY amt DESC";
				
			$QueryResult =  $conn->query($SQLquery);
			
			if($QueryResult->num_rows == 0)
				{
					echo "<p style=\"text-align: center;\">Countries or participants are not found in database</p>";
				}
			else
				{
					while(($row = $QueryResult->fetch_assoc()) != false)
						{
							echo "<tr><td>" .$row["p_country"]. "</td><td>" .$row["amt"]. "</td></tr>";
						}
				}
?>
					</table>
					
					<br>
					<h5><b><u>Sponsors</u></b></h5>
					
<?php		$SQLquery = "SELECT *
						     FROM tblsponsor,tblconf_sponsor
						     WHERE tblsponsor.sponsor_id = tblconf_sponsor.sponsor_id AND tblconf_sponsor.conf_id = '$id'"; 
			$QueryResult =  $conn->query($SQLquery);
			
			if($QueryResult->num_rows == 0)
				{
					echo "<p style=\"text-align: center;\">Sponsors are not found in database</p>";
				}
			else
				{
					while(($row = $QueryResult->fetch_assoc()) != false)
						{
							echo "<p>" .$row["sponsor_name"]. "</p>";
						}

				}
?>

					<br>
					<h5><b><u>Caterer</u></b></h5>


<?php		$SQLquery = "SELECT *
						     FROM tblcaterer
						     WHERE tblcaterer.caterer_id = '$catererID'"; 
			$QueryResult =  $conn->query($SQLquery);
			
			if($QueryResult->num_rows == 0)
				{
					echo "<p style=\"text-align: center;\">Caterers are not found in database</p>";
				}
			else
				{
					while(($row = $QueryResult->fetch_assoc()) != false)
						{
							echo "<p>" .$row["caterer_name"]. "</p>";
						}

				}

			echo	"<br>
					<h5><b>Session List</b></h5>
					
					<table border='1px'  style='width:600px; margin: 0px auto;'>
					<tr id=tHeader>
					<th>Session</th>
					<th>Speaker</th>
					</tr>";

     	$SQLquery = "SELECT *
						 FROM tblsession,tblspeaker
						 WHERE tblsession.speaker_id = tblspeaker.speaker_id AND tblsession.conf_id = '$id'"; 
			$QueryResult =  $conn->query($SQLquery);
			
			
			if($QueryResult->num_rows == 0)
				{
					echo "<p style=\"text-align: center;\">Sessions are not found in database</p>";
				}
			else
				{
					while(($row = $QueryResult->fetch_assoc()) != false)
						{
							echo "<tr><td>" .$row["session_name"]. "</td><td>" .$row["speaker_firstname"]. " " .$row["speaker_lastname"]. "</td><tr>";
						}
				}

			echo "</table>";

}?>