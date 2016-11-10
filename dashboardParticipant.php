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
</head>
<body id="top">
<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_right">
      <ul class="nospace inline pushright">
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
       <h1><a href="../test/dashboardParticipant.php">Conference management system</a></h1>
    </div>
    
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        
        <li><a href="dashboardParticipant.php">Home</a></li>
        <li><a href="chooseConfe.php">Participate</a></li>
		<li><a href="HotelTourAlone.php">Hotel / Tour Booking</a></li>
		<li><a href="cancelParticipation.php">Cancel Participation & Booking</a></li>
		<li><a href="Feedback.php">Provide Feedback</a>
		<li><a  href="Enquiries.php">Send Enquiries</a></li>	

      </ul>
    </nav>
  
  </header>

  
<div class="wrapper row3">

  <main class="hoc container clear"> 
    <h2>Notifications</h2>
    <div class="content three_quarter first" id="show"> 
		No message selected.
    </div>

    <div class="sidebar one_quarter" style="overflow:auto;  height:200px;"> 

      <nav class="sdb_holder" >
        <ul>
		<?php
				$SQLquery = "SELECT * FROM tblnotifications";
				$QueryResult = $conn->query($SQLquery);
				
				if($QueryResult->num_rows == 0)
					{
						echo "<li>No notifications at the moment</li>";
					}
				else
					{
						while(($row = $QueryResult->fetch_assoc()) != false)
						{
							$title = $row["notification_title"];
						
							echo '<li><a onclick="getMessage('.$row["n_id"].')">' .$title. '</a></li>';
						}
					}
				
				
		
		?>
		
		</ul>
      </nav>
    

    <div class="clear"></div>
  </main>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
function getMessage(id)
{
   $.ajax({

     type: "GET",
     url: 'fetchmessage.php',
     data: "id=" + id, // appears as $_GET['id'] @ your backend side
     success: function(data) {
           // data is ur summary
          $('#show').html(data);
     }

   });

}
</script>

<?php 	include 'selectdash.php'; ?>
<!-- Top Background Image Wrapper -->
  <div class="wrapper row2">
    <div id="breadcrumb" class="hoc clear"> 
	<div class="bgded"/>
	<img style="width: 1500px; height: 100px;" src="uploads/<?php echo $result['banner_image']?>" alt="">
    </div>
  </div>


<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
	
    <div class="one_half first">
	
	<img style="width: 480px; height: 380px;" class="inspace-10 borderedbox" src="uploads/<?php echo $result['event_image'] ?>" alt="">
	
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
		<img style="width: 300px; height: 380px;" class="borderedbox inspace-10 btmspace-30" src="uploads/<?php echo $result['key_sp1'] ?>" alt="">
		</a>
      <h2 class="heading font-x1"><?php echo $result['key_spname1'];  ?></h2>
      <p class="btmspace-30"></p>
    </article>
    <article class="one_third">		<a href="#">
			<img style="width: 300px; height: 380px;" class="borderedbox inspace-10 btmspace-30" src="uploads/<?php echo $result['key_sp2'] ?>" alt="">
		</a>
      <h2 class="heading font-x1"><?php echo $result['key_spname2']; ?></h2>
      <p class="btmspace-30"></p>
    </article>
    <article class="one_third"><a href="#">
			<img style="width: 300px; height: 380px;" class="borderedbox inspace-10 btmspace-30" src="uploads/<?php echo $result['key_sp3'] ?>" alt="">
		</a>
      <h2 class="heading font-x1"><?php echo $result['key_spname3'];  ?></h2>
      <p class="btmspace-30"></p>
    </article>
    
    <div class="clear"></div>
  </div>
</div>
<div class="wrapper row3" style="opacity="0.5" ">
  <article class="hoc container clear"> 
    <div class="one_half first"><img style="width: 480px; height: 380px;" class="borderedbox inspace-10 btmspace-30" src="uploads/<?php echo $result['venue_image'] ?>" alt=""></div>
    <div class="one_half">
      <h2 class="heading"><?php echo $result['venue_name']; ?></h2>
      <p><?php echo nl2br($result['details']); ?></p>

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
  </footer>
</div>
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