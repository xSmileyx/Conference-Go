<?php include('config.php');?>


<style>
p.msg{color: #7c795d; padding: 10px 5px 10px 5px; float:left; text-align: left;}

</style>
<form action="fetchmessage.php" method="post" name="messageForm" id="messageForm" >
<?php 

if(isset($_GET['nid'])) {
    $id = $_GET['nid']; //escape string
	
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
					$date=date_create($row["date_received"]);
					$msg = $row["notification_message"];
					$smsg = stripslashes($msg);
					echo "<p class='msg'><b>Title</b> : " .$row["notification_title"]. "<br>
					      <b>Date sent</b> : " .date_format($date,"jS F Y");
					
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
									
									echo "<br><b>From</b> : ".$row['em_firstname']. " " .$row["em_lastname"]. " </p>";

								}
							
						
						}
						  
						  
						  
					echo "<hr>";
					
					
		
					echo "<p class='msg'>" .$smsg. "</p>";
				
				}
		}
		
	

	echo "<input type='hidden' name='nID' value='".$id."'/>";
		
		
}?><hr>
<input type="submit" name="Submit" style="width:auto; float:right;" value="Delete" class="button" onclick="return confirm('Are you sure?');">
<?php

 if(isset($_POST["Submit"]))//checks if the submit button is selected
	{
		$nID = $_POST['nID'];
		$SQLquery = "DELETE FROM tblnotifications WHERE n_id = '$nID'";
		$QueryResult =  $conn->query($SQLquery);
		
			if($QueryResult)
			{
			 header('Location: ' .$_SERVER['HTTP_REFERER']);
		    }
		else
		    {
				echo $SQLquery;
				echo "<br><font color = \"red\">Failed to update a hotel booking</font>" .$conn->error(). ".";
		    } 
		

	}