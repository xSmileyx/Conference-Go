<?php session_start();?> <!DOCTYPE html>
 
<html>
<head>
<title>Conference management</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top"> <?php if($_SESSION["user_name"]) { ?>

<!--include navigation bar-->
<?php include'nav.php';?>


<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <div class="content three_quarter first"> 
      <div class="scrollable">
<?php
include 'dbconnection.php';
$conf_id = $_POST['conf_id']; 
$query = "SELECT tblconf_speaker.conf_id, tblspeaker.speaker_firstname
			FROM tblconf_speaker
			LEFT JOIN tblspeaker
			ON tblconf_speaker.speaker_id=tblspeaker.speaker_id where conf_id='$conf_id'"; 
$executeQuery=mysql_query($query);
if (!$executeQuery)

{
 die ('Could not connect'.mysql_error());
}

echo '<h2 style="color: blue;font-family: arial" align=center>List of speakers</h2>';

echo '<table border=1  table id=table1 align=center>';
echo '<tr>';
echo '<td>Conference ID</td>';
echo '<td>Speaker name</td>';
echo '</tr>';

while ($row=mysql_fetch_row($executeQuery))
{
echo '<tr>';
echo '<td>'.$row[0].'</td>';
echo '<td>'.$row[1].'</td>';
echo '</tr>';
}

echo '</table>';

?>
      </div>
    <!--include footer-->
<?php include 'footer.php';?> <?php } ?>
</body>
</html>