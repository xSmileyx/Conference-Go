<?php include 'dbconnection.php';?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
.row{d padding: 70px 0;
    
    text-align: center}

.glyphicon {  margin-bottom: 10px;margin-right: 10px;}
h6{font-size:120%;}
small {
display: block;
line-height: 1.428571429;
color: #999;
}
</style>
<?php 

if(isset($_GET['rowid'])) {
    $id = $_GET['rowid']; //escape string
	
	$query = "SELECT * FROM tblparticipant WHERE p_id = '$id'";
	
	$executeQuery=mysql_query($query);
	while ($row=mysql_fetch_assoc($executeQuery))
			 {
	?>

    <div class="row"><br>
		<h6><?php echo $row["p_firstname"]. " " .$row["p_surname"];?></h6>
		<h6><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row["p_country"];?></h6>
		<h6><i class="fa fa-home" aria-hidden="true"></i> <?php echo $row["p_address"]. " " .$row["p_postalcode"];?></h6>
		<p>
			<i class="fa fa-briefcase" aria-hidden="true"></i> : <?php echo $row["p_occupation"];?>
			<br />
			<i class=" fa fa-envelope"  aria-hidden="true"></i> : <?php echo $row["p_email"];?>
			<br />
			<i class="fa fa-phone"  aria-hidden="true"></i> : <?php echo $row["p_phone"];?>
			<br />
			<i class="fa fa-gift"  aria-hidden="true"></i> : <?php $date=date_create($row["p_dob"]); echo date_format($date,"jS F Y");?>
		</p>            
    </div>
	
<?php }
} ?>
