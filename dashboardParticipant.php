<?php
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
		

	
	// if(($_SESSION["sponsor_name"] != NULL) && ($_SESSION["sponsor_amount"] != NULL))
		// {
			// $sponsored = $_SESSION["sponsor_name"];
			// $sponsorAmt = $_SESSION["sponsor_amount"];
		// }
	
?>	<!DOCTYPE html>
<!--
Template Name: Noctish
Author: <a href="http://www.os-templates.com/">OS Templates</a>
Author URI: http://www.os-templates.com/
Licence: Free to use under our free template licence terms
Licence URI: http://www.os-templates.com/template-terms
-->
<html>
<head>
<title>Home</title>
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
      <ul class="faico clear">
      </ul>
    </div>

  </div>
</div>
<script>

</script>
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

      </ul>
    </nav>
  
  </header>


<?php 	include 'selectdash.php'; ?>
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
	
    <div class="one_half first">
	
	<img class="inspace-10 borderedbox" src="uploads/<?php echo $result['event_image'] ?>" alt="">
	
	</div>
    <div class="one_half"><br>
      <h2 class="heading">
	  <?php
		
		echo '<h2 class="heading">'.$result['event_name'].'</h2>';
		echo '<p>'.$result['event_desc']. '</p>';
	  
	  ?>
	  </h2>
    </div>
    <!-- / main body -->
    <div class="clear"></div>
	
	
	
  </main>
</div>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/02.png');">
  <div class="hoc container clear"> 
    <div class="center btmspace-80">
      <h2 class="heading">Key Speakers</h2>
      <p></p>
    </div>
    <article class="one_third first">
		<a href="#">
		<img class="borderedbox inspace-10 btmspace-30" src="uploads/<?php echo $result['key_sp1'] ?>" alt="">
		</a>
      <h2 class="heading font-x1"><?php echo $result['key_spname1'];  ?></h2>
      <p class="btmspace-30"></p>
    </article>
    <article class="one_third">		<a href="#">
			<img class="borderedbox inspace-10 btmspace-30" src="uploads/<?php echo $result['key_sp2'] ?>" alt="">
		</a>
      <h2 class="heading font-x1"><?php echo $result['key_spname2']; ?></h2>
      <p class="btmspace-30"></p>
    </article>
    <article class="one_third"><a href="#">
			<img class="borderedbox inspace-10 btmspace-30" src="uploads/<?php echo $result['key_sp3'] ?>" alt="">
		</a>
      <h2 class="heading font-x1"><?php echo $result['key_spname3'];  ?></h2>
      <p class="btmspace-30"></p>
    </article>
    
    <div class="clear"></div>
  </div>
</div>
<div class="wrapper row3" style="opacity="0.5" ">
  <article class="hoc container clear"> 
    <div class="one_half first"><img class="borderedbox inspace-10 btmspace-30" src="uploads/<?php echo $result['venue_image'] ?>" alt=""></div>
    <div class="one_half">
      <h2 class="heading"><?php echo $result['venue_name']; ?></h2>
      <p><?php echo $result['details']; ?></p>
	  <p><address>Venue:  The Isthmus, Sejingkat,, 93050 Kuching, Sarawak, Malaysia</address></p>
	  <p>Date:  June-03-2016  To  June-05-2016 <p>
      </ul>
      <footer>
        <ul class="nospace inline pushright">
        </ul>
      </footer>
    </div>
    <div class="clear"></div>
  </article>
</div>
<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div class="center btmspace-80">
      <h2 class="heading">Final Year Presentaion</h2>
      <p>Team members</p>
    </div>
    <div class="one_quarter first">
      <h6 class="title">Samu Pillai Sadeiyen</h6>
    </div>
    <div class="one_quarter">
      <h6 class="title">Rayner Paun</h6>
    </div>
    <div class="one_quarter">
      <h6 class="title">Ch’ng Chuan Way</h6>
      </ul>
    </div>
    <div class="one_quarter">
      <h6 class="title">Samuel Hii Tuan Ong</h6>
    </div>
    <!-- ################################################################################################ -->
  </footer>
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

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>