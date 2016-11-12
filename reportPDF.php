
<?php
	ob_start(); 
session_start();
	
	//configuration script
	include ('config.php');
	
		if(!$_SESSION["user_name"]) {
			header("location: Login.php");	//redirected to login page if session variable is not destroyed/unset	
			exit();
		}
	
	
	date_default_timezone_set("Asia/Kuala_Lumpur");//sets to local(Malaysian) time zone 
?>
<head>
  <title>Participation Summary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
  
</head>
<?php
if(isset($_GET['cid'])) 
{
	$id = $_GET['cid'];
		$date = date("d/m/Y");
		$time = date('H:i');
		
		$hdd= "<table border=0 width=\"100%\">
				  <tr>
					 <td>&nbsp;</td>
					 <td align=\"right\"><font size=\"12\"><b>Print Date/Time: ".$date." / ".$time."</font></td>
				  </tr>

				  
		
			   </table>";   	
		
	  


		echo "<br>";

		
		$SQLquery = "SELECT * from tblconference WHERE conf_id = '$id'";
		$QueryResult =  $conn->query($SQLquery);
		$tables  =  "<table border=0 width=250>";
		
		if($QueryResult->num_rows == 0)
			{
				$tables  .= "<tr><td>Conference is not found in database</td></tr>";
			}
		else
			{
				while(($row = $QueryResult->fetch_assoc()) != false)
					{
						$managerID = $row["em_id"];
						$catererID = $row["caterer_id"];
						$venueID = $row["venue_id"];
	
						$tables  .= "<tr><td>" .$row["conf_name"]. " Conference Report</td></tr>";

						$tables .= "<br><br>
						<h5><b><u>Duration :</u></b></h5>";
						$sdate=date_create($row["conf_startdate"]);
						$edate=date_create($row["conf_enddate"]);

						$date1 = new DateTime($row["conf_startdate"]);
						$date2 = new DateTime($row["conf_enddate"]);

						$diff = $date2->diff($date1)->format("%a");

						$tables .= "<p>".$diff. " day(s) - " .date_format($sdate,"jS F Y"). " until " .date_format($edate,"jS F Y"). "</p>";


			 	}
			}
			
			
$tables .= "<br><br><h5><b><u>Venue</u></b></h5> : ";


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
					$tables .=  "<p>" .$row["venue_name"]. "</p>";
				}
		}

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

					$tables .= "<br><br>
					<h5><b><u>Event Manager : </u></b></h5>
					<p>" .$row["em_firstname"]. " " .$row["em_lastname"]. "<p>";


			}
		}

				$tables .=	"<br><br>
					<h5><b><u>Ticket Sales</u></b></h5><br>";
	
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

					
					$tables .= "<p>" .$row["pass_type"]. " : " .$diff_amt. " out of  " .$initial_amt. " sold. ($" .$earnings. " profit) <p><br>";
		
				}
		}		
		
		$tables  .=  "</table>";


			$tables .= "<br><br>
					   <h5><b>Participant List</b></h5>";
					
			$tables .= "<table border=0 width=250>
						  <tr bgcolor=#CCCCCC >
							<td>NAME</td>
							<td>COUNTRY</td>  
							<td>PASSTYPE</td>      
							<td>REFERENCE NUMBER</td>      					           
						 </tr>";
						 
						 
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
							$tables .= "<tr><td>" .$row["p_firstname"]. " " .$row["p_surname"]. "</td>
							                <td>" .$row["p_country"]. " </td>
											<td>" .$row["pass_type"]. "</td>
											<td>" .$row["confpass_reference"]. "</td></tr>";
						}
				}
				
			$tables .= "</table><br><br>";
			
	
			
			$tables .= "<table border=0 width=250>
						  <tr bgcolor=#CCCCCC >
						  
							<td>COUNTRY</td>  
							<td>NO. OF PARTICIPANTS</td>        					           
						 </tr>";
				 
				 
	
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
							$tables .= "<tr><td>" .$row["p_country"]. "</td><td>" .$row["amt"]. "</td></tr>";
						}
				}
				
			$tables .= "</table>";
			$tables .=  "<table border=0 width=250>";
			
			$tables .="<tr><td><br><br>
					<h5><b><u><br>Sponsors : </u></b></h5></td></tr>";
					
		$SQLquery = "SELECT *
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
							$tables .= "<tr><td>" .$row["sponsor_name"]. "</td></tr>";
						}
						

				}


		$tables .= "<br><br>
					<h5><b><u>Caterer : </u></b></h5>";


		$SQLquery = "SELECT *
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
							$tables .= "<p>" .$row["caterer_name"]. "</p>";
						}

				}

			$tables .=	"<br><br>
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
							$tables .= "<tr><td>" .$row["session_name"]. "</td><td>" .$row["speaker_firstname"]. " " .$row["speaker_lastname"]. "</td><tr>";
						}
				}

			$tables .= "</table>";
			
			
			
				
}
  
	
     	    
define('FPDF_FONTPATH','font/');
require('lib/pdftable.php');
$p = new PDFTable('L','mm','a4');//set page orientation P/L

$p->SetFont('Arial','',12);
$p->headerTable=$hdd;   
$p->AddPage();
$p->htmltable($tables);
ob_clean();
$p->output("Summary.pdf",'I'); //D=download
 
?>



