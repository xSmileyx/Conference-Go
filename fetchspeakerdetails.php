<?php include('config.php');?>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/ray.css" rel="stylesheet" type="text/css">

<style>
p, h1,h2,h3,h4,h5,h6{text-align:center; color: #7c795d; font-family: 'Trocchi', serif;}
h4{font-size:18px;}
h5{font-size:14px; margin-bottom:1px;}
	p{font-size:16px}

</style>

<?php 

if(isset($_GET['rowid'])) 
{
    $id = $_GET['rowid']; //escape string
	$SQLquery = "SELECT * from tblspeaker WHERE speaker_id = '$id'";
	$QueryResult =  $conn->query($SQLquery);
	 
	if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">Speaker is not found in database</p>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
				{
?>
					<h4><br>Speaker Details<br></h4><hr>

					<br><br>
					<h5><b><u><?php echo $row["speaker_firstname"];echo '&nbsp&nbsp';echo $row["speaker_lastname"];?></u></b></h5>
					</br>
					</br>
					<h5><img style="width: 300px; height: 320px;" class="borderedbox inspace-10 btmspace-30" src="uploads/<?php echo $row['speaker_image'] ?>" alt="image not available"></h5>
					</br>
					</br>
					<h5><p><?php echo nl2br($row['speaker_details']); ?></p></h5>
									
<?php
				}
		}
?>
		
					


<?php		
}		
?>
					