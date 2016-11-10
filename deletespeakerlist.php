<?php session_start();?> <!DOCTYPE html>

<html>
<head>
<title>Conference management system</title>
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

    <div class="content"> 

      <div class="scrollable">
      <?php
include 'dbconnection.php';

$query="SELECT * FROM tblspeaker" ;

$executeQuery=mysql_query($query);

if (!$executeQuery)
{
 die ('Could not connect'.mysql_error());
}
$query_info=mysql_query($query) or die(mysql_error());
$query_info_count=mysql_num_rows($query_info);


echo '<h2 style="color: blue;font-family: arial" align=center>List of speakers</h2>';


echo '<table border=0  table id=table1 align=center cellspacing="10px">';
echo '<tr>';
echo '<td>Speaker ID &nbsp;&nbsp;&nbsp;</td>';
echo '<td>Speaker First name &nbsp;&nbsp;&nbsp;</td>';
echo '<td>Speaker Last name &nbsp;&nbsp;&nbsp;</td>';
echo '</tr>';

while ($row=mysql_fetch_row($executeQuery))
{
	
echo '<tr>';
echo '<td>'.$row[0].'</td>';
echo '<td>'.$row[1].'</td>';
echo '<td>'.$row[2].'</td>';
echo "<td><form method='post' action='deletespeaker.php'><input type='hidden' name='speaker_id' value='".$row[0]."'><input type='submit' class='button' value='Delete'></form></td>";
echo '</tr>';
}
echo '</table>';

?>
<?php
// close connection
mysql_close();
?>
        
      </div>
<!--include footer-->
<?php include 'footer.php';?> <?php } ?>
</body>
</html>