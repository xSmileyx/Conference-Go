<?php include('config.php');?>


<style>
p, h1,h2,h3,h4,h5,h6{text-align:center; color: #7c795d; font-family: 'Trocchi', serif;}
h4{font-size:18px;}
h5{font-size:14px; margin-bottom:1px;}
	p{font-size:16px}

</style>
<?php 

if(isset($_GET['rowid'])) {
    $id = $_GET['rowid']; //escape string

	 $SQLquery = "SELECT * from tbltour WHERE tour_id = '$id'";
	 $QueryResult =  $conn->query($SQLquery);
	 
	 if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">Tour is not found in database</p>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
				{
		
?>

<h4><br><?php echo $row["tour_name"];?><br></h4><hr>

<br>
<p>Prices from <strong><font face="verdana" size='4'>RM<?php echo $row['tour_price']?></font></strong> per head</p>
<br>

<img style="width: 300px; height: 320px; margin-left:38%;" class="borderedbox inspace-10 btmspace-30" src="uploads/<?php echo $row['tour_image'] ?>" alt="Image Not Available">


<br>
<h5><b><u>Includes</u></b></h5>
<p><?php echo nl2br($row["includes"]); ?></p>

<br>
<h5><b><u>Excludes</u></b></h5>
<p><?php echo nl2br($row["excludes"]); ?></p>

<br>
<h5><b><u>Description</u></b></h5>
<p><?php echo nl2br($row["description"]); ?></p>

<br>
<h5><b><u>Note</u></b></h5>
<p><?php echo nl2br($row["remarks"]); ?></p>

<br>
<h5><b><u>Validity</u></b></h5>
<p>Until <?php $date=date_create($row["validity"]); echo date_format($date,"jS F Y"); ?></p>
<br>
<hr>

<?php 			}
		}
}?><br>
 <button type="button" style=" border: 1px solid grey; border-radius: 4px;" class="close" data-dismiss="modal">Close</button>