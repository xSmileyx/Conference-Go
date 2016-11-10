<?php include('config.php');?>


<style>
p{color: #7c795d;}

</style>
<?php 

if(isset($_GET['id'])) {
    $id = $_GET['id']; //escape string
	
	$SQLquery = "SELECT * from tblnotifications WHERE n_id = '$id'";
	$QueryResult =  $conn->query($SQLquery);
	 
	if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">Message is not found in database</p>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
				{
					$sender = $row["em_id"];
		
					echo "<p>" .$row["notification_message"]. "<p>";
				
				}
		}
		
	$SQLquery = "SELECT * from tbleventmanager WHERE em_id = '$sender'";
	$QueryResult =  $conn->query($SQLquery);

	if($QueryResult->num_rows == 0)
		{
			echo "<p style=\"text-align: center;\">Message is not found in database</p>";
		}
	else
		{
			while(($row = $QueryResult->fetch_assoc()) != false)
				{
					
					echo "<span style='float:left; margin-top:80px;'>From: ".$row['em_firstname']. " " .$row["em_lastname"]. " </span>";

				}
		}	
	
		
		
}?>