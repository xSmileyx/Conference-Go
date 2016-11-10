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
	include'nav.php';
	include 'dbconnection.php';
?>

<div class="wrapper row3" style="background-image:url('images/demo/backgrounds/');">
  <main class="hoc container clear"> 
    <!-- main body -->
	
    <div class="one_half first">
	<?php
		
		$query="SELECT c.conf_id,c.conf_name,c.conf_startdate,c.conf_enddate, COUNT(cp.conf_id) 
				FROM tblconference c
				LEFT JOIN tblconf_participant cp ON cp.conf_id = c.conf_id
				WHERE conf_startdate >= CURDATE()
				GROUP BY c.conf_id";
		


$executeQuery=mysql_query($query);

if (!$executeQuery)
{
 die ('Could not connect'.mysql_error());
}

$query_info=mysql_query($query) or die(mysql_error());
$query_info_count=mysql_num_rows($query_info);


echo '<h2 style="color: white;font-family: arial" align=center>Total of participants for upcoming conferences</h2>';


echo '<table border=0  table id=table1 align=center cellspacing="135px">';
echo '<tr>';
echo '<th>Name &nbsp;&nbsp;&nbsp;</td>';
echo '<th>Start date &nbsp;&nbsp;&nbsp;</td>';
echo '<th>End date &nbsp;&nbsp;&nbsp;</td>';
echo '<th>No Participants &nbsp;&nbsp;&nbsp;</td>';
echo '</tr>';

while ($row=mysql_fetch_row($executeQuery))
{
	
echo '<tr>';
echo '<td>'.$row[1].'</td>';
echo '<td>'.$row[2].'</td>';
echo '<td>'.$row[3].'</td>';
echo '<td>'.$row[4].'</td>';


echo '</tr>';
}
echo '</table>';

?>

	</div>
    <div class="one_half"><br>
      <h2 class="heading">

    </div>
    <!-- / main body -->
    <div class="clear"></div>
	
	
	
  </main>
</div>

<div class="wrapper row3" style="opacity="0.5" ">

</div>

<div class="wrapper row4" style="background-image:url('images/demo/backgrounds/');">
  <footer id="footer" class="hoc clear"> 
    <div class="center btmspace-80">
      <h2 class="heading">Final Year Presentaion</h2>
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