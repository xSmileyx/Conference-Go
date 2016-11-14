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

<form action="dashmodify.php" method="post" name="dashmodify" enctype="multipart/form-data">
<!-- Top Background Image Wrapper -->
<div class="bgded" style="background-image:url('');"> 
<div class="one_half first">
	
	<p>Banner image</p>
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

    <div class="one_half first"><p>Conference image</p><input type="file" name="event_image" class="twitter" /></div>

    <div class="one_half"><br>
      <h2 class="heading">Conference name
	  <?php
					$query = "SELECT conf_name from tblconference WHERE conf_startdate >= CURDATE()";
					$result = mysql_query($query);
					echo "<select name='event_name'>";
					echo "<option value='0'>-Select-</option>";
					
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['conf_name']."'>".$row['conf_name']."</option>";
					}
					echo "</select>";
				?>
	  <p onclick = "notify('white')">Conference description <textarea name="event_desc" rows="5" cols="30" ></textarea></p>

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
    <article class="one_third first"><a><input type="file" name="key_sp1" class="twitter" /></a>
      <h2 class="heading font-x1">Speaker name<input type="text" name="key_spname1" class="twitter" placeholder="Speaker 1 name" style="color:black;" required /></h2>
      <p class="btmspace-30"></p>
    </article>
    <article class="one_third"><a><input type="file" name="key_sp2" class="twitter" /></a>
      <h2 class="heading font-x1">Speaker name<input type="text" name="key_spname2" class="twitter" placeholder="Speaker 2 name"  style="color:black;" required /></h2>
      <p class="btmspace-30"></p>
    </article>
    <article class="one_third"><a><input type="file" name="key_sp3" class="twitter" /></a>
      <h2 class="heading font-x1">Speaker name<input type="text" name="key_spname3" class="twitter" placeholder="Speaker 3 name" style="color:black;" required /></h2>
      <p class="btmspace-30"></p>
    </article>
    
    <div class="clear"></div>
  </div>
</div>
<div class="wrapper row3">
  <article class="hoc container clear"> 
    <div class="one_half first">Venue image<input type="file" name="venue_image" class="twitter" /></div>
    <div class="one_half">
      <h2 class="heading">Venue name <?php
					$query = "SELECT venue_name from tblvenue";
					$result = mysql_query($query);
					echo "<select name='venue_name'>";
					echo "<option value='0'>-Select-</option>";
					
					while($row = mysql_fetch_array($result))
					{
    					echo "<option value='".$row['venue_name']."'>".$row['venue_name']."</option>";
					}
					echo "</select>";
				?>
      <p>Venue Details<textarea name="details" rows="5" cols="30"></textarea><p>
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