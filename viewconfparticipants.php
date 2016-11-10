<?php session_start();?> <!DOCTYPE html>
 
<html>
<head>
<title>Conference management</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/ray.css" rel="stylesheet" type="text/css" media="all">

	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  
<!-- 	<script type="text/javascript" src="scripts/jquery-1.11.0.min.js"></script>
 -->	  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	 
	/*
		Place code to connect to your DB here.
	*/
	include('dbconnection.php');	// include your code to connect to DB.
	
	
	
	if(isset($_POST['conf_id']))
	{
		$conf_id = $_POST['conf_id'];
		$_SESSION['cID'] = $conf_id;
	}
	else
	{
		
		$conf_id =$_SESSION['cID'];
	}
	
	$tbl_name="tblconf_participant";		//your table name
	// How many adjacent pages should be shown on each side?
	$adjacents = 3;
	
	/* 
	   First get total number of rows in data table. 
	   If you have a WHERE clause in your query, make sure you mirror it here.
	*/
	$query = "SELECT COUNT(*) as num FROM $tbl_name WHERE tblconf_participant.conf_id = '$conf_id'";
			
	$total_pages = mysql_fetch_array(mysql_query($query));
	$total_pages = $total_pages['num'];
	
	/* Setup vars for query. */
	$targetpage = "viewconfparticipants.php"; 	//your file name  (the name of this file)
	$limit = 50; 								//how many items to show per page
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT tblconf_participant.conf_id,tblconf_participant.confpass_reference, tblparticipant.p_firstname,tblparticipant.p_surname,tblconf_participant.p_id
			FROM $tbl_name
			LEFT JOIN tblparticipant
			ON tblconf_participant.p_id=tblparticipant.p_id where conf_id='$conf_id' LIMIT $start, $limit ";
	$result = mysql_query($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	$pagination = "";
	if($lastpage > 1)
	{	
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1) 
			$pagination.= "<a href=\"$targetpage?page=$prev\">� previous</a>";
		else
			$pagination.= "<span class=\"disabled\">� previous</span>";	
		
		//pages	
		if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter</span>";
				else
					$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
			}
		}
		elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
				$pagination.= "...";
				$pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
				$pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";		
			}
			//close to end; only hide early pages
			else
			{
				$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
				$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
				$pagination.= "...";
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";					
				}
			}
		}
		
		//next button
		if ($page < $counter - 1) 
			$pagination.= "<a href=\"$targetpage?page=$next\">next �</a>";
		else
			$pagination.= "<span class=\"disabled\">next �</span>";
		$pagination.= "</div>\n";		
	}
?>

	<?php
	
echo '<h2 style="color: blue;font-family: arial" align=center>List of participants</h2>';

echo '<table border=1  table id=table1 align=center>';
echo '<tr>';
echo '<td>Reference</td>';
echo '<td>First name</td>';
echo '<td>Last name</td>';
echo '</tr>';
		while($row = mysql_fetch_array($result))
		{
	
		// Your while loop here
		echo '<tr>';
		echo '<td>'.$row[1].'</td>';
		echo '<td><a data-id="' .$row[4]. '" data-toggle="modal" data-target="#myModal" class="open-details">'.$row[2].'</a></td>';
		echo '<td><a data-id="' .$row[4]. '" data-toggle="modal" data-target="#myModal" class="open-details">'.$row[3].'</a></td>';
		echo '</tr>';
	
		}
echo '</table>';
	?>

<?=$pagination?>
	
	        </div>
			
 	 <!-- Modal -->
  <div class="modal hide" data-easein="fadeInDown" data-easeout="fadeOutDown" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" id="myModal" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></button>
		           <h4 class="modal-title" style="text-align:center;">Participant Details</h4><hr>
        </div>
        <div class="modal-body">
		  <div id="details"></div>
        </div>		
        <div class="modal-footer">
		<hr>
        </div>
      </div>
    </div>
  </div>
  
  <script>
  $(document).on("click", ".open-details", function () {
     var pID = $(this).data('id');
	 
		 if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("details").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","fetchdata.php?rowid="+pID,true);
        xmlhttp.send();
});

  </script>
    <!--include footer-->
<?php include 'footer.php';?> <?php } ?>
</body>
</html>