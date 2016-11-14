<?php session_start();?>
<?php
	include 'dbconnection.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
	<link href="../dist/styles/metro/notify-metro.css" rel="stylesheet" />

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="../dist/notify.js"></script>
	<script src="../dist/styles/metro/notify-metro.js"></script>
</head>
<body>
<?php if($_SESSION["user_name"]) { ?>
<!--include navigation bar-->
<?php include'nav.php';?>

<form action="adddash.php" method="post" name="dashadd" enctype="multipart/form-data">

<!-- Top Background Image Wrapper -->
<div class="bgded" style="background-image:url('');"> 
<div class="one_half first">

<p style="color:black;"><h2 style="color:black;">Page name</h2></p><input type="text" name="dash_name" class="twitter" placeholder="Name of page" style="color:black;" required />

<p style="color:black;"><h2 style="color:black;">Banner image</h2></p>
	<input type="file" name="banner_image" class="twitter" style="color:black;" />

</div>

  <div class="wrapper row2">
    <div id="breadcrumb" class="hoc clear"> 
    </div>
  </div>
</div>

<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->

    <div class="one_half first"><h2 class="heading">Conference image</h2><input type="file" name="conf_image" class="twitter" /></div>

    <div class="one_half"><br>
      <h2 class="heading">Conference name
	  <?php
					$query = "SELECT conf_id,conf_name from tblconference WHERE conf_startdate >= CURDATE()";
					$result = mysql_query($query);
					echo "<select name='conf_id'>";
					echo "<option value='0'>-Select-</option>";
					
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['conf_id']."'>".$row['conf_name']."</option>";
					}
					echo "</select>";
				?>

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
      <h2 class="heading font-x1">Speaker name
					<select name='speaker1_id' style="color:black;">
					<option value='0'>-Select-</option>
		<?php
					$query = "SELECT speaker_id,speaker_firstname,speaker_lastname from tblspeaker";
					$result = mysql_query($query);
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['speaker_id']."'>".$row['speaker_firstname']." ".$row['speaker_lastname']."</option>";
					}
					echo "</select>";
		?></h2>
      <p class="btmspace-30"></p>
    </article>
	
    <article class="one_third ">
      <h2 class="heading font-x1">Speaker name
					<select name='speaker2_id' style="color:black;">
					<option value='0'>-Select-</option>
		<?php
					$query = "SELECT speaker_id,speaker_firstname,speaker_lastname from tblspeaker";
					$result = mysql_query($query);
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['speaker_id']."'>".$row['speaker_firstname']." ".$row['speaker_lastname']."</option>";
					}
					echo "</select>";
		?></h2>
      <p class="btmspace-30"></p>
    </article>
   
    
	
      <article class="one_third ">
      <h2 class="heading font-x1">Speaker name
					<select name='speaker3_id' style="color:black;">
					<option value='0'>-Select-</option>
		<?php
					$query = "SELECT speaker_id,speaker_firstname,speaker_lastname from tblspeaker";
					$result = mysql_query($query);
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['speaker_id']."'>".$row['speaker_firstname']." ".$row['speaker_lastname']."</option>";
					}
					echo "</select>";
		?>
      <p class="btmspace-30"></p>
    </article>
    
    <div class="clear"></div>
  </div>
</div>
<div class="wrapper row3">
  <article class="hoc container clear"> 
    <div class="one_half first"><h2 class="heading">Venue image</h2	><input type="file" name="venue_image" class="twitter" /></div>
    <div class="one_half">
      <h2 class="heading">Venue name 
					<select name='venue_id'>
					<option value='0'>-Select-</option>
	  <?php
					$query = "SELECT venue_id,venue_name from tblvenue";
					$result = mysql_query($query);
									
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['venue_id']."'>".$row['venue_name']."</option>";
					}
					echo "</select>";
				?>
      <p>Venue Details<textarea name="venue_details" rows="5" cols="30"></textarea><p>
      </ul>
      <footer>
        <ul class="nospace inline pushright">
        </ul>
      </footer>
    </div>
    <div class="clear"></div>
  </article>
</div>
<div id="box">
<table>
<tr align="left">
					<td><input type="reset" name="reset" class="button" value="Clear"/></td>
                	<td align="right"><input type="submit" name="submit" class="button" value="Submit"/></td>
			</tr>        
        </table></div>
</form>
<?php }?>
</body>

</html>