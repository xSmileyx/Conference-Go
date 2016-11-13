
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
		
	$pVenue = $_SESSION["pVenue"];
	$chosen_conference = $_SESSION["chosen_conference"];
	
	date_default_timezone_set("Asia/Kuala_Lumpur");//sets to local(Malaysian) time zone 
?>
<head>
  <title>Participation Summary</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
  
</head>
<?php
// if(isset($_POST["Submit"]))//checks if the submit button is selected
	// {
		
		$get_confID = $_GET['id'];
		$date = date("d/m/Y");
		$time = date('H:i');
		
		$hdd= "<table border=0 width=\"100%\">
				  <tr>
					 <td>&nbsp;</td>
					 <td align=\"right\"><font size=\"12\"><b>Print Date/Time: ".$date." / ".$time."</font></td>
				  </tr>

				  <tr>
					 <td><font size=\"12\"><b>Schedule for $logFirstName $logSurName</b></font></td>
				  </tr>
		
			   </table>";   	
		
	  


		echo "<br>";


		
				 $tables = "<table border=1 width=250>
						  <tr bgcolor=#CCCCCC >
						  
							<td>TIME</td>
							<td>TOPIC</td>  
							<td>DATE</td>      
							<td>SPEAKER</td>      					           
						 </tr>";
						
						
					$SQLquery = "SELECT DISTINCT * 
								 FROM tblsession, tblsession_participant, tblspeaker 
								 WHERE  tblsession.session_id = tblsession_participant.session_id 
									AND tblspeaker.speaker_id = tblsession.speaker_id 
									AND tblsession_participant.p_id = '$logID'
									AND tblsession_participant.conf_id = '$get_confID'
								GROUP BY session_name";
					$QueryResult = $conn->query($SQLquery);
	

					if($QueryResult->num_rows == 0)
						{
							//$tables .= "<tr><td>$ss </td><td>null</td><td>null</td><td>null</td></tr>";
						}
					else
						{
							// output data of each row
							while(($row = $QueryResult->fetch_assoc()) != false)
								{
									$tables .=  "<tr><td>" .$row["session_starttime"]. " - " .$row["session_endtime"]. "</td><td>".$row["session_name"]."</td><td>" .date('d M Y', strtotime($row["session_day"])). "</td><td>" .$row["speaker_firstname"]. " " .$row["speaker_lastname"]. "</td></tr>";	
									
								}
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



