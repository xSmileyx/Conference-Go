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
$conf_id = $_POST['conf_id']; 
$query = "SELECT * FROM tblsession WHERE conf_id = '$conf_id' ORDER BY session_day ASC, session_starttime ASC"; 
$executeQuery=mysql_query($query);
if (!$executeQuery)

{
 die ('Could not connect'.mysql_error());
}

echo '<h2 style="color: blue;font-family: arial" align=center>List of sessions</h2>';

echo '<table border=1  table id=table1 align=center>';
echo '<tr>';
echo '<td>Session ID</td>';
echo '<td>Session name</td>';
echo '<td>Conference ID</td>';
echo '<td>Speaker ID</td>';
echo '<td>Day</td>';
echo '<td>Start</td>';
echo '<td>End</td>';
echo '<td>Room</td>';
echo '</tr>';

while ($row=mysql_fetch_row($executeQuery))
{
echo '<tr>';
echo '<td>'.$row[0].'</td>';
echo '<td>'.$row[7].'</td>';
echo '<td>'.$row[1].'</td>';
echo '<td>'.$row[2].'</td>';
echo '<td>'.$row[3].'</td>';
echo '<td>'.$row[4].'</td>';
echo '<td>'.$row[5].'</td>';
echo '<td>'.$row[6].'</td>';
echo "<td><form method='post' action='deletesession.php'><input type='hidden' name='session_id' value='".$row[0]."'><input type='submit' class='button' value='Delete'></form></td>";
echo '</tr>';

}

echo '</table>';

?>

      </div>
<!--include footer-->
<?php include 'footer.php';?> <?php } ?>
</body>
</html>