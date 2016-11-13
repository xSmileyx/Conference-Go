<?php
// Database variables
	include('config.php');
	session_start();//start session
	$logUser = $_SESSION["log_user"];
	$logID = $_SESSION["log_id"];
	$logFirstName = $_SESSION["log_firstname"];
	$logSurName = $_SESSION["log_surname"];
	$logEmail = $_SESSION["log_email"];
	$itemName = $_SESSION["item_name"];

	$logPhone = $_SESSION["log_phone"];
	$logCountry = $_SESSION["log_country"];
	
	/*------------------------------------------*/	
	// Pear Mail Library
	include('Mail.php');
	include('Mail/mime.php');
	
	$from = '<confeventmanager@gmail.com>';
	$to = '<' .$logEmail. '>';
	$subject = 'Booking successful!';
	$crlf = "\n";
	$mime = new Mail_mime($crlf);
	
	$html = "<html><body>";
	//$html .= "Hello there, Rayner (Reference Number : 123456 )! You have successfully participated. ";

	//$html .= $_SESSION["pBody"];
	
	if(isset($_SESSION["hBody"]))
	{
		$html .= $_SESSION["hBody"];
	}
	
	if(isset($_SESSION["tBodies"]))
	{
		foreach ($_SESSION['tBodies'] as $result)
		{
			$html .= $result;
		}
		unset($_SESSION["tBodies"]);
		
	}
	
	$html .= "</body></html>";
	
	$headers = array(
		'From' => $from,
		'To' => $to,
		'Subject' => $subject,
		'Content-Type'  => 'text/html; charset=UTF-8'
	);

	$mime_params = array(
	  'text_encoding' => '7bit',
	  'text_charset'  => 'UTF-8',
	  'html_charset'  => 'UTF-8',
	  'head_charset'  => 'UTF-8',
	  'encoding'      => 'quoted/printable'
	);
	
	$mime->setHTMLBody($html);
	$body = $mime->get($mime_params);
			
	$smtp = Mail::factory('smtp', array(
			'host' => 'ssl://smtp.gmail.com',
			'port' => '465',
			'auth' => true,
			'username' => 'confeventmanager@gmail.com',
			'password' => 'conferencego'
		));
		

	$body = quoted_printable_decode($body);	
	$mail = $smtp->send($to, $headers, $body);
	
	if (PEAR::isError($mail)) {
		//echo('<p>' . $mail->getMessage() . '</p>');
		
	} else {
		//echo('<p>Message successfully sent!</p>');
	}
			
		
	/*------------------------------------------*/	
	
	
	
	//configuration script
	include ('config.php');
	
	if(!isset($_SESSION['log_user']) && !isset($_SESSION["log_id"]) && !isset($_SESSION["log_firstname"]) && !isset($_SESSION["log_surname"]))//checked if session variable is not destroyed/unset
		{
			header("location: Login.php");	//redirected to login page if session variable is not destroyed/unset	
			exit();
		}
		
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
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
</style>	
	
	
</head>

<body>

	<div id="page-wrap">

		<textarea id="header">INVOICE</textarea>
		
		<div id="identity">
		  
		  <div style="clear:both"></div>
		<div id="customer">
            <p id="customer-title"> Name: <?php echo $logFirstName. " " . $logSurName;?><br>
		  Country: <?php echo $logCountry;?><br>
		  Phone Number: <?php echo $logPhone ?><br></p>
		<table id="meta">
		
                <tr>
                    <td class="meta-head">Booking ID</td>
                    <td>743567</td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><?php date_default_timezone_set("Asia/Kuala_Lumpur"); $date = date("Y-m-j"); $nDate = date('d M Y', strtotime($date));  echo $nDate;//echo the date?></td>
                </tr>
     

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Price</th>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name">Free Booking</td>
		      <td class="description"><?php echo $itemName;?></td>
		      <td>$0.00</td>
		      <td>1</td>
		      <td>$0.00</td>
		  </tr>

		  
		  <tr id="hiderow" >
		    <td colspan="5"></td>
		  </tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total:</td>
		      <td class="total-value"><div id="total">$0.00</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid:</td>

		      <td class="total-value"><textarea id="paid">$0.00</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due:</td>
		      <td class="total-value balance"><div class="due">$0.00</div></td>
		  </tr>
		
		</table>

	
	</div><br>
	<div class="no-print">
	<button onclick="location.href ='../test2/HotelTourAlone.php';" class="backButton" style="display:inline-block;" value="back">Back to Hotel / Tour Booking</button>
	<input type="button" class="pButton" onClick="window.print()" value="Print"></div>
	
</body>

</html>