<?php
	ob_start();
	include('config.php');
	session_start();//start session after admin logged in
	$logUser = $_SESSION["log_user"];
	$logID = $_SESSION["log_id"];
	$logFirstName = $_SESSION["log_firstname"];
	$logSurName = $_SESSION["log_surname"];
	$logEmail = $_SESSION["log_email"];
	$logPhone = $_SESSION["log_phone"];
	$logCountry = $_SESSION["log_country"];
	
	if(!isset($_SESSION['log_user']) && !isset($_SESSION["log_id"]) && !isset($_SESSION["log_firstname"]) && !isset($_SESSION["log_surname"]))//checked if session variable is not destroyed/unset
		{
			header("location: Login.php");	//redirected to login page if session variable is not destroyed/unset	
			exit();
		}

?>
<!DOCTYPE html>
<!--
Template Name: Noctish
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Send Enquiry</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
<!-- 	<script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
 -->	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<style>


.dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.dropdown:hover .dropbtn {
    background-color: red;
}

.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1; cursor: pointer;}

.dropdown:hover .dropdown-content {
	cursor: hand;
    display: block;
}
</style>

<body id="top">

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_right">
      <ul class="nospace inline pushright">
		<li class="dropdown"><i class="fa fa-envelope"></i> Inbox
				<div class="dropdown-content" style='overflow-y:scroll; height:200px;'>
				<?php
					$SQLquery = "SELECT * FROM tblnotifications WHERE p_id = '$logID'";
					$QueryResult = $conn->query($SQLquery);
					
					if($QueryResult->num_rows == 0)
						{
							echo "<a>No messages at the moment</a>";
							
						}
					else
						{
							while(($row = $QueryResult->fetch_assoc()) != false)
							{
								$title = $row["notification_title"];
							
								echo "<a data-id=\"".$row['n_id']."\" data-toggle=\"modal\" data-target=\"#myMsgModal\" class=\"open-message\">" .$title. "</a>";
							}
							
						}
		?>
				 
				</div>
			  </li>
			  <li><i class="fa fa-sign-in"></i> <a href="Logout.php">Log out</a></li>


      </ul>
    </div>
    <div class="fl_right">

    </div>
  </div>
</div>

<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
       <h1><a href="../test2/dashboardParticipant.php">Conference management system</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">

          <li><a href="dashboardParticipant.php">Home</a></li>
        <li><a href="chooseConfe.php">Participate</a></li>
		<li><a href="HotelTourAlone.php">Hotel / Tour Booking</a></li>
		<li><a href="cancelParticipation.php">Manage Participation & Bookings</a></li>
		<li><a href="Feedback.php">Provide Feedback</a>
		<li><a  href="Enquiries.php">Send Enquiries</a></li>
          
    </nav>
  </header>
</div>
<!-- Top Background Image Wrapper -->
<div class="bgded" style="background-image:url('images/demo/backgrounds/01.png');"> 
  <div class="wrapper row2">
    <div id="breadcrumb" class="hoc clear"> 
    </div>
  </div>
</div>


<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content three_quarter first" style="width:500px;  margin-left:10%;"> 
      <div class="scrollable">
		<form action="Enquiries.php" method="post" name="eForm" id="enquiry" >
			<fieldset id="chooseConf">
					  <legend>Send Enquiries</legend>
			
					Enquiry ID:<input type="text" id="enID" name="enID" value="<?php 	
									//configuration script
									include("config.php");
									$rID = mt_rand(100001,999999);
									
									$SQLquery = "SELECT * FROM tblenquiries WHERE en_id LIKE '$rID'";
									$QueryResult =  $conn->query($SQLquery);
								
									if($QueryResult->num_rows == 0)
										{
											echo "$rID";
										}
									else
										{
											// output data of each row
											while(($row = $QueryResult->fetch_assoc()) != false)
												{
													$checkID = $row['en_id'];
								
													if($checkID == $rID)
														{
															$rID = mt_rand(100001,999999);
															echo "$rID";
														}
													
												}
										}?>" maxlength="7" size="7" READONLY><br>
			
			
				Name:
					<?php echo $logFirstName. " " .$logSurName;?><br><br>
				
				Message Title: 
					<input type="text" name="enSubject" class="twitter" id="enSubject" maxlength="30" autocomplete=off required><br>
					
				Message:<br>
					<textarea name="enText" id="enText" class="twitter"  style="width:100%; height:200px;" maxlength="300" autocomplete=off required></textarea><br><br>
							
							
				<input type="submit" name="submit" class="button" value="Send">
						
				
							
			</fieldset>
		</form>


