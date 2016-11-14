<?php include('config.php');?>


<style>
p, h1,h2,h3,h4,h5,h6{text-align:center; color: #7c795d; font-family: 'Trocchi', serif;}
h4{font-size:18px;}
h5{font-size:14px; margin-bottom:1px;}
	p{font-size:16px}
#barChart_div, #stats_div { float:left; }


</style>
<?php 

if(isset($_GET['rowid'])) {
    $id = $_GET['rowid']; //escape string

	$SQLquery = "SELECT * from tblhotel WHERE hotel_id = '$id'";
	$QueryResult =  $conn->query($SQLquery);
	 
	if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">Please select a hotel</p>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
				{
?>
<h4><br><?php echo $row["hotel_name"];?><br></h4><hr>

<br>
<p>Prices from <strong><font face="verdana" size='4'>RM<?php echo $row['room_rate']?></font></strong> per night</p>

<img style="width: 300px; height: 320px; margin-left:38%;" class="borderedbox inspace-10 btmspace-30" src="uploads/<?php echo $row['hotel_image'] ?>" alt="Image Not Available">


<br>
<h5><b><u>Address</u></b></h5>
<p><?php echo nl2br($row["hotel_address"]); ?></p>

<br>
<h5><b><u>Location</u></b></h5>
<p><?php echo nl2br($row["hotel_location_desc"]); ?></p>

<br>
<h5><b><u>Features and Amenities</u></b></h5>
<p><?php echo nl2br($row["hotel_feature_amenities"]); ?></p>

<br>
<h5><b><u>Contact</u></b></h5>
<p>+<?php echo nl2br($row["hotel_contact"]); ?></p>


</div>

<?php		
				}
		}
}?>