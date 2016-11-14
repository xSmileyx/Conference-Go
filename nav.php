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

::-webkit-scrollbar { 
    display: none; 
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


	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
<!-- 	<script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
 -->	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


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
		 var eID = $(this).data('id');
		 
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
			xmlhttp.open("GET","fetchenquiry.php?eid="+eID,true);
			xmlhttp.send();
	});
	  </script>

<div class="wrapper row0">
  <div id="topbar" class="hoc clear"> 
    <div class="fl_left">
      <ul class="nospace inline pushright">
	 
      </ul>
    </div>
    <div class="fl_right">
	 <ul class="nospace inline pushright">
<li class="dropdown"><i class="fa fa-question-circle" aria-hidden="true"></i> Enquiries
				<div class="dropdown-content" style='overflow-y:scroll; height:200px;'>
				
				<?php
					include 'dbconnection.php';
					$SQLquery = "SELECT * FROM tblenquiries";
					$QueryResult = mysql_query($SQLquery);
					
					if(mysql_num_rows($QueryResult) == 0)
						{
							echo "<a>No enquiries at the moment</a>";
							
						}
					else
						{
							while(($row = mysql_fetch_assoc($QueryResult)) != false)
							{
								$title = $row["msg_title"];
							
								echo "Title: <a data-id=\"".$row['en_id']."\" data-toggle=\"modal\" data-target=\"#myMsgModal\" class=\"open-message\">" .$title. "</a>";
							}
							
						}
				?>
				 
				</div>
			  </li>
	 <li><i class="fa fa-sign-in"></i> <a href="logout.php">Logout</a></li>
	 </ul>
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
			<li><a href="send_message.php">Send message</a></li>
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
	<img src="images/demo/backgrounds/adminbanner.png" alt="Administrator">
    </div>
  </div>
</div>