</div>

<!-- Modal -->
  <div class="modal hide" data-easein="fadeInDown" data-easeout="fadeOutDown" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="myMsgModal" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content"  style=' overflow-y:scroll; width:500px; height:250px;'>
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
        </div>
        <div class="modal-body">
		  <div id="msgdetails"></div>
        </div>

        <!--<div class="modal-footer">
        </div>-->
      </div>
    </div>
  </div>
  
   <script>
	  $(document).on("click", ".open-message", function () {
		 var nID = $(this).data('id');
		 
			 if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("msgdetails").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET","fetchmessage.php?nid="+nID,true);
			xmlhttp.send();
	});
	  </script>	  	  
     
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <div class="center btmspace-80">
      <h2 class="heading">Conference management</h2>
      <p>Nullam at purus ornare scelerisque ante sit amet dignissim enim integer dictum tellus sed leo.</p>
    </div>
    <div class="one_quarter first">
      <h6 class="title">Tempor volutpat</h6>
      <address class="btmspace-30">
      Street Name &amp; Number<br>
      Town<br>
      Postcode/Zip
      </address>
      <ul class="nospace">
        <li class="btmspace-10"><span class="fa fa-phone"></span> +00 (123) 456 7890</li>
        <li><span class="fa fa-envelope-o"></span> info@domain.com</li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="title">Enim at ultrices</h6>
      <article>
        <h2 class="nospace font-x1"><a href="#">Leo pharetra nec</a></h2>
        <time class="font-xs" datetime="2045-04-06">Friday, 6<sup>th</sup> April 2045</time>
        <p>Dui odio tristique et commodo vitae bibendum ac orci suspendisse potenti aenean porta tortor ac.</p>
      </article>
    </div>
    <div class="one_quarter">
      <h6 class="title">Quisque mi nisl</h6>
      <ul class="nospace linklist">
        <li><a href="#">Hendrerit non viverra</a></li>
        <li><a href="#">Metus accumsan sed sit</a></li>
        <li><a href="#">Amet porta lacus aliquam</a></li>
        <li><a href="#">Sagittis arcu sit amet</a></li>
        <li><a href="#">Scelerisque pulvinar curabitur</a></li>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="title">Lacinia interdum</h6>
      <p>Scelerisque praesent tempus nisl vehicula mi efficitur id posuere sem dictum etiam.</p>
      <p>Quam in sem volutpat sed sollicitudin odio aliquam in in augue nunc fusce interdum.</p>
    </div>
  </footer>
</div>

<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_left">Copyright &copy; 2015 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
  </div>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->

<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
<?php
if(isset($_POST["submit"]))//checks if the submit button is selected
	{
		$id = $_POST["enID"];
		$msg_title = $_POST["enSubject"];
		$enquiry = addslashes($_POST["enText"]);
		$enquiryDate = date("Y-m-d");
				
		$SQLquery = "INSERT INTO tblenquiries(en_id,p_id, p_firstname, p_surname, msg_title, msg_enquiry,enquiry_date)
					 VALUES('$id','$logID','$logFirstName','$logSurName','$msg_title','$enquiry','$enquiryDate')";
		
		//checks if there's any error on adding the values
		if ($conn->query($SQLquery) == TRUE)
			{
				 echo "<script language='javascript'>$.notify(\"Enquiry sent to the Event Manager!\",\"success\");</script>"; 
			}
		else 
			{
				// echo "<font color=red><p>Unable to create the records.<br />
						// Error Code ". $conn->errno." : ". $conn->error." </font></p>";
			}
	}
?>
</html>