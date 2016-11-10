<?php session_start();?> 
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top"> <?php if($_SESSION["user_name"]) { ?>

<!--include navigation bar-->
<?php 	
	include 'selectdash.php';
?>

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_left">
      <ul class="nospace inline pushright">
	 
      </ul>
    </div>
    <div class="fl_right">

	 <li><i class="fa fa-sign-in"></i> <a href="logout.php">Logout</a></li>
    </div>
  </div>
</div>
<div class="wrapper row1" >
  <header id="header"  class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="dashboardadmin.php">Conference management system</a></h1>
	</div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="dashboardadmin.php">Home</a></li>

        <li><a class="drop" href="#">Conference</a>
          <ul>
            <li><a href="add_conference.php">Add conference</a></li>
			<li><a href="manage_conference.php?page=1">Edit or Delete conference</a></li>
			<li><a href="add_confspeaker.php">Add conference speaker</a></li>
			<li><a href="add_confsponsor.php">Add conference sponsor</a></li>
			<li><a href="add_passtype.php">Add pass type</a></li>
			<li><a href="add_session.php">Add session</a></li>
			</li>
		  </ul>
		</li>
		        <li><a class="drop" href="#">Speaker</a>
          <ul>
            <li><a href="add_speaker.php">Add Speaker</a></li>
			<li><a href="manage_speaker.php?page=1">Edit or Delete Speaker</a></li>
		  </ul>
		</li>
		        <li><a class="drop" href="#">Caterer</a>
          <ul>
            <li><a href="add_caterer.php">Add Caterer</a></li>
			<li><a href="manage_caterer.php?page=1">Edit or Delete Caterer</a></li>
		  </ul>
		</li>
		        <li><a class="drop" href="#">Sponsor</a>
          <ul>
            <li><a href="add_sponsor.php">Add Sponsor</a></li>
			<li><a href="manage_sponsor.php?page=1">Edit or Delete Sponsor</a></li>
		  </ul>
		</li>
		        <li><a class="drop" href="#">Venue</a>
          <ul>
            <li><a href="add_venue.php">Add Venue</a></li>
			<li><a href="manage_venue.php?page=1">Edit or Delete Venue</a></li>
		  </ul>
		</li>
		<li>
		<li><a class="drop" href="#">Reports</a>
          <ul>
            <li><a href="viewconfdetails.php?page=1">View conference details</a></li>
			<li><a href="viewcaterer.php?page=1">View caterers</a></li>
			<li><a href="viewconference.php?page=1">View Conferences</a></li>
			<li><a href="viewsponsors.php?page=1">View sponsors</a></li>
			<li><a href="viewspeaker.php?page=1">View speakers</a></li>
			<li><a href="viewvenues.php?page=1">View venues</a></li>
			<li><a href="chooseconf.php">View conference participant</a></li>
		  </ul>
        </li>
		</li>
		        <li><a class="drop" href="#">Misc</a>
          <ul>
            <li><a href="add_tour.php">Add Tour</a></li>
            <li><a href="add_hotel.php">Add Hotel</a></li>
            <li><a href="add_room.php">Add Hotel Room</a></li>
			<li><a href="dash_edit.php">Edit dashboard</a></li>
			<li><a href="add_eventmanager.php">Add event manager</a></li>
			<li><a href="dashboard1.php">View as participant</a></li>
		  </ul>
		</li>
      </ul>
    </nav>
  </header>
</div>
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
      <h2 class="heading"><?php echo nl2br($result['venue_name']); ?></h2>
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
<?php }?>
</body>
</html>